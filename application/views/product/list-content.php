<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 27/6/2556
 * Time: 12:43 น.
 * To change this template use File | Settings | File Templates.
 */
$this->load->view('header');
$this->load->view("slidebar/content");
$baseUrl = base_url();
$pathIconNew = $baseUrl . "web/images/icon_new.gif";
$pathSellers = $baseUrl . "web/images/icon_hot.gif";
$pathRecommend = $baseUrl . "web/images/icon_recommence.gif";
$pathPromotion = $baseUrl . "web/images/icon_promotion.gif";
$pathImage = $baseUrl . "web/images/";
$pathImageProduct = $baseUrl . "web/images/uploads/products/";
?>
    <td class="maincol">
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>web/css/block-menu/style.css" type="text/css"/>
        <script>
            jQuery.noConflict()(document).ready(function () {
                $(".add-cart").fancybox({//, a#forget-password
                    'overlayShow': true,
                    'transitionIn': 'elastic',
                    'transitionOut': 'elastic'
                });
            });
        </script>
        <?php
        $getMenu1 = $this->uri->segment(1);
        $getMenu2 = $this->uri->segment(2);
        ?>
        <div>
            <p>
                &nbsp;&nbsp;&nbsp;
                <a class="link-page" href="<?php echo $webUrl; ?>">หน้าแรก</a> /
                <a class="link-page" href="<?php echo $webUrl . $getMenu1; ?>"><?php echo $getMenu1; ?></a> /
                <span class="active-page"><?php echo $getMenu2; ?></span>
            </p>
        </div>

        <div style="margin-left: 45px;">
            <br>

            <div style="margin-left:-45px;">
                <?php if ($getMenu2 == "จานดาวเทียม") { ?>
                    <img src="<?php echo $pathImage; ?>category-sat.png" width="100%"/>
                <?php } elseif ($getMenu2 == "เครื่องปรับอากาศ") { ?>
                    <img src="<?php echo $pathImage; ?>category-air.png" width="100%"/>
                <?php } elseif ($getMenu2 == "กล้องวงจรปิด") { ?>
                    <img src="<?php echo $pathImage; ?>category-cctv.png" width="100%"/>
                <?php } ?>
            </div>
            <?php
            foreach ($arrProduct as $key => $value):
                $point = 155;
                if ($key % 3 == 0):
                    ?>
                    <div class="cleaner"></div>
                <?php
                endif;
                $urlTarget = $webUrl . "สินค้า/" . $value->product_type_name . "/" . $value->id;
                ?>
                <div class="product_box margin_r35">
                    <a target="_blank"
                       href="<?php echo $urlTarget; ?>"
                       title="<?php echo $value->name_th; ?>">
                        <h3><?php echo $value->name_th; ?></h3>

                        <div class="image_wrapper">
                            <?php if ($value->new == "1"): ?>
                                <img class="icon-new" src="<?php echo $pathIconNew; ?>"
                                     style="margin-left: <?php echo $point;
                                     $point -= 40; ?>px;"/>
                            <?php endif;
                            if ($value->sellers == "1"):
                                ?>
                                <img class="icon-new" src="<?php echo $pathSellers; ?>"
                                     style="margin-left: <?php echo $point;
                                     $point -= 40; ?>px;"/>
                            <?php endif;
                            if ($value->recommend == "1"): ?>
                                <img class="icon-new" src="<?php echo $pathRecommend; ?>"
                                     style="margin-left: <?php echo $point;
                                     $point -= 40; ?>px;"/>
                            <?php endif;
                            if ($value->promotion == "1"):?>
                                <img class="icon-new" src="<?php echo $pathPromotion; ?>"
                                     style="margin-left: <?php echo $point;
                                     $point -= 40; ?>px;"/>
                            <?php endif; ?>
                            <img src="<?php echo $pathImageProduct . $value->image_path; ?>"
                                 alt="<?php echo $value->name_th; ?>" class="block-menu-img"/>
                        </div>
                    </a>

                    <p>
                        <?php if ($value->price1 - $value->price2 > 0): ?>
                            <span
                                class="price1">ราคาปกติ: <strike><?php echo number_format($value->price1, 2); ?></strike> บาท</span>
                            <br>
                        <?php else: ?>
                            <br>
                        <?php endif; ?>
                        <span class="price2">ราคาขาย: <?php echo number_format($value->price2, 2); ?> บาท</span><br>
                        <?php if ($value->price1 - $value->price2 > 0): ?>
                            <span
                                class="price3">ประหยัด: <?php echo number_format($value->price1 - $value->price2, 2); ?>
                                บาท</span><br>
                        <?php else: ?>
                            <br>
                        <?php endif; ?>

                        <!--                    <div align="right">-->
                        <!--                        <a href="--><?php //echo $webUrl; ?><!--product/viewForAddToCart/-->
                        <?php //echo $value->id; ?><!--" class="add-cart">-->
                        <!--                            <img title="หยิบใส่ตะกร้า" src="-->
                        <?php //echo $baseUrl; ?><!--web/images/add-to-cart-icon.png"/>-->
                        <!--                        </a></div>-->

                    <div align="right">
                        <a target="_blank" href="<?php echo $urlTarget; ?>">รายละเอียด</a>
                        <!-- | <a href="#">ซื้อเลย</a>-->
                    </div>
                </div>
            <?php
            endforeach;
            ?>
            <div class="cleaner"></div>
            <!--        <div class="button_01"><a href="#">View All</a></div>-->
        </div>

    </td>
<?php
$this->load->view('footer');
?>