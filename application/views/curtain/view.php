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
$pathImageCurtain = $baseUrl . "web/images/uploads/curtain/";
?>

    <td class="maincol">
        <br>
        <div>
            <p>
                &nbsp;&nbsp;&nbsp;<a class="link-page" href="<?php echo $baseUrl; ?>">หน้าแรก</a> /
                <a class="link-page" href="<?php echo $webUrl; ?><?php echo $this->uri->segment(1); ?>">
                    <?php echo $this->uri->segment(1); ?></a> /
                <a class="link-page"
                   href="<?php echo $webUrl; ?><?php echo $this->uri->segment(1) . '/' . $this->uri->segment(2); ?>">
                    <?php echo $this->uri->segment(2); ?></a> /
                <span class="active-page"><?php echo $arrData->name_th; ?></span>
            </p>
        </div>
        <div style="width: 735px; margin-left: 15px;">

            <div><font color="f6448b" size="3">Name TH: </font><span><?php echo $arrData->name_th; ?></span></div><p>
            <div><font color="39C75E" size="3">Name EN: </font><span><?php echo $arrData->name_en; ?></span></div><p>
            <div><font color="red" size="3">Serial No: </font><span><?php echo $arrData->serial; ?></span></div><p>
            <div><font color="6A67E0" size="3">Type: </font><span><?php echo $arrData->type; ?></span></div><p>
            <div><font color="ffeb44" size="3">Design: </font><span><?php echo $arrData->design; ?></span></div><p>
            <div><font color="f04eff" size="3">Location: </font><span><?php echo $arrData->location; ?></span></div><p>
            <table style="width:100%;">
                <tr>
                    <td style="width: 49%">
                        <?php if(!empty($arrData->image_path)):?>
                            <a class="fancybox-click" href="<?php echo $pathImageCurtain. $arrData->image_path; ?>">
                                <img width="100%" title=""
                                     src="<?php echo $pathImageCurtain. $arrData->image_path; ?>"/>
                            </a>
                        <?php else: ?>
                            &nbsp;
                        <?php endif; ?>
                    </td>
                    <td style="width: 2%">&nbsp;</td>
                    <td style="width: 49%">
                        <?php if(!empty($arrData->image_path2)):?>
                            <a class="fancybox-click" href="<?php echo $pathImageCurtain. $arrData->image_path2; ?>">
                                <img width="100%" title=""
                                     src="<?php echo $pathImageCurtain. $arrData->image_path2; ?>"/>
                            </a>
                        <?php else: ?>
                            &nbsp;
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>
    </td>
<?php
$this->load->view('footer');
?>