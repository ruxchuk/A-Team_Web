<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux-Notebook
 * Date: 21/4/2556
 * Time: 11:15 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>A-Team Curtain</title>
    <link href="<?php echo $baseUrl; ?>web/css/login.css" rel="stylesheet" type="text/css"/>

</head>

<body id="login">

<div id="login-wrapper" class="png_bg">
    <div id="login-top">
        <a href="<?php echo $baseUrl; ?>">
        <img src="<?php echo $baseUrl; ?>web/images/web-logo2.png" title="A-Team Curtain"/>
        </a>
    </div>

    <div id="login-content">
        <?php
        if ($message == "login fail") :
        ?>
        <div class="error" id="error">
            ชื่อผู้ใช้หรือ รหัสผ่านผิด
        </div>
        <?php
        endif;
        ?>
        <form method="post">
            <p>
                <label>ชื่อผู้ใช้</label>
                <input value="dfd" name="user_name" class="text-input" type="text"
                    onkeydown="document.getElementById('error').style.display = 'none';"/>
            </p>
            <br style="clear: both;"/>

            <p>
                <label>รหัสผ่าน</label>
                <input name="password" class="text-input" type="password"
                       onkeydown="document.getElementById('error').style.display = 'none';"/>
            </p>
            <br style="clear: both;"/>

            <p>
                <input class="button" type="submit" value="เข้าระบบ"/>
            </p>

        </form>
    </div>
</div>
<div id="dummy"></div>
<div id="dummy2"></div>
</form>

</body>
</html>