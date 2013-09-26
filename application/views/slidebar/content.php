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
$sidebar = empty($sidebar) ? "" : $sidebar;
$arrSlideBar = $this->Constant_model->loadSlideBar($sidebar);

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
                if ($arrSlideBar[0] == 1)
                    $this->load->view("slidebar/member");
                if ($arrSlideBar[1] == 1)
                    $this->load->view("slidebar/menu");
                if ($arrSlideBar[2] == 1)
                    $this->load->view("slidebar/curtain");
                if ($arrSlideBar[3] == 1)
                    $this->load->view("slidebar/sat");
                if ($arrSlideBar[4] == 1)
                    $this->load->view("slidebar/facebook");
                if ($arrSlideBar[5] == 1)
                    $this->load->view("slidebar/puenchang");
                if ($arrSlideBar[6] == 1)
                    $this->load->view("slidebar/link_web");
                ?>
            </div>
        </td>
        <!--end leftcolumn-->