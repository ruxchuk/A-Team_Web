<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 19/6/2556
 * Time: 12:48 น.
 * To change this template use File | Settings | File Templates.
 */

$this->load->view('header');
//$this->load->view("slide-index");
$this->load->view("sidebar");

$baseUrl = base_url();
$webUrl = $this->Constant_model->webUrl();
$pathImage = $baseUrl . "web/images/";
$pathImageProduct = $baseUrl . "web/images/uploads/products/";
?>

<?php $getHot = $this->uri->segment(1); ?>


    <td class="maincol">

        <div style="margin-left: 15px;">
            <br>
            <table style="width: 100%;">
                <tr>
                    <td></td>
                </tr>
            </table>
        </div>
    </td>
<?php
$this->load->view('footer');
?>