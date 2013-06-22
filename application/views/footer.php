<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 2/5/2556
 * Time: 16:24 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();

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
    $(document).ready(function() {
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
    #back-top a:hover {
        color: #000;
    }

        /* arrow icon (span tag) */
    #back-top span {
        width: 75px;
        height: 75px;
        display: block;
        margin-bottom: 7px;
        background: #FF6B6B url(<?php echo $baseUrl; ?>web/images/up-arrow.png) no-repeat center center;

        /* rounded corners */
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        border-radius: 15px;

        /* transition */
        -webkit-transition: 1s;
        -moz-transition: 1s;
        transition: 1s;
    }
    #back-top a:hover span {
        background-color: #FF2929;
    }
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
                                        <p style="text-align: center;">ผ้าม่าน, รางโชว์, มู่ลี่, ม่านปรับแสง, ม่านม้วน, ม่านพลับ, วอลเปเปอร์, ฉากกั้นห้อง, กั้นแอร์, พรม
                                            <br/>กระเบื้องยาง, จานดาวเทียม, เครื่องปรับอากาศ, กล้องวงจรปิด, จีพีเอสติดรถยนต์, นครปฐม, เพื่อนช่าง</p></div>
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