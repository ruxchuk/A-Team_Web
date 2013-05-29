<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 15/5/2556
 * Time: 17:18 น.
 * To change this template use File | Settings | File Templates.
 */

session_start();
$baseUrl = $actual_link = "http://$_SERVER[HTTP_HOST]/";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv='content-type' content='text/html; charset=UTF-8'/>
    <script type="text/javascript" src="http://latendahouse.com/web/js/jquery-1.9.1.js"></script>
</head>
<p>
    <a href="<?php echo $baseUrl; ?>" title="หน้าแรก">
        <img src="http://latendahouse.com/web/images/shot_cut_icon.png"/></a></p>
<?php
if (!empty($_SESSION['userdata'])) :
    if ($_SESSION['userdata']['member_type'] == "admin"):
        echo "สวัสดี : " . $_SESSION['userdata']['name'];
        ?>
        &nbsp;&nbsp;&nbsp;<a href="<?php echo $baseUrl; ?>auth/signOut">ออกจากระบบ</a>
    <?php else:
        header("Location: $baseUrl" . 'auth/signIn');
    endif; else:
    header("Location: $baseUrl" . 'auth/signIn');
endif;
?>
<br>
<br>
<a href="product.php">รายการสินค้า</a> |
<a href="link-website.php">Link Website</a> |
<a href="member.php">รายชื่อสมาชิก</a>