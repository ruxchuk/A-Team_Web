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

<!--begin header-->
<?php
$urlImageHeader = "";
$setImageHeader = empty($setImageHeader) ? 0 : $setImageHeader;
switch ($setImageHeader) {
    case 1:
        $urlImageHeader = $baseUrl . "web/images/header-index.png";
        break;
    case 'curtain':
        $urlImageHeader = $baseUrl . "web/images/header-curtain.png";
        break;
    case 'curtain-fabric':
        $urlImageHeader = $baseUrl . "web/images/header-curtain-fabric.png";
        break;
    case 'wall-paper':
        $urlImageHeader = $baseUrl . "web/images/header-wall-paper.png";
        break;
    case 'roller-blind':
        $urlImageHeader = $baseUrl . "web/images/header-roller-blind.png";
        break;
    case 'venetian-blind':
        $urlImageHeader = $baseUrl . "web/images/header-venetian-blind.png";
        break;
    case 'furniture-built-in':
        $urlImageHeader = $baseUrl . "web/images/header-furniture-built-in.png";
        break;
    default:
        $urlImageHeader = $baseUrl . "web/images/header-index.png";
}

?>
<!--<div id="header">-->

    <!--    <div id="banner">-->
    <!--        <div class="moduletable">-->
    <!--            <p style="font-size: 22px;color: #E72222;"><strong>บริษัท เอ-ทีม เคอร์เทน จำกัด</strong></p>-->
    <!---->
    <!--            <p style="font-size: 18px;color:#39C75E;">A-Team Curtain Co., Ltd.</p>-->
    <!---->
    <!--            <p style="font-size: 18px;">475/15 ถ.ทหารบก ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000</p>-->
    <!---->
    <!--            <p style="font-size: 20px;color:#F07641;">โทร 086-317-2217</p>-->
    <!--        </div>-->
    <!--    </div>-->
    <!-- <style>
        #cart {
            width: 170px;
            height: 35px;
            position: absolute;
            top: 0;
            right: 40px;
            background: url(<?php echo $baseUrl; ?>web/images/shopping-cart-icons.png) no-repeat top left;
            text-align: right;
        }
    </style>
    <div id="cart">
        <a class="select-cart" href="<?php echo $webUrl; ?>product/viewProductCart" title="ตะกร้าสินค้า" id="cart_link">
            <p>จำนวนสินค้า 3 รายการ</p>
        </a>
    </div>-->
<!--</div>-->
<!--end header-->

<div id="main-shadow">
    <div id="main-shadow2">
        <div class="side-shadow1">
            <div class="side-shadow2">
                <div id="iefix">
                    <table height="50">
                        <tr>
                            <td colspan="4">
                                <img src="<?php echo $urlImageHeader; ?>"
                                     border="0" alt="" id="logo" class="png"/></td>
                        </tr>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr valign="top">
                            <td width="620">
                                <div class="link-menu">
                                    <a class="<?php echo $selectBar == 'index'?'link-active':''; ?>" href="<?php echo $baseUrl; ?>">Home</a> |
                                    <a class="<?php echo $selectBar == 'ผ้าม่าน'?'link-active':''; ?>" href="<?php echo $webUrl; ?>ผ้าม่าน">Curtain</a> |
                                    <a class="<?php echo $selectBar == 'สินค้า'?'link-active':''; ?>" href="<?php echo $webUrl; ?>สินค้า">Product</a> |
                                    <a class="<?php echo $selectBar == 'contactus'?'link-active':''; ?>" href="<?php echo $webUrl; ?>ติดต่อเรา">Contact Us</a> |
                                    <a class="<?php echo $selectBar == 'เกี่ยวกับเรา'?'link-active':''; ?>" href="#">About Us</a>
                                </div>
                            </td>
                            <td>
                                <div id="content-logo">
                                    <a class="img-opacity" href="http://latendahouse.com/index/openWeb/47" target="_blank">
                                        <img src="<?php echo $baseUrl; ?>web/images/logo-facebook.png"
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
                            <span>089 645 7911, 02 567 8910<br>
                                <a href="mailto:latendahouse@gmail.com">latendahouse@gmail.com</a>
                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <!--    <div id="horiz-menu" class="suckerfish">-->
                    <!--        <ul class="menutop">-->
                    <!--            <li id="current" class="-->
                    <?php //echo $selectBar == "index" ? 'active ' : "" ?><!--item89">-->
                    <!--                <a href="--><?php //echo $baseUrl; ?><!--"><span>หน้าแรก</span></a>-->
                    <!--            </li>-->
                    <!--            <li class="-->
                    <?php //echo $selectBar == "ผ้าม่าน" ? 'active ' : "" ?><!--item121">-->
                    <!--                <a href="-->
                    <?php //echo $webUrl; ?><!--ผ้าม่าน" class="topdaddy"><span>ผ้าม่าน</span></a>-->
                    <!--                <!--<ul>-->
                    <!--                    <li class="item140 sub-menu">-->
                    <!--                        <a href="#"><span>ผ้าม่านแบล็คเอ้าท์</span></a>-->
                    <!--                    </li>-->
                    <!--                </ul>-->
                    <!--            </li>-->
                    <!--            <li class="-->
                    <?php //echo $selectBar == "จานดาวเทียม" ? 'active ' : "" ?><!--item120">-->
                    <!--                <a href="-->
                    <?php //echo $webUrl; ?><!--จานดาวเทียม" class="topdaddy"><span>จานดาวเทียม</span></a>-->
                    <!--            </li>-->
                    <!--            <li class="-->
                    <?php //echo $selectBar == "เครื่องปรับอากาศ" ? 'active ' : "" ?><!--item84">-->
                    <!--                <a href="-->
                    <?php //echo $webUrl; ?><!--เครื่องปรับอากาศ"> <span>เครื่องปรับอากาศ</span></a>-->
                    <!--            </li>-->
                    <!--            <li class="-->
                    <?php //echo $selectBar == "กล้องวงจรปิด" ? 'active ' : "" ?><!--item85">-->
                    <!--                <a href="-->
                    <?php //echo $webUrl; ?><!--กล้องวงจรปิด"><span>กล้องวงจรปิด</span></a>-->
                    <!--            </li>-->
                    <!--            <!--            <li class="item122"><a href="#"><span>เกี่ยวกับเรา</span></a></li>-->
                    <!--            <li class="-->
                    <?php //echo $selectBar == "contactus" ? 'active ' : "" ?><!--item144">-->
                    <!--                <a href="-->
                    <?php //echo $webUrl; ?><!--ติดต่อเรา"><span>ติดต่อเรา</span></a></li>-->
                    <!--        </ul>-->
                    <!--        <style>-->
                    <!--                /*[class*="column"] + [class*="column"]:last-child {*/-->
                    <!--                /*float: right;*/-->
                    <!--                /*}*/-->
                    <!---->
                    <!--            #magnify {-->
                    <!--                float: left;-->
                    <!--                position: absolute;-->
                    <!--                margin: 6px 0 0 5px;-->
                    <!--                margin: 0 0 0 5 pxurl(0/IE8 +9);-->
                    <!--            }-->
                    <!---->
                    <!--            .searchform .s {-->
                    <!--                margin: 0;-->
                    <!--                border: none;-->
                    <!--                margin: 3px 2px 2px 20px;-->
                    <!--                font-size: 16px;-->
                    <!--                height: 17px;-->
                    <!--                width: 150px;-->
                    <!--                color: #333;-->
                    <!--                overflow: hidden;-->
                    <!--            }-->
                    <!---->
                    <!--            .searchform {-->
                    <!--                -moz-border-radius: 15px;-->
                    <!--                -webkit-border-radius: 15px;-->
                    <!--                border-radius: 15px;-->
                    <!--                width: 180px;-->
                    <!--                padding: 0;-->
                    <!--                margin: 7px 5px 5px 10px;-->
                    <!--                height: 25px;-->
                    <!--                box-shadow: inset 0 0 1px #222;-->
                    <!--                background: #fff;-->
                    <!--                float: right;-->
                    <!--                margin-right: 10px;-->
                    <!--            }-->
                    <!---->
                    <!--            .searchform .searchsubmit {-->
                    <!--                display: none;-->
                    <!--            }-->
                    <!---->
                    <!--            input[type=submit] {-->
                    <!--                font-size: 12px;-->
                    <!--                padding: 2px;-->
                    <!--                margin-top: 5px;-->
                    <!--                border: 1px solid #999;-->
                    <!--                border-radius: 3px;-->
                    <!--                -moz-border-radius: 3px;-->
                    <!--            }-->
                    <!--        </style>-->
                    <!--        <div class="three columns hide-on-phones">-->
                    <!--            <form method="get" id="frmPost" class="searchform" action="-->
                    <?php //echo $webUrl; ?><!--ค้นหา">-->
                    <!--                <div id="magnify">-->
                    <!--                    <img src="--><?php //echo $baseUrl; ?><!--web/images/magnify.png"-->
                    <!--                         alt="magnify">-->
                    <!--                </div>-->
                    <!--                <div><input type="text" name="คำค้นหา" class="s"-->
                    <!--                            value="-->
                    <?php //echo empty($searchWord) ? 'ค้นหา' : $searchWord; ?><!--" placeholder="ค้นหา"-->
                    <!--                            id="searchsubmit"-->
                    <!--                            onfocus="if (this.value == 'ค้นหา') this.value = '';">-->
                    <!--                </div>-->
                    <!--            </form>-->
                    <!--        </div>-->
                    <!--    </div>-->
                </div>