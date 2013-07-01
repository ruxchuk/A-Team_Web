<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 29/6/2556
 * Time: 18:21 น.
 * To change this template use File | Settings | File Templates.
 */

$this->load->view('header');
//$this->load->view("slide-index");
$this->load->view("sidebar");

$baseUrl = base_url();
$webUrl = $this->Constant_model->webUrl();
$pathImage = $baseUrl . "web/images/";
$pathImageProduct = $baseUrl . "web/images/uploads/products/";
var_dump($arrData);
?>



<?php
$this->load->view('footer');
?>