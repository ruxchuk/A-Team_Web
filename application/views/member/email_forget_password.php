<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 29/5/2556
 * Time: 13:01 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();
$webUrl = $this->Constant_model->webUrl();
?>
<div id=":4d" style="overflow: hidden;"><p style="margin:1em 0">
    <p>
        Email ของคุณคือ <?php echo $email; ?></p>
    <p>
        คุณสามารถเปลี่ยน Password ได้โดย <a href="<?php echo $webUrl; ?>เปลี่ยนรหัสผ่าน?token=<?php echo $token; ?>" target="_blank">คลิก</a>
    </p>
    <hr>
    <strong style="font-size: 22px;color: #E72222;">บริษัท เอ-ทีม เคอร์เทน จำกัด</strong>
    <p style="font-size: 18px;color:#39C75E;">A-Team Curtain Co., Ltd.</p>
    <a href="<?php echo $webUrl; ?>">www.latendahouse.com</a>

</div>