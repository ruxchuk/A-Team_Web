<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 29/5/2556
 * Time: 13:02 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();
$webUrl = $this->Constant_model->webUrl();
?>
<div id=":4d" style="overflow: hidden;">
    <p style="margin:1em 0">
        <b>ยินดีต้อนรับสู่ www.latendahouse.com!</b><br>
        คุณสามารถเข้าสู่ระบบบัญชีของคุณได้โดย
        <a href="<?php echo $webUrl; ?>สมาชิก" target="_blank">คลิก</a>
    </p>
    <p style="margin:1em 0">
        <a href="<?php echo $webUrl; ?>" target="_blank">
            <img src="<?php echo $baseUrl; ?>web/images/logo.png" width="160" height="100"/>
        </a>
    </p>
    <hr>
    <strong style="font-size: 22px;color: #E72222;">บริษัท เอ-ทีม เคอร์เทน จำกัด</strong>
    <p style="font-size: 18px;color:#39C75E;">A-Team Curtain Co., Ltd.</p>
    <a href="<?php echo $webUrl; ?>">www.latendahouse.com</a>
</div>