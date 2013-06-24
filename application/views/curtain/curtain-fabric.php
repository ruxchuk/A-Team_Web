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

                <!-- Elastislide Carousel -->
                <link rel="stylesheet" href="<?php echo $baseUrl; ?>web/plugin/elasti-slide/css/elastislide.css"
                      type="text/css" media="screen"/>
                <script src="<?php echo $baseUrl; ?>web/plugin/elasti-slide/js/modernizr.custom.17475.js"></script>
                <ul id="carousel" class="elastislide-list">
                    <li><a href="#"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="image01" /></a></li>
                    <li><a href="#"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="image02" /></a></li>
                    <li><a href="#"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="image03" /></a></li>
                    <li><a href="#"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="image04" /></a></li>
                    <li><a href="#"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="image05" /></a></li>
                    <li><a href="#"><img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg" alt="image06" /></a></li>

                </ul>
                <script type="text/javascript" src="<?php echo $baseUrl; ?>web/plugin/elasti-slide/js/jquery.min.js"></script>
                <script type="text/javascript" src="<?php echo $baseUrl; ?>web/plugin/elasti-slide/js/jquery.elastislide.js"></script>

                <script type="text/javascript">
                    jQuery.noConflict()('#carousel').elastislide();
                </script>
                <!-- End Elastislide Carousel -->
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