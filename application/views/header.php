<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 2/5/2556
 * Time: 16:23 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();

//$webUrl = strstr($_SERVER['HTTP_HOST'], 'localhost') > -1 ? 'index.php/' : base_url();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta itemprop="image" content="<?php echo $baseUrl; ?>web/images/fiv_icon_128x128.png">
    <meta http-equiv='content-type' content='text/html; charset=UTF-8'/>
    <meta name='robots' content='index, follow'/>
    <meta name='keywords' content='latendahouse, บริษัท เอ-ทีมเคอร์เทน จำกัด, ผ้าม่าน, รางโชว์, มู่ลี่, ม่านปรับแสง, ม่านม้วน, ม่านพลับ, วอลเปเปอร์,
    ฉากกั้นห้อง, กั้นแอร์, พรม, กระเบื้องยาง, จานดาวเทียม, เครื่องปรับอากาศ, กล้องวงจรปิด, จีพีเอสติดรถยนต์, นครปฐม,
    เพื่อนช่าง, จานดาวเทียม นครปฐม, CCTV, CCTV นครปฐม, กล้องวงจรปิด นครปฐม, CCTV นครปฐม<?php echo $keyword; ?>'/>
    <title><?php echo $siteTitle; ?></title>
    <meta name='description' content='เอทีมเคอร์เทน'/>
    <meta name='author' content='เอทีมเคอร์เทน'/>
    <meta name='copyright' content='บริษัท เอทีมเคอร์เทน จำกัด'/>
    <meta http-equiv='content-language' content='th'/>
    <meta name='revisit-after' content='1 days'/>
    <meta name='Distribution' content='Global'/>

    <link rel='shortcut icon' href='<?php echo $baseUrl; ?>web/images/shot_cut_icon.png'/>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>web/css/trans-menu.css"/>

    <!--    <link href="--><?php //echo $baseUrl; ?><!--web/css/rokmoomenu.css" rel="stylesheet" type="text/css"/>-->
    <link href="<?php echo $baseUrl; ?>web/css/template_css.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl; ?>web/css/template_colors.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="<?php echo $baseUrl; ?>web/js/transmenu_Packed.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl; ?>web/js/jquery-1.2.6.pack.js"></script>

    <!--    fancybox-->
    <link href="<?php echo $baseUrl; ?>web/css/product-view-style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="<?php echo $baseUrl; ?>web/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript"
            src="<?php echo $baseUrl; ?>web/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl; ?>web/js//fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>web/js/fancybox/jquery.fancybox-1.3.4.css"
          media="screen"/>
    <!--    end fancy box-->


    <link rel="stylesheet" href="<?php echo $baseUrl; ?>web/css/slide/slide-style.css" type="text/css" media="screen"/>
    <!--<script type="text/javascript">var _siteRoot = 'index.html', _root = 'index.html';</script>-->
    <script type="text/javascript" src="<?php echo $baseUrl; ?>web/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl; ?>web/js/slide/slide-scripts.js"></script>
</head>
<body id="ff-geneva" class="f-default overlay-carbon latch">

<!--include js facebook-->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div id="page-bg">
<!--end include js facebook-->

<!--begin top panel-->
<div id="top-bar">
    <div id="mod-login">
        <div class="wrapper">
            <div class="clr"></div>
        </div>
    </div>
</div>
<!--end top panel-->

<!--begin main wrapper-->
<div id="mainbody" class="wrapper">

<!--begin header-->
<div id="header">
    <a href="<?php echo $baseUrl; ?>" class="nounder">
        <img src="<?php echo $baseUrl; ?>web/images/web-logo2.png"
             border="0" alt="" id="logo" class="png"/>
    </a>

    <div id="banner">
        <div class="moduletable">
            <p><strong>บริษัท เอ-ทีม เคอร์เทน จำกัด</strong><br>
                A-Team Curtain Co., Ltd.<br>
                475/15 ถ.ทหารบก ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000<br>
                โทร 086-317-2217</p></div>
    </div>
</div>
<!--end header-->

<div id="main-shadow">
<div id="main-shadow2">
<div class="side-shadow1">
<div class="side-shadow2">
<div id="iefix">
    <div id="horiz-menu" class="suckerfish">
        <ul class="menutop">
            <li id="current" class="active item89">
                <a href="<?php echo $baseUrl; ?>"><span>หน้าแรก</span></a>
            </li>
            <li class="parent item121"><a href="<?php echo $webUrl; ?>สินค้า/ผ้าม่าน"
                                          class="topdaddy"><span>ผ้าม่าน</span></a>
                <!--                <ul>-->
                <!--                    <li class="item140 sub-menu">-->
                <!--                        <a href="#"><span>ผ้าม่านแบล็คเอ้าท์</span></a>-->
                <!--                    </li>-->
                <!--                    <li class="item140">-->
                <!--                        <a href="#"><span>ผ้าโปร่ง</span></a>-->
                <!--                    </li>-->
                <!--                    <li class="item140">-->
                <!--                        <a href="#"><span>ผ้าไหมโพลีเอสเตอร์</span></a>-->
                <!--                    </li>-->
                <!--                    <li class="item140">-->
                <!--                        <a href="#"><span>ผ้าไหมโพลีเอสเตอร์</span></a>-->
                <!--                    </li>-->
                <!--                    <li class="item140">-->
                <!--                        <a href="#"><span>ผ้ากำมะหยี่</span></a>-->
                <!--                    </li>-->
                <!--                    <li class="item140">-->
                <!--                        <a href="#"><span>ผ้าบุเฟอร์นิเจอร์</span></a>-->
                <!--                    </li>-->
                <!--                    <li class="item140">-->
                <!--                        <a href="#"><span>รูปแบบผ้าม่าน</span></a>-->
                <!--                    </li>-->
                <!--                    <li class="item140">-->
                <!--                        <a href="#"><span>มู่ลี่</span></a>-->
                <!--                    </li>-->
                <!---->
                <!--                </ul>-->
            </li>
            <li class="parent item120">
                <a href="<?php echo $webUrl; ?>สินค้า/จานดาวเทียม" class="topdaddy"><span>จานดาวเทียม</span></a>
                <!--                <ul>-->
                <!--                    <li class="item136">-->
                <!--                        <a href="#"><span>จานดาวเทียม 1</span></a>-->
                <!--                    </li>-->
                <!--                    <li class="item136">-->
                <!--                        <a href="#"><span>จานดาวเทียม 2</span></a>-->
                <!--                    </li>-->
                <!--                    <li class="item136">-->
                <!--                        <a href="#"><span>จานดาวเทียม 3</span></a>-->
                <!--                    </li>-->
                <!--                </ul>-->
            </li>
            <li class="item84">
                <a href="<?php echo $webUrl; ?>สินค้า/เครื่องปรับอากาศ"> <span>เครื่องปรับอากาศ</span></a>
                <!--                <ul>-->
                <!--                    <li class="item140">-->
                <!--                        <a href="#"><span>เครื่องปรับอากาศ 1</span></a>-->
                <!--                    </li>-->
                <!--                    <li class="item140">-->
                <!--                        <a href="#"><span>เครื่องปรับอากาศ 2</span></a>-->
                <!--                    </li>-->
                <!--                    <li class="item140">-->
                <!--                        <a href="#"><span>เครื่องปรับอากาศ 3</span></a>-->
                <!--                    </li>-->
                <!--                </ul>-->
            </li>
            <li class="item85">
                <a href="<?php echo $webUrl; ?>สินค้า/กล้องวงจรปิด"><span>กล้องวงจรปิด</span></a>
                <!--                <ul>-->
                <!--                    <li class="item140">-->
                <!--                        <a href="#"><span>เครื่องปรับอากาศ 1</span></a>-->
                <!--                    </li>-->
                <!--                    <li class="item140">-->
                <!--                        <a href="#"><span>เครื่องปรับอากาศ 2</span></a>-->
                <!--                    </li>-->
                <!--                    <li class="item140">-->
                <!--                        <a href="#"><span>เครื่องปรับอากาศ 3</span></a>-->
                <!--                    </li>-->
                <!--                </ul>-->
            </li>
            <li class="item122"><a href="#"><span>เกี่ยวกับเรา</span></a></li>
            <li class="item144"><a href="#"><span>ติดต่อเรา</span></a></li>
        </ul>
    </div>
</div>
<div id="main-content">
<div id="main-content2">

<?php if ($showSlide): ?>
    <!--slide image-->
    <div id="mainmodules1" class="spacer w99">
        <div class="block">
            <div class="module">
                <div id="slidewrap">
                    <div id="slide-header">
                        <div class="slide-wrap">
                            <div id="slide-holder">
                                <div id="slide-runner">
                                    <a href="<?php echo $webUrl; ?>สินค้า/ผ้าม่าน"><img id="slide-img-1"
                                                                                        src="<?php echo $baseUrl; ?>web/images/slide/slide_curtain.png"
                                                                                        class="slide" alt=""/></a>
                                    <a href="<?php echo $webUrl; ?>สินค้า/จานดาวเทียม"><img id="slide-img-2"
                                                                                            src="<?php echo $baseUrl; ?>web/images/slide/slide_dish-aerial.png"
                                                                                            class="slide" alt=""/></a>
                                    <a href="<?php echo $webUrl; ?>สินค้า/เครื่องปรับอากาศ"><img id="slide-img-3"
                                                                                                 src="<?php echo $baseUrl; ?>web/images/slide/slide_air.png"
                                                                                                 class="slide" alt=""/></a>
                                    <a href="<?php echo $webUrl; ?>สินค้า/กล้องวงจรปิด"><img id="slide-img-4"
                                                                                             src="<?php echo $baseUrl; ?>web/images/slide/slide_cctv.png"
                                                                                             class="slide" alt=""/></a>
                                    <!--                                <a href=""><img id="slide-img-5"-->
                                    <!--                                                src="-->
                                    <?php //echo $baseUrl; ?><!--web/images/slide/nature-photo4.png"-->
                                    <!--                                                class="slide" alt=""/></a>-->
                                    <!--                                <a href=""><img id="slide-img-6"-->
                                    <!--                                                src="-->
                                    <?php //echo $baseUrl; ?><!--web/images/slide/nature-photo4.png"-->
                                    <!--                                                class="slide" alt=""/></a>-->
                                    <!--                                <a href=""><img id="slide-img-7"-->
                                    <!--                                                src="-->
                                    <?php //echo $baseUrl; ?><!--web/images/slide/nature-photo6.png"-->
                                    <!--                                                class="slide" alt=""/></a>-->

                                    <div id="slide-controls">
                                        <p id="slide-client" class="text"><strong></strong<span></span>
                                        </p>

                                        <p id="slide-desc" class="text"></p>

                                        <p id="slide-nav"></p>
                                    </div>
                                </div>

                                <!--content featured gallery here -->
                            </div>
                            <script type="text/javascript">
                                if (!window.slider) var slider = {};
                                slider.data = [
                                    {"id": "slide-img-1", "client": "ผ้าม่าน",
                                        "desc": "ผ้าม่าน, รางโชว์, มู่ลี่, ม่านปรับแสง, ม่านม้วน, ม่านพลับ, วอลเปเปอร์, ฉากกั้นห้อง," +
                                            " กั้นแอร์, พรม, กระเบื้องยาง"},
                                    {"id": "slide-img-2", "client": "จานดาวเทียม", "desc": "จำหน่ายอุปกรณ์จานดาวเทียม ในราคาปลีก และส่ง"},
                                    {"id": "slide-img-3", "client": "เครื่องปรับอากาศ", "desc": "จำหน่ายพร้อมติดตั้ง เครืองปรับอากาศ ในราคาปลีก และส่ง"},
                                    {"id": "slide-img-4", "client": "กล้องวงจรปิด", "desc": "จำหน่ายอุปกรณ์ พร้อมติดตั้งกล้องวงจรปิด ในราคาปลีก และส่ง"}
//                                {"id": "slide-img-5", "client": "nature beauty", "desc": "add your description here"},
//                                {"id": "slide-img-6", "client": "nature beauty", "desc": "add your description here"},
//                                {"id": "slide-img-7", "client": "nature beauty", "desc": "add your description here"}
                                ];
                            </script>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end slide image-->
<?php endif; ?>
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
<?php
if (empty($this->session->userdata['user_name'])) :
    ?>
    <script>
        var url_login = "<?php echo $webUrl; ?>member/login";
        function validateLogin(frm) {
            if (frm.username.value == "") {
                alert("");
                frm.username.select();
                return false;
            } else if (frm.passwd.value == "") {
                alert("");
                frm.passwd.select();
                return false;
            }
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
            return false;
        }

        $(document).ready(function () {
            $("a#register").fancybox({
                'overlayShow': true,
                'transitionIn': 'elastic',
                'transitionOut': 'elastic'
            });

            $("#remember").change(function () {
                if (this.checked) {
                    setCookieLogin();
                } else {
                    deleteCookie();
                }
            });

            checkRemember();
        });
    </script>
    <script type="text/javascript">
        var COOKIE_NAME = 'remember_me';
        //var options = { path: '/main_index.php', expires: 10 };

        function addCookies(value, vdate) {
            var date = new Date();
            // var vdate = 30;
            date.setTime(date.getTime() + (vdate * 24 * 60 * 60 * 1000));
            var expires = "; expires=" + date.toGMTString();
            document.cookie = COOKIE_NAME + "=" + value + expires + "; path=/";
        }

        function getCookie() {
            var nameEQ = COOKIE_NAME + "=";
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
            return strSave;
        }

        function deleteCookie() {
            // This function will attempt to remove a cookie from all paths.
            var pathBits = location.pathname.split('/');
            var pathCurrent = ' path=';

            // do a simple pathless delete first.
            document.cookie = COOKIE_NAME + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';

            for (var i = 0; i < pathBits.length; i++) {
                pathCurrent += ((pathCurrent.substr(-1) != '/') ? '/' : '') + pathBits[i];
                document.cookie = COOKIE_NAME + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;' + pathCurrent + ';';
            }
        }

        function checkRemember() {
            var strCookie = getCookie();
            if (strCookie == "") {
                $("#remember").attr('checked', false);
            } else {
                $("#remember").attr('checked', true);
                var arrSp = strCookie.split(";");
                var arrValue = arrSp[0].split("&");
                $("#username").val(arrValue[1]);
                $("#passwd").val(arrValue[2]);
            }
        }

        function setCookieLogin() {
            if ($("#remember").attr('checked')) {
                var userName = $("#username").val();
                var pwd = $("#passwd").val();
                var strCookie = "checked&" + userName + "&" + pwd;
                addCookies(strCookie, 30);
            }
        }
    </script>
    <div class="module-hilite1">
        <div>
            <div>
                <div>
                    <h3>เข้าสู่ระบบ</h3>

                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="login" id="form-login"
                          onsubmit="return validateLogin(this);">
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
                                <a href="#">
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
                        <p><font color="#E72222">สวัสดี</font> <?php echo $this->session->userdata['name']; ?></p>

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
<div class="module">
    <div>
        <div>
            <div>

                <!--swMenuFree6.0 transmenu by http://www.swmenupro.com-->
                <div id="sw-wrap" class="swmenu" align="left">
                    <table cellspacing="0" cellpadding="0" id="swmenu" class="swmenu">
                        <tr>
                            <td>
                                <a id="menu89" href="<?php echo $baseUrl; ?>">หน้าแรก</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a id="menu121" href="<?php echo $webUrl; ?>สินค้า/ผ้าม่าน">ผ้าม่าน</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a id="menu120" href="<?php echo $webUrl; ?>สินค้า/จานดาวเทียม">จานดาวเทียม</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a id="menu84" href="<?php echo $webUrl; ?>สินค้า/เครื่องปรับอากาศ">เครื่องปรับอากาศ</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a id="menu85" href="<?php echo $webUrl; ?>สินค้า/กล้องวงจรปิด">กล้องวงจรปิด</a>
                            </td>
                        </tr>
                        <!--                        <tr>-->
                        <!--                            <td>-->
                        <!--                                <a id="menu122" href="#">References</a>-->
                        <!--                            </td>-->
                        <!--                        </tr>-->
                        <!--                        <tr>-->
                        <!--                            <td class="last">-->
                        <!--                                <a id="menu144" href="#">Accomplishments</a>-->
                        <!--                            </td>-->
                        <!--                        </tr>-->
                    </table>
                </div>
                <div id="subwrap">
                    <script type="text/javascript">
                        <!--
                        if (TransMenu.isSupported()) {
                            var ms = new TransMenuSet(TransMenu.direction.right, 3, 0, TransMenu.reference.topRight);
                            var menu121 = ms.addMenu(document.getElementById("menu121"));
                            menu121.addItem("ผ้าม่าน 1", "#", "0");
                            menu121.addItem("ผ้าม่าน 2", "#", "0");
                            menu121.addItem("ผ้าม่าน 3", "#", "0");
                            var menu120 = ms.addMenu(document.getElementById("menu120"));
                            menu120.addItem("จานดาวเทียม 1", "#", "0");
                            menu120.addItem("จานดาวเทียม 2", "#", "0");
                            menu120.addItem("จานดาวเทียม 3", "#", "0");
                            var menu84 = ms.addMenu(document.getElementById("menu84"));
                            menu84.addItem("เครื่องปรับอากาศ 1", "#", "0");
                            menu84.addItem("เครื่องปรับอากาศ 2", "#", "0");
                            menu84.addItem("เครื่องปรับอากาศ 3", "#", "0");
                            function init() {
                                if (TransMenu.isSupported()) {
                                    TransMenu.initialize();
                                    document.getElementById("menu89").onmouseover = function () {
                                        ms.hideCurrent();
                                        this.className = "hover";
                                    }
                                    document.getElementById("menu89").onmouseout = function () {
                                        this.className = "";
                                    }
                                    menu121.onactivate = function () {
                                        document.getElementById("menu121").className = "hover";
                                    };
                                    menu121.ondeactivate = function () {
                                        document.getElementById("menu121").className = "";
                                    };
                                    menu120.onactivate = function () {
                                        document.getElementById("menu120").className = "hover";
                                    };
                                    menu120.ondeactivate = function () {
                                        document.getElementById("menu120").className = "";
                                    };
                                    menu84.onactivate = function () {
                                        document.getElementById("menu84").className = "hover";
                                    };
                                    menu84.ondeactivate = function () {
                                        document.getElementById("menu84").className = "";
                                    };
//                                    document.getElementById("menu84").onmouseover = function () {
//                                        ms.hideCurrent();
//                                        this.className = "hover";
//                                    }
//                                    document.getElementById("menu84").onmouseout = function () {
//                                        this.className = "";
//                                    }
                                    document.getElementById("menu85").onmouseover = function () {
                                        ms.hideCurrent();
                                        this.className = "hover";
                                    }
                                    document.getElementById("menu85").onmouseout = function () {
                                        this.className = "";
                                    }
//                                    document.getElementById("menu122").onmouseover = function () {
//                                        ms.hideCurrent();
//                                        this.className = "hover";
//                                    }
//                                    document.getElementById("menu122").onmouseout = function () {
//                                        this.className = "";
//                                    }
//                                    document.getElementById("menu144").onmouseover = function () {
//                                        ms.hideCurrent();
//                                        this.className = "hover";
//                                    }
//                                    document.getElementById("menu144").onmouseout = function () {
//                                        this.className = "";
//                                    }
                                }
                            }

                            TransMenu.spacerGif = "http://athlete.teamwebsitehosting.com/modules/mod_swmenufree/images/transmenu/x.gif";
                            TransMenu.dingbatOn = "http://athlete.teamwebsitehosting.com/modules/mod_swmenufree/images/transmenu/whiteleft-on.gif";
                            TransMenu.dingbatOff = "http://athlete.teamwebsitehosting.com/modules/mod_swmenufree/images/transmenu/whiteleft-off.gif";
                            TransMenu.sub_indicator = true;
                            TransMenu.menuPadding = 0;
                            TransMenu.itemPadding = 0;
                            TransMenu.shadowSize = 2;
                            TransMenu.shadowOffset = 3;
                            TransMenu.shadowColor = "#888";
                            TransMenu.shadowPng = "http://athlete.teamwebsitehosting.com/modules/mod_swmenufree/images/transmenu/grey-40.png";
                            TransMenu.backgroundColor = "#333333";
                            TransMenu.backgroundPng = "http://athlete.teamwebsitehosting.com/modules/mod_swmenufree/images/transmenu/white-90.png";
                            TransMenu.hideDelay = 600;
                            TransMenu.slideTime = 300;
                            TransMenu.selecthack = 0;
                            TransMenu.autoposition = 1;
                            TransMenu.renderAll();
                            if (typeof window.addEventListener != "undefined")
                                window.addEventListener("load", init, false);
                            else if (typeof window.attachEvent != "undefined") {
                                window.attachEvent("onload", init);
                            } else {
                                if (window.onload != null) {
                                    var oldOnload = window.onload;
                                    window.onload = function (e) {
                                        oldOnload(e);
                                        init();
                                    }
                                } else
                                    window.onload = init();
                            }
                        }
                        -->
                    </script>
                </div>
                <script type="text/javascript">
                    <!--
                    jQuery.noConflict();
                    jQuery(document).ready(function ($) {
                        $('#sw-wrap').parents().css('position', 'static');
                        $('#sw-wrap').parents().css('z-index', '100');
                        $('#sw-wrap').css('z-index', '101');
                    });
                    //-->
                </script>

                <!--End swMenuFree menu module-->
            </div>
        </div>
    </div>
</div>

<!--module facebook-->
<div class="module">
    <div class="fb-like-box" data-href="https://www.facebook.com/latenda.page" data-width="220"
         data-show-faces="true" data-colorscheme="dark" data-stream="false" data-header="true">
    </div>
</div>
<!--end module facebook-->

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
                        foreach ($linkWebsite as $key => $value) :
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
<!--end module link-->

</div>
<!--<style type="text/css" media="Screen">-->
<!--    #navigation ul {-->
<!--        list-style-type: none;-->
<!--        padding: 0;-->
<!--        margin: 0;-->
<!--        width: 140px;-->
<!--    }-->
<!--    #navigation a {-->
<!--        text-decoration: none;-->
<!--        display: block;-->
<!--        padding: 3px 12px 3px 8px;-->
<!--        background-color: #666;-->
<!--        color: #fff;-->
<!--        border: 1px solid #ddd;-->
<!--    }-->
<!--    #navigation a:active {-->
<!--        padding: 2px 13px 4px 7px;-->
<!--        background-color: #444;-->
<!--        color: #eee;-->
<!--        border: 1px solid #333;-->
<!--    }-->
<!---->
<!--    #navigation li li a {-->
<!--        text-decoration: none;-->
<!--        padding: 3px 3px 3px 17px;-->
<!--        background-color: #999;-->
<!--        color: #111111;-->
<!--    }-->
<!--    #navigation li li a:active {-->
<!--        padding: 2px 4px 4px 16px;-->
<!--        background-color: #888;-->
<!--        color: #000;-->
<!--    }-->
<!--</style>-->
<!--<script type="text/javascript">-->
<!--    var strCaseSubMenu = "00000";-->
<!--    function swapMenu(strCase){-->
<!--        if (strCase[0] == "1") {-->
<!--            idFadeIn("#sub-menu1");-->
<!--        }else {-->
<!--            idFadeOut("#sub-menu1");-->
<!--        }-->
<!--        if (strCase[1] == "1") {-->
<!--            idFadeIn("#sub-menu2");-->
<!--        }else {-->
<!--            idFadeOut("#sub-menu2");-->
<!--        }-->
<!--        if (strCase[2] == "1") {-->
<!--            idFadeIn("#sub-menu3");-->
<!--        }else {-->
<!--            idFadeOut("#sub-menu3");-->
<!--        }-->
<!--        if (strCase[3] == "1") {-->
<!--            idFadeIn("#sub-menu4");-->
<!--        }else {-->
<!--            idFadeOut("#sub-menu4");-->
<!--        }-->
<!--        if (strCase[4] == "1") {-->
<!--            idFadeIn("#sub-menu5");-->
<!--        }else {-->
<!--            idFadeOut("#sub-menu5");-->
<!--        }-->
<!--    }-->
<!---->
<!--    function idFadeIn(id) {-->
<!--        $(id).fadeIn(1000);-->
<!--    }-->
<!---->
<!--    function idFadeOut(id) {-->
<!--        $(id).fadeOut(800);-->
<!--    }-->
<!--</script>-->
<!---->
<!--<div id="navigation">-->
<!--    <ul>-->
<!--        <li>-->
<!--            <a href="#" onclick="swapMenu('10000');return false;">Click me</a>-->
<!--            <ul id="sub-menu1" style="display: none;">-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--            </ul>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#" onclick="swapMenu('01000');return false;">Click me</a>-->
<!--            <ul id="sub-menu2" style="display: none;">-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--            </ul>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#" onclick="swapMenu('00100');return false;">Click</a>-->
<!--            <ul id="sub-menu3" style="display: none;">-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--            </ul>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#" onclick="swapMenu('00010');return false;">Click</a>-->
<!--            <ul id="sub-menu4" style="display: none;">-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--            </ul>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#" onclick="swapMenu('00001');return false;">Click</a>-->
<!--            <ul id="sub-menu5" style="display: none;">-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--                <li><a href="#">A link to a page</a></li>-->
<!--            </ul>-->
<!--        </li>-->
<!--    </ul>-->
<!--</div>-->


</td>
<!--end leftcolumn-->


<td class="maincol">