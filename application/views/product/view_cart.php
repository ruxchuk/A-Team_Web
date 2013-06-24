<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 6/6/2556
 * Time: 16:45 น.
 * To change this template use File | Settings | File Templates.
 */
//echo "<pre>";
//var_dump($arrData);
//echo "</pre>";
$baseUrl = base_url();
$pathImageProduct = $baseUrl . "web/images/uploads/products/";
$this->load->view('header');
?>

    <script type="text/javascript">
        function confirmRemove(url, id) {
            if (confirm('ต้องการลบรายการนี้หรือไม่ ?')) {
                window.location = 'index.php?mo=31&del=' + url;
            }
        }
    </script>
    <style>
        table.generic-table th {
            text-align: center;
            font-weight: bold;
        }

        table.generic-table th, table.generic-table td {
            padding: 8px;
            vertical-align: top;
        }

        th, td, caption {
            font-weight: inherit;
        }

        table.generic-table {
            margin-bottom: 20px;
        }

        table.generic-table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        table.generic-table {
            width: 100%;
        }

        table.generic-table {
             /*width: 100%;*/
            width: 723px;
         }

        table {
            margin-bottom: 0;
            font-size: 12px;
        }

        table.generic-table tr {
            border: 1px solid #eee;
        }
    </style>
    <div>
        <p>
            &nbsp;&nbsp;&nbsp;<a href="<?php echo $webUrl; ?>">หน้าแรก</a> /
            <span class="link-active"><?php echo $siteTitle; ?></span>
        </p>
    </div>
    <div style="margin-left: 20px;">
        <div class="content_section">
            <form method="post" action="">
                <table cellspacing="0" cellpadding="0" class="generic-table">
                    <tbody>
                    <tr>
                        <th class="checkout-product-title" width="300">รายการ</th>
                        <th class="checkout-product-price" width="50">ราคา/หน่วย</th>
                        <th class="checkout-product-amount" width="80">จำนวน</th>
                        <th class="checkout-product-transport" width="80">ค่าขนส่ง /หน่วย</th>
                        <th class="checkout-product-total" width="80">ราคารวม</th>
                        <th class="checkout-product-remove"></th>
                    </tr>
                    <?php foreach ($arrData as $key => $value): ?>
                        <tr>
                            <td class="checkout-product-title">
                                <div class="product-image">
                                    <img width="150" height="108"
                                         src="<?php echo $pathImageProduct . $value->image_path; ?>"
                                         border="0" alt=""></div>
                                <div class="product-detail">
                                    <h3 class="title-product-checkout"><?php echo $value->name_th; ?></h3>

                                    <p class="desc-product-checkout"><?php echo $value->serial; ?></p>
                                </div>
                            </td>
                            <td class="checkout-product-price right"><?php echo number_format($value->price2); ?> บาท
                            </td>
                            <td class="checkout-product-amount" style="text-align:center;">
                                <input type="text" value="1" name="order[823220]" size="4"></td>
                            <td class="checkout-product-transport right">-</td>
                            <td class="checkout-product-total right">3,500.00 ฿</td>
                            <td class="checkout-product-remove">
                                <a href="javascript:confirmRemove('823220');" title="Remove" class="del-icon">ลบ</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="3" class="right">ราคารวม
                        </th>
                        <td>&nbsp;</td>
                        <td class="checkout-product-total right">3,500.00 ฿</td>
                        <td class="checkout-product-remove"></td>
                    </tr>
                    <tr>
                        <th colspan="3" class="right">รวมค่าขนส่ง
                        </th>
                        <td class="right"></td>
                        <td class="right checkout-product-total">0.00 ฿</td>
                        <td class="checkout-product-remove"></td>
                    </tr>
                    <tr>
                        <th colspan="3" class="right">
                            ค่าขนส่ง
                        </th>
                        <td>&nbsp;</td>
                        <td class="right checkout-product-total"><span id="shipping-cost">0.00</span> ฿
                            <script type="text/javascript">
//                                function selectShippingMethod() {
//                                    var total_price = parseFloat(3500);
//                                    var optionSelect = document.getElementById("shipping_method").selectedIndex;
//                                    var shipping_cost_array = document.getElementById("shipping_method").options[optionSelect].value.split(',');
//                                    var shipping_cost = parseFloat(shipping_cost_array[1]);
//                                    var total_price_display = total_price + shipping_cost;
//                                    document.getElementById("shipping-cost").innerHTML = Comma(formatAsMoney(shipping_cost));
//                                    document.getElementById("catalog-total-price").innerHTML = Comma(formatAsMoney(total_price_display));
//                                    PostData(1, "/modules/product/shipping_query.php", "shippingID=" + shipping_cost_array[0], '');
//                                }
                            </script>
                        </td>
                        <td class="checkout-product-remove"></td>
                    </tr>
                    <tr style="background-color:#F7F7F7;">
                        <td colspan="2" class="btn-checkout">&nbsp;
                            <!--                        <a class="generic-button " href="/index.php?mo=29&amp;cid=&amp;p=" style="float:left"><img-->
                            <!--                                src="/themes/default/images/product-icon/22/add-more.png" border="0">&nbsp;</a>-->
                            <!--                        <a class="generic-button " href="javascript: document.getElementById('frm_cart').submit();"-->
                            <!--                           style="float:left"><img src="/themes/default/images/product-icon/22/recalculate.png"-->
                            <!--                                                   border="0"></a>-->
                            <!--<a class="generic-button delete-button" href="javascript:confirmEmptyCart('t');"><span>ลบสินค้าในตะกร้า</span></a>-->
                        </td>
                        <td class="right" style="font-weight:bold">&nbsp;รวมเป็นเงิน</td>
                        <td>&nbsp;</td>
                        <td class="btn-checkout right"><span id="catalog-total-price">3,500.00  ฿</span>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
<?php
$this->load->view('footer');
?>