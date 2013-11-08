﻿<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include "header.php";
?>
    <title>หมวดหมู่สินค้า</title>
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
      `category`.*,
       CONCAT('<a title=\"แก้ไขข้อมูล\" href=\"?f_mode=edit&f_rid=', `category`.id, '&f_page_size=50&f_p=1&p_id=',
       category.id, '\"><img src=\"datagrid/styles/pink/images/edit.gif\"/></a>', ' | ',
       '<img title=\"Delete\" style=\"cursor: pointer;\" class=\"img-delete\" alt=\"', category.id, '\"
       src=\"datagrid/styles/pink/images/delete.gif\"/>') AS edit_field
    FROM
      `category`
    WHERE 1
      AND `publish` = 1
";
$default_order = array("`category`.`id`" => "ASC");
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


$arrCatOrder = array(
    1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5
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
    "ID" => array(
        "type" => "textbox",
        "table" => "category",
        "field" => "id",
        "show_operator" => "false",
        "default_operator" => "%like%",
        "case_sensitive" => "false",
        "comparison_type" => "string",
        "width" => "150px",
        "on_js_event" => ""
    ),
    "Name" => array(
        "type" => "textbox",
        "table" => "category",
        "field" => "name",
        "show_operator" => "false",
        "default_operator" => "%like%",
        "case_sensitive" => "false",
        "comparison_type" => "string",
        "width" => "150px",
        "on_js_event" => ""
    ),
    "Parent id" => array(
        "type" => "textbox",
        "table" => "category",
        "field" => "parent_id",
        "show_operator" => "false",
        "default_operator" => "%like%",
        "case_sensitive" => "false",
        "comparison_type" => "string",
        "width" => "150px",
        "on_js_event" => ""
    ),

//    'Parent id' => array(
//        'type' => 'enum',
//        'table' => 'category',
//        'field' => 'parent_id',
//        'filter_condition' => '',
//        'show_operator' => 'false',
//        'default_operator' => '=',
//        'case_sensitive' => 'false',
//        'comparison_type' => 'string|numeric|binary',
//        'width' => '155px', 'on_js_event' => '',
//        'default' => '', 'source' => $arrCatOrder,
//        'view_type' => 'dropdownlist(default)|radiobutton',
//        'field_view' => 'fieldName_2',
//        'order_by_field' => '',
//        'order_type' => 'ASC|DESC',
//        'condition' => '',
//        'show_count' => false, 'multiple' => 'false', 'multiple_size' => '4'),
);
$dgrid->SetFieldsFiltering($filtering_fields);

## +---------------------------------------------------------------------------+
## | 6. View Mode Settings:                                                    |
## +---------------------------------------------------------------------------+
##  *** set view mode table properties
$vm_table_properties = array('width' => '70%');
$dgrid->SetViewModeTableProperties($vm_table_properties);
##  *** set columns in view mode
##  *** Ex.: 'on_js_event'=>'onclick="alert(\'Yes!!!\');"'
##  ***      'barchart' : number format in SELECT SQL must be equal with number format of max_value
// $fill_from_array = array('0'=>'Banned', '1'=>'Active', '2'=>'Closed', '3'=>'Removed'); /* as 'value'=>'option' */
$vm_columns = array(
    'id' => array('header' => 'ID', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'title' => array('header' => ' Name', 'type' => 'label', 'align' => 'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'parent_id' => array('header' => ' Parent id', 'type' => 'label', 'align' => 'right'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'position' => array('header' => ' Position', 'type' => 'label', 'align' => 'right'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    //'order' => array('header' => ' ลำดับหมวดหมู่', 'type' => 'label', 'align' => 'right'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'date_add' => array('header' => ' Date Add', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'date_update' => array('header' => ' Date Update', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'edit_field' => array('header' => ' Modified', 'type' => 'label', 'align' => 'center'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),

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
$table_name = "category";
$primary_key = "id";
$condition = "";
$dgrid->SetTableEdit($table_name, $primary_key, $condition);

$getMode = @$_GET[$unique_prefix . 'mode'];

if ($getMode != 'add' && $getMode != 'edit') {
    ?>
    <br>
    <div style="width: 100%;">
        <div align="right"><p><a href="?f_mode=add&f_rid=-1">เพิ่มหมวดหมู่</a></p></div>
    </div>
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
            $("#ryydate_update").val(strDate);
        });
    </script>
<?php
}
$catID = @$_GET['p_id'];

//get parent
$sql = "
    SELECT
        `id`,
        `title`,
        `parent_id`,
        `position`
    FROM `category`
    WHERE `publish` = 1
    ORDER BY `id`
";
$dSet = $dgrid->ExecuteSql($sql);

function has_children($rows, $id)
{
    foreach ($rows as $row) {
        if ($row['parent_id'] == $id)
            return true;
    }
    return false;
}

function build_menu($rows, $parent = 0)
{
    $result = "<ul>";
    foreach ($rows as $row) {
        if ($row['parent_id'] == $parent) {
            $result .= "
            <li id='$row[id]' data='$row[title]' class='jstree-open'>
            <a href='#'>$row[title]($row[id])</a>
            ";
            if (has_children($rows, $row['id']))
                $result .= build_menu($rows, $row['id']);
            $result .= "</li>";
        }
    }
    $result .= "</ul>";
    return $result;
}
$arrDataCat = array();
while ($row = $dSet->fetchRow()) {
    $arrDataCat[] = array(
      'id' => intval($row[0]),
      'title' => $row[1],
      'parent_id' => intval($row[2]),
      'position' => intval($row[3]),
    );
}
$strCat = build_menu($arrDataCat);
$strCat = "
	<!--<script type=\"text/javascript\" src=\"../plugin/jstree-v.pre1.0/_lib/jquery.js\"></script>
	<script type=\"text/javascript\" src=\"../plugin/jstree-v.pre1.0/_lib/jquery.cookie.js\"></script>
	<script type=\"text/javascript\" src=\"../plugin/jstree-v.pre1.0/_lib/jquery.hotkeys.js\"></script>-->
	<script type=\"text/javascript\" src=\"../plugin/jstree-v.pre1.0/jquery.jstree.js\"></script>
	<link type=\"text/css\" rel=\"stylesheet\" href=\"../plugin/jstree-v.pre1.0/_docs/syntax/!style.css\"/>
	<!--<link type=\"text/css\" rel=\"stylesheet\" href=\"../plugin/jstree-v.pre1.0/_docs/!style.css\"/>
	<script type=\"text/javascript\" src=\"../plugin/jstree-v.pre1.0/_docs/syntax/!script.js\"></script>-->
    <div id=\"cat\" class=\"demo\" style=\"height:200px;\">
    $strCat </div>
    <br>เป็นหมวดหมู่หลัก<input type='checkbox' id='noParent'/>";
$strCat  .= '
<script type="text/javascript">
$(function () {
	$("#cat")
		.jstree({ "plugins" : ["themes","html_data","ui"] })
		// 1) if using the UI plugin bind to select_node
		.bind("select_node.jstree", function (event, data) {
			// `data.rslt.obj` is the jquery extended node that was clicked
			//alert(data.rslt.obj.attr("id"));
                $("#ryyparent_id").val(data.rslt.obj.attr("id"));
                $("#noParent").attr("checked", false);
                //$("#catShow").val(data.rslt.obj.attr("data"));
		})
		// 2) if not using the UI plugin - the Anchor tags work as expected
		//    so if the anchor has a HREF attirbute - the page will be changed
		//    you can actually prevent the default, etc (normal jquery usage)
		.delegate("a", "click", function (event, data) { event.preventDefault(); })
});
$("#noParent").click(function(){
    if ($(this).is(":checked")) {
        $("#ryyparent_id").val(0);
    } else {
        $("#ryyparent_id").val("");
    }
});
</script>
';

$em_columns = array(
//    'level' => array(
//        'header' => ' Level', 'type' => 'enum',
//        'req_type' => 'rt', 'width' => '215px',
//        'title' => ' Level', 'readonly' => 'false',
//        'maxlength' => '-1', 'default' => empty($catID) ? "" : $catID,
//        'unique' => 'false', 'unique_condition' => '',
//        'visible' => 'true',
//        'on_js_event' => "onchange=",
//        'source' => $arrCatOrder,
//        'view_type' => 'dropdownlist(default)|radiobutton|checkbox',
//        'radiobuttons_alignment' => 'horizontal|vertical',
//        'multiple' => 'false',
//        'multiple_size' => '4',
//        'post_addition' => $strCat
//    ),
    'parent_id' => array('header' => ' Parent id', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '210px',
        'title' => 'Parent id', 'readonly' => 'true', 'maxlength' => '50', 'default' => '',
        'post_addition' => $strCat),
    'position' => array('header' => ' Position', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '210px',
        'title' => 'Position', 'readonly' => 'false', 'maxlength' => '50', 'default' => '999'),
    'title' => array('header' => ' Title', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '210px',
        'title' => 'Title', 'readonly' => 'false', 'maxlength' => '50', 'default' => ''),
    'description' => array('header' => ' Description', 'type' => 'textarea', 'req_type' => 's', 'width' => '500px',
        'height' => '600px', 'title' => 'Description', 'readonly' => 'false', 'maxlength' => '200', 'default' => '',
        "edit_type" => ""),
    'date_add' => array('header' => ' วันที่สร้าง', 'type' => 'hidden', 'req_type' => 'ry', 'width' => '210px',
        'title' => 'วันที่สร้าง', 'readonly' => 'false', 'maxlength' => '200',
        'default' => date("Y-m-d H:i:s")),
    'date_update' => array(
        'header' => ' วันที่แก้ไข', 'type' => 'hidden', 'req_type' => 'ry', 'width' => '210px',
        'title' => 'วันที่แก้ไข', 'readonly' => 'false', 'maxlength' => '200',
        'default' => '0000-00-00 00:00:00'),
);
$dgrid->SetColumnsInEditMode($em_columns);
$dgrid->SetAutoColumnsInEditMode(false);

## +---------------------------------------------------------------------------+
## | 8. Bind the DataGrid:                                                     |
## +---------------------------------------------------------------------------+
##  *** set debug mode & messaging options
$dgrid->Bind();
ob_end_flush();