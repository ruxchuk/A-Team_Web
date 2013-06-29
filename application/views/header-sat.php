<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 2/5/2556
 * Time: 16:23 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();
$webUrl = $this->Constant_model->webUrl();
$pathIconNew = $baseUrl . "web/images/icon_new.gif";
$pathSellers = $baseUrl . "web/images/icon_hot.gif";
$pathRecommend = $baseUrl . "web/images/icon_recommence.gif";
$pathPromotion = $baseUrl . "web/images/icon_promotion.gif";

//$webUrl = strstr($_SERVER['HTTP_HOST'], 'localhost') > -1 ? 'index.php/' : base_url();
?>
<?php
$urlImageHeader = $baseUrl . "web/images/header-sat.png";
?>

<!--begin header-->
<div id="header">
    <img src="<?php echo $urlImageHeader; ?>"
         border="0" alt="" id="logo" class="png"/>
</div>
<style>
    #header {
        height: 275px;
    !important
    }

    #header img {
        height: 310px;
    !important
    }

    .link-menu {
        margin-left: 25px;
    }

    .link-menu a, .link-menu, #contact-sat, #contact-sat a {
        /*color: #1780CD;*/
    }
    .link, .link-menu, #contact-sat, #contact-sat a {
        color: #1780CD;
    }
</style>
<!--end header-->

<div id="main-shadow">
    <div id="main-shadow2">
        <div class="side-shadow1">
            <div class="side-shadow2">
                <div id="iefix">
                    <table height="50">
                        <tr valign="top">
                            <td width="620">
                                <div class="link-menu">
                                    <a class="<?php echo $selectBar == 'index'?'link-active':'link'; ?>" href="<?php echo $baseUrl; ?>">Home</a> |
                                    <a class="<?php echo $selectBar == 'ผ้าม่าน'?'link-active':'link'; ?>" href="<?php echo $webUrl; ?>ผ้าม่าน">Curtain</a> |
                                    <a class="<?php echo $selectBar == 'สินค้า'?'link-active':'link'; ?>" href="<?php echo $webUrl; ?>สินค้า">Product</a> |
                                    <a class="<?php echo $selectBar == 'contactus'?'link-active':'link'; ?>" href="<?php echo $webUrl; ?>ติดต่อเรา">Contact Us</a> |
                                    <a class="<?php echo $selectBar == 'เกี่ยวกับเรา'?'link-active':'link'; ?>" href="#">About Us</a>
                                </div>
                            </td>
                            <td width="80">
                                <div id="content-logo">
                                    <a class="img-opacity" href="http://latendahouse.com/index/openWeb/47" target="_blank">
                                        <img src="
                                <?php echo $baseUrl; ?>web/images/logo-facebook.png"
                                             title="ไปยังหน้าแฟนเพจ"
                                             width="90" height="50"/>
                                    </a>
                                </div>
                            </td>
                            <td width="100">
                                <div id="contact-facebook">
                                    <iframe
                                        src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Flatenda.page&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=true&amp;font=tahoma&amp;colorscheme=dark&amp;action=like&amp;height=21"
                                        scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                                </div>
                            </td>
                            <td>
                                <table id="content-call">
                                    <tr>
                                        <td><img src="<?php echo $baseUrl; ?>web/images/call.png" width="30"
                                                 height="30"/></td>
                                        <td>
                            <span id="contact-sat">089 645 7911, 02 567 8910<br>
                                <a href="mailto:latendahouse@gmail.com">latendahouse@gmail.com</a>
                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>