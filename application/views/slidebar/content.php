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
$pathIconNew = $baseUrl . "web/images/icon_new.gif";
$pathSellers = $baseUrl . "web/images/icon_hot.gif";
$pathRecommend = $baseUrl . "web/images/icon_recommence.gif";
$pathPromotion = $baseUrl . "web/images/icon_promotion.gif";
?>


<table class="mainbody" border="0" cellspacing="0" cellpadding="0">
    <tr valign="top">
        <!--begin leftcolumn-->
        <td class="leftcol">
            <div class="padding">
                <?php
                $this->load->view("slidebar/member");
                $this->load->view("slidebar/menu");
                $this->load->view("slidebar/facebook");
                $this->load->view("slidebar/puenchang");
                $this->load->view("slidebar/link_web");
                ?>
            </div>
        </td>
        <!--end leftcolumn-->