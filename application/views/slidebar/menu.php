<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 26/9/2556
 * Time: 15:44 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();
$webUrl = $this->Constant_model->webUrl();

?>
<!--module เมนูย่อย-->
<link rel="stylesheet" href="<?php echo $baseUrl; ?>web/plugin/titan-menu/style.css"/>
<script src="<?php echo $baseUrl; ?>web/plugin/titan-menu/titan-menu.js"></script>
<!-- Icons -->
<!--    <link rel="stylesheet" href="css/fatcow_icons.css" />-->
<div class="module">
    <section id="lightgrey">
        <!-- start menu -->
        <nav class="titanmenu">
            <ul id="demo-2">
                <li><a href="<?php echo $baseUrl; ?>">Home</a></li>
                <li><a href="<?php echo $webUrl; ?>ผ้าม่าน">Curtain</a>
                    <!-- start -->
                    <div>
                        <span><span><!-- arrow --></span></span>

                        <!-- lvl 1 -->
                        <ul>
                            <li><a href="<?php echo $webUrl; ?>ผ้าม่าน/Curtain&Fabric">Curtain & Fabric</a></li>
                            <li><a href="<?php echo $webUrl; ?>ผ้าม่าน/WallPaper">Wall Paper</a></li>
                            <li><a href="<?php echo $webUrl; ?>ผ้าม่าน/Roller Blind">Roller Blind</a></li>
                            <li><a href="<?php echo $webUrl; ?>ผ้าม่าน/VenetianBlind">Venetian Blind</a></li>
                            <li><a href="<?php echo $webUrl; ?>ผ้าม่าน/FurnitureBuiltIn">Furniture Built In</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="<?php echo $webUrl; ?>สินค้า">Product</a>
                    <!-- start -->
                    <div>
                        <span><span><!-- arrow --></span></span>

                        <!-- lvl 1 -->
                        <ul>
                            <li><a href="<?php echo $webUrl; ?>สินค้า/จานดาวเทียม">จานดาวเทียม</a></li>
                            <li><a href="<?php echo $webUrl; ?>สินค้า/เครื่องปรับอากาศ">เครื่องปรับอากาศ</a></li>
                            <li><a href="<?php echo $webUrl; ?>สินค้า/กล้องวงจรปิด">กล้องวงจรปิด</a></li>
                        </ul>
                    </div>
                </li>

                <li><a href="<?php echo $webUrl; ?>สมาชิก">Member</a></li>
                <li><a href="<?php echo $webUrl; ?>ติดต่อเรา">Contact Us</a></li>
            </ul>
        </nav>
        <!-- end menu -->
    </section>
</div>
<div class="cleaner">&nbsp;</div>