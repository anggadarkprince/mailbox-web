<div class="header">
    <h2>Edit <strong>Out-mail</strong></h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>dashboard.html">Dashboard</a></li>
            <li><a href="<?= site_url() ?>outbox.html">Outbox</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12 portlets">
        <div class="panel">
            <div class="panel-header panel-controls">
                <h3><i class="fa fa-envelope"></i> Edit <strong>Form</strong></h3>
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

                <form action="<?=site_url()?>outbox/update/<?=$mail["id"]?>.html" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
                    <input type="hidden" value="<?=$mail["id"]?>" name="id">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="no_agenda">No Agenda</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" value="<?=set_value('no_agenda', $mail['agenda_number']);?>" name="no_agenda" id="no_agenda" class="form-control form-white" placeholder="Enter agenda number here..." required maxlength="100">
                            <i class="icon-envelope"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="no_mail">No Surat</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" value="<?=set_value('no_mail', $mail['mail_number']);?>" name="no_mail" id="no_mail" class="form-control form-white" placeholder="Enter mail number here..." required maxlength="100">
                            <i class="icon-envelope"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="subject">Perihal</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" value="<?=set_value('subject', $mail['subject']);?>" name="subject" id="subject" class="form-control form-white" placeholder="Enter mail subject here..." required maxlength="300">
                            <i class="icon-pencil"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="mail_date">Tanggal Surat</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" value="<?=set_value('mail_date', date_format(date_create($mail['mail_date']), "m/d/Y"));?>" name="mail_date" id="mail_date" class="date-picker form-control form-white" placeholder="Select a mail date..." required>
                            <i class="icon-calendar"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="from">Dari</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" value="<?=set_value('from', $mail['from']);?>" name="from" id="from" class="form-control form-white" placeholder="Who send the mail..." required maxlength="300">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="to">Kepada</label>
                        <div class="col-sm-9 prepend-icon">
                            <input type="text" value="<?=set_value('to', $mail['to']);?>" name="to" id="to" class="form-control form-white" placeholder="Who receive the mail..." required maxlength="300">
                            <i class="icon-users"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="description">Description</label>
                        <div class="col-sm-9">
                            <textarea rows="4" name="description" id="description" class="form-control form-white" placeholder="Description and disposition shortly here..." required><?=set_value('description', $mail['description']);?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="label">Label</label>
                        <div class="col-sm-9">
                            <select class="form-control form-white required" name="label" id="label" data-style="white" data-placeholder="Select a label...">
                                <option value="" <?php echo set_select('label', ''); ?>>Select Label</option>
                                <?php foreach($labels as $label): ?>
                                    <option value="<?=$label['id']?>" <?php echo set_select('label', $label["id"], ($label['id'] == $mail['label_id']) ? true : false); ?>><?=$label['label']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12 control-label">File Surat
                            <span class="pull-right"> &nbsp; <a href="#" class="original-add">TAMBAH</a> | <a href="#" class="original-delete">HAPUS</a></span>
                        </label>
                        <div class="col-sm-12">
                            <p>Last Uploaded :</p>
                            <ol class="m-l-20 original-uploaded">
                                <?php foreach($attachment_original as $attachment): ?>
                                    <li>
                                        <p class="form-control-static">
                                            <a href="<?=base_url()?>assets/global/file/<?=$attachment['resource']?>"><?=$attachment['resource']?></a>
                                            <a href="#modal-delete" data-link="<?=site_url()?>outbox/delete_attachment/<?=$attachment['id']?>/<?=$mail["id"]?>.html" data-toggle="modal" class="pull-right btn-delete">HAPUS</a>
                                        </p>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                        <div class="col-sm-12 m-t-10 original-nofile">No original file enclosed</div>
                        <div class="col-sm-12 m-t-10 original-container"></div>
                    </div>
                    <div class="form-group text-right">
                        <div class="col-sm-12">
                            <hr>
                            <button type="submit" class="btn btn-primary pull-right btn-embossed">Update Out-Mail</button>
                            <a href="<?=site_url()?>outbox.html" class="btn btn-default pull-right btn-embossed">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                <h4 class="modal-title"><strong>Delete</strong> Mail</h4>
            </div>
            <div class="modal-body">
                <p class="lead">Are you sure want to delete this attachment?</p>
                <p class="text-muted">All related data will be deleted</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-embossed m-r-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger btn-embossed m-l-0 btn-delete-inbox" data-dismiss="modal">Delete Mail</button>
            </div>
        </div>
    </div>
</div>