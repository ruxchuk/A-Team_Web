<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 2/5/2556
 * Time: 16:24 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();
$webUrl = $this->Constant_model->webUrl();

?>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>
</div>

<!--ปุ่มกลับสู่ด้านบน-->
<script type="text/javascript">
    $(document).ready(function () {
        // hide #back-top first
        $("#back-top").hide();

        // fade in #back-top
        $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('#back-top').fadeIn();
                } else {
                    $('#back-top').fadeOut();
                }
            });

            // scroll body to 0px on click
            $('#back-top').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 500);
                return false;
            });
        });

    });
</script>
<style>
    #back-top {
        position: fixed;
        bottom: 30px;
        margin-right: 15px;
        right: 5px;
    }

    #back-top a {
        width: 108px;
        display: block;
        text-align: center;
        font: 11px/100% Arial, Helvetica, sans-serif;
        text-transform: uppercase;
        text-decoration: none;
        color: #bbb;
        /* transition */
        -webkit-transition: 1s;
        -moz-transition: 1s;
        transition: 1s;
    }

        /*#back-top a:hover {*/
        /*color: #000;*/
        /*text-decoration: none;*/
        /*}*/
    #back-top:link {
        text-decoration: none;
    }

        /* arrow icon (span tag) */
    #back-top span {
        width: 75px;
        height: 75px;
        display: block;
        margin-bottom: 7px;
        /*background: #FF6B6B url(



    <?php echo $baseUrl; ?>    web/images/up-arrow.png) no-repeat center center;*/
        background: transparent url(<?php echo $baseUrl; ?>web/images/arrow-to-top.png) no-repeat center center;

        /* rounded corners */
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        border-radius: 15px;

        /* transition */
        -webkit-transition: 1s;
        -moz-transition: 1s;
        transition: 1s;
        opacity: 0.6;
    }

    #back-top span:hover {
        opacity: 1.0;
    }

        /*#back-top a:hover span {*/
        /*background-color: #FF2929;*/
        /*}*/
</style>
<a id="back-top" href="#top">
    <p style="display: block;">
        <span></span>กลับสู่ด้านบน
    </p>
</a>
<!--begin bottom section-->
<div id="bottom">
    <div id="bottom-shadow1">
        <div id="bottom-shadow2">
            <!--            <div class="padding">-->
            <div id="bottommodules" class="spacer w99">
                <div class="block">
                    <div class="module">
                        <div>
                            <div>
                                <div>
                                    <!--                                        <p style="text-align: center;">ผ้าม่าน, รางโชว์, มู่ลี่, ม่านปรับแสง, ม่านม้วน, ม่านพลับ, วอลเปเปอร์, ฉากกั้นห้อง, กั้นแอร์, พรม-->
                                    <!--                                            <br/>กระเบื้องยาง, จานดาวเทียม, เครื่องปรับอากาศ, กล้องวงจรปิด, จีพีเอสติดรถยนต์, นครปฐม, เพื่อนช่าง</p>-->

                                    <style>
                                    </style>
                                    <div id="footer">
                                        <div id="footer_widget1" class="footer_widget">
                                            <div id="menubar-3" class="widget">
                                                <a href="<?php echo $webUrl; ?>ผ้าม่าน"><h4>Curtain</h4></a>
                                                <ul>
                                                    <li>
                                                        <a href="<?php echo $webUrl; ?>ผ้าม่าน/Curtain&Fabric">Curtain &
                                                            Fabric</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $webUrl; ?>ผ้าม่าน/WallPaper">Wall Paper</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $webUrl; ?>ผ้าม่าน/RollerBlind">Roller
                                                            Blind</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $webUrl; ?>ผ้าม่าน/VenetianBlind">Venetian
                                                            Blind</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $webUrl; ?>ผ้าม่าน/FurnitureBuiltIn">Furniture
                                                            Built In</a>
                                                    </li>
                                                </ul>
                                                <div class="Suckerfish_4-after"></div>
                                            </div>
                                        </div>
                                        <div id="footer_widget2" class="footer_widget">
                                            <div class="widget">
                                                <a href="<?php echo $webUrl; ?>สินค้า"><h4>สินค้า</h4></a>
                                                <ul>
                                                    <li>
                                                        <a href="<?php echo $webUrl; ?>สินค้า/จานดาวเทียม">จานดาวเทียม</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $webUrl; ?>สินค้า/เครื่องปรับอากาศ">เครื่องปรับอากาศ</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $webUrl; ?>สินค้า/กล้องวงจรปิด">กล้องวงจรปิด</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="footer_widget3" class="footer_widget">
                                            <div class="widget">
                                                <a href="<?php echo $webUrl; ?>"><h4> Home</h4></a>
                                                <a href="<?php echo $webUrl; ?>ติดต่อเรา"><h4> Contact Us</h4></a>
<!--                                                <a href="#"><h4> About Us</h4></a>-->
                                                <br><a href="http://www.latendahouse.com" target="_blank">
                                                    <img width="120"
                                                         src="http://goo.gl/q01yh"
                                                         alt="www.latendahouse.com"
                                                         title="www.latendahouse.com"
                                                         border="0">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear">&nbsp;</div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--            </div>-->
    </div>
</div>
</div>
<!--end bottom section-->
</div>
<!--end main wrapper-->
</div>
</body>
</html>