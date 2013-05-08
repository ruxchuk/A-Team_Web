<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 8/5/2556
 * Time: 17:19 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv='content-type' content='text/html; charset=UTF-8'/>
</head>
<p>
<a href="<?php echo $baseUrl; ?>">หน้าแรก</a></p>
<?php
if($this->session->userdata('id')) :
    echo "สวัสดี : ".$this->session->userdata('name');
    ?>
    &nbsp;&nbsp;&nbsp;<a href="<?php echo $baseUrl; ?>auth/signOut">ออกจากระบบ</a>
    <?php
else:
    redirect(base_url().'auth/signIn');
endif;
?>