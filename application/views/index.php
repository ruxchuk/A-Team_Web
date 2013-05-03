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
<div>
    <div class="content_section" align="center">

<!--        <h2>Our Products</h2>-->

        <div class="product_box margin_r35">

            <h3>ผ้าม่าน</h3>

            <div class="image_wrapper"><a href="#" target="_parent">
                    <img src="http://www.kaceecurtain.com/images/default_page/default01.jpg"
                         alt="product 2" class="block-menu-img"/></a></div>

            <p class="price">Price: $350</p>
            <a href="#">Detail</a> | <a href="#">Buy Now</a>

        </div>

        <div class="product_box margin_r35">
            <h3>จานดาวเทียม</h3>

            <div class="image_wrapper"><a href="#" target="_parent"><img
                        src="http://www.be2hand.com/upload/200804/200804-03-143415-1.jpg"
                        alt="product 3" class="block-menu-img"/></a></div>

            <p class="price">Price: $550</p>
            <a href="#">Detail</a> | <a href="#">Buy Now</a>
        </div>

        <div class="product_box">
            <h3>เครื่องปรับอากาศ</h3>

            <div class="image_wrapper"><a href="#" target="_parent"><img
                        src="http://www.supplychains2012.org/image/article/big/A20120914161917.jpg"
                        class="block-menu-img" alt="product 4"/></a></div>

            <p class="price">Price: $250</p>
            <a href="#">Detail</a> | <a href="#">Buy Now</a>
        </div>

        <div class="cleaner"></div>

        <div class="product_box margin_r35">
            <h3>กล้องวงจรปิด</h3>

            <div class="image_wrapper"><a href="#" target="_parent">
                    <img src="http://www.ccss.co.th/myfile/20120719111833_ccTV.png"
                        alt="product 5" class="block-menu-img"/></a>
            </div>

            <p class="price">Price: $850</p>
            <a href="#">Detail</a> | <a href="#">Buy Now</a>
        </div>

        <div class="product_box margin_r35">
            <h3>อื่นๆ</h3>

            <div class="image_wrapper"><a href="#" target="_parent"><img
                        src="" alt="product 6" class="block-menu-img"/></a></div>

            <p class="price">Price: $450</p>
            <a href="#">Detail</a> | <a href="#">Buy Now</a>
        </div>

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