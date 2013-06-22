<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 2/5/2556
 * Time: 15:58 น.
 * To change this template use File | Settings | File Templates.
 */


$this->load->view('header');
$this->load->view("slide-index");
$this->load->view("sidebar");

$baseUrl = base_url();
$webUrl = $this->Constant_model->webUrl();
$pathIconNew = $baseUrl . "web/images/icon_new.gif";
$pathSellers = $baseUrl . "web/images/icon_hot.gif";
$pathRecommend = $baseUrl . "web/images/icon_recommence.gif";
$pathPromotion = $baseUrl . "web/images/icon_promotion.gif";
$pathImage = $baseUrl . "web/images/";

$pathImageProduct = $baseUrl . "web/images/uploads/products/";
?>


<?php $getHot = $this->uri->segment(1); ?>


<td class="maincol">

    <div style="margin-left: 15px;">
        <br>
        <div>
            <a href="<?php echo $webUrl; ?>ผ้าม่าน">
            <img src="<?php echo $pathImage; ?>logo-curtain.png"
                width="735" height="150"/>
            </a>
        </div>
        <br>
        <div>
            <a href="<?php echo $webUrl; ?>จากดาวเทียม">
            <img src="<?php echo $pathImage; ?>logo-cctv.png"
                width="735" height="150"/>
            </a>
        </div>
    </div>

</td>
<?php
$this->load->view('footer');
?>