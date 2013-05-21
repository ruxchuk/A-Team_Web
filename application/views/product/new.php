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
$this->load->view('header-backend');
if ($arrayPost) {
    extract($arrayPost);
    $productValue = $value;
}
$pathImage = $baseUrl . "web/images/uploads/products/";
?>

<link rel="stylesheet" type="text/css"
      href="<?php echo $baseUrl . "web/js/uploadify/uploadify.css"; ?>">
<script src="<?php echo $baseUrl . 'web/js/jquery-1.9.1.js'; ?>"></script>
<!--    <script src="--><?php //echo $baseUrl . 'web/js/uploadify/jquery.uploadify-3.1.js'; ?><!--"></script>-->
<script type="text/javascript"
        src="<?php echo $baseUrl; ?>web/js/uploadify/jquery.uploadify-3.2.min.js"></script>
<script>
    var swfPath = "<?php echo $baseUrl;?>web/js/uploadify/uploadify.swf";
    var pathImgUploadTmp = "<?php echo $pathImage;?>";
    var pathUploadify = "<?php echo $baseUrl; ?>index.php/upload/do_upload";

    $(function () {
        genUpload("#logo_image_path", "#image_show", "#image_path");
    });

    function genUpload(btnUpload, idReload, idSave) {
        $(btnUpload).uploadify({
            'userfile': {
                'path': pathImgUploadTmp
            },
            'swf': swfPath,
            'uploader': pathUploadify,
            'fileSizeLimit': '120KB',
            'fileTypeExts': '*.gif; *.jpg; *.png',
            'enctype': "multipart/form-data",
            'fileObjName': 'userfile',
            'onFallback': function () {
                alert('Flash was not detected.');// detect flash compatible
            }, 'onUploadSuccess': function (file, data, response) {
                var n = data.search("Path fail");
                if (n > 0) {
                    alert("Path รูปภาพเกิดข้อผิดพลาด" + data);
                } else {
                    reloadImgae(idReload, data, idSave);
                }
            }
        });
    }

    function reloadImgae(id, img, idSave) {
        var path = pathImgUploadTmp + img;
        $(idSave).val(img);
        $(id).fadeOut().html(getTypeImage(path, "")).fadeIn("slow");
    }

    function getTypeImage(src, id) {
        return '<img src="' + src + '" style="width: 250px; height: 190px;" class="nopad thumb"/>';
    }
</script>

<h3>รายการสินค้า</h3>
<table border="1">
    <tr>
        <td width="36" align="center">ลำดับ</td>
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
            <td align="center"><?php echo $key + 1; ?></td>
            <td align="center"><?php echo $value->id; ?></td>
            <td align="right"><?php echo $value->serial; ?></td>
            <td align="center"><?php echo $value->product_type_name; ?></td>
            <td align="left"><?php echo $value->name_th; ?></td>
            <td align="right"><?php echo number_format($value->price1, 2); ?> บาท</td>
            <td align="right"><?php echo number_format($value->price2, 2); ?> บาท</td>
            <td align="center"><?php echo $value->value; ?></td>
            <td align="center"><?php echo $value->priority; ?></td>
            <td align="left"><?php echo $value->date_create; ?></td>
            <td align="left"><?php echo $value->date_stamp; ?></td>
            <td align="center"><a href="pEdit/<?php echo $value->id; ?>">แก้ไข</a> | <a href="#">ลบ</a></td>
        </tr>
    <?php
    endforeach;
    ?>
</table>
<br><p><?php echo $message; ?></p>
<h2>เพิ่มรายการสินค้า</h2>
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <p>
        <label>รหัสสินค้า
            <input name="serial" type="text" id="serial" value="<?php echo empty($serial) ? '' : $serial; ?>"/>
        </label>
    </p>

    <p>
        <label>ประเภทสินค้า
            <select name="product_type_id" id="product_type_id">
                <?php
                foreach ($arrProductType as $key => $value) {
                    if ($product_type_id == $value->id) {
                        echo "<option value='$value->id' selected>$value->name</option>";
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
            <input name="name_th" type="text" id="name_th" value="<?php echo empty($name_th) ? '' : $name_th; ?>"/>
        </label>
    </p>

    <p><label>
            ชื่อภาษาอังกฤษ
            <input name="name_en" type="text" id="name_en" value="<?php echo empty($name_en) ? '' : $name_en; ?>"/>
        </label></p>

    <p>
        <label>ราคาขายปลีก
            <input name="price1" type="text" id="price1" value="<?php echo empty($price1) ? '' : $price1; ?>"/> บาท
        </label>
    </p>

    <p>
        <label>ราคาขายส่ง
            <input name="price2" type="text" id="price2" value="<?php echo empty($price2) ? '' : $price2; ?>"/> บาท
        </label>
    </p>

    <p>
        <label>ยี่ห้อ
            <input name="brand" type="text" id="brand" value="<?php echo empty($brand) ? '' : $brand; ?>"/>
        </label>
    </p>

    <p>
        <label>รุ่น
            <input name="model" type="text" id="model" value="<?php echo empty($model) ? '' : $model; ?>"/>
        </label>
    </p>

    <p>
        <label>หน่วยสินค้า
            <input name="value" type="text" id="value" value="<?php echo empty($productValue) ? '' : $productValue; ?>"/>
        </label>
    </p>

    <p>
        <label>ความสำคัญ
            <input name="priority" type="text" id="priority"
                   value="<?php echo empty($priority) ? '999' : $priority; ?>"/>
        </label>
    </p>

    <p>รูปภาพ</p>

    <p id="image_show"><img src="<?php echo empty($image_path) ? '' : $pathImage . $image_path; ?>"
                            width="263" height="192" alt=""/>
    </p>
    <label>
        <input name="userfile" type="file" id="logo_image_path"/>
        <input name="image_path" type="hidden" id="image_path"
               value="<?php echo empty($image_path) ? '' : $image_path; ?>"/>
    </label>

    <p>
        <label>รายละเอียด
            <textarea name="description"
                      id="description"><?php echo empty($description) ? '' : $description; ?></textarea>
        </label>
    </p>

    <p>
        <label>คำค้นหา
            <textarea name="keyword" id="keyword"><?php echo empty($keyword) ? '' : $keyword; ?></textarea>
        </label>
    </p>

    <p>
        <input type="submit" name="Submit" value="บันทึก"/>
    </p>
</form>
</html>