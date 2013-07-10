<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 23/5/2556
 * Time: 14:45 น.
 * To change this template use File | Settings | File Templates.
 */

if ($_POST) {
    if ($_POST['type_post'] == 'md5') {
        echo md5($_POST['password']);
        exit();
    }
}
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

/*$sql = "
    SELECT
     `member`.*,
  `member_type`.`name` as member_type_name,
       CONCAT('<a title=\"แก้ไขข้อมูล\" href=\"?f_mode=edit&f_rid=', `member`.id, '&f_page_size=50&f_p=1&p_id=',
       `member`.id, '\"><img src=\"datagrid/styles/pink/images/edit.gif\"/></a>', ' | ',
       '<img title=\"Delete\" style=\"cursor: pointer;\"
       onclick=\"javascript:f_verifyDelete(',
       \"'\", `member`.id, \"', '&f_page_size=50&f_p=1');\", '\"',
       ' src=\"datagrid/styles/pink/images/delete.gif\"/>' , ' | ', '<a href=\"?edit_pass=1&f_mode=edit&f_rid=', `member`.id, '\">Edit Password</a>'
       ) AS edit_field
    FROM `member`
    INNER JOIN `member_type` ON (
    `member`.`member_type_id` = `member_type`.`id`
    )
    WHERE 1
    AND `member`.`publish` = 1
    AND `member`.id != 1
";*/
$sql = "
    SELECT
     `member`.*,
  `member_type`.`name` as member_type_name,
       CONCAT('<a title=\"แก้ไขข้อมูล\" href=\"?f_mode=edit&f_rid=', `member`.id, '&f_page_size=50&f_p=1&p_id=',
       `member`.id, '\"><img src=\"datagrid/styles/pink/images/edit.gif\"/></a>', ' | ',
       '<img title=\"Delete\" style=\"cursor: pointer;\" class=\"img-delete\" alt=\"', member.id, '\"
       src=\"datagrid/styles/pink/images/delete.gif\"/>' ,
       ' | ', '<a href=\"?edit_pass=1&f_mode=edit&f_rid=', `member`.id, '\">Edit Password</a>'
       ) AS edit_field
    FROM `member`
    INNER JOIN `member_type` ON (
    `member`.`member_type_id` = `member_type`.`id`
    )
    WHERE 1
    AND `member`.`publish` = 1
    AND `member`.id != 1
";
$default_order = array("`id`" => "ASC");
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
$css_class = 'x-green';
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



$sql = "
    SELECT
      id,
      name
    FROM `member_type`
    WHERE 1
";
$dSet = $dgrid->ExecuteSql($sql);
$arrMemberType = array('' => '');
while ($row = $dSet->fetchRow()) {
    $arrMemberType[$row[0]] = $row[1];
}

## +---------------------------------------------------------------------------+
## | 5. Filter Settings:                                                       |
## +---------------------------------------------------------------------------+
##  *** set filtering option: true or false(default)
$filtering_option = true;
$show_search_type = false;
$dgrid->AllowFiltering($filtering_option, $show_search_type);
##  *** set additional filtering settings
$filtering_fields = array(
    "ชื่อ" => array(
        "type" => "textbox",
        "table" => "member",
        "field" => "name",
        "show_operator" => "false",
        "default_operator" => "%like%",
        "case_sensitive" => "false",
        "comparison_type" => "string",
        "width" => "150px",
        "on_js_event" => ""
    ),
    "Email" => array(
        "type" => "textbox",
        "table" => "member",
        "field" => "email",
        "show_operator" => "false",
        "default_operator" => "%like%",
        "case_sensitive" => "false",
        "comparison_type" => "string",
        "width" => "150px",
        "on_js_event" => ""
    ),
    "ประเภทสมาชิก" => array(
        "type" => "enum",
        "table" => "member",
        "field" => "member_type_id",
        "show_operator" => "false",
        "default_operator" => "%like%",
        "case_sensitive" => "false",
        "comparison_type" => "string",
        "width" => "150px",
        "on_js_event" => "",
        'source'=> $arrMemberType
    ),

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
    'name' => array('header' => ' ชื่อ', 'type' => 'label', 'align' => 'left', 'width' => '200px'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'user_name' => array('header' => ' User Name', 'type' => 'label', 'align' => 'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'email' => array('header' => ' อีเมล', 'type' => 'label', 'align' => 'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'member_type_name' => array('header' => ' ประเภทสมาชิก', 'type' => 'label', 'align' => 'left', 'width' => '90px'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
    'edit_field' => array('header' => ' จัดการข้อมูล', 'type' => 'label', 'align' => 'center', 'width' => '200px'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
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
$table_name = "member";
$primary_key = "id";
$condition = "";
$dgrid->SetTableEdit($table_name, $primary_key, $condition);

$getMode = @$_GET[$unique_prefix . 'mode'];
$getEditPass = @$_GET['edit_pass'];
if ($getMode != 'add' && $getMode != 'edit') {
    ?>
    <br>
    <div style="width: 100%;">
        <div align="right"><p><a href="?f_mode=add&f_rid=-1">เพิ่ม สมาชิก</a></p></div>
    </div>
    <script>
        $(document).ready(function () {
            $("#f_frmEditRow").submit(function () {
            });
        })
    </script>
<?php
} else if ($getMode == "edit") {
    ?>
    <script>
        $(document).ready(function () {
            //set date stamp
            var d = new Date();
            var strDate = "" + d.getFullYear() + "-" +
                (d.getMonth() + 1) + "-" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() +
                ":" + d.getSeconds();
            $("#ryydate_update").val(strDate);
        });
    </script>
<?php
}
?>
<script>
    $(document).ready(function () {
        $('a').each(function(){
            if (this.title == 'Update record' || this.title == 'Create new record') {
                $(this).attr('id', 'button-submit');
            }
        });
        $("#button-submit").click(function(){
            if ($("#rpypassword").val().length < 6) {
                alert('Password ต้องมี 6 ตัวขึ้นไป');
            }else {
                $.post("member.php", {
                        password: $("#rpypassword").val(),
                        type_post: "md5"
                    },
                    function(result1){
                        $.post(webLogsUrl, {
                                table: table,
                                id: '<?php echo @$_GET['f_rid']; ?>',
                                detail: "edit_data;user_name=" + userName + ";" +
                                    "user_id=" + userID
                            },
                            function(result2){
                                $("#rpypassword").hide();
                                $("#rpypassword").val(result1);
                                f_sendEditFields();
                            }
                        );
                    }
                );
            }
            return false;
        });
    });
</script>
<?php
$arrayPassword = array(
    'header' => 'Password', 'type' => 'password', 'req_type' => 'rp', 'width' => '250px',
    'title' => '', 'readonly' => 'false', 'maxlength' => '-1', 'default' => '',
    'unique' => 'false', 'unique_condition' => '', 'visible' => 'true', 'on_js_event' => '',
    'hide' => 'false', 'generate' => 'true', 'cryptography' => 'true', 'cryptography_type' => 'md5',
    'aes_password' => 'aes_password', "post_addition" => " <font color=\"#cd0000\">ต้องมี 6 ตัวขึ้นไป</font>"
);

$em_columns = $getEditPass == '1' ? array(
    'password' => $arrayPassword,
    'date_update' => array(
        'header' => ' วันที่แก้ไข', 'type' => 'hidden', 'req_type' => 'ry', 'width' => '210px',
        'title' => 'วันที่แก้ไข', 'readonly' => 'false', 'maxlength' => '200',
        'default' => '0000-00-00 00:00:00'),
) :
    array(
        'name' => array('header' => ' ชื่อ', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '250px',
            'title' => 'ชื่อ', 'readonly' => 'false', 'maxlength' => '100', 'default' => ''),
        'user_name' => array('header' => ' User Name', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '250px',
            'title' => 'User Name', 'readonly' => 'false', 'maxlength' => '100', 'default' => ''),

        'password' => $getMode == 'add' ? $arrayPassword :array('type' => 'hidden'),

        'email' => array('header' => ' อีเมล', 'type' => 'textbox', 'req_type' => '', 'width' => '250px',
            'title' => 'อีเมล', 'readonly' => 'false', 'maxlength' => '100', 'default' => ''),
        'phone' => array('header' => ' เบอร์โทร', 'type' => 'textbox', 'req_type' => '', 'width' => '250px',
            'title' => 'เบอร์โทร', 'readonly' => 'false', 'maxlength' => '100', 'default' => ''),
        'address' => array('header' => ' ที่อยู่', 'type' => 'textbox', 'req_type' => '', 'width' => '250px',
            'title' => 'ที่อยู่', 'readonly' => 'false', 'maxlength' => '100', 'default' => ''),
        'permission_price' => array('header' => ' สิทธิ์การเห็นราคา', 'type' => 'textbox', 'req_type' => 'ry', 'width' => '250px',
            'title' => 'สิทธิ์การเห็นราคา', 'readonly' => 'false', 'maxlength' => '100', 'default' => '',
            "post_addition" => " ตัวอย่างเช่น \"1|2|3\""),
        'member_type_id' => array('header' => ' ประเภทสมาชิก', 'type' => 'enum', 'req_type' => 'ry', 'width' => '250px',
            'title' => 'ประเภทสมาชิก', 'readonly' => 'false', 'maxlength' => '100', 'default' => '',
            "source" => $arrMemberType),
        'date_create' => array('header' => ' วันที่สร้าง', 'type' => 'hidden', 'req_type' => 'ry', 'width' => '210px',
            'title' => 'วันที่สร้าง', 'readonly' => 'false', 'maxlength' => '200',
            'default' => $getMode == 'edit' ? '' : date("Y-m-d H:i:s")),
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