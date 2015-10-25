<div class="header">
    <h2>Create <strong>Out-mail</strong></h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>dashboard.html">Dashboard</a></li>
            <li><a href="<?= site_url() ?>outbox.html">Outbox</a></li>
            <li class="active">Create</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12 portlets">
        <div class="panel">
            <div class="panel-header panel-controls">
                <h3><i class="fa fa-envelope"></i> Create <strong>Form</strong></h3>
            </div>
            <div class="panel-content">
                <form action="#" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mail ID</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">#23</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="no_mail">No Surat</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" name="no_mail" id="no_mail" class="form-control form-white" placeholder="Enter mail number here..." required>
                            <i class="icon-envelope"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="subject">Perihal</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" name="subject" id="subject" class="form-control form-white" placeholder="Enter mail subject here..." required>
                            <i class="icon-pencil"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="no_mail">Tanggal Surat</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" name="mail_date" class="date-picker form-control form-white" placeholder="Select a mail date...">
                            <i class="icon-calendar"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="from">From</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" name="from" id="from" class="form-control form-white" placeholder="Who Sender the mail..." required>
                            <i class="icon-user"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="to">To</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" name="to" id="to" class="form-control form-white" placeholder="Who receiver the mail..." required>
                            <i class="icon-users"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="description">Description</label>
                        <div class="col-sm-9">
                            <textarea rows="4" name="description" id="description" class="form-control form-white" placeholder="Description and disposition shortly here..." required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="attachment">File Surat</label>
                        <div class="col-sm-9">
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control form-white" data-trigger="fileinput">
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i><span class="fileinput-filename"></span>
                                </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Choose...</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="attachment" id="attachment">
                                        </span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="label">Label</label>
                        <div class="col-sm-9">
                            <select class="form-control form-white" name="label" id="label" data-style="white" data-placeholder="Select a label...">
                                <option value="GENERAL">General</option>
                                <option value="IMPORTANT">Important</option>
                                <option value="SOON">Soon</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary pull-right btn-embossed m-t-20">Create Out-Mail</button>
                            <a href="<?=site_url()?>outbox.html" class="btn btn-default pull-right btn-embossed m-t-20">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>