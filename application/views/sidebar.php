<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 19/6/2556
 * Time: 11:56 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();

$webUrl = $this->Constant_model->webUrl();
$arrLinkWebSite = $this->Link_website_model->getAllLink();

$pathIconNew = $baseUrl . "web/images/icon_new.gif";
$pathSellers = $baseUrl . "web/images/icon_hot.gif";
$pathRecommend = $baseUrl . "web/images/icon_recommence.gif";
$pathPromotion = $baseUrl . "web/images/icon_promotion.gif";

?>


<table class="mainbody" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<!--begin leftcolumn-->
<td class="leftcol">
<div class="padding">
<!--<div class="module">-->
<!--    <div>-->
<!--        <div>-->
<!--            <div>-->
<!--                <div align="center">-->
<!--                    <img src="/images/stories/random/Baseball_catcher.jpg" alt="Baseball_catcher.jpg" width="180"-->
<!--                         height="186"/></div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<!--module login-->
<script>

    var remember_me = 'remember_me';
    var url_login = "<?php echo $webUrl; ?>member/login";
    jQuery.noConflict()(document).ready(function () {
        $("a#register, a#forget-password, a#map1, a#map2, a.fancybox-click, .gallerypic, .add-cart").fancybox({//, a#forget-password
            'overlayShow': true,
            'transitionIn': 'elastic',
            'transitionOut': 'elastic'
        });

        $("#remember").change(function () {
            if (this.checked) {
                setCookieLogin();
            } else {
                deleteCookie(remember_me);
            }
        });

        checkRemember();
    });
    //var options = { path: '/main_index.php', expires: 10 };

    function addCookies(value, vdate, cookieName) {
        var date = new Date();
        // var vdate = 30;
        date.setTime(date.getTime() + (vdate * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
        document.cookie = cookieName + "=" + value + expires + "; path=/";
    }

    function getCookie(cookieName) {
        var nameEQ = cookieName + "=";
        var getCookies = document.cookie;
        var strSave = '';
        // var ca = document.cookie.split(';');alert(getCookies.indexOf(nameEQ));
        if (getCookies.indexOf(nameEQ) > 0) {
            var point = getCookies.indexOf(nameEQ);
            //alert(getCookies.substring(point, getCookies.length))
            for (var i = point; i < getCookies.length; i++) {
                strSave += getCookies.substring(i, i + 1);
                if (nameEQ == strSave) {
                    //alert(strSave)
                    //return strSave;
                }
            }
        }
        if (strSave != "") {
            strSave = strSave.split(';');
            strSave = strSave[0];
        }
        return strSave;
    }

    function deleteCookie(cookieName) {
        // This function will attempt to remove a cookie from all paths.
        var pathBits = location.pathname.split('/');
        var pathCurrent = ' path=';

        // do a simple pathless delete first.
        document.cookie = cookieName + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';

        for (var i = 0; i < pathBits.length; i++) {
            pathCurrent += ((pathCurrent.substr(-1) != '/') ? '/' : '') + pathBits[i];
            document.cookie = cookieName + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;' + pathCurrent + ';';
        }
    }

    function checkRemember() {
        var strCookie = getCookie(remember_me);
        if (strCookie == "") {
            $("#remember").attr('checked', false);
        } else {
            $("#remember").attr('checked', true);
            //var arrSp = strCookie.split(";");
            var arrValue = strCookie.split("&");
            $("#username").val(arrValue[1]);
            $("#passwd").val(arrValue[2]);
        }
    }

    function setCookieLogin() {
        if ($("#remember").attr('checked')) {
            var userName = $("#username").val();
            var pwd = $("#passwd").val();
            var strCookie = "checked&" + userName + "&" + pwd;
            addCookies(strCookie, 30, remember_me);
        }
    }
    function validateLogin(frm) {
        if (frm.username.value == "") {
            alert("กรุณากรอก ชื่อผู้ใช้");
            frm.username.select();
            return false;
        } else if (frm.passwd.value == "") {
            alert("กรุณากรอก รหัสผ่าน");
            frm.passwd.select();
            return false;
        }
        return true;
    }

    function submitLogin(frm) {
        if (validateLogin(frm)) {
            setCookieLogin();//set cookie
            $.post(url_login, $("#form-login").serialize(),
                function (result) {
                    if (result == "login fail") {
                        alert('ชื่อผู้ใช้ หรือรหัสผ่านผิด\n** กรุณาตรวจสอบ **');
                        $("#username").select();
                    } else {
                        //alert(result)
                        window.location.reload();
                    }
                }
            );
        }
        return false;
    }
</script>
<?php
if (empty($this->session->userdata['user_name'])) :
    ?>
    <div class="module-hilite1">
        <div>
            <div>
                <div>
                    <h3>เข้าสู่ระบบ</h3>

                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="login" id="form-login"
                          onsubmit="return submitLogin(this);">
                        <fieldset class="input">
                            <p id="form-login-username">
                                <label for="username">ชื่อผู้ใช้</label><br/>
                                <input id="username" type="text" name="username" class="inputbox" alt="username"
                                       size="18"/>
                            </p>

                            <p id="form-login-password">
                                <label for="passwd">รหัสผ่าน</label><br/>
                                <input id="passwd" type="password" name="passwd" class="inputbox" size="18"
                                       alt="password"/>
                            </p>

                            <p id="form-login-remember">
                                <label for="remember">Remember Me</label>
                                <input id="remember" type="checkbox" name="remember" class="inputbox" value="yes"
                                       alt="Remember Me"/>
                            </p>
                            <!--                        <input type="submit" name="Submit" class="button" value="เข้าสู่ระบบ"/>-->
                            <button class="button btn btn-danger">เข้าสู่ระบบ</button>

                        </fieldset>
                        <ul>
                            <li>
                                <a id="forget-password" href="<?php echo $webUrl; ?>member/forgetPassword">
                                    ลืมรหัสผ่าน?</a>
                            </li>
                            <li>
                                <a id="register" href="<?php echo $webUrl; ?>member/register">
                                    สมัครสมาชิก?</a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <script>
        var url_logout = "<?php echo $webUrl; ?>member/logout";
        function logout() {
            $.post(url_logout,
                function (result) {
                    if (result == "logout fail") {
                        alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                    } else {
                        //alert(result)
                        window.location.reload();
                    }
                }
            );
            return false;
        }
    </script>
    <div class="module-hilite1">
        <div>
            <div>
                <div>
                    <h3>สมาชิก</h3>
                    <fieldset class="input">
                        <p><font color="#E72222">สวัสดี</font><a href="<?php echo $webUrl; ?>สมาชิก">
                            <?php echo $this->session->userdata['name']; ?></a></p>
                        <p><font
                                color="#E72222">ประเภทสมาชิก</font> <?php echo $this->session->userdata['member_type']; ?>
                        </p>
                        <ul>
                            <li>
                                <a href="#" onclick="return logout();">
                                    ออกจากระบบ?</a>
                            </li>
                        </ul>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<!--module เมนูย่อย-->
<link rel="stylesheet" href="<?php echo $baseUrl; ?>web/plugin/titan-menu/style.css"/>
<script src="<?php echo $baseUrl; ?>web/plugin/titan-menu/titan-menu.js"></script>
<!-- Icons -->
<!--    <link rel="stylesheet" href="css/fatcow_icons.css" />-->
<div class="module">
    <section id="lightgrey">
        <!-- start menu -->
        <nav class="titanmenu">
            <ul id="demo-2">
                <li><a href="<?php echo $baseUrl; ?>">Home</a></li>
                <li><a href="<?php echo $webUrl; ?>ผ้าม่าน">Curtain</a>
                    <!-- start -->
                    <div>
                        <span><span><!-- arrow --></span></span>

                        <!-- lvl 1 -->
                        <ul>
                            <li><a href="<?php echo $webUrl; ?>ผ้าม่าน/Curtain&Fabric">Curtain & Fabric</a></li>
                            <li><a href="<?php echo $webUrl; ?>ผ้าม่าน/WallPaper">Wall Paper</a></li>
                            <li><a href="<?php echo $webUrl; ?>ผ้าม่าน/Roller Blind">Roller Blind</a></li>
                            <li><a href="<?php echo $webUrl; ?>ผ้าม่าน/VenetianBlind">Venetian Blind</a></li>
                            <li><a href="<?php echo $webUrl; ?>ผ้าม่าน/FurnitureBuiltIn">Furniture Built In</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="<?php echo $webUrl; ?>สินค้า">Product</a>
                    <!-- start -->
                    <div>
                        <span><span><!-- arrow --></span></span>

                        <!-- lvl 1 -->
                        <ul>
                            <li><a href="<?php echo $webUrl; ?>สินค้า/จานดาวเทียม">จานดาวเทียม</a></li>
                            <li><a href="<?php echo $webUrl; ?>สินค้า/เครื่องปรับอากาศ">เครื่องปรับอากาศ</a></li>
                            <li><a href="<?php echo $webUrl; ?>สินค้า/กล้องวงจรปิด">กล้องวงจรปิด</a></li>
                        </ul>
                    </div>
                </li>

                <li><a href="<?php echo $webUrl; ?>สมาชิก">Member</a></li>
                <li><a href="<?php echo $webUrl; ?>ติดต่อเรา">Contact Us</a></li>
            </ul>
        </nav>
        <!-- end menu -->
    </section>
</div>
<br>

<div class="cleaner">&nbsp;</div>
<!--    <div>-->
<!--        <div>-->
<!--            <div>-->
<!---->
<!--                <!--swMenuFree6.0 transmenu by http://www.swmenupro.com-->
<!--                <div id="sw-wrap" class="swmenu" align="left">-->
<!--                    <table cellspacing="0" cellpadding="0" id="swmenu" class="swmenu">-->
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <a id="menu89" href="--><?php //echo $webUrl; ?><!--สินค้ามาใหม่">สินค้ามาใหม่-->
<!--                                    <img width="35" height="12" src="--><?php //echo $pathIconNew; ?><!--"/></a>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <a id="menu121" href="--><?php //echo $webUrl; ?><!--สินค้าขายดี">สินค้าขายดี-->
<!--                                    <img src="--><?php //echo $pathSellers; ?><!--"/></a>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <a id="menu120" href="--><?php //echo $webUrl; ?><!--สินค้าแนะนำ">สินค้าแนะนำ-->
<!--                                    <img src="--><?php //echo $pathRecommend; ?><!--"/></a>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <a id="menu84" href="-->
<?php //echo $webUrl; ?><!--สินค้าโปรโมชั่น">สินค้าโปรโมชั่น-->
<!--                                    <img src="--><?php //echo $pathPromotion; ?><!--"/></a>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                    </table>-->
<!--                </div>-->
<!--                <div id="subwrap">-->
<!--                    <script type="text/javascript">-->
<!---->
<!--                        if (TransMenu.isSupported()) {-->
<!--                            var ms = new TransMenuSet(TransMenu.direction.right, 3, 0, TransMenu.reference.topRight);-->
<!--                            var menu121 = ms.addMenu(document.getElementById("menu121"));-->
<!--                            /*menu121.addItem("ผ้าม่าน 1", "#", "0");-->
<!--                             menu121.addItem("ผ้าม่าน 2", "#", "0");-->
<!--                             menu121.addItem("ผ้าม่าน 3", "#", "0");*/-->
<!--                            var menu120 = ms.addMenu(document.getElementById("menu120"));-->
<!--                            /*menu120.addItem("จานดาวเทียม 1", "#", "0");-->
<!--                             menu120.addItem("จานดาวเทียม 2", "#", "0");-->
<!--                             menu120.addItem("จานดาวเทียม 3", "#", "0");*/-->
<!--                            var menu84 = ms.addMenu(document.getElementById("menu84"));-->
<!--                            /*menu84.addItem("เครื่องปรับอากาศ 1", "#", "0");-->
<!--                             menu84.addItem("เครื่องปรับอากาศ 2", "#", "0");-->
<!--                             menu84.addItem("เครื่องปรับอากาศ 3", "#", "0");*/-->
<!--                            function init() {-->
<!--                                if (TransMenu.isSupported()) {-->
<!--                                    TransMenu.initialize();-->
<!--                                    document.getElementById("menu89").onmouseover = function () {-->
<!--                                        ms.hideCurrent();-->
<!--                                        this.className = "hover";-->
<!--                                    }-->
<!--                                    document.getElementById("menu89").onmouseout = function () {-->
<!--                                        this.className = "";-->
<!--                                    }-->
<!--                                    menu121.onactivate = function () {-->
<!--                                        document.getElementById("menu121").className = "hover";-->
<!--                                    };-->
<!--                                    menu121.ondeactivate = function () {-->
<!--                                        document.getElementById("menu121").className = "";-->
<!--                                    };-->
<!--                                    menu120.onactivate = function () {-->
<!--                                        document.getElementById("menu120").className = "hover";-->
<!--                                    };-->
<!--                                    menu120.ondeactivate = function () {-->
<!--                                        document.getElementById("menu120").className = "";-->
<!--                                    };-->
<!--                                    menu84.onactivate = function () {-->
<!--                                        document.getElementById("menu84").className = "hover";-->
<!--                                    };-->
<!--                                    menu84.ondeactivate = function () {-->
<!--                                        document.getElementById("menu84").className = "";-->
<!--                                    };-->
<!--//                                    document.getElementById("menu84").onmouseover = function () {-->
<!--//                                        ms.hideCurrent();-->
<!--//                                        this.className = "hover";-->
<!--//                                    }-->
<!--//                                    document.getElementById("menu84").onmouseout = function () {-->
<!--//                                        this.className = "";-->
<!--//                                    }-->
<!--//                                    document.getElementById("menu85").onmouseover = function () {-->
<!--//                                        ms.hideCurrent();-->
<!--//                                        this.className = "hover";-->
<!--//                                    }-->
<!--//                                    document.getElementById("menu85").onmouseout = function () {-->
<!--//                                        this.className = "";-->
<!--//                                    };-->
<!--//                                    document.getElementById("menu122").onmouseover = function () {-->
<!--//                                        ms.hideCurrent();-->
<!--//                                        this.className = "hover";-->
<!--//                                    }-->
<!--//                                    document.getElementById("menu122").onmouseout = function () {-->
<!--//                                        this.className = "";-->
<!--//                                    }-->
<!--//                                    document.getElementById("menu144").onmouseover = function () {-->
<!--//                                        ms.hideCurrent();-->
<!--//                                        this.className = "hover";-->
<!--//                                    }-->
<!--//                                    document.getElementById("menu144").onmouseout = function () {-->
<!--//                                        this.className = "";-->
<!--//                                    }-->
<!--                                }-->
<!--                            }-->
<!---->
<!--                            TransMenu.spacerGif = "http://athlete.teamwebsitehosting.com/modules/mod_swmenufree/images/transmenu/x.gif";-->
<!--                            TransMenu.dingbatOn = "http://athlete.teamwebsitehosting.com/modules/mod_swmenufree/images/transmenu/whiteleft-on.gif";-->
<!--                            TransMenu.dingbatOff = "http://athlete.teamwebsitehosting.com/modules/mod_swmenufree/images/transmenu/whiteleft-off.gif";-->
<!--                            TransMenu.sub_indicator = true;-->
<!--                            TransMenu.menuPadding = 0;-->
<!--                            TransMenu.itemPadding = 0;-->
<!--                            TransMenu.shadowSize = 2;-->
<!--                            TransMenu.shadowOffset = 3;-->
<!--                            TransMenu.shadowColor = "#888";-->
<!--                            TransMenu.shadowPng = "http://athlete.teamwebsitehosting.com/modules/mod_swmenufree/images/transmenu/grey-40.png";-->
<!--                            TransMenu.backgroundColor = "#333333";-->
<!--                            TransMenu.backgroundPng = "http://athlete.teamwebsitehosting.com/modules/mod_swmenufree/images/transmenu/white-90.png";-->
<!--                            TransMenu.hideDelay = 600;-->
<!--                            TransMenu.slideTime = 300;-->
<!--                            TransMenu.selecthack = 0;-->
<!--                            TransMenu.autoposition = 1;-->
<!--                            TransMenu.renderAll();-->
<!--                            if (typeof window.addEventListener != "undefined")-->
<!--                                window.addEventListener("load", init, false);-->
<!--                            else if (typeof window.attachEvent != "undefined") {-->
<!--                                window.attachEvent("onload", init);-->
<!--                            } else {-->
<!--                                if (window.onload != null) {-->
<!--                                    var oldOnload = window.onload;-->
<!--                                    window.onload = function (e) {-->
<!--                                        oldOnload(e);-->
<!--                                        init();-->
<!--                                    }-->
<!--                                } else-->
<!--                                    window.onload = init();-->
<!--                            }-->
<!--                        }-->
<!--                    </script>-->
<!--                </div>-->
<!--                <script type="text/javascript">-->
<!--                    <!---->
<!--                    jQuery.noConflict();-->
<!--                    jQuery(document).ready(function ($) {-->
<!--                        $('#sw-wrap').parents().css('position', 'static');-->
<!--                        $('#sw-wrap').parents().css('z-index', '100');-->
<!--                        $('#sw-wrap').css('z-index', '101');-->
<!--                    });-->
<!--                    //-->
<!--                </script>-->
<!---->
<!--                <!--End swMenuFree menu module-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!--module เพื่อนช่าง-->
<div class="module">
    <div>
        <div>
            <div>
                <a href="http://latendahouse.com/index/openWeb/48" title="www.เพื่อนช่าง.com" target="_blank">
                    <h3>www.เพื่อนช่าง.com</h3>
                    <img src="<?php echo $baseUrl; ?>web/images/logo_peuanchang_150x150.png" width="188"/>
                </a>
            </div>
        </div>
    </div>
</div>

<!--module facebook-->
<div class="module">
    <div>
        <div>
            <div>
                <iframe
                    src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Flatenda.page&amp;width=194&amp;height=310&amp;show_faces=true&amp;colorscheme=dark&amp;stream=false&amp;show_border=true&amp;header=false"
                    scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:194px; height:310px;"
                    allowTransparency="true">
                </iframe>
            </div>
        </div>
    </div>
</div>


<!--module link-->
<div class="module">
    <div>
        <div>
            <div>
                <h3>LINK ที่เกี่ยวข้อง</h3>
                <fieldset class="input">
                    <ul>
                        <?php
                        $strOldGroup = "";
                        foreach ($arrLinkWebSite as $key => $value) :
                        $strLink = $webUrl . "index/openWeb/" . $value->id;
                        if ($value->link_group != $strOldGroup):
                        $strOldGroup = $value->link_group;
                        ?>
                    </ul>
                    <span class="link-group"><?php echo $value->link_group; ?></span>
                    <ul class="ul-link">
                        <li><a target="_blank" href="<?php echo $strLink; ?>">
                                <?php echo $value->name; ?></a> (<?php echo $value->count_click; ?>)
                        </li>
                        <?php else: ?>
                            <li><a target="_blank" href="<?php echo $strLink; ?>">
                                    <?php echo $value->name; ?></a> (<?php echo $value->count_click; ?>)
                            </li>
                        <?php
                        endif;
                        endforeach;
                        ?>
                    </ul>
                </fieldset>
            </div>
        </div>
    </div>
</div>


</div>
</td>
<!--end leftcolumn-->