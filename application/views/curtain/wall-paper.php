<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 19/6/2556
 * Time: 12:48 น.
 * To change this template use File | Settings | File Templates.
 */

$this->load->view('header');
//$this->load->view("slide-index");
$this->load->view("sidebar");

$baseUrl = base_url();
$webUrl = $this->Constant_model->webUrl();
$pathImage = $baseUrl . "web/images/";
$pathImageProduct = $baseUrl . "web/images/uploads/products/";
?>

<?php $getHot = $this->uri->segment(1); ?>

    <td class="maincol">
        <div style="margin-left: 15px;">
            <br>
            <div style="background: url('<?php echo $pathImage; ?>bg-slide-curtain-fabric.png') no-repeat;
                background-size: 100%;width: 735px; height: 260px;">

                <!-- Start WOWSlider.com BODY section -->
                <link rel="stylesheet" href="<?php echo $baseUrl; ?>web/plugin/numeric-basic-effect-slider/css/style.css"
                      type="text/css" media="screen">
                <script type="text/javascript" src="<?php echo $baseUrl; ?>web/js/jquery-1.4.4.min.js"></script>
                <div id="wowslider-container1">
                    <div class="ws_images"><ul>
                            <li><img src="http://www.themepunch.com/item_pics/paradigm.jpg" alt="amazing sunset : HTML5 Image Gallery" title="amazing sunset" id="wows1_0"/></li>
                            <li><img src="http://www.themepunch.com/item_pics/paradigm.jpg" alt="apple tree : HTML5 Image Slider" title="apple tree" id="wows1_1"/></li>
                            <li><img src="http://www.themepunch.com/item_pics/paradigm.jpg" alt="beutiful landscape : HTML5 Image Slideshow" title="beautiful landscape" id="wows1_2"/></li>
                            <li><img src="http://www.themepunch.com/item_pics/paradigm.jpg" alt="birch : HTML5 Image Banner" title="birch" id="wows1_3"/></li>
                            <li><img src="http://www.themepunch.com/item_pics/paradigm.jpg" alt="nature : HTML5 Picture Gallery" title="nature" id="wows1_4"/></li>
                            <li><img src="http://wowslider.com/images/demo/numeric-basic/data1/images/camomiles.jpg" alt="camomiles : HTML5 Photo Gallery" title="camomiles" id="wows1_5"/></li>
                            <li><img src="http://wowslider.com/images/demo/numeric-basic/data1/images/sunset.jpg" alt="sunset : HTML 5 Image Gallery" title="sunset" id="wows1_6"/></li>
                            <li><img src="http://wowslider.com/images/demo/numeric-basic/data1/images/cherry.jpg" alt="cherry : HTML5 Gallery" title="cherry" id="wows1_7"/></li>
                            <li><img src="http://wowslider.com/images/demo/numeric-basic/data1/images/spoondrift.jpg" alt="spoondrift : CSS3 Image Gallery" title="spoondrift" id="wows1_8"/></li>
                            <li><img src="http://wowslider.com/images/demo/numeric-basic/data1/images/in_the_forest.jpg" alt="in the forest : HTML5 Image Gallery" title="in the forest" id="wows1_9"/></li>
                            <li><img src="http://wowslider.com/images/demo/numeric-basic/data1/images/stream.jpg" alt="stream : HTML5 Image Rotator" title="stream" id="wows1_10"/></li>
                            <li><img src="http://wowslider.com/images/demo/numeric-basic/data1/images/sun_and_sea.jpg" alt="sun and sea : HTML5 Image Gallery Template" title="sun and sea" id="wows1_11"/></li>
                            <li><img src="http://wowslider.com/images/demo/numeric-basic/data1/images/strobiles_on_spruce.jpg" alt="strobiles on a spruce : Image Gallery with HTML5 " title="strobiles on a spruce" id="wows1_12"/></li>
                            <li><img src="http://wowslider.com/images/demo/numeric-basic/data1/images/sunset_on_the_river.jpg" alt="sunset on the river : Free Image Gallery HTML5" title="sunset on the river" id="wows1_13"/></li>
                        </ul></div>
                    <div class="ws_bullets"><div>
                            <a href="#" title="amazing sunset"><img src="http://wowslider.com/images/demo/numeric-basic/data1/images/sunset_on_the_river.jpg" alt="amazing sunset"/>1</a>
                            <a href="#" title="apple tree"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="apple tree"/>2</a>
                            <a href="#" title="beautiful landscape"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="beautiful landscape"/>3</a>
                            <a href="#" title="birch"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="birch"/>4</a>
                            <a href="#" title="nature"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="nature"/>5</a>
                            <a href="#" title="camomiles"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="camomiles"/>6</a>
                            <a href="#" title="sunset"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="sunset"/>7</a>
                            <a href="#" title="cherry"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="cherry"/>8</a>
                            <a href="#" title="spoondrift"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="spoondrift"/>9</a>
                            <a href="#" title="in the forest"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="in the forest"/>10</a>
                            <a href="#" title="stream"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="stream"/>11</a>
                            <a href="#" title="sun and sea"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="sun and sea"/>12</a>
                            <a href="#" title="strobiles on a spruce"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="strobiles on a spruce"/>13</a>
                            <a href="#" title="sunset on the river"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="sunset on the river"/>14</a>
                        </div></div>
                    <!-- Generated by WOWSlider.com v2.2 -->
                    <div class="ws_shadow"></div>
                </div>
                <script type="text/javascript" src="<?php echo $baseUrl; ?>web/plugin/wowslider.js"></script>
                <script type="text/javascript" src="<?php echo $baseUrl; ?>web/plugin/numeric-basic-effect-slider/js/script.js"></script>
                <!-- End WOWSlider.com BODY section -->
            </div>
            <div style="width: 735px;">
                <table style="width:100%;">
                    <tr>
                        <td style="width: 49%">
                            <img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg"
                                 style="width: 100%;"/>
                        </td><td style="width: 2%">&nbsp;</td>
                        <td style="width: 49%">
                            <img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg"
                                 style="width: 100%;"/>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </td>
<?php
$this->load->view('footer');
?>