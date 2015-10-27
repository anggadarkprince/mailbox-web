<div class="header">
    <h2>Edit <strong>In-mail</strong></h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>dashboard.html">Dashboard</a></li>
            <li><a href="<?= site_url() ?>inbox.html">Inbox</a></li>
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

                <form action="<?=site_url()?>inbox/update/<?=$mail["id"]?>.html" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" value="<?=$mail["id"]?>" name="id">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="no_agenda">No Agenda</label>
                                <div class="col-sm-8 prepend-icon">
                                    <input type="text" value="<?=set_value('no_agenda', $mail['agenda_number']);?>" name="no_agenda" id="no_agenda" class="form-control form-white" placeholder="Enter agenda number here..." required maxlength="100">
                                    <i class="icon-info"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="no_mail">No Surat</label>
                                <div class="col-sm-8 prepend-icon">
                                    <input type="text" value="<?=set_value('no_mail', $mail['mail_number']);?>" name="no_mail" id="no_mail" class="form-control form-white" placeholder="Enter mail number here..." required maxlength="100">
                                    <i class="icon-envelope"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="subject">Perihal</label>
                                <div class="col-sm-8 prepend-icon">
                                    <input type="text" value="<?=set_value('subject', $mail['subject']);?>" name="subject" id="subject" class="form-control form-white" placeholder="Enter mail subject here..." required maxlength="300">
                                    <i class="icon-pencil"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="signature">Disposisi</label>
                                <div class="col-sm-8">
                                    <textarea rows="4" name="signature" id="signature" class="form-control form-white" placeholder="Description and disposition shortly here..." required><?=set_value('signature', $mail['authorizing_signature']);?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="receiver">Tujuan</label>
                                <div class="col-sm-8 prepend-icon">
                                    <input type="text" value="<?=set_value('receiver', $mail['receiver']);?>" name="receiver" id="receiver" class="form-control form-white" placeholder="Who receive this mail..." required maxlength="300">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="mail_date">Tanggal Surat</label>
                                <div class="col-sm-8 prepend-icon">
                                    <input type="text" value="<?=set_value('mail_date', date_format(date_create($mail['mail_date']), "m/d/Y"));?>" name="mail_date" id="mail_date" class="date-picker form-control form-white" placeholder="Select a mail date..." required>
                                    <i class="icon-calendar"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="receive_date">Tanggal Diterima</label>
                                <div class="col-sm-8 prepend-icon">
                                    <input type="text" value="<?=set_value('receive_date', date_format(date_create($mail['receive_date']), "m/d/Y"));?>" name="receive_date" id="receive_date" class="date-picker form-control form-white" placeholder="Select a receive date..." required>
                                    <i class="icon-calendar"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="attachment">File Surat</label>
                                <div class="col-sm-8">
                                    <p>Last Uploaded : <?=$mail["attachment"]?></p>
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
                                <label class="col-sm-4 control-label" for="label">Label</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-white required" name="label" id="label" data-style="white" data-placeholder="Select a label...">
                                        <option value="" <?php echo set_select('label', ''); ?>>Select Label</option>
                                        <?php foreach($labels as $label): ?>
                                            <option value="<?=$label['id']?>" <?php echo set_select('label', $label["id"], ($label['id'] == $mail['label_id']) ? true : false); ?>><?=$label['label']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-embossed pull-right m-t-20">Update In-Mail</button>
                                    <a href="<?=site_url()?>inbox.html" class="btn btn-default btn-embossed pull-right m-t-20">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>