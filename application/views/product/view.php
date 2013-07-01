<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 21/5/2556
 * Time: 10:16 น.
 * To change this template use File | Settings | File Templates.
 */

$this->load->view('header');
$this->load->view("sidebar");
$baseUrl = base_url();
$pathImageProduct = $baseUrl . "web/images/uploads/products/";
?>
    <td class="maincol">
        <script>
            $(document).ready(function () {
                $(".gallerypic, .add-cart").fancybox({
                    'overlayShow': true,
                    'transitionIn': 'elastic',
                    'transitionOut': 'elastic'
                });
            });
        </script>

        <div>
            <p>
                &nbsp;&nbsp;&nbsp;<a class="link-page" href="<?php echo $baseUrl; ?>">หน้าแรก</a> /
                <a class="link-page" href="<?php echo $webUrl; ?><?php echo $this->uri->segment(1); ?>">
                    <?php echo $this->uri->segment(1); ?></a> /
                <a class="link-page"
                   href="<?php echo $webUrl; ?><?php echo $this->uri->segment(1) . '/' . $this->uri->segment(2); ?>">
                    <?php echo $this->uri->segment(2); ?></a> /
                <span class="active-page"><?php echo $product[0]->id; ?></span>
            </p>
        </div>
        <table border="0" cellspacing="0" cellpadding="0" class="tbView" width="745">
            <tbody>
            <tr valign="top">
                <td style="padding-right: 20px;" width="190">

                    <a id="product-image" class="gallerypic" title="<?php echo $product[0]->name_th; ?>"
                       href="<?php echo $pathImageProduct . $product[0]->image_path; ?>">
                        <img class="pic" src="<?php echo $pathImageProduct . $product[0]->image_path; ?>" border="0"
                             width="190" height="130">
                        <span class="p-zoom-icon">
                            <img src="<?php echo $baseUrl; ?>web/images/icon-zoom.png"
                                 width="32" height="32" title="คลิกเพื่อดูภาพขนาดใหญ่">
                        </span>
                    </a><br>
                    <?php if (!empty($product[0]->image_path2)) :?>
                    <a class="gallerypic" title=""
                       href="<?php echo $pathImageProduct . $product[0]->image_path2; ?>">
                        <img class="pic" src="<?php echo $pathImageProduct . $product[0]->image_path2; ?>" border="0"
                             width="190" height="130">
                        <span class="p-zoom-icon">
                            <img src="<?php echo $baseUrl; ?>web/images/icon-zoom.png"
                                 width="32" height="32" title="คลิกเพื่อดูภาพขนาดใหญ่">
                        </span>
                    </a><br>
                    <?php endif; ?>
                    <?php if (!empty($product[0]->image_path3)) :?>
                    <a class="gallerypic" title=""
                       href="<?php echo $pathImageProduct . $product[0]->image_path3; ?>">
                        <img class="pic" src="<?php echo $pathImageProduct . $product[0]->image_path3; ?>" border="0"
                             width="190" height="130">
                        <span class="p-zoom-icon">
                            <img src="<?php echo $baseUrl; ?>web/images/icon-zoom.png"
                                 width="32" height="32" title="คลิกเพื่อดูภาพขนาดใหญ่">
                        </span>
                    </a><br>
                    <?php endif; ?>
                    <?php if (!empty($product[0]->image_path4)) :?>
                    <a class="gallerypic" title=""
                       href="<?php echo $pathImageProduct . $product[0]->image_path4; ?>">
                        <img class="pic" src="<?php echo $pathImageProduct . $product[0]->image_path4; ?>" border="0"
                             width="190" height="130">
                        <span class="p-zoom-icon">
                            <img src="<?php echo $baseUrl; ?>web/images/icon-zoom.png"
                                 width="32" height="32" title="คลิกเพื่อดูภาพขนาดใหญ่">
                        </span>
                    </a><br>
                    <?php endif; ?>
                    <?php if (!empty($product[0]->image_path5)) :?>
                    <a class="gallerypic" title=""
                       href="<?php echo $pathImageProduct . $product[0]->image_path5; ?>">
                        <img class="pic" src="<?php echo $pathImageProduct . $product[0]->image_path5; ?>" border="0"
                             width="190" height="130">
                        <span class="p-zoom-icon">
                            <img src="<?php echo $baseUrl; ?>web/images/icon-zoom.png"
                                 width="32" height="32" title="คลิกเพื่อดูภาพขนาดใหญ่">
                        </span>
                    </a><br>
                    <?php endif; ?>
                    <!--                            <div align="right">-->
                    <!--                                <a href="-->
                    <?php //echo $webUrl; ?><!--product/viewForAddToCart/-->
                    <?php //echo $product[0]->id; ?><!--" class="add-cart">-->
                    <!--                                    <img title="หยิบใส่ตะกร้า" src="-->
                    <?php //echo $baseUrl; ?><!--web/images/add-to-cart-icon.png"/>-->
                    <!--                                </a>-->
                    <!--                            </div>-->
                    <!--                            <a id="example2" href="./example/2_b.jpg"><img alt="example2" src="./example/2_s.jpg" /></a>-->

                </td>
                <td>
                    <div class="product-title">
                        <span style="text-shadow: 1px 1px 1px;"><?php echo $product[0]->name_th; ?></span>
                        <!--                    <img src="../images/icon/icon_new.gif" style="vertical-align: middle;"> <img-->
                        <!--                        src="../images/icon/icon_hot.gif" style="vertical-align: middle;">-->
                    </div>
                    <br>

                    <div style="padding-bottom: 5px;"><b>รหัสสินค้า:</b> <?php echo $product[0]->serial; ?></div>
                    <div style="padding-bottom: 5px;">
                        <?php if ($product[0]->price1 - $product[0]->price2 > 0): ?>
                        <font color="#DA1D69"><b>ราคาปกติ <strike><?php echo number_format($product[0]->price1, 2); ?>
                                </strike> บาท<br>
                                <?php endif; ?>
                                <font color="#39C75E">ราคาขาย
                                    <?php echo number_format($product[0]->price2, 2); ?> บาท</font><br>
                                <?php if ($product[0]->price1 - $product[0]->price2 > 0): ?>
                                <font color="#6A67E0">ประหยัด
                                    <?php echo number_format($product[0]->price1 - $product[0]->price2, 2); ?>
                                    บาท</font></b>
                            <?php endif; ?>
                        </font>
                    </div>
                    <div style="padding-bottom: 5px;"><b>ยี่ห้อ:</b> <?php echo $product[0]->brand; ?></div>
                    <div style="padding-bottom: 5px;"><b>รุ่น:</b> <?php echo $product[0]->model; ?></div>
                    <!--                <div style="padding-bottom: 5px;"><b>คะแนนจากลูกค้า:</b><img src="../images/icon/icon_rate_star_5.gif"-->
                    <!--                                                                             title="5 ดาว"-->
                    <!--                                                                             style="vertical-align: middle;">-->
                    <!--                    (จำนวนผู้ให้คะแนน: 3)-->
                    <!--                </div>-->
                    <br>

                    <div style="padding-bottom: 15px;"><b>รายละเอียด:</b>
                        <br>
                        <?php echo $product[0]->description; ?>
                    </div>
                    <div style="padding-bottom: 20px;"></div>
                </td>
            </tr>
            </tbody>
        </table>
    </td>


<?php
$this->load->view('footer');
?>