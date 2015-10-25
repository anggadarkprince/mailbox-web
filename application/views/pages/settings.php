<div class="header">
    <h2>Setting <strong>Website</strong></h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>dashboard.html">Dashboard</a></li>
            <li class="active">Setting</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12 portlets">
        <div class="panel">
            <div class="panel-header panel-controls">
                <h3><i class="fa fa-cog"></i> Setting <strong>Form</strong></h3>
            </div>
            <div class="panel-content">
                <form action="#" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="website">Website</label>
                                <div class="col-sm-9">
                                    <input type="text" name="website" id="website" class="form-control form-white" placeholder="Enter website name here..." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="keyword">Keywords</label>
                                <div class="col-sm-9">
                                    <input type="text" name="keyword" id="keyword" class="select-tags form-control form-white" placeholder="Put keywords related.. " required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="description">Description</label>
                                <div class="col-sm-9">
                                    <textarea rows="4" name="description" id="description" class="form-control form-white" placeholder="Enter website name here..."></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="contact">Contact</label>
                                <div class="col-sm-9">
                                    <input type="text" name="contact" id="contact" class="form-control form-white" placeholder="Enter phone number or contact...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="address">Address</label>
                                <div class="col-sm-9">
                                    <textarea rows="2" name="address" id="address" class="form-control form-white" placeholder="Enter company address here..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="email">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" id="email" class="form-control form-white" placeholder="Enter website email here..." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="facebook">Facebook</label>
                                <div class="col-sm-9">
                                    <input type="url" name="facebook" id="facebook" class="form-control form-white" placeholder="Enter url of facebook account here...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="twitter">Twitter</label>
                                <div class="col-sm-9">
                                    <input type="url" name="twitter" id="twitter" class="form-control form-white" placeholder="Enter url of twitter account here...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="google">Google+</label>
                                <div class="col-sm-9">
                                    <input type="url" name="google" id="google" class="form-control form-white" placeholder="Enter url of google+ account here...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="favicon">Favicon</label>
                                <div class="col-sm-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img data-src="" src="<?=base_url()?>assets/global/images/favicon.png" class="img-responsive" alt="gallery 3">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select image...</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="favicon" id="favicon">
                                        </span>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Setting</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>