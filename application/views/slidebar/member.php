<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 26/9/2556
 * Time: 15:31 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();
$webUrl = $this->Constant_model->webUrl();

?>
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
<!--    <div class="module-hilite1">-->
    <div class="module">
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
    <div class="module">
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
<div class="cleaner">&nbsp;</div>