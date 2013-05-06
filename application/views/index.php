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

?>
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>web/css/block-menu/style.css" type="text/css"/>
<div style="margin-left: 45px;">
    <div class="content_section">

<!--        <h2>Our Products</h2>-->

        <div class="product_box margin_r35">

            <h3 align="center">ผ้าม่าน</h3>

            <div class="image_wrapper"><a href="#" target="_parent">
                    <img src="<?php echo $baseUrl; ?>web/images/curtain.jpg"
                         alt="product 2" class="block-menu-img"/></a></div>

            <p class="price">ผ้าม่าน, รางโชว์, มู่ลี่, ม่านปรับแสง, ม่านม้วน, ม่านพลับ, วอลเปเปอร์, ฉากกั้นห้อง, กั้นแอร์, พรม,
                กระเบื้องยาง</p>
            <a href="#">Detail</a>
<!--            | <a href="#">Buy Now</a>-->

        </div>

        <div class="product_box margin_r35">
            <h3>จานดาวเทียม</h3>

            <div class="image_wrapper"><a href="#" target="_parent"><img
                        src="<?php echo $baseUrl; ?>web/images/dish-aerial.jpg"
                        alt="product 3" class="block-menu-img"/></a></div>

            <p class="price">จำหน่ายอุปกรณ์จานดาวเทียม ในราคาปลีก และส่ง</p>
            <a href="#">Detail</a>
<!--            | <a href="#">Buy Now</a>-->
        </div>

        <div class="product_box">
            <h3>เครื่องปรับอากาศ</h3>
            <div class="image_wrapper"><a href="#" target="_parent"><img
                        src="<?php echo $baseUrl; ?>web/images/air.jpg"
                        class="block-menu-img" alt="product 4"/></a></div>

            <p class="price">จำหน่ายพร้อมติดตั้ง เครืองปรับอากาศ ในราคาปลีก และส่ง</p>
            <a href="#">Detail</a>
        </div>
        <div class="cleaner"></div>

        <div class="product_box margin_r35">
            <h3>กล้องวงจรปิด</h3>
            <div class="image_wrapper"><a href="#" target="_parent">
                    <img src="<?php echo $baseUrl; ?>web/images/cctv.png"
                        alt="product 5" class="block-menu-img"/></a>
            </div>
            <p class="price">จำหน่ายอุปกรณ์ พร้อมติดตั้งกล้องวงจรปิด ในราคาปลีก และส่ง</p>
            <a href="#">Detail</a>
        </div>

<!--        <div class="product_box margin_r35">-->
<!--            <h3>อื่นๆ</h3>-->
<!---->
<!--            <div class="image_wrapper"><a href="#" target="_parent"><img-->
<!--                        src="" alt="product 6" class="block-menu-img"/></a></div>-->
<!---->
<!--            <p class="price">Price: $450</p>-->
<!--            <a href="#">Detail</a> | <a href="#">Buy Now</a>-->
<!--        </div>-->

<!--        <div class="product_box">-->
<!--            <h3> Vivamus at justo</h3>-->
<!---->
<!--            <div class="image_wrapper"><a href="http://www.templatemo.com/page/6" target="_parent"><img-->
<!--                        src="" alt="product 7"/></a></div>-->
<!---->
<!--            <p class="price">Price: $350</p>-->
<!--            <a href="#">Detail</a> | <a href="#">Buy Now</a>-->
<!--        </div>-->

        <div class="cleaner"></div>

<!--        <div class="button_01"><a href="#">View All</a></div>-->

    </div>
</div>
<?php
$this->load->view('footer');
?>