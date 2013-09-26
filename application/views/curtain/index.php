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
$pathImageProduct = $baseUrl . "web/images/uploads/curtain/";

$arrCurtain = $this->Curtain_model->getListSlideCurtain();

$getHot = $this->uri->segment(1);

?>


    <td class="maincol">
        <div>
            <p>
                &nbsp;&nbsp;&nbsp;<a class="link-page" href="<?php echo $baseUrl; ?>">หน้าแรก</a> /
                <span class="active-page">ผ้าม่าน</span>
            </p>
        </div>

        <div style="margin-left: 15px;">
            <br>

            <div style="background: url('<?php echo $pathImage; ?>blog-slide-curtain.png') no-repeat;
                background-size: 100%;width: 735px; height: 375px;">

                <link rel="stylesheet" href="<?php echo $baseUrl; ?>web/plugin/html-slider-calm-kenburns/css/style.css"
                      type="text/css" media="screen">
                <script type="text/javascript" src="<?php echo $baseUrl; ?>web/js/jquery-1.4.4.min.js"></script>
                <div id="wowslider-container1">
                    <div class="ws_images">
                        <ul>
                            <?php foreach ($arrCurtain as $key => $value) : ?>
                                <li>
                                    <img width="600" height="250"
                                         src="<?php echo $pathImageProduct . $value->image_path; ?>"
                                         alt="<?php ?>"
                                         title="<?php echo $value->name_th; ?>"
                                         id="wows1_<?php echo $key; ?>"/>
                                </li>
                                <!--                            <li><img src="http://www.themepunch.com/item_pics/paradigm.jpg" alt="Drops : html image slider" title="Drops" id="wows1_1"/>Raindrops on the leaf</li>-->
                                <!--                            <li><img src="http://www.themepunch.com/item_pics/paradigm.jpg" alt="Purple flower : html slider jquery" title="Purple flower" id="wows1_2"/></li>-->
                                <!--                            <li><img src="http://www.themepunch.com/item_pics/paradigm.jpg" alt="Forest green : responsive html slider" title="Forest green" id="wows1_3"/></li>-->
                                <!--                            <li><img src="http://www.themepunch.com/item_pics/paradigm.jpg" alt="Leaf : html javascript image slider" title="Leaf" id="wows1_4"/>Autumn leaf on the water</li>-->
                                <!--                            <li><img src="http://www.themepunch.com/item_pics/paradigm.jpg" alt="Physalis : html website slider" title="Physalis" id="wows1_5"/>Bright flowers</li>-->
                                <!--                            <li><img src="http://www.themepunch.com/item_pics/paradigm.jpg" alt="Thistle : html thumbnail slider" title="Thistle" id="wows1_6"/></li>-->
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="ws_thumbs">
                        <div>
                            <?php foreach ($arrCurtain as $key => $value) : ?>
                                <a href="#" title="<?php echo $value->name_th; ?>">
                                    <img width="120" height="90"
                                         src="<?php echo $pathImageProduct . $value->image_path; ?>"
                                        alt=""/>
                                </a>
                            <?php endforeach; ?>
<!--                            <a href="#" title="Drops"><img-->
<!--                                    src="http://wowslider.com/images/demo/calm-kenburns/data1/tooltips/drops.jpg"-->
<!--                                    alt=""/></a>-->
<!--                            <a href="#" title="Purple flower"><img-->
<!--                                    src="http://wowslider.com/images/demo/calm-kenburns/data1/tooltips/drops.jpg"-->
<!--                                    alt=""/></a>-->
<!--                            <a href="#" title="Forest green"><img-->
<!--                                    src="http://wowslider.com/images/demo/calm-kenburns/data1/tooltips/drops.jpg"-->
<!--                                    alt=""/></a>-->
<!--                            <a href="#" title="Leaf"><img-->
<!--                                    src="http://wowslider.com/images/demo/calm-kenburns/data1/tooltips/drops.jpg"-->
<!--                                    alt=""/></a>-->
<!--                            <a href="#" title="Physalis"><img-->
<!--                                    src="http://wowslider.com/images/demo/calm-kenburns/data1/tooltips/drops.jpg"-->
<!--                                    alt=""/></a>-->
<!--                            <a href="#" title="Thistle"><img-->
<!--                                    src="http://wowslider.com/images/demo/calm-kenburns/data1/tooltips/drops.jpg"-->
<!--                                    alt=""/></a>-->
                        </div>
                    </div>
                    <!-- Generated by WOWSlider.com v2.8 -->
                    <div class="ws_shadow"></div>
                </div>
                <script type="text/javascript" src="<?php echo $baseUrl; ?>web/plugin/wowslider.js"></script>
                <script type="text/javascript"
                        src="<?php echo $baseUrl; ?>web/plugin/html-slider-calm-kenburns/js/script.js"></script>

            </div>
            <br>

            <div>
                <a class="img-opacity" href="<?php echo $webUrl; ?>ผ้าม่าน/Curtain&Fabric">
                    <img src="<?php echo $pathImage; ?>logo-curtain-fabric.png"
                         width="735" height="80"/>
                </a>
            </div>
            <br>

            <div>
                <a class="img-opacity" href="<?php echo $webUrl; ?>ผ้าม่าน/WallPaper">
                    <img src="<?php echo $pathImage; ?>logo-wall-paper.png"
                         width="735" height="80"/>
                </a>
            </div>
            <br>

            <div>
                <a class="img-opacity" href="<?php echo $webUrl; ?>ผ้าม่าน/RollerBlind">
                    <img src="<?php echo $pathImage; ?>logo-roller-blind.png"
                         width="735" height="80"/>
                </a>
            </div>
            <br>

            <div>
                <a class="img-opacity" href="<?php echo $webUrl; ?>ผ้าม่าน/VenetianBlind">
                    <img src="<?php echo $pathImage; ?>logo-venetain-blind.png"
                         width="735" height="80"/>
                </a>
            </div>
            <br>

            <div>
                <a class="img-opacity" href="<?php echo $webUrl; ?>ผ้าม่าน/FurnitureBuiltIn">
                    <img src="<?php echo $pathImage; ?>logo-furniture-built-in.png"
                         width="735" height="80"/>
                </a>
            </div>
        </div>
    </td>
<?php
$this->load->view('footer');
?>