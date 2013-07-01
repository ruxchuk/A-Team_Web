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
        <div>
            <p>
                &nbsp;&nbsp;&nbsp;<a class="link-page" href="<?php echo $baseUrl; ?>">หน้าแรก</a> /
                <a href="<?php echo $webUrl; ?>ผ้าม่าน"/>ผ้าม่าน</a> /
                <span class="active-page">Curtain&Fabric</span>
            </p>
        </div>

        <?php $this->load->view("curtain/content-curtain");?>
    </td>
<?php
$this->load->view('footer');
?>