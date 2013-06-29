<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 25/6/2556
 * Time: 12:24 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();
$pathImage = $baseUrl . "web/images/";
?>
<script>
    $(document).ready(function () {
        $(".click-show").click(function () {
            if (oldSrc != this.src) {
                oldSrc = this.src;
                showImage(this.src);
            }
            return false;
        });
    });

    var oldImageID = 1;
    var oldSrc = "";
    function showImage(src) {
        var html = '<img src="' + src + '" style="width: 100%;height:350px;box-shadow: 0px 0px 25px #888888;"/>';
        if (oldImageID == 1) {
            oldImageID = 2;
            $("#show-img1").fadeOut().html(html).fadeIn("slow");
        } else {
            oldImageID = 1;
            $("#show-img2").fadeOut().html(html).fadeIn("slow");
        }
    }
</script>
<div style="margin-left: 15px;">
    <br>

    <div style="background: url('<?php echo $pathImage; ?>bg-slide-curtain-fabric.png') no-repeat;
        background-size: 100%;width: 735px; height: 200px;">

        <!-- Elastislide Carousel -->
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>web/plugin/elasti-slide/css/elastislide.css"
              type="text/css" media="screen"/>
        <script src="<?php echo $baseUrl; ?>web/plugin/elasti-slide/js/modernizr.custom.17475.js"></script>
        <ul id="carousel" class="elastislide-list">
            <li><a href="#">
                    <img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg"
                         class="click-show" alt="image01"/></a></li>
            <li><a href="#">
                    <img src="http://localhost:11001/ateam/web/a-team_web/web/images/logo_peuanchang_150x150.png"
                         class="click-show" alt="image02"/></a></li>
            <li><a href="#">
                    <img src="http://localhost:11001/ateam/web/a-team_web/web/images/logo_peuanchang_150x150.png"
                         class="click-show" alt="image03"/></a></li>
<!--            <li><a href="#">-->
<!--                    <img src="http://wowslider.com/images/demo/numeric-basic/data1/tooltips/apple_tree.jpg"-->
<!--                         class="click-show" alt="image04"/></a></li>-->

        </ul>
        <script type="text/javascript" src="<?php echo $baseUrl; ?>web/plugin/elasti-slide/js/jquery.min.js"></script>
        <script type="text/javascript"
                src="<?php echo $baseUrl; ?>web/plugin/elasti-slide/js/jquery.elastislide.js"></script>

        <script type="text/javascript">
            jQuery.noConflict()('#carousel').elastislide();
        </script>
        <!-- End Elastislide Carousel -->
    </div>
    <div style="width: 735px;">
        <table style="width:100%;">
            <tr>
                <td style="width: 49%" id="show-img1">
                    <img src=""
                         style="width: 100%;/*box-shadow: 0px 0px 25px #888888;*/"/>
                </td>
                <td style="width: 2%">&nbsp;</td>
                <td style="width: 49%" id="show-img2">
                    <img src=""
                         style="width: 100%;"/>
                </td>
            </tr>
        </table>
    </div>
</div>