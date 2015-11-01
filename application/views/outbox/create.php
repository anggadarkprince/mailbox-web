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
                        <p><?php echo $message; ?></p>
                    </div>
                <?php } ?>
                <!-- end of alert -->

                <!-- alert -->
                <?php if($this->session->flashdata('operation') != NULL){ ?>
                    <div class="alert alert-<?=$this->session->flashdata('operation')?>" role="alert">
                        <p><?=$this->session->flashdata('message'); ?></p>
                    </div>
                <?php } ?>
                <!-- end of alert -->

                <form action="<?=site_url()?>outbox/create.html" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="no_agenda">No Agenda</label>
                        <div class="col-sm-10 prepend-icon">
                            <input type="text" value="<?=set_value('no_agenda', $next);?>" name="no_agenda" id="no_agenda" class="form-control form-white" placeholder="Enter agenda number here..." required maxlength="100">
                            <i class="icon-info"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="no_mail">No Surat</label>
                        <div class="col-sm-10 prepend-icon">
                            <input type="text" value="<?=set_value('no_mail', '');?>" name="no_mail" id="no_mail" class="form-control form-white" placeholder="Enter mail number here..." required maxlength="100">
                            <i class="icon-envelope"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="from">Dari</label>
                        <div class="col-sm-10 prepend-icon">
                            <input type="text" value="<?=set_value('from', '');?>" name="from" id="from" class="form-control form-white" placeholder="Who send the mail..." required maxlength="300">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="to">Kepada</label>
                        <div class="col-sm-10 prepend-icon">
                            <input type="text" value="<?=set_value('to', '');?>" name="to" id="to" class="form-control form-white" placeholder="Who receive the mail..." required maxlength="300">
                            <i class="icon-users"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="subject">Perihal</label>
                        <div class="col-sm-10 prepend-icon">
                            <input type="text" value="<?=set_value('subject', '');?>" name="subject" id="subject" class="form-control form-white" placeholder="Enter mail subject here..." required maxlength="300">
                            <i class="icon-pencil"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="mail_date">Tanggal Surat</label>
                        <div class="col-sm-10 prepend-icon">
                            <input type="text" value="<?=set_value('mail_date', date("m/d/Y"));?>" name="mail_date" id="mail_date" class="date-picker form-control form-white" placeholder="Select a mail date..." required>
                            <i class="icon-calendar"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="description">Description</label>
                        <div class="col-sm-10">
                            <textarea rows="4" name="description" id="description" class="form-control form-white" placeholder="Description and disposition shortly here..."><?=set_value('description', '');?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="label">Label</label>
                        <div class="col-sm-10">
                            <select class="form-control form-white" name="label" id="label" data-style="white" data-placeholder="Select a label...">
                                <?php foreach($labels as $label): ?>
                                    <option value="<?=$label['id']?>" <?php echo set_select('label', $label["id"], ($label["id"]==2)?TRUE:FALSE); ?>><?=ucfirst(strtolower($label['label']))?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12 control-label">File Surat
                            <span class="pull-right"> &nbsp; <a href="#" class="original-add">TAMBAH</a> | <a href="#" class="original-delete">HAPUS</a></span>
                        </label>
                        <div class="col-sm-12 m-t-10 original-nofile">No original file enclosed</div>
                        <div class="col-sm-12 m-t-10 original-container"></div>
                    </div>
                    <div class="form-group text-right">
                        <div class="col-sm-12">
                            <hr>
                            <button type="submit" class="btn btn-primary pull-right btn-embossed">Create Out-Mail</button>
                            <a href="<?=site_url()?>outbox.html" class="btn btn-default pull-right btn-embossed">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>