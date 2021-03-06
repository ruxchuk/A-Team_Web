﻿<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include "header.php";
?>
    <title>Curtain</title>
<?php
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
      `curtain`.*,
       CONCAT('<a title=\"แก้ไขข้อมูล\" href=\"?f_mode=edit&f_rid=', `curtain`.id, '&f_page_size=50&f_p=1&p_id=',
       0, '\"><img src=\"datagrid/styles/pink/images/edit.gif\"/></a>', ' | ',
       '<img title=\"Delete\" style=\"cursor: pointer;\" class=\"img-delete\" alt=\"', curtain.id, '\"
       src=\"datagrid/styles/pink/images/delete.gif\"/>') AS edit_field,
       '' AS add_image
    FROM
      `curtain`
    WHERE `curtain`.`deleted` = 1
";
$default_order = array("`curtain`.`priority`" => "ASC");
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
$css_class = 'x-gray';
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

$arrCurtainType = array(
    '' => '',
    'curtain-fabric' => "Curtain & Fabric",
    'wall-paper' => "Wall Paper",
    'roller-blind' => "Roller Blind",
    'venetian-blind' => "Venetian Blind",
    'furniture-built-in' => "Furniture Built In",
);

## +---------------------------------------------------------------------------+
## | 5. Filter Settings:                                                       |
## +---------------------------------------------------------------------------+
##  *** set filtering option: true or false(default)
$filtering_option = true;
$show_search_type = false;
$dgrid->AllowFiltering($filtering_option, $show_search_type);
##  *** set additional filtering settings
$filtering_fields = array(
    "Serial No" => array(
        "type" => "textbox",
        "table" => "curtain",
        "field" => "serial",
        "show_operator" => "false",
        "default_operator" => "%like%",
        "case_sensitive" => "false",
        "comparison_type" => "string",
        "width" => "150px",
        "on_js_event" => ""
    ),
    "ประเภทผ้าม่าน" => array(
        "type" => "enum",
        "table" => "curtain",
        "field" => "name_en",
        "show_operator" => "false",
        "default_operator" => "%like%",
        "case_sensitive" => "false",
        "comparison_type" => "string",
        "width" => "150px",
        "on_js_event" => "",
        'source'=> $arrCurtainType
    ),
    "Name" => array(
        "type" => "textbox",
        "table" => "curtain",
        "field" => "name_th",
        "show_operator" => "false",
        "default_operator" => "%like%",
        "case_sensitive" => "false",
        "comparison_type" => "string",
        "width" => "150px",
        "on_js_event" => ""
    ),
    "Type" => array(
        "type" => "textbox",
        "table" => "curtain",
        "field" => "brand",
        "show_operator" => "false",
        "default_operator" => "%like%",
        "case_sensitive" => "false",
        "comparison_type" => "string",
        "width" => "150px",
        "on_js_event" => ""
    ),
    "Design" => array(
        "type" => "textbox",
        "table" => "curtain",
        "field" => "model",
        "show_operator" => "false",
        "default_operator" => "%like%",
        "case_sensitive" => "false",
        "comparison_type" => "string",
        "width" => "150px",
        "on_js_event" => ""
    ),
    "Location" => array(
        "type" => "textbox",
        "table" => "curtain",
        "field" => "value",
        "show_operator" => "false",
        "default_operator" => "%like%",
        "case_sensitive" => "false",
        "comparison_type" => "string",
        "width" => "150px",
        "on_js_event" => ""
    ),

);
$dgrid->SetFieldsFiltering($filtering_fields);


## +---------------------------------------------------------------------------+
## | 6. View Mode Settings:                                                    |
## +---------------------------------------------------------------------------+
##  *** set view mode table properties
//$vm_table_properties = array('width' => '100%');
$vm_table_properties = array("width" => "85%");
$dgrid->SetViewModeTableProperties($vm_table_properties);
##  *** set columns in view mode
##  *** Ex.: 'on_js_event'=>'onclick="alert(\'Yes!!!\');"'
##  ***      'barchart' : number format in SELECT SQL must be equal with number format of max_value
// $fill_from_array = array('0'=>'Banned', '1'=>'Active', '2'=>'Closed', '3'=>'Removed'); /* as 'value'=>'option' */
$vm_columns = array(
    'id' => array('header' => 'ID', 'type' => 'label', 'align' => 'center'),
    'serial' => array('header' => ' Serial No', 'type' => 'label', 'align' => 'left'),
    'curtain_type' => array('header' => ' หมวดผ้าม่าน', 'type' => 'label', 'align' => 'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'name_th' => array('header' => ' Name TH', 'type' => 'label', 'align' => 'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'name_en' => array('header' => ' Name EN', 'type' => 'label', 'align' => 'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'type' => array('header' => ' Type', 'type' => 'label', 'align' => 'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'design' => array('header' => ' Design', 'type' => 'label', 'align' => 'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'location' => array('header' => ' Location', 'type' => 'label', 'align' => 'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
//    'price1' => array('header' => ' ราคาปกติ', 'type' => 'label', 'align' => 'right'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
//    'price2' => array('header' => ' ราคาขายปลีก', 'type' => 'label', 'align' => 'right'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
//    'price3' => array('header' => ' ราคาขายส่ง', 'type' => 'label', 'align' => 'right'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'priority' => array('header' => ' ความสำคัญ', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
//    'p_new' => array('header' => ' มาใหม่', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
//    'p_sellers' => array('header' => ' ขายดี', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
//    'p_recommend' => array('header' => ' แนะนำ', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
//    'p_promotion' => array('header' => ' โปรโมชัน', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
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
    'add_success' => 'เพิ่มข้อมูลเรียบร้อยแล้ว',
    'add_error' => 'คุณได้ทำการ save แล้ว หรือเก็ดข้อผิดพลาดบางประการ',
    'update_success' => 'แก้ไขเสร็จเรียบร้อยแล้ว',
    'update_error' => 'คุณได้ทำการ save แล้ว หรือเก็ดข้อผิดพลาดบางประการ',
    'delete_success' => 'ทำการลบสำเร็จแล้ว',
    'delete_error' => 'ไม่สามารถลบ ข้อมูลได้'
));
## +---------------------------------------------------------------------------+
## | 7. Add/Edit/Details Mode settings:                                        |
## +---------------------------------------------------------------------------+
##  ***  set settings for edit/details mode
$table_name = "curtain";
$primary_key = "id";
$condition = "";
$dgrid->SetTableEdit($table_name, $primary_key, $condition);

$getMode = @$_GET[$unique_prefix . 'mode'];
$userID = @$_SESSION['userdata']['id'];
if ($getMode != 'add' && $getMode != 'edit') {
    ?>
    <br>
    <div style="width: 100%;">
        <div align="right"><p><a href="?f_mode=add&f_rid=-1">Add</a></p></div>
    </div>
    <style>
        .no {
            background-color: red;
        }

        .yes {
            background-color: #008000;
        }
    </style>
<?php
} else { //var_dump($_SERVER['HTTP_HOST']);
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
            //genUpload("#image_add", "#image_show", "#rfyimage_path");

            $("#wysiwygryydescription").height('500').width(600);
        });

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
            $("#ryyuser_update").val('<?php echo $userID; ?>');

            //load image for edit
            reloadImage("#image_show", $("#rfyimage_path").val(), "#rfyimage_path");

            //delete
            //$(".pink_dg_a2").remove();
        });
    </script>
<?php
} else {
    ?>

<?php
}
$productID = @$_GET['p_id'];

//get last serial
$sql = "
    SELECT `serial` FROM `curtain`
    WHERE deleted = 1
    ORDER BY `id` DESC
    LIMIT 1;
";
$dSet = $dgrid->ExecuteSql($sql);
$serialID = "0";
while ($row = $dSet->fetchRow()) {
    $serialID = $row[0];
}
if ($serialID != "0") {
    $serialID = str_replace('DC', '', $serialID);
}
$format = 'DC%1$06d';
$serialID = sprintf($format, intval($serialID) + 1);

$imageName = 'La_Tenda_House-' . date('YmdHis');
$date = date('Y-m-d');
$imagePathUpload = "../images/uploads/curtain/";
$imgWidth = "2048px";
$imgHeight = "1536px";
$imgMaxSize = "3072k";
$resizeImage = 'true';

//$imagePathUpload = "../images/uploads/curtain/";
$em_columns = array(
    'curtain_type' => array(
        'header' => ' หมวดผ้าม่าน', 'type' => 'enum',
        'req_type' => 'rt', 'width' => '300px',
        'title' => ' หมวดผ้าม่าน', 'readonly' => 'false',
        'maxlength' => '-1', 'default' => '',
        'unique' => 'false', 'unique_condition' => '',
        'visible' => 'true', 'on_js_event' => '',
        'source' => $arrCurtainType,
        'view_type' => 'dropdownlist(default)|radiobutton|checkbox',
        'radiobuttons_alignment' => 'horizontal|vertical',
        'multiple' => 'false',
        'multiple_size' => '4'
    ),
    'serial' => array('header' => ' Serial No', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '300px',
        'title' => 'Serial No', 'readonly' => 'false', 'maxlength' => '15', 'default' => $serialID),
    'name_th' => array('header' => ' Name TH', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '300px',
        'title' => 'Name TH', 'readonly' => 'false', 'maxlength' => '50', 'default' => ''),
    'name_en' => array('header' => ' Name EN', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '300px',
        'title' => 'Name EN', 'readonly' => 'false', 'maxlength' => '50', 'default' => ''),
    'type' => array('header' => ' Type', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '300px',
        'title' => 'Type', 'readonly' => 'false', 'maxlength' => '50', 'default' => ''),
    'design' => array('header' => ' Design', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '300px',
        'title' => 'Design', 'readonly' => 'false', 'maxlength' => '50', 'default' => ''),
    'location' => array('header' => ' Location', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '300px',
        'title' => 'Location', 'readonly' => 'false', 'maxlength' => '20', 'default' => ''),
    'price' => array('header' => ' Price', 'type' => 'textbox', 'req_type' => 'rf', 'width' => '300px',
        'title' => 'Location', 'readonly' => 'false', 'maxlength' => '20', 'default' => '0'),
    'priority' => array('header' => ' ความสำคัญ', 'type' => 'textbox', 'req_type' => 'rn', 'width' => '300px',
        'title' => 'ความสำคัญ', 'readonly' => 'false', 'maxlength' => '15', 'default' => '999'),
//    'image_path' => array('header' => ' รูปภาพ', 'type' => 'textbox', 'req_type' => 'rf', 'width' => '300px',
//        'title' => 'รูปภาพ', 'readonly' => 'false', 'maxlength' => '15', 'default' => ''),
//    'image_path' => array('header' => ' รูปภาพ', 'type' => 'textbox', 'req_type' => 'rf', 'width' => '300px',
//        'title' => 'รูปภาพ', 'readonly' => 'false', 'maxlength' => '15', 'default' => '',
//        'post_addition' => "<div id='image_show'><img style=\"width: 250px; height: 190px;\" /></div>
//        <input type='file' id='image_add' />"),

    'image_path' => array(
        'header' => 'รูปภาพ 1', 'type' => 'image',
        'req_type' => 'rt', 'width' => '210px', 'title' => '',
        'readonly' => 'false', 'maxlength' => '-1', 'default' => '',
        'unique' => 'false', 'unique_condition' => '', 'visible' => 'true',
        'on_js_event' => '', 'target_path' => $imagePathUpload,
        'allow_image_updating' => 'false', 'max_file_size' => $imgMaxSize, 'image_width' => '120px',
        'image_height' => '90px', 'resize_dir' => 'down|up|both', 'resize_image' => $resizeImage,
        'resize_width' => $imgWidth, 'resize_height' => $imgHeight, 'magnify' => 'true', 'magnify_type' => 'magnifier',
        'magnify_power' => '2', 'file_name' => $imageName . "_1",
        'host' => 'local|remote', 'allow_downloading' => 'false', 'allowed_extensions' => ''
    ),
    'image_path2' => array(
        'header' => 'รูปภาพ 2', 'type' => 'image',
        'req_type' => 'st', 'width' => '210px', 'title' => '',
        'readonly' => 'false', 'maxlength' => '-1', 'default' => '',
        'unique' => 'false', 'unique_condition' => '', 'visible' => 'true',
        'on_js_event' => '', 'target_path' => $imagePathUpload,
        'allow_image_updating' => 'false', 'max_file_size' => $imgMaxSize, 'image_width' => '120px',
        'image_height' => '90px', 'resize_dir' => 'down|up|both', 'resize_image' => $resizeImage,
        'resize_width' => $imgWidth, 'resize_height' => $imgHeight, 'magnify' => 'true', 'magnify_type' => 'magnifier',
        'magnify_power' => '2', 'file_name' => $imageName . "_2",
        'host' => 'local|remote', 'allow_downloading' => 'false', 'allowed_extensions' => ''
    ),
    'image_path3' => array(
        'header' => 'รูปภาพ 3', 'type' => 'image',
        'req_type' => 'st', 'width' => '210px', 'title' => '',
        'readonly' => 'false', 'maxlength' => '-1', 'default' => '',
        'unique' => 'false', 'unique_condition' => '', 'visible' => 'true',
        'on_js_event' => '', 'target_path' => $imagePathUpload,
        'allow_image_updating' => 'false', 'max_file_size' => $imgMaxSize, 'image_width' => '120px',
        'image_height' => '90px', 'resize_dir' => 'down|up|both', 'resize_image' => $resizeImage,
        'resize_width' => $imgWidth, 'resize_height' => $imgHeight, 'magnify' => 'true', 'magnify_type' => 'magnifier',
        'magnify_power' => '2', 'file_name' => $imageName . "_3",
        'host' => 'local|remote', 'allow_downloading' => 'false', 'allowed_extensions' => ''
    ),
    'image_path4' => array(
        'header' => 'รูปภาพ 4', 'type' => 'image',
        'req_type' => 'st', 'width' => '210px', 'title' => '',
        'readonly' => 'false', 'maxlength' => '-1', 'default' => '',
        'unique' => 'false', 'unique_condition' => '', 'visible' => 'true',
        'on_js_event' => '', 'target_path' => $imagePathUpload,
        'allow_image_updating' => 'false', 'max_file_size' => $imgMaxSize, 'image_width' => '120px',
        'image_height' => '90px', 'resize_dir' => 'down|up|both', 'resize_image' => $resizeImage,
        'resize_width' => $imgWidth, 'resize_height' => $imgHeight, 'magnify' => 'true', 'magnify_type' => 'magnifier',
        'magnify_power' => '2', 'file_name' => $imageName . "_4",
        'host' => 'local|remote', 'allow_downloading' => 'false', 'allowed_extensions' => ''
    ),
    'image_path5' => array(
        'header' => 'รูปภาพ 5', 'type' => 'image',
        'req_type' => 'st', 'width' => '210px', 'title' => '',
        'readonly' => 'false', 'maxlength' => '-1', 'default' => '',
        'unique' => 'false', 'unique_condition' => '', 'visible' => 'true',
        'on_js_event' => '', 'target_path' => $imagePathUpload,
        'allow_image_updating' => 'false', 'max_file_size' => $imgMaxSize, 'image_width' => '120px',
        'image_height' => '90px', 'resize_dir' => 'down|up|both', 'resize_image' => $resizeImage,
        'resize_width' => $imgWidth, 'resize_height' => $imgHeight, 'magnify' => 'true', 'magnify_type' => 'magnifier',
        'magnify_power' => '2', 'file_name' => $imageName . "_5",
        'host' => 'local|remote', 'allow_downloading' => 'false', 'allowed_extensions' => ''
    ),
    'image_path6' => array(
        'header' => 'รูปภาพ 6', 'type' => 'image',
        'req_type' => 'st', 'width' => '210px', 'title' => '',
        'readonly' => 'false', 'maxlength' => '-1', 'default' => '',
        'unique' => 'false', 'unique_condition' => '', 'visible' => 'true',
        'on_js_event' => '', 'target_path' => $imagePathUpload,
        'allow_image_updating' => 'false', 'max_file_size' => $imgMaxSize, 'image_width' => '120px',
        'image_height' => '90px', 'resize_dir' => 'down|up|both', 'resize_image' => $resizeImage,
        'resize_width' => $imgWidth, 'resize_height' => $imgHeight, 'magnify' => 'true', 'magnify_type' => 'magnifier',
        'magnify_power' => '2', 'file_name' => $imageName . "_6",
        'host' => 'local|remote', 'allow_downloading' => 'false', 'allowed_extensions' => ''
    ),
    'image_path7' => array(
        'header' => 'รูปภาพ 7', 'type' => 'image',
        'req_type' => 'st', 'width' => '210px', 'title' => '',
        'readonly' => 'false', 'maxlength' => '-1', 'default' => '',
        'unique' => 'false', 'unique_condition' => '', 'visible' => 'true',
        'on_js_event' => '', 'target_path' => $imagePathUpload,
        'allow_image_updating' => 'false', 'max_file_size' => $imgMaxSize, 'image_width' => '120px',
        'image_height' => '90px', 'resize_dir' => 'down|up|both', 'resize_image' => $resizeImage,
        'resize_width' => $imgWidth, 'resize_height' => $imgHeight, 'magnify' => 'true', 'magnify_type' => 'magnifier',
        'magnify_power' => '2', 'file_name' => $imageName . "_7",
        'host' => 'local|remote', 'allow_downloading' => 'false', 'allowed_extensions' => ''
    ),
    'image_path8' => array(
        'header' => 'รูปภาพ 8', 'type' => 'image',
        'req_type' => 'st', 'width' => '210px', 'title' => '',
        'readonly' => 'false', 'maxlength' => '-1', 'default' => '',
        'unique' => 'false', 'unique_condition' => '', 'visible' => 'true',
        'on_js_event' => '', 'target_path' => $imagePathUpload,
        'allow_image_updating' => 'false', 'max_file_size' => $imgMaxSize, 'image_width' => '120px',
        'image_height' => '90px', 'resize_dir' => 'down|up|both', 'resize_image' => $resizeImage,
        'resize_width' => $imgWidth, 'resize_height' => $imgHeight, 'magnify' => 'true', 'magnify_type' => 'magnifier',
        'magnify_power' => '2', 'file_name' => $imageName . "_8",
        'host' => 'local|remote', 'allow_downloading' => 'false', 'allowed_extensions' => ''
    ),

    'description' => array('header' => ' รายละเอียด', 'type' => 'textarea', 'req_type' => 'ry', 'width' => '500px',
        'height' => '600px', 'title' => 'รายละเอียด', 'readonly' => 'false', 'maxlength' => '200', 'default' => '',
        "edit_type" => "wysiwyg"),
    'keyword' => array('header' => ' คำค้นหา', 'type' => 'textarea', 'req_type' => 'ry', 'width' => '300px',
        'title' => 'คำค้นหา', 'readonly' => 'false', 'maxlength' => '600', 'default' => '',
        'post_addition' => "<br><p>
        <strong style='color: red;'>ตัวอย่างเช่น :</strong>ผ้าม่าน, กล้องวงจรปิด</p>"),
    'date_create' => array('header' => ' วันที่สร้าง', 'type' => 'hidden', 'req_type' => 'ry', 'width' => '300px',
        'title' => 'วันที่สร้าง', 'readonly' => 'false', 'maxlength' => '200',
        'default' => date("Y-m-d H:i:s")),
    'date_stamp' => array(
        'header' => ' วันที่แก้ไข', 'type' => 'hidden', 'req_type' => 'ry', 'width' => '300px',
        'title' => 'วันที่แก้ไข', 'readonly' => 'false', 'maxlength' => '200',
        'default' => '0000-00-00 00:00:00'),
    'user_create' => array(
        'header' => ' user create', 'type' => 'hidden', 'req_type' => 'ry', 'width' => '300px',
        'readonly' => 'false', 'default' => $userID),
    'user_update' => array(
        'header' => ' user create', 'type' => 'hidden', 'req_type' => 'ry', 'width' => '300px',
        'readonly' => 'false', 'default' => "0"),
    'slide_main' => array('header' => ' Show Slide', 'type' => 'checkbox', 'req_type' => 'st',
        'title' => 'Show Slide', 'readonly' => 'false', 'maxlength' => '-1', 'default' => '',
        'true_value' => 1, 'false_value' => 0
    ),

);
$dgrid->SetColumnsInEditMode($em_columns);
$dgrid->SetAutoColumnsInEditMode(false);

## +---------------------------------------------------------------------------+
## | 8. Bind the DataGrid:                                                     |
## +---------------------------------------------------------------------------+
##  *** set debug mode & messaging options
$dgrid->Bind();
ob_end_flush();
