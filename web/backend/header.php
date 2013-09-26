<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 15/5/2556
 * Time: 17:18 น.
 * To change this template use File | Settings | File Templates.
 */

session_start();
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//$webUrl = @$_SESSION['webUrl'];
$userID = @$_SESSION['userdata']['id'];

//$file = basename($actual_link);
if ($actual_link == "curtain.php" || strpos($actual_link, 'product.php')) {
    $table = "product";
} else if (strpos($actual_link, 'link-website.php')) {
    $table = "link_website";
} else if (strpos($actual_link, 'member.php')) {
    $table = "member";
} else {
    $table = "";
}
$webUrl = "http://latendahouse.com/";
//$webUrl = "http://localhost:11001/ateam/web/a-team_web/index.php/";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv='content-type' content='text/html; charset=UTF-8'/>
    <script type="text/javascript" src="http://latendahouse.com/web/js/jquery-1.9.1.js"></script>
    <script>
        var webUrl = "<?php echo @$_SESSION['webUrl']; ?>";
        var webLogsUrl = "<?php echo @$_SESSION['webUrl']; ?>auth/stampLogs";
        var userName = "<?php echo @$_SESSION['userdata']['name']; ?>";
        var table = "<?php echo $table; ?>";
        var userID = "<?php echo $userID; ?>";
        $(document).ready(function () {
            $('.img-delete').click(function () {
                //f_verifyDelete(this.id, '&f_page_size=50&f_p=1');
                var id = this.alt;
                if (confirm("คุณต้องการลบข้อมูล ID: " + id + " ใช่หรือไม่?")) {
                    $.post(webLogsUrl, {
                            table: table,
                            id: id,
                            detail: "set_publish=1;user_name=" + userName + ";"+
                                "user_id=" + userID
                        },
                        function(result){
                            f__doPostBack("toggle_status",  id,
                                "&f_page_size=50&f_p=1&f_toggle_status=1&f_toggle_field=publish&f_toggle_field_value=0");
                        }
                    );
                } else {
                    _dgStopPropagation(event);
                }
                return false;
            });
            <?php if (strpos($actual_link, 'member.php') == false):?>
            $('a').each(function(){
                if (this.title == 'Update record') {
                    $(this).attr('id', 'button-edit');
                }
            });
            $('#button-edit').click(function(){
                $.post(webLogsUrl, {
                        table: table,
                        id: '<?php echo @$_GET['f_rid']; ?>',
                        detail: "edit_data;user_name=" + userName + ";" +
                            "user_id=" + userID
                    },
                    function(result){
                        f_sendEditFields();
                    }
                );
                return false;
            });
            <?php endif; ?>
        });
    </script>
</head>
<p>
    <a href="<?php echo $webUrl; ?>" title="หน้าแรก">
        <img src="http://latendahouse.com/web/images/shot_cut_icon.png"/>
    </a>
</p>
<?php
if (!empty($_SESSION['userdata'])) :
    if ($_SESSION['userdata']['member_type'] == "admin"):
        echo "สวัสดี : " . $_SESSION['userdata']['name'];
        ?>
        &nbsp;&nbsp;&nbsp;<a class="link-menu" href="<?php echo $webUrl; ?>auth/signOut">ออกจากระบบ</a>
    <?php else:
        header("Location: $webUrl". "รายการ");
    endif;
else:
    header("Location: $webUrl". "รายการ");
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
?>
<div class="menu" valign="center">
    <a class="<?php echo strpos($actual_link, 'curtain.php') ? 'menu-active': 'link-menu'; ?>" href="curtain.php">ผ้าม่าน</a> |
    <a class="<?php echo strpos($actual_link, 'product.php') ? 'menu-active': 'link-menu'; ?>" href="product.php">รายการสินค้า</a> |
    <a class="<?php echo strpos($actual_link, 'link-website.php') ? 'menu-active': 'link-menu'; ?>" href="link-website.php">Link Website</a> |
    <?php if ($_SESSION['userdata']['member_type'] == "admin"):?>
    <a class="<?php echo strpos($actual_link, 'member.php') ? 'menu-active': 'link-menu'; ?>" href="member.php">รายชื่อสมาชิก</a>
    <?php endif; ?>
</div>