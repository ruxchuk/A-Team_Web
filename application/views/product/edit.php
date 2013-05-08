<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 8/5/2556
 * Time: 14:41 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();
//echo '<pre>';
//var_dump($arrProduct);
//echo '</pre>';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv='content-type' content='text/html; charset=UTF-8'/>
</head>
<p><a href="<?php echo $baseUrl; ?>">หน้าแรก</a></p>
<p><a href="<?php echo $baseUrl; ?>product/pNew">หน้ารายการสินค้า</a></p>

<p><?php echo $message; ?></p>

<h2>แก้ไขรายการสินค้า</h2>

<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <p>
        <label>รหัสสินค้า
            <input name="serial" type="text" id="serial" disabled
                   value="<?php echo $arrProduct->serial; ?>"/>
        </label>
    </p>

    <p>
        <label>ประเภทสินค้า
            <select name="product_type_id" id="product_type_id">
                <?php
                foreach ($arrProductType as $key => $value) {
                    if ($arrProduct->product_type_id == $value->product_type_id) {
                        echo "<option selected value='$value->id'>$value->name</option>";
                    } else {
                        echo "<option value='$value->id'>$value->name</option>";
                    }
                }
                ?>
            </select>
        </label>
    </p>

    <p>
        <label>ชื่อภาษาไทย
            <input name="name_th" type="text" id="name_th"
                   value="<?php echo $arrProduct->name_th; ?>"/>
        </label>
    </p>

    <p><label>
            ชื่อภาษาอังกฤษ
            <input name="name_en" type="text" id="name_en"
                   value="<?php echo $arrProduct->name_en; ?>"/>
        </label></p>

    <p>
        <label>ราคาขายปลีก
            <input name="price1" type="text" id="price1"
                   value="<?php echo $arrProduct->price1; ?>"/>
        </label>
    </p>

    <p>
        <label>ราคาขายส่ง
            <input name="price2" type="text" id="price2"
                   value="<?php echo $arrProduct->price2; ?>"/>
        </label>
    </p>

    <p>
        <label>ยี่ห้อ
            <input name="brand" type="text" id="brand"
                   value="<?php echo $arrProduct->brand; ?>"/>
        </label>
    </p>

    <p>
        <label>รุ่น
            <input name="model" type="text" id="model"
                   value="<?php echo $arrProduct->model; ?>"/>
        </label>
    </p>

    <p>
        <label>หน่วยสินค้า
            <input name="value" type="text" id="value"
                   value="<?php echo $arrProduct->value; ?>"/>
        </label>
    </p>

    <p>
        <label>ความสำคัญ
            <input name="priority" type="text" id="priority" value="999"/>
        </label>
    </p>

    <p>
        <label>รายละเอียด
            <textarea name="description" id="description"><?php echo $arrProduct->description; ?></textarea>
        </label>
    </p>

    <p>
        <label>คำค้นหา
            <textarea name="keyword" id="keyword"><?php echo $arrProduct->keyword; ?></textarea>
        </label>
    </p>

    <p>
        <input type="submit" name="Submit" style="cursor: pointer;" value="บันทึก"/>
        <input type="button" value="ยกเลิก" style="cursor: pointer;"
               onclick="window.location = '<?php echo $baseUrl; ?>product/pNew';"/>
    </p>
</form>
</html>