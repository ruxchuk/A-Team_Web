<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 26/6/2556
 * Time: 18:16 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
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
    jQuery(document).ready(function () {
        jQuery('#mycarousel').jcarousel({
            auto: 6,
            wrap: 'last',
            scroll: 5
        });
    });
</script>
<ul id="mycarousel" class="jcarousel-skin-tango">
    <li> <a href="#" class="link-product img-opacity">
            <p class="product-head">Test Header</p>
            <img class="img-slide-product" src="http://static.flickr.com/66/199481236_dc98b5abb3_s.jpg"
                 width="75" height="75" alt=""/>

            <p class="slide-price">999</p></a>
    </li>
    <li> <a href="#" class="link-product img-opacity">
            <p class="product-head">Test Header</p>
            <img class="img-slide-product" src="http://static.flickr.com/75/199481072_b4a0d09597_s.jpg"
                 width="75" height="75" alt=""/>

            <p class="slide-price">999</p></a>
    </li>
    <li> <a href="#" class="link-product img-opacity">
            <p class="product-head">Test Header</p>
            <img class="img-slide-product" src="http://static.flickr.com/57/199481087_33ae73a8de_s.jpg"
                 width="75" height="75" alt=""/>

            <p class="slide-price">999</p></a>
    </li>
    <li> <a href="#" class="link-product img-opacity">
            <p class="product-head">Test Header</p>
            <img class="img-slide-product" src="http://static.flickr.com/77/199481108_4359e6b971_s.jpg"
                 width="75" height="75" alt=""/>

            <p class="slide-price">999</p></a>
    </li>
    <li> <a href="#" class="link-product img-opacity">
            <p class="product-head">Test Header</p>
            <img class="img-slide-product" src="http://static.flickr.com/58/199481143_3c148d9dd3_s.jpg"
                 width="75" height="75" alt=""/>

            <p class="slide-price">999</p></a>
    </li>
    <li> <a href="#" class="link-product img-opacity">
            <p class="product-head">Test Header</p>
            <img class="img-slide-product" src="http://static.flickr.com/72/199481203_ad4cdcf109_s.jpg"
                 width="75" height="75" alt=""/>

            <p class="slide-price">999</p></a>
    </li>
    <li> <a href="#" class="link-product img-opacity">
            <p class="product-head">Test Header</p>
            <img class="img-slide-product" src="http://static.flickr.com/58/199481218_264ce20da0_s.jpg"
                 width="75" height="75" alt=""/>

            <p class="slide-price">999</p></a>
    </li>
    <li> <a href="#" class="link-product img-opacity">
            <p class="product-head">Testasdf asdfd Header asdfsd</p>
            <img class="img-slide-product" src="http://static.flickr.com/69/199481255_fdfe885f87_s.jpg"
                 width="75" height="75" alt=""/>

            <p class="slide-price">999</p></a>
    </li>
    <li> <a href="#" class="link-product img-opacity">
            <p class="product-head">Test Header</p>
            <img class="img-slide-product" src="http://static.flickr.com/60/199480111_87d4cb3e38_s.jpg"
                 width="75" height="75" alt=""/>

            <p class="slide-price">999</p>
        </a>
    </li>
    <li> <a href="#" class="link-product img-opacity">
            <p class="product-head">Test Header</p>
            <img class="img-slide-product" src="http://static.flickr.com/70/229228324_08223b70fa_s.jpg"
                 width="75" height="75" alt=""/>

            <p class="slide-price">999</p></a>
    </li>
</ul>