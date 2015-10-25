<!DOCTYPE html>
<html>

<!-- Mirrored from themes-lab.com/make/admin/layout1/page-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Jul 2015 18:26:50 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<title>MailBox 404</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta content="" name="description" />
	<meta content="themes-lab" name="author" />
	<link rel="shortcut icon" href="<?= base_url() ?>assets/global/images/favicon.png">
	<link href="<?= base_url() ?>assets/global/css/style.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/global/css/ui.css" rel="stylesheet">
</head>
<body class="error-page">
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
		<div class="error-container">
			<div class="error-main">
				<h1><span id="404"></span></h1>
				<h3><span id="404-txt"></span></h3>
				<h4><span id="404-txt-2"></span></h4>
				<br>
				<div class="row" id="content-404">
					<div class="col-md-6 col-md-offset-3 text-center">
						<div class="input-icon">
							<i class="fa fa-search"></i>
							<input type="text" class="form-control form-white" placeholder="Search for page">
						</div>
						<br>
						<button class="btn btn-dark" type="button">Search</button>
					</div>
					<div class="col-md-12 text-center">
						<div class="btn-group">
							<a class="btn btn-white" href="#">
								<i class="fa fa-angle-left"></i> Go back
							</a>
							<a class="btn btn-white btn-home" href="<?= site_url() ?>">
								<i class="icon-home"></i> Home Page
							</a>
							<a class="btn btn-white" href="<?= site_url() ?>login.html">
								<i class="icon-login"></i> Login
							</a>
							<a class="btn btn-white btn-message" href="mailto:support@kemendesa.go.id">
								<i class="icon-envelope"></i> Send us a message
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer">
	<div class="copyright">&copy; Copyright Themes Lab, 2015 Themes Lab Inc.</div>
</div>
<script src="<?= base_url() ?>assets/global/plugins/jquery/jquery-1.11.1.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/global/plugins/typed/typed.js"></script>
<script>
	$(function(){
		$("#404").typed({
			strings: ["404"],
			typeSpeed: 200,
			backDelay: 500,
			loop: false,
			contentType: 'html',
			loopCount: false,
			callback: function() {
				$('h1 .typed-cursor').css('-webkit-animation', 'none').animate({opacity: 0}, 400);
				$("#404-txt").typed({
					strings: ["It seems that this page doesn't exist or has been removed."],
					typeSpeed: 1,
					backDelay: 500,
					loop: false,
					contentType: 'html',
					loopCount: false,
					callback: function() {
						$('h3 .typed-cursor').css('-webkit-animation', 'none').animate({opacity: 0}, 400);
						$("#404-txt-2").typed({
							strings: ["Go back to our site or <a href='mailbox-send.html'>contact us</a> about the problem. "],
							typeSpeed: 1,
							backDelay: 500,
							loop: false,
							contentType: 'html',
							loopCount: false,
							callback: function() {
								$('#content-404').delay(300).slideDown();
							},
						});
					}
				});
			}
		});
	});
</script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlRRJQa4R3kWwUp56TL5hPPc9ZdRgQ6wYtSBHYe3D6ywcYrGC46d4L13FkTpDi%2fw6Y98p5452VbKysNY3GXO2HWn5XrzpRGJg%2fBASNu9xObN6guenAj5aNZ2zXr5R3Rni%2bGXHKaeo5Duo9eu2ftu1TFaoFD%2fHCFllYiG8hiztMkhNKK8YLpRFzkrQPxpjp%2fy2iTLu%2bM1RvDNc%2bK%2fFsujYMs2cZPiUG6fo0id7WEmmfR3reO4g%2fsHNYOYTIjLjGfJ7UMmyWEZyG%2bhPtkXLmTBqr3l9GGRNhFw95k3oigYUrsDQ%2fMoTcvGciPiwGw16pKagsbBehuaCCLO9TPqNQiyY1dXSbfQelceeyKIFq85RSl9Sa7vQqOVMACYrOLdtozDUGNTU9cY0cWL%2f3LAJyYvAqqDVa%2bCIZyN3gjQkPErq2hHm1%2bf6A%2b%2b0ZG%2fYGhXbCBexdVvumeRhgg4UBaaCmxCrAPjpb5DOyXrBPy%2bfZW%2bALuSeq4Et2XKaZB8g%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<!-- Mirrored from themes-lab.com/make/admin/layout1/page-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Jul 2015 18:26:58 GMT -->
</html>