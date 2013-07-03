<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 26/6/2556
 * Time: 18:16 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
$pathImage = $baseUrl . "web/images/";
$pathImageProduct = $baseUrl . "web/images/uploads/products/";
$arrSlide = $this->Product_model->getListSlideProduct();
?>
<script src="<?php echo $baseUrl; ?>web/plugin/jsor-jcarousel/js/jquery.jcarousel.min.js"></script>
<link rel="stylesheet" href="<?php echo $baseUrl; ?>web/plugin/jsor-jcarousel/css/skin.css"
      type="text/css" media="screen"/>
<script type="text/javascript">

    function mycarousel_initCallback(carousel) {
        // Disable autoscrolling if the user clicks the prev or next button.
        carousel.buttonNext.bind('click', function () {
            carousel.startAuto(0);
        });

        carousel.buttonPrev.bind('click', function () {
            carousel.startAuto(0);
        });

        // Pause autoscrolling if the user moves with the cursor over the clip.
        carousel.clip.hover(function () {
            carousel.stopAuto();
        }, function () {
            carousel.startAuto();
        });
    }
    ;

    //    jQuery(document).ready(function() {
    //        jQuery('#mycarousel').jcarousel({
    //            auto: 2,
    //            wrap: 'last',
    //            scroll: 5,
    //            initCallback: mycarousel_initCallback
    //        });
    //    });
    jQuery.noConflict()(document).ready(function () {
        jQuery('#mycarousel').jcarousel({
            auto: 6,
            wrap: 'last',
            scroll: 5
        });
    });
</script>
<ul id="mycarousel" class="jcarousel-skin-tango">
    <?php foreach ($arrSlide as $key => $value) :?>
    <li>
        <a target="_blank" href="<?php echo $webUrl; ?>สินค้า/<?php echo $value->product_type_name . "/$value->id"; ?>"
           class="link-product img-opacity">
            <p class="product-head"><?php echo $value->name_th; ?></p>
            <img class="img-slide-product" src="<?php echo $pathImageProduct . $value->image_path; ?>"
                 width="75" height="75" alt=""/>
            <p class="slide-price"><?php echo number_format($value->price2, 2)?></p>
        </a>
    </li>
    <?php endforeach; ?>
</ul>