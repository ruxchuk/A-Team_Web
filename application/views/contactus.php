<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 23/5/2556
 * Time: 16:03 น.
 * To change this template use File | Settings | File Templates.
 */

$this->load->view('header');
$this->load->view("sidebar");
$baseUrl = base_url();
?>

    <td class="maincol">
        <br>

        <p style="font-size: 22px">&nbsp;&nbsp;&nbsp;&nbsp;ติดต่อเรา</p>

        <div style="margin-left: 45px;">
            <div class="content_section">
                <p style="font-size: 22px;color: #E72222;"><strong>บริษัท เอ-ทีม เคอร์เทน จำกัด</strong></p>

                <p style="font-size: 18px;color:#39C75E;">A-Team Curtain Co., Ltd.</p>
                <br>
                <!--            <div style="background-color: #fff;width:670px;">-->
                <!--            <img src="-->
                <?php //echo $baseUrl; ?><!--web/images/a-team_map.png" width="670" height=""/>-->
                <!--            </div>-->


                <!--            <script type="text/javascript"-->
                <!--                    src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                <script type="text/javascript">
                    jQuery.noConflict()(document).ready(function () {
                        load("googleMap1", 13.82691, 100.068465);
                        load("googleMap2", 13.536859, 99.82086);
                    });

                    function load(id, lat, long) {
                        var gLat = lat;
                        var gLng = long;
                        var point = new google.maps.LatLng(gLat, gLng);
                        var myMapOptions = {
                            zoom: 15,
                            center: point,
                            mapTypeId: google.maps.MapTypeId.TERRAIN
                        };
                        var map = new google.maps.Map(document.getElementById(id), myMapOptions);
                        var image = new google.maps.MarkerImage(
                            'http://www.latendahouse.com/web/images/map-pin.png',
                            new google.maps.Size(32, 32),
                            new google.maps.Point(0, 0),
                            new google.maps.Point(16, 32)
                        );
                        var shadow = new google.maps.MarkerImage(
                            'http://www.latendahouse.com/web/images/map-pin.png',
                            new google.maps.Size(52, 32),
                            new google.maps.Point(0, 0),
                            new google.maps.Point(16, 32)
                        );
                        var shape = {
                            coord: [30, 0, 30, 1, 31, 2, 31, 3, 31, 4, 31, 5, 31, 6, 31, 7, 31, 8, 31, 9, 31, 10, 31, 11, 31, 12, 31, 13, 31, 14, 31, 15, 31, 16, 31, 17, 31, 18, 31, 19, 31, 20, 31, 21, 31, 22, 30, 23, 30, 24, 29, 25, 28, 26, 27, 27, 26, 28, 25, 29, 24, 30, 24, 31, 10, 31, 10, 30, 10, 29, 9, 28, 8, 27, 7, 26, 6, 25, 5, 24, 4, 23, 4, 22, 4, 21, 3, 20, 3, 19, 2, 18, 2, 17, 2, 16, 2, 15, 2, 14, 2, 13, 2, 12, 2, 11, 2, 10, 2, 9, 2, 8, 2, 7, 2, 6, 3, 5, 3, 4, 4, 3, 4, 2, 4, 1, 5, 0, 30, 0],
                            type: 'poly'
                        };
                        var marker = new google.maps.Marker({
                            draggable: false,
                            raiseOnDrag: false,
                            icon: image,
                            shadow: shadow,
                            shape: shape,
                            map: map,
                            position: point
                        });
                    }
                </script>

            </div>
        </div>
        <div align="center">

            <div class="cleaner"></div>
            <p style="font-size: 20px; color: yellow;">สาขาจังหวัดนครปฐม</p>

            <p style="font-size: 18px;">475/15 ถ.ทหารบก ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000</p>

            <p style="font-size: 20px;color:#F07641;">สอบถามข้อมูลเพิ่มเติม ติดต่อได้ที่หมายเลข 086 317 2217
            </p>

            <p style="font-size: 20px;color:#8781FF;">Email:
                <a href="mailto:a-teamcurtain@hotmail.com">info@latendahouse.com</a>
            </p>

            <p>พิกัดร้าน 13.82691, 100.068465</p>

            <div id="googleMap1"
                 style="width:500px;height:300px; margin: 10px 0 10px 0; border: 1px #CCC solid;">
            </div>
            <div style="background-color: #fff;width: 500px;">
                <a id="map1" class="gallerypic" href="<?php echo $baseUrl; ?>web/images/a-team_map_nakornpathom.png">
                    <img class="pic" width="100%"
                         src="<?php echo $baseUrl; ?>web/images/a-team_map_nakornpathom.png"
                         title="คลิกเพื่อดูภาพใหญ่"/>
                    <span class="zoom-icon">
                        <img src="<?php echo $baseUrl; ?>web/images/icon-zoom.png"
                             width="64" height="64">
                    </span>
                </a>
            </div>

            <div class="cleaner"></div>

            <p style="font-size: 20px; color: yellow;">สาขาจังหวัดราชบุรี</p>
            <p style="font-size: 18px;">89/23 ถ.ราษฎรยินดี ต.หน้าเมือง อ.เมือง จ.ราชบุรี 70000</p>
            <p style="font-size: 20px;color:#F07641;">สอบถามข้อมูลเพิ่มเติม ติดต่อได้ที่หมายเลข</p>
            <p style="font-size: 20px;color:#F07641;">089 645 7911, 02 567 8910</p>
            <p style="font-size: 20px;color:#8781FF;">Email:
                <a href="mailto:a-teamcurtain@hotmail.com">info@latendahouse.com</a>
            </p>

            <p>พิกัดร้าน 13.536859, 99.82086</p>

            <div id="googleMap2"
                 style="width:500px;height:300px; margin: 10px 0 10px 0; border: 1px #CCC solid;">
            </div>
            <div style="background-color: #fff;width: 500px;">
                <a id="map2" class="gallerypic" href="<?php echo $baseUrl; ?>web/images/a-team_map_ratchaburi.png">
                    <img class="pic" width="100%" src="<?php echo $baseUrl; ?>web/images/a-team_map_ratchaburi.png"
                         title="คลิกเพื่อดูภาพใหญ่"/>
                    <span class="zoom-icon">
                        <img src="<?php echo $baseUrl; ?>web/images/icon-zoom.png"
                             width="64" height="64">
                    </span>
                </a>
            </div>
        </div>
        <br>
        <br>
        <br>
    </td>
<?php
$this->load->view('footer');
?>