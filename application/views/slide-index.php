<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 19/6/2556
 * Time: 12:02 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();
?>
<script type="text/javascript" src="<?php echo $baseUrl; ?>web/js/slide/slide-scripts.js"></script>
<div id="mainmodules1" class="spacer w99">
    <div class="block">
        <div class="module">
            <div id="slidewrap">
                <div id="slide-header">
                    <div class="slide-wrap">
                        <div id="slide-holder">
                            <div id="slide-runner">
                                <a href="<?php echo $webUrl; ?>ผ้าม่าน">
                                    <img id="slide-img-1"
                                         src="<?php echo $baseUrl; ?>web/images/slide/slide_curtain.png"
                                         class="slide" alt=""/></a>
                                <a href="<?php echo $webUrl; ?>จานดาวเทียม">
                                    <img id="slide-img-2"
                                         src="<?php echo $baseUrl; ?>web/images/slide/slide_dish-aerial.png"
                                         class="slide" alt=""/></a>
                                <a href="<?php echo $webUrl; ?>เครื่องปรับอากาศ">
                                    <img id="slide-img-3"
                                         src="<?php echo $baseUrl; ?>web/images/slide/slide_air.png"
                                         class="slide" alt=""/></a>
                                <a href="<?php echo $webUrl; ?>กล้องวงจรปิด">
                                    <img id="slide-img-4"
                                         src="<?php echo $baseUrl; ?>web/images/slide/slide_cctv.png"
                                         class="slide" alt=""/></a>

                                <div id="slide-controls">
                                    <p id="slide-client" class="text"><strong></strong<span></span>
                                    </p>

                                    <p id="slide-desc" class="text"></p>

                                    <p id="slide-nav"></p>
                                </div>
                            </div>

                            <!--content featured gallery here -->
                        </div>
                        <script type="text/javascript">
                            if (!window.slider) var slider = {};
                            slider.data = [
                                {"id": "slide-img-1", "client": "ผ้าม่าน",
                                    "desc": "ผ้าม่าน, รางโชว์, มู่ลี่, ม่านปรับแสง, ม่านม้วน, ม่านพลับ, วอลเปเปอร์, ฉากกั้นห้อง," +
                                        " กั้นแอร์, พรม, กระเบื้องยาง"},
                                {"id": "slide-img-2", "client": "จานดาวเทียม", "desc": "จำหน่ายอุปกรณ์จานดาวเทียม ในราคาปลีก และส่ง"},
                                {"id": "slide-img-3", "client": "เครื่องปรับอากาศ", "desc": "จำหน่ายพร้อมติดตั้ง เครืองปรับอากาศ ในราคาปลีก และส่ง"},
                                {"id": "slide-img-4", "client": "กล้องวงจรปิด", "desc": "จำหน่ายอุปกรณ์ พร้อมติดตั้งกล้องวงจรปิด ในราคาปลีก และส่ง"}
//                                {"id": "slide-img-5", "client": "nature beauty", "desc": "add your description here"},
//                                {"id": "slide-img-6", "client": "nature beauty", "desc": "add your description here"},
//                                {"id": "slide-img-7", "client": "nature beauty", "desc": "add your description here"}
                            ];
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>