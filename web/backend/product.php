<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include "header.php";
################################################################################
## +---------------------------------------------------------------------------+
## | 1. Creating & Calling:                                                    |
## +---------------------------------------------------------------------------+
##  *** define a relative (virtual) path to datagrid.class.php file
##  *** (relatively to the current file)
##  *** RELATIVE PATH ONLY ***


define("DATAGRID_DIR", "datagrid/"); /* Ex.: "datagrid/" */
require_once(DATAGRID_DIR . 'datagrid.class.php');

// includes database connection parameters
include_once('lib/base.inc.php');

ob_start();
##  *** set needed options
$debug_mode = false;
$messaging = true;
$unique_prefix = "f_";
$dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix);

##  *** set data source with needed options
##  *** put a primary key on the first place
//http://localhost:11001/ateam/web/a-team_web/web/backend/datagrid/styles/pink/images/edit.gif
$sql = "
SELECT
      `product`.*,
      `product_type`.`name` AS product_type_name,
       CONCAT('<a title=\"แก้ไขข้อมูล\" href=\"?f_mode=edit&f_rid=', `product`.id, '&f_page_size=50&f_p=1&p_id=',
       `product_type`.id, '\"><img src=\"datagrid/styles/pink/images/edit.gif\"/></a>', ' | ',
       '<img title=\"Delete\" style=\"cursor: pointer;\"
       onclick=\"javascript:f_verifyDelete(',
       \"'\", `product`.id, \"', '&f_page_size=50&f_p=1');\", '\"',
       ' src=\"datagrid/styles/pink/images/delete.gif\"/>') AS edit_field,
       '' AS add_image,
       IF(`product`.new=0,'<div class=\"no\">No</div>', '<div class=\"yes\">Yes</div>') AS p_new,
       IF(`product`.sellers=0,'<div class=\"no\">No</div>', '<div class=\"yes\">Yes</div>') AS p_sellers,
       IF(`product`.recommend=0,'<div class=\"no\">No</div>', '<div class=\"yes\">Yes</div>') AS p_recommend,
       IF(`product`.promotion=0,'<div class=\"no\">No</div>', '<div class=\"yes\">Yes</div>') AS p_promotion
    FROM
      `product`,
      `product_type`
    WHERE `product`.`publish` = 1
      AND `product_type`.`id` = `product`.`product_type_id`
      AND `product_type`.`publish` = 1
";
$default_order = array("`product`.`priority`" => "ASC");
$dgrid->DataSource("PEAR", "mysql", $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS, $sql, $default_order);


## +---------------------------------------------------------------------------+
## | 2. General Settings:                                                      |
## +---------------------------------------------------------------------------+
## +-- PostBack Submission Method ---------------------------------------------+
##  *** defines postback submission method for DataGrid: AJAX, POST(default) or GET
$postback_method = 'GET';
$dgrid->SetPostBackMethod($postback_method);
##
## +-- Cache Settings ---------------------------------------------------------+
## *** make sure your tmp/cache/ dir has 755 (write) permissions
## *** define caching parameters: 1st - allow caching or not, 2nd - caching lifetime in minutes
/// $dgrid->SetCachingParameters(true, 5);
## *** delete all caching pages (only if needed)
/// $dgrid->DeleteCache();
##
## +-- Languages --------------------------------------------------------------+
##  *** set interface language (default - English)
##  *** (ar) - Arabic     (bg) - Bulgarian        (ca) - Catala    (ch) - Chinese
##  *** (cz) - Czech      (da) - Danish           (de) - German    (en) - English
##  *** (es) - Espanol    (fi) - Finnish, Suomi   (fr) - Francais  (gk) - Greek
##  *** (he) - Hebrew     (hr) - Bosnian/Croatian (hu) - Hungarian (it) - Italian
##  *** (ja) - Japanese   (lt) - Lithuanian       (nl) - Netherlands/'Vlaams'(Flemish)
##  *** (pl) - Polish     (pb) - Br.Portuguese    (ro) - Romanian  (ko) - Korean
##  *** (ru) - Russian    (se) - Swedish          (sr) - Serbian   (tr) - Turkish
/// $dg_language = 'en';
/// $dgrid->SetInterfaceLang($dg_language);
##  *** set direction: 'ltr' or 'rtr' (default - 'ltr')
/// $direction = 'ltr';
/// $dgrid->SetDirection($direction);
##
## +-- Layouts, Templates & CSS -----------------------------------------------+
##  *** datagrid layouts: '0' - tabular(horizontal) - default, '1' - columnar(vertical), '2' - customized
##  *** use 'view'=>'0' and 'edit'=>'0' only if you work on the same tables
##  *** filter layouts: '0' - tabular(horizontal) - default, '1' - columnar(vertical), '2' - advanced(inline)
/// $layouts = array('view'=>'0', 'edit'=>'1', 'details'=>'1', 'filter'=>'1');
/// $dgrid->SetLayouts($layouts);
/// *** $mode_template = array('header'=>'', 'body'=>'', 'footer'=>'');
/// @field_name_1@ - field header
/// {field_name_1} - field value
/// [ADD][CREATE][EDIT][DELETE][BACK][CANCEL][UPDATE][MULTIROW_CHECKBOX][ROWS_NUMERATION] - allowed elements and operations (must be placed in $template['body'] only)
/// $view_template = '';
/// $add_edit_template = '';
/// $details_template = array('header'=>'', 'body'=>'', 'footer'=>'');
/// $details_template['header'] = '';
/// $details_template['body'] = '<table><tr><td>{field_name_1}</td><td>{field_name_2}</td></tr><tr><td>[BACK]</td></tr></table>';
/// $details_template['footer'] = '';
/// $dgrid->SetTemplates($view_template, $add_edit_template, $details_template);
##  *** set modes operations ('type' => 'link|button|image')
##  *** 'view' - view mode, 'edit' - add/edit/details modes,
##  *** 'byFieldValue'=>'fieldName' - make the field to be a link to edit mode page
$modes = array(
    'add' => array('view' => false, 'edit' => true, 'type' => 'link', 'show_button' => true, 'show_add_button' => 'outside'),
    'edit' => array('view' => false, 'edit' => true, 'type' => 'link', 'show_button' => true, 'byFieldValue' => ''),
    'details' => array('view' => false, 'edit' => false, 'type' => 'link', 'show_button' => false),
    'delete' => array('view' => true, 'edit' => false, 'type' => 'image', 'show_button' => false)
    //'delete' => array('view' => true, 'edit' => true, 'type' => 'image', 'show_button' => true)
);
$dgrid->SetModes($modes);
##  *** set CSS class for datagrid
##  *** 'default|blue|gray|green|pink|empty|x-blue|x-gray|x-green' or your own css style
$css_class = 'pink';
$dgrid->SetCssClass($css_class);
##  *** set DataGrid caption
//$dg_caption = 'My Favorite Lovely ApPHP DataGrid';
//$dgrid->SetCaption($dg_caption);
##
## +-- Scrolling --------------------------------------------------------------+
##  *** allow scrolling on datagrid
/// $scrolling_option = false;
/// $dgrid->AllowScrollingSettings($scrolling_option);
##  *** set scrolling settings (optional)
/// $scrolling_height = '100px'; /* ex.: '190px' or '190' */
/// $dgrid->SetScrollingSettings($scrolling_height);
##
## +-- Multirow Operations ----------------------------------------------------+
##  *** allow multirow operations
/// $multirow_option = true;
/// $dgrid->AllowMultirowOperations($multirow_option);
/// $multirow_operations = array(
///     'edit'    => array('view'=>true),
///     'details' => array('view'=>true),
///     'clone'   => array('view'=>false),
///     'delete'  => array('view'=>true),
///     'my_operation_name' => array('view'=>true, 'flag_name'=>'my_flag_name', 'flag_value'=>'my_flag_value', 'tooltip'=>'Do something with selected', 'image'=>'image.gif')
/// );
/// $dgrid->SetMultirowOperations($multirow_operations);
##
## +-- Passing parameters & setting up other DataGrids ------------------------+
##  *** set variables that used to get access to the page (like: my_page.php?act=34&id=56 etc.)
/// $http_get_vars = array('act', 'id');
/// $dgrid->SetHttpGetVars($http_get_vars);
##  *** set other datagrid/s unique prefixes (if you use few datagrids on one page)
##  *** format (in which mode to allow processing of another datagrids)
##  *** array('unique_prefix'=>array('view'=>true|false, 'edit'=>true|false, 'details'=>true|false));
/// $anotherDatagrids = array('abcd_'=>array('view'=>true, 'edit'=>true, 'details'=>true));
/// $dgrid->SetAnotherDatagrids($anotherDatagrids);

##  *** set printing option: true(default) or false
$multirow_option = false;
$dgrid->AllowMultirowOperations($multirow_option);
$printing_option = false;
$dgrid->AllowPrinting($printing_option);


## +---------------------------------------------------------------------------+
## | 4. Sorting & Paging Settings:                                             |
## +---------------------------------------------------------------------------+
##  *** set sorting option: true(default) or false
$sorting_option = true;
$dgrid->AllowSorting($sorting_option);
##  *** set paging option: true(default) or false
$paging_option = true;
$rows_numeration = false;
$numeration_sign = 'N #';
$dropdown_paging = false;
$dgrid->AllowPaging($paging_option, $rows_numeration, $numeration_sign, $dropdown_paging);
##  *** set paging settings
$bottom_paging = array('results' => true, 'results_align' => 'left', 'pages' => true, 'pages_align' => 'center', 'page_size' => true, 'page_size_align' => 'right');
$top_paging = array('results' => true, 'results_align' => 'left', 'pages' => true, 'pages_align' => 'center', 'page_size' => true, 'page_size_align' => 'right');
$pages_array = array('10' => '10', '25' => '25', '50' => '50', '100' => '100', '250' => '250', '500' => '500', '1000' => '1000');
$default_page_size = 50;
$paging_arrows = array('first' => '|&lt;&lt;', 'previous' => '&lt;&lt;', 'next' => '&gt;&gt;', 'last' => '&gt;&gt;|');
$dgrid->SetPagingSettings($bottom_paging, $top_paging, $pages_array, $default_page_size, $paging_arrows);

## +---------------------------------------------------------------------------+
## | 6. View Mode Settings:                                                    |
## +---------------------------------------------------------------------------+
##  *** set view mode table properties
$vm_table_properties = array('width' => '100%');
$dgrid->SetViewModeTableProperties($vm_table_properties);
##  *** set columns in view mode
##  *** Ex.: 'on_js_event'=>'onclick="alert(\'Yes!!!\');"'
##  ***      'barchart' : number format in SELECT SQL must be equal with number format of max_value
// $fill_from_array = array('0'=>'Banned', '1'=>'Active', '2'=>'Closed', '3'=>'Removed'); /* as 'value'=>'option' */
$vm_columns = array(
    'id' => array('header' => 'ID', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'serial' => array('header' => ' รหัสสินค้า', 'type' => 'label', 'align' => 'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'product_type_name' => array('header' => ' ประเภทสินค้า', 'type' => 'label', 'align' => 'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'name_th' => array('header' => ' ชื่อสินค้า', 'type' => 'label', 'align' => 'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'brand' => array('header' => ' ยี่ห้อ', 'type' => 'label', 'align' => 'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'model' => array('header' => ' รุ่น', 'type' => 'label', 'align' => 'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'price1' => array('header' => ' ราคาปกติ', 'type' => 'label', 'align' => 'right'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'price2' => array('header' => ' ราคาขายปลีก', 'type' => 'label', 'align' => 'right'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'price3' => array('header' => ' ราคาขายส่ง', 'type' => 'label', 'align' => 'right'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'value' => array('header' => ' หน่วยสินค้า', 'type' => 'label', 'align' => 'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'priority' => array('header' => ' ความสำคัญ', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'p_new' => array('header' => ' มาใหม่', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'p_sellers' => array('header' => ' ขายดี', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'p_recommend' => array('header' => ' แนะนำ', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'p_promotion' => array('header' => ' โปรโมชัน', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'date_create' => array('header' => ' วันที่สร้าง', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'date_stamp' => array('header' => ' วันที่แก้ไข', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'edit_field' => array('header' => ' จัดการข้อมูล', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'delete_field' => array('header' => ' จัดการข้อมูล', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
);
$dgrid->SetColumnsInViewMode($vm_columns);
##  *** set auto-generated columns in view mode
$auto_column_in_view_mode = false;
$dgrid->SetAutoColumnsInViewMode($auto_column_in_view_mode);

$dgrid->SetDgMessages(array(
    'add_success' => '', 'add_error' => '',
    'update_success' => 'การดำเนินการแก้ไขเสร็จเรียบร้อยแล้ว', 'update_error' => '',
    'delete_success' => '', 'delete_error' => ''
));
## +---------------------------------------------------------------------------+
## | 7. Add/Edit/Details Mode settings:                                        |
## +---------------------------------------------------------------------------+
##  ***  set settings for edit/details mode
$table_name = "product";
$primary_key = "id";
$condition = "";
$dgrid->SetTableEdit($table_name, $primary_key, $condition);

$getMode = @$_GET[$unique_prefix . 'mode'];
if ($getMode != 'add' && $getMode != 'edit') {
    ?>
    <br>
    <div style="width: 100%;">
        <div align="right"><p><a href="?f_mode=add&f_rid=-1">เพิ่มสินค้า</a></p></div>
    </div>
    <style>
        .no{
            background-color: red;
        }
        .yes {
            background-color: #008000;
        }
    </style>
<?php
} else {//var_dump($_SERVER['HTTP_HOST']);
    $pathImage = "../images/uploads/products/";
    $urlUpload = strstr($_SERVER['HTTP_HOST'], 'localhost') > -1
        ? 'http://localhost:11001/ateam/web/a-team_web/index.php/upload/do_upload'
        : 'http://latendahouse.com/upload/do_upload';
?>

    <link rel="stylesheet" type="text/css" href="../js/uploadify/uploadify.css"/>
    <script src="../js/jquery-1.9.1.js"></script>
    <script type="text/javascript"
            src="../js/uploadify/jquery.uploadify-3.2.min.js"></script>
    <script>
        var swfPath = "../js/uploadify/uploadify.swf";
        var pathImgUploadTmp = "<?php echo $pathImage;?>";
        var pathUploadify = "<?php echo $urlUpload; ?>";

        $(function () {
            $("#rfyimage_path").hide();
            genUpload("#image_add", "#image_show", "#rfyimage_path");

            $("#wysiwygryydescription").height('500').width(600);
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
                        reloadImage(idReload, data, idSave);
                    }
                }
            });
        }

        function reloadImage(id, img, idSave) {
            var path = pathImgUploadTmp + img;
            $(idSave).val(img);
            $(id).fadeOut().html(getTypeImage(path, "")).fadeIn("slow");
            //$(id).fadeOut().src(path).fadeIn("slow");
        }

        function getTypeImage(src, id) {
            return '<img src="' + src + '" style="width: 250px; height: 190px;"/>';
        }
    </script>
    <?php
}

if ($getMode == 'edit') {
    ?>
    <script>
        $(document).ready(function () {
            //set date stamp
            var d = new Date();
            var strDate = "" + d.getFullYear() + "-" +
                d.getMonth() + "-" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() +
                ":" + d.getSeconds();
            $("#ryydate_stamp").val(strDate);

            //load image for edit
            reloadImage("#image_show", $("#rfyimage_path").val(), "#rfyimage_path");

            //delete
            //$(".pink_dg_a2").remove();
        });
    </script>
<?php
} else {
    ?>
    <script>
        //rfyimage_path
        $(document).ready(function () {
            //$("#rfyimage_path").append('<input type="hidden" id="saveID" />');
            //$('#rfyimage_path').each(function (i) {
                //this.name = this.name.replace(/\d+/, i+1);
                //this.type = "file";
//            });
        });
    </script>
<?php
}
$productID = @$_GET['p_id'];
$sql = "
        SELECT
          id,
          name
        FROM `product_type`
        WHERE 1
        AND `publish` = 1
    ";
$dSet = $dgrid->ExecuteSql($sql);
$arrProductType = array('' => '');
while ($row = $dSet->fetchRow()) {
    $arrProductType[$row[0]] = $row[1];
}
$em_columns = array(
    'product_type_id' => array(
        'header' => ' ประเภทสินค้า', 'type' => 'enum',
        'req_type' => 'rt', 'width' => '215px',
        'title' => 'ประเภทสินค้า', 'readonly' => 'false',
        'maxlength' => '-1', 'default' => empty($productID) ? "" : $productID,
        'unique' => 'false', 'unique_condition' => '',
        'visible' => 'true', 'on_js_event' => '',
        'source' => $arrProductType,
        'view_type' => 'dropdownlist(default)|radiobutton|checkbox',
        'radiobuttons_alignment' => 'horizontal|vertical',
        'multiple' => 'false',
        'multiple_size' => '4'
    ),
    'serial' => array('header' => ' รหัสสินค้า', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '210px',
        'title' => 'รหัสสินค้า', 'readonly' => 'false', 'maxlength' => '15', 'default' => ''),
    'name_th' => array('header' => ' ชื่อภาษาไทย', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '210px',
        'title' => 'ชื่อภาษาไทย', 'readonly' => 'false', 'maxlength' => '50', 'default' => ''),
    'name_en' => array('header' => ' ชื่อภาษาอังกฤษ', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '210px',
        'title' => 'ชื่อภาษาอังกฤษ', 'readonly' => 'false', 'maxlength' => '15', 'default' => ''),
    'price1' => array('header' => ' ราคาปกติ', 'type' => 'textbox', 'req_type' => 'rf', 'width' => '210px',
        'title' => 'ราคาปกติ', 'readonly' => 'false', 'maxlength' => '15', 'default' => ''),
    'price2' => array('header' => ' ราคาขายปลีก', 'type' => 'textbox', 'req_type' => 'rf', 'width' => '210px',
        'title' => 'ราคาขายปลีก', 'readonly' => 'false', 'maxlength' => '15', 'default' => ''),
    'price3' => array('header' => ' ราคาขายส่ง', 'type' => 'textbox', 'req_type' => 'rf', 'width' => '210px',
        'title' => 'ราคาขายส่ง', 'readonly' => 'false', 'maxlength' => '15', 'default' => ''),
    'brand' => array('header' => ' ยี่ห้อ', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '210px',
        'title' => 'ยี่ห้อ', 'readonly' => 'false', 'maxlength' => '50', 'default' => ''),
    'model' => array('header' => ' รุ่น', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '210px',
        'title' => 'รุ่น', 'readonly' => 'false', 'maxlength' => '50', 'default' => ''),
    'value' => array('header' => ' หน่วยสินค้า', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '210px',
        'title' => 'หน่วยสินค้า', 'readonly' => 'false', 'maxlength' => '20', 'default' => ''),
    'priority' => array('header' => ' ความสำคัญ', 'type' => 'textbox', 'req_type' => 'rn', 'width' => '210px',
        'title' => 'ความสำคัญ', 'readonly' => 'false', 'maxlength' => '15', 'default' => '999'),
    'new' => array('header' => ' มาใหม่', 'type' => 'checkbox', 'req_type' => 'st', 'width' => '210px',
        'title' => 'มาใหม่', 'readonly' => 'false', 'maxlength' => '-1', 'default' => '', 'true_value'=>1, 'false_value'=>0),
    'sellers' => array('header' => ' ขายดี', 'type' => 'checkbox', 'req_type' => 'st', 'width' => '210px',
        'title' => 'ขายดี', 'readonly' => 'false', 'maxlength' => '-1', 'default' => '', 'true_value'=>1, 'false_value'=>0),
    'recommend' => array('header' => ' แนะนำ', 'type' => 'checkbox', 'req_type' => 'st', 'width' => '210px',
        'title' => 'แนะนำ', 'readonly' => 'false', 'maxlength' => '-1', 'default' => '', 'true_value'=>1, 'false_value'=>0),
    'promotion' => array('header' => ' โปรโมชัน', 'type' => 'checkbox', 'req_type' => 'st', 'width' => '210px',
        'title' => 'โปรโมชัน', 'readonly' => 'false', 'maxlength' => '-1', 'default' => '', 'true_value'=>1, 'false_value'=>0),
//    'image_path' => array('header' => ' รูปภาพ', 'type' => 'textbox', 'req_type' => 'rf', 'width' => '210px',
//        'title' => 'รูปภาพ', 'readonly' => 'false', 'maxlength' => '15', 'default' => ''),
    'image_path' => array('header' => ' รูปภาพ', 'type' => 'textbox', 'req_type' => 'rf', 'width' => '210px',
        'title' => 'รูปภาพ', 'readonly' => 'false', 'maxlength' => '15', 'default' => '',
        'post_addition' => "<div id='image_show'><img style=\"width: 250px; height: 190px;\" /></div>
        <input type='file' id='image_add' />" ),
    /*'image_path' => array(
        'header' => ' รูปภาพ',
        'type' => 'file',
        'req_type' => 'st',
        'width' => '210px',
        'title' => 'รูปภาพ',
        'readonly' => 'false',
        'maxlength' => '-1',
        'default' => '',
        'unique' => 'false',
        'unique_condition' => '',
        'visible' => 'true',
        'on_js_event' => '',
        'target_path' => '../images/uploads/product/'. date("Y-m-d"),
        'allow_image_updating' => 'false',
        'max_file_size' => '100000|100K|10M|1G',
        'image_width' => '120px',
        'image_height' => '90px',
        'resize_dir' => 'down|up|both',
        'resize_image' => 'false',
        'resize_width' => '',
        'resize_height' => '',
        'magnify' => 'false',
        'magnify_type' => 'popup|magnifier|lightbox',
        'magnify_power' => '2',
        'file_name' => '',
        'host' => 'local|remote',
        'allow_downloading' => 'false',
        'allowed_extensions' => ''),*/
    'description' => array('header' => ' รายละเอียด', 'type' => 'textarea', 'req_type' => 'ry', 'width' => '500px',
        'height' => '600px', 'title' => 'รายละเอียด', 'readonly' => 'false', 'maxlength' => '200', 'default' => '', "edit_type"=>"wysiwyg"),
    'keyword' => array('header' => ' คำค้นหา', 'type' => 'textarea', 'req_type' => 'ry', 'width' => '210px',
        'title' => 'คำค้นหา', 'readonly' => 'false', 'maxlength' => '600', 'default' => '',
        'post_addition' =>"<p style='position: absolute;margin-top: -15px;margin-left: 220px;'>
        <strong>ตัวอย่างเช่น :</strong>ผ้าม่าน, กล้องวงจรปิด</p>"),
    'date_create' => array('header' => ' วันที่สร้าง', 'type' => 'hidden', 'req_type' => 'ry', 'width' => '210px',
        'title' => 'วันที่สร้าง', 'readonly' => 'false', 'maxlength' => '200',
        'default' => date("Y-m-d H:i:s")),
    'date_stamp' => array(
        'header' => ' วันที่แก้ไข', 'type' => 'hidden', 'req_type' => 'ry', 'width' => '210px',
        'title' => 'วันที่แก้ไข', 'readonly' => 'false', 'maxlength' => '200',
        'default' => '0000-00-00 00:00:00')

);
$dgrid->SetColumnsInEditMode($em_columns);
$dgrid->SetAutoColumnsInEditMode(false);

## +---------------------------------------------------------------------------+
## | 8. Bind the DataGrid:                                                     |
## +---------------------------------------------------------------------------+
##  *** set debug mode & messaging options
$dgrid->Bind();
ob_end_flush();
