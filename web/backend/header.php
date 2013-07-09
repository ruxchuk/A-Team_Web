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
    <script>
        $(document).ready(function () {
            $('.img-delete').click(function () {
                //f_verifyDelete(this.id, '&f_page_size=50&f_p=1');
                if (confirm("คุณต้องการลบข้อมูล ID: " + this.alt + " ใช่หรือไม่?")) {
                    f__doPostBack("toggle_status",  this.alt,
                        "&f_page_size=50&f_p=1&f_toggle_status=1&f_toggle_field=publish&f_toggle_field_value=0");
                } else {
                    _dgStopPropagation(event);
                }
                return false;
            });
        });
    </script>
</head>
<p>
    <a href="<?php echo $baseUrl; ?>" title="หน้าแรก">
        <img src="http://latendahouse.com/web/images/shot_cut_icon.png"/></a></p>
<?php
if (!empty($_SESSION['userdata'])) :
    if ($_SESSION['userdata']['member_type'] == "admin"):
        echo "สวัสดี : " . $_SESSION['userdata']['name'];
        ?>
        &nbsp;&nbsp;&nbsp;<a class="link-menu" href="<?php echo $baseUrl; ?>auth/signOut">ออกจากระบบ</a>
    <?php else:
        header("Location: $baseUrl" . 'auth/signIn');
    endif; else:
    header("Location: $baseUrl" . 'auth/signIn');
endif;
?>
<br>
<br>
<style>
    .link-menu {
        color: blue;
    }
    .link-menu:link, .menu-active:link{
        text-decoration: none;
    }
    .link-menu:hover {
        color: red;
    }
    .menu-active {
        color: red;
    }
</style>
<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<div class="menu" valign="center">
    <a class="<?php echo strpos($actual_link, 'curtain.php') ? 'menu-active': 'link-menu'; ?>" href="curtain.php">ผ้าม่าน</a> |
    <a class="<?php echo strpos($actual_link, 'product.php') ? 'menu-active': 'link-menu'; ?>" href="product.php">รายการสินค้า</a> |
    <a class="<?php echo strpos($actual_link, 'link-website.php') ? 'menu-active': 'link-menu'; ?>" href="link-website.php">Link Website</a> |
    <?php if ($_SESSION['userdata']['member_type'] == "admin"):?>
    <a class="<?php echo strpos($actual_link, 'member.php') ? 'menu-active': 'link-menu'; ?>" href="member.php">รายชื่อสมาชิก</a>
    <?php endif; ?>
</div>