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
    <!DOCTYPE html PUBLIC
        "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <!--<meta itemprop="image" content="<?php echo $baseUrl; ?>web/images/fiv_icon_128x128.png">-->
        <meta itemprop="image" content="http://www.latendahouse.com/web/images/logo.jpg">
        <meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html;">
        <meta name='robots' content='index, follow'/>
        <meta name='keywords' content='latendahouse, บริษัท เอ-ทีมเคอร์เทน จำกัด, ผ้าม่าน, รางโชว์, มู่ลี่, ม่านปรับแสง, ม่านม้วน, ม่านพลับ, วอลเปเปอร์,
    ฉากกั้นห้อง, กั้นแอร์, พรม, กระเบื้องยาง, จานดาวเทียม, เครื่องปรับอากาศ, กล้องวงจรปิด, จีพีเอสติดรถยนต์, นครปฐม,
    เพื่อนช่าง, จานดาวเทียม นครปฐม, CCTV, CCTV นครปฐม, กล้องวงจรปิด นครปฐม, CCTV นครปฐม<?php echo $keyword; ?>'/>
        <title><?php echo $siteTitle; ?></title>
        <meta name='description' content='เอทีมเคอร์เทน'/>
        <meta name='author' content='เอทีมเคอร์เทน'/>
        <meta name='copyright' content='บริษัท เอทีมเคอร์เทน จำกัด'/>
        <meta http-equiv='content-language' content='th'/>
        <meta name='revisit-after' content='1 days'/>
        <meta name='Distribution' content='Global'/>

        <!-- Facebook Meta Tags -->
        <meta property="og:title" content="<?php echo $siteTitle; ?>">
        <meta property="og:image" content="http://www.latendahouse.com/web/images/logo.jpg">
        <meta property="og:site_name" content="บริษัท เอ-ทีมเคอร์เทน จำกัด">

        <link rel='shortcut icon' href='<?php echo $baseUrl; ?>web/images/shot_cut_icon.png'/>
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>web/css/trans-menu.css"/>

        <!--    <link href="-->
        <?php //echo $baseUrl; ?><!--web/css/rokmoomenu.css" rel="stylesheet" type="text/css"/>-->
        <link href="<?php echo $baseUrl; ?>web/css/template_css.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $baseUrl; ?>web/css/template_colors.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="<?php echo $baseUrl; ?>web/js/transmenu_Packed.js"></script>
        <script type="text/javascript" src="<?php echo $baseUrl; ?>web/js/jquery-1.2.6.pack.js"></script>

        <!--    fancybox-->
        <link href="<?php echo $baseUrl; ?>web/css/product-view-style.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="<?php echo $baseUrl; ?>web/js/jquery-1.4.4.min.js"></script>
        <script type="text/javascript"
                src="<?php echo $baseUrl; ?>web/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
        <script type="text/javascript"
                src="<?php echo $baseUrl; ?>web/js//fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>web/js/fancybox/jquery.fancybox-1.3.4.css"
              media="screen"/>
        <!--    end fancy box-->


        <link rel="stylesheet" href="<?php echo $baseUrl; ?>web/css/slide/slide-style.css" type="text/css"
              media="screen"/>
        <!--<script type="text/javascript">var _siteRoot = 'index.html', _root = 'index.html';</script>-->
        <script type="text/javascript" src="<?php echo $baseUrl; ?>web/js/jquery-1.9.1.js"></script>

        <!--    google analitic-->
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-41368108-1']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
        <script>
            $(document).ready(function(){
                $("img").mousedown(function(){
                    return false;
                });
            });
        </script>
    </head>
<body id="ff-geneva" class="f-default overlay-carbon latch">

    <!--include js facebook-->
    <!--<div id="fb-root"></div>-->
    <!--<script>-->
    <!--    (function (d, s, id) {-->
    <!--        var js, fjs = d.getElementsByTagName(s)[0];-->
    <!--        if (d.getElementById(id)) return;-->
    <!--        js = d.createElement(s);-->
    <!--        js.id = id;-->
    <!--        js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1";-->
    <!--        fjs.parentNode.insertBefore(js, fjs);-->
    <!--    }(document, 'script', 'facebook-jssdk'));-->
    <!--</script>-->
    <!--end include js facebook-->

<div id="page-bg">
    <!--begin top panel-->
    <!--<div id="top-bar">-->
    <!--    <div id="mod-login">-->
    <!--        <div class="wrapper">-->
    <!--            <div class="clr"></div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--end top panel-->

    <!--begin main wrapper-->
    <div id="mainbody" class="wrapper">

<?php
if ($setImageHeader != 'sat') {
    $this->load->view('curtain/header');
} else {
    $this->load->view('product/header');
}
?>


    <div id="main-content">
    <div id="main-content2">

<?php if ($showSlide): ?>
    <!--slide image-->
    <!--end slide image-->
<?php endif; ?>