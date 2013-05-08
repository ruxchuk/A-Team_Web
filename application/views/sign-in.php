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
<!--        <div class="error">-->
<!--            Invalid Username-->
<!--        </div>-->
        <form method="post">
            <p>
                <label>Username</label>
                <input value="dfd" name="user_name" class="text-input" type="text"/>
            </p>
            <br style="clear: both;"/>

            <p>
                <label>Password</label>
                <input name="password" class="text-input" type="password"/>
            </p>
            <br style="clear: both;"/>

            <p>
                <input class="button" type="submit" value="Sign In"/>
            </p>

        </form>
    </div>
</div>
<div id="dummy"></div>
<div id="dummy2"></div>
</form>

</body>
</html>