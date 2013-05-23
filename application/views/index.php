<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 2/5/2556
 * Time: 15:58 น.
 * To change this template use File | Settings | File Templates.
 */


$this->load->view('header');
$baseUrl = base_url();
$pathIconNew = $baseUrl . "web/images/icon_new3.gif";
$pathImage = $baseUrl . "web/images/";

$pathImageProduct = $baseUrl . "web/images/uploads/products/";
?>
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>web/css/block-menu/style.css" type="text/css"/>
    <img src="<?php echo $pathImage; ?>icon_promotion.png" width="765"/>
    <div style="margin-left: 45px;">
        <div class="content_section">

            <!--        <h2>Our Products</h2>-->
            <!--            <div class="cleaner"></div>-->
            <?php
            foreach ($arrProduct as $key => $value):
                if ($key % 3 == 0):
                    ?>
                    <div class="cleaner"></div>
                <?php
                endif;
                $urlTarget = $webUrl. "สินค้า/".$value->product_type_name ."/".$value->id;
                ?>
                <div class="product_box margin_r35">
                    <a target="_blank"
                       href="<?php echo $urlTarget; ?>"
                       title="<?php echo $value->name_th; ?>">
                        <h3><?php echo $value->name_th; ?></h3>

                        <div class="image_wrapper">
                            <img class="icon-new" src="<?php echo $pathIconNew; ?>">
                            <img src="<?php echo $pathImageProduct . $value->image_path; ?>"
                                 alt="<?php echo $value->name_th; ?>" class="block-menu-img"/>
                        </div>
                    </a>

                    <p>
                        <?php if ($value->price1 - $value->price2 > 0): ?>
                            <span class="price1">ราคาปกติ: <strike><?php echo number_format($value->price1, 2); ?></strike> บาท</span><br>
                        <?php else: ?>
                            <br>
                        <?php endif; ?>
                        <span class="price2">ราคาขาย: <?php echo number_format($value->price2, 2); ?> บาท</span><br>
                        <?php if ($value->price1 - $value->price2 > 0): ?>
                            <span class="price3">ประหยัด: <?php echo number_format($value->price1 - $value->price2, 2); ?> บาท</span><br>
                        <?php else: ?>
                            <br>
                        <?php endif; ?>
                        <br>
                        <a target="_blank"
                           href="<?php echo $urlTarget; ?>">รายละเอียด</a><!-- | <a href="#">ซื้อเลย</a>-->
                </div>
            <?php
            endforeach;
            ?>

            <div class="cleaner"></div>

            <!--        <div class="button_01"><a href="#">View All</a></div>-->

        </div>
    </div>
<?php
$this->load->view('footer');
?>