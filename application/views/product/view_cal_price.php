<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 6/6/2556
 * Time: 16:28 น.
 * To change this template use File | Settings | File Templates.
 */

$this->load->view('header');
$baseUrl = base_url();
$pathImageProduct = $baseUrl . "web/images/uploads/products/";
?>
<div class="desc_product">
    <h3 class="fontface"> ข้อมูลสินค้า</h3>

    <div class="product_detail">
        <ul>
            <li id="product-id-content" class="clearfix">
                <p class="title_detail" style="margin-bottom: 0;">รหัสสินค้า</p>

                <p class="detail_product" style="margin-bottom: 0;">
                    CB-8456 </p>
            </li>
            <li><p class="title_detail" style="margin-bottom: 0;">ยี่ห้อ</p>

                <p class="detail_product" style="margin-bottom: 0;">GMM Z</p>
            </li>
            <li><p class="title_detail" style="margin-bottom: 0;">รุ่น</p>

                <p class="detail_product" style="margin-bottom: 0;">Mini</p>
            </li>
            <li id="product-update-content">
                <p class="title_detail" style="margin-bottom: 0;">แก้ไขล่าสุดเมื่อ</p>

                <p class="detail_product" style="margin-bottom: 0;">
                    26/05/2013 17:23 </p>
            </li>
            <li>
                <p class="title_detail" style="margin-bottom: 0;">เข้าชม</p>

                <p class="detail_product" style="margin-bottom: 0;">140 ครั้ง</p>
            </li>
        </ul>
    </div>
</div>
<?php
$this->load->view('footer');
?>