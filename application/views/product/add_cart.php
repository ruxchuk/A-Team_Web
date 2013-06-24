<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 4/6/2556
 * Time: 18:09 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
$pathImageProduct = $baseUrl . "web/images/uploads/products/";

?>
<style>
    .product-cart {
        width: 500px;
        color: #000;
        /*background-color: #666;*/
    }

    item-thumbnail {
        padding: 4px;
        border: 1px solid #FFFFFF;
        margin-bottom: 10px;
    }

    .block-menu-img {
        width: 190px;
        height: 130px;
    }
</style>
<script>
    var product_cart = 'product_cart';
    function validateNumber(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]/;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault)
                theEvent.preventDefault();
        }
    }

    $(document).ready(function () {
        $("#form-add").submit(function () {
            var id = $("#id").val();
            var value = $("#value").val();
            addCartProduct(id, value);
            return false;
        });
    });

    function addCartProduct(id, value) {
        var oldStr = getCookie(product_cart);//get cookie
        var strCookie = "";
        if (oldStr == "") {
            strCookie = id + "&" + value + "|";
        } else {
            oldStr = oldStr.split('=');
            strCookie = checkAddProductCart(oldStr[1].split('|'), id, value);
        }
        addCookies(strCookie, 30, product_cart);//add cookie
    }

    function checkAddProductCart(data, id, value) {
        var str = "";
        var ck = false;
        for (i = 0; i < data.length; i++) {
            var spVal = data[i].split('&');
            if (spVal[0] == id) {
                str += id + "&" + (parseInt(spVal[1]) + parseInt(value)) + "|";
                ck = true;
            } else {
                if (data[i] != "")
                    str += data[i] + "|";
            }
        }
        if (!ck) {
            str += id + "&" + value + "|";
        }
        return str;
    }
    //document.getElementById('user_name').value.focus();
    window.setTimeout(function () {
        document.getElementById('value').select();
    }, 0);

</script>
<script type="text/javascript">
</script>
<div class="product-cart" style="">
    <fieldset>
        <legend class="h-register"><h3>หยิบสินค้าใส่ตะกร้า</h3></legend>

        <form method="post" id="form-add" action="">
            <input id="id" name="id" type="hidden" value="<?php echo $arrData->id; ?>"/>
            <table>
                <tr>
                    <td width="200">
                        <div class="item-thumbnail">
                            <img class="block-menu-img" title="<?php $arrData->name_th; ?>"
                                 src="<?php echo $pathImageProduct . $arrData->image_path; ?>"
                                 border="0" alt="">
                        </div>
                    </td>
                    <td>
                        <div class="product-title">
                            <span><?php echo $arrData->name_th; ?></span>
                            <!--                    <img src="../images/icon/icon_new.gif" style="vertical-align: middle;"> <img-->
                            <!--                        src="../images/icon/icon_hot.gif" style="vertical-align: middle;">-->
                        </div>
                        <br>

                        <div style="padding-bottom: 5px;"><b>รหัสสินค้า:</b> <?php echo $arrData->serial; ?></div>
                        <div style="padding-bottom: 5px;">
                            <?php if ($arrData->price1 - $arrData->price2 > 0): ?>
                            <font color="#DA1D69"><b>ราคาปกติ <strike><?php echo number_format($arrData->price1, 2); ?>
                                    </strike> บาท<br>
                                    <?php endif; ?>
                                    <font color="#39C75E" size="3">ราคาขาย
                                        <?php echo number_format($arrData->price2, 2); ?> บาท</font><br>
                                    <?php if ($arrData->price1 - $arrData->price2 > 0): ?>
                                    <font color="#6A67E0">ประหยัด
                                        <?php echo number_format($arrData->price1 - $arrData->price2, 2); ?>
                                        บาท</font></b>
                                <?php endif; ?>
                            </font>
                        </div>
                        <div style="padding-bottom: 5px;"><b>ยี่ห้อ:</b> <?php echo $arrData->brand; ?></div>
                        <div style="padding-bottom: 5px;"><b>รุ่น:</b> <?php echo $arrData->model; ?></div>
                        <br>

                        <div><b>จำนวน</b>
                            <input type="text" name="value" id="value" value="1" maxlength="5"
                                   size="6" onkeypress="return validateNumber(event);"/>
                            <b><?php echo $arrData->value; ?></b>
                            <button class="button btn btn-primary" id="submit">ตกลง</button>
                        </div>
                        <div></div>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</div>