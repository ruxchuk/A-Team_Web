<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 7/5/2556
 * Time: 16:11 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();
//echo "<pre>";
//var_dump($arrProduct);
//echo "</pre>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv='content-type' content='text/html; charset=UTF-8'/>
</head>
<p>
<a href="<?php echo $baseUrl; ?>">หน้าแรก</a></p>
<p><?php echo $message; ?></p>
<h3>รายการสินค้า</h3>
<table border="1">
    <tr>
        <td width="36" align="center">id</td>
        <td width="161" align="center">รหัสสินค้า</td>
        <td width="140" align="center">ประเภทสินค้า</td>
        <td width="156" align="center">ชื่อสินค้า</td>
        <td width="80" align="center">ขายปลีก</td>
        <td width="80" align="center">ขายส่ง</td>
        <td width="120" align="center">หน่วยสินค้า</td>
        <td width="120" align="center">ความสำคัญ</td>
        <td width="131" align="center">วันที่สร้าง</td>
        <td width="133" align="center">วันที่แก้ไข</td>
        <td width="82" align="center">จัดการ</td>
    </tr>
    <?php
    foreach ($arrProduct as $key => $value) :
    ?>
    <tr>
        <td align="center"><?php echo $value->id; ?></td>
        <td align="right"><?php echo $value->serial; ?></td>
        <td align="center"><?php echo $value->product_type_name; ?></td>
        <td align="left"><?php echo $value->name_th; ?></td>
        <td align="right"><?php echo number_format($value->price1, 2); ?></td>
        <td align="right"><?php echo number_format($value->price2, 2); ?></td>
        <td align="left"><?php echo $value->value; ?></td>
        <td align="center"><?php echo $value->priority; ?></td>
        <td align="left"><?php echo $value->date_create; ?></td>
        <td align="left"><?php echo $value->date_stamp; ?></td>
        <td align="center"><a href="#">แก้ไข</a> | <a href="#">ลบ</a></td>
    </tr>
    <?php
    endforeach;
    ?>
</table>
<br>
<h2>เพิ่มรายการสินค้า</h2>
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <p>
        <label>รหัสสินค้า
            <input name="serial" type="text" id="serial" disabled
                   value="<?php echo date("YmdHis");?>" />
        </label>
    </p>
    <p>
        <label>ประเภทสินค้า
            <select name="product_type_id" id="product_type_id">
                <?php
                foreach ($arrProductType as $key => $value) {
                    echo "<option value='$value->id'>$value->name</option>";
                }
                ?>
            </select>
        </label>
    </p>
    <p>
        <label>ชื่อภาษาไทย
            <input name="name_th" type="text" id="name_th" />
        </label>
    </p>
    <p>  <label>
            ชื่อภาษาอังกฤษ
            <input name="name_en" type="text" id="name_en" />
        </label></p>
    <p>
        <label>ราคาขายปลีก
            <input name="price1" type="text" id="price1" />
        </label>
    </p>
    <p>
        <label>ราคาขายส่ง
            <input name="price2" type="text" id="price2" />
        </label>
    </p>
    <p>
        <label>ยี่ห้อ
            <input name="brand" type="text" id="brand" />
        </label>
    </p>
    <p>
        <label>รุ่น
            <input name="model" type="text" id="model" />
        </label>
    </p>
    <p>
        <label>หน่วยสินค้า
            <input name="value" type="text" id="value" />
        </label>
    </p>
    <p>
        <label>รายละเอียด
            <textarea name="description" id="description"></textarea>
        </label>
    </p>
    <p>
        <label>คำค้นหา
            <textarea name="keyword" id="keyword"></textarea>
        </label>
    </p>
    <p>
        <input type="submit" name="Submit" value="บันทึก" />
    </p>
</form>
</html>