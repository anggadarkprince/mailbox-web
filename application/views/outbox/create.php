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

                <form action="<?=site_url()?>outbox/create.html" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mail ID</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">#<?=$next?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="no_mail">No Surat</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" value="<?=set_value('no_mail', '');?>" name="no_mail" id="no_mail" class="form-control form-white" placeholder="Enter mail number here..." required maxlength="100">
                            <i class="icon-envelope"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="subject">Perihal</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" value="<?=set_value('subject', '');?>" name="subject" id="subject" class="form-control form-white" placeholder="Enter mail subject here..." required maxlength="300">
                            <i class="icon-pencil"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="mail_date">Tanggal Surat</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" value="<?=set_value('mail_date', date("m/d/Y"));?>" name="mail_date" id="mail_date" class="date-picker form-control form-white" placeholder="Select a mail date..." required>
                            <i class="icon-calendar"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="from">Dari</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" value="<?=set_value('from', '');?>" name="from" id="from" class="form-control form-white" placeholder="Who send the mail..." required maxlength="300">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="to">Kepada</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" value="<?=set_value('to', '');?>" name="to" id="to" class="form-control form-white" placeholder="Who receive the mail..." required maxlength="300">
                            <i class="icon-users"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="description">Description</label>
                        <div class="col-sm-9">
                            <textarea rows="4" name="description" id="description" class="form-control form-white" placeholder="Description and disposition shortly here..." required><?=set_value('signature', '');?></textarea>
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
                                <option value="" <?php echo set_select('label', '', TRUE); ?>>Select Label</option>
                                <?php foreach($labels as $label): ?>
                                    <option value="<?=$label['id']?>" <?php echo set_select('label', $label["id"]); ?>><?=$label['label']?></option>
                                <?php endforeach ?>
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