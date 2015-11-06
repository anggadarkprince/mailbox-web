<div class="header">
    <h2>Create <strong>In-mail</strong></h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>dashboard.html">Dashboard</a></li>
            <li><a href="<?= site_url() ?>inbox.html">Inbox</a></li>
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
            <form action="<?=site_url()?>inbox/create.html" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="no_agenda">No Agenda</label>
                                <div class="col-sm-8 prepend-icon">
                                    <input type="text" value="<?=set_value('no_agenda', $agenda);?>" name="no_agenda" id="no_agenda" class="form-control form-white" placeholder="Enter agenda number here..." required maxlength="100">
                                    <i class="icon-info"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="from">Dari</label>
                                <div class="col-sm-8 prepend-icon">
                                    <input type="text" value="<?=set_value('from', '');?>" name="from" id="from" class="form-control form-white" placeholder="Who sent this mail..." required maxlength="300">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="subject">Perihal</label>
                                <div class="col-sm-8 prepend-icon">
                                    <input type="text" value="<?=set_value('subject', '');?>" name="subject" id="subject" class="form-control form-white" placeholder="Enter mail subject here..." required maxlength="300">
                                    <i class="icon-pencil"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="to">Diteruskan</label>
                                <div class="col-sm-8">
                                    <?php $no = 1; ?>
                                    <?php foreach($divisions as $division): ?>
                                        <div>
                                            <label style="font-weight: normal" for="division<?= $no ?>" class="m-t-10">
                                                <input type="checkbox" name="divisions[]" id="division<?= $no ?>" value="<?=$division['id']?>" <?php echo set_checkbox('divisions', $division['id']); ?> data-checkbox="icheckbox_square-blue"/>
                                                <?=$division['division']?>
                                            </label>
                                        </div>
                                    <?php $no++; endforeach; ?>
                                    <div class="m-t-10">
                                        <input type="text" name="to" id="to" class="form-control form-white" placeholder="Who receive this mail..." maxlength="300">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="no_mail">No Surat</label>
                                <div class="col-sm-8 prepend-icon">
                                    <input type="text" value="<?=set_value('no_mail', '');?>" name="no_mail" id="no_mail" class="form-control form-white" placeholder="Enter mail number here..." required maxlength="100">
                                    <i class="icon-envelope"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="mail_date">Tanggal Surat</label>
                                <div class="col-sm-8 prepend-icon">
                                    <input type="text" value="<?=set_value('mail_date', date("m/d/Y"));?>" name="mail_date" id="mail_date" class="date-picker form-control form-white" placeholder="Select a mail date..." required>
                                    <i class="icon-calendar"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="receive_date">Tanggal Diterima</label>
                                <div class="col-sm-8 prepend-icon">
                                    <input type="text" value="<?=set_value('received_date', date("m/d/Y"));?>" name="received_date" id="received_date" class="date-picker form-control form-white" placeholder="Select a receive date..." required>
                                    <i class="icon-calendar"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="signature">Disposisi</label>
                                <div class="col-sm-8">
                                    <?php $no = 1; ?>
                                    <?php foreach($signatures as $signature): ?>
                                        <div>
                                            <label  style="font-weight: normal" for="signature<?= $no ?>" class="m-t-10">
                                                <input type="checkbox" name="signatures[]" id="signature<?= $no ?>"  value="<?=$signature['id']?>" <?php echo set_checkbox('signatures', $signature['id']); ?> data-checkbox="icheckbox_square-blue"/>
                                                <?=$signature['signature']?>
                                            </label>
                                        </div>
                                    <?php $no++; endforeach; ?>
                                    <textarea rows="3" name="signature" id="signature" class="form-control form-white m-t-10" placeholder="Description and disposition shortly here..."><?=set_value('signature', '');?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="label">Sifat</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-white required" name="label" id="label" data-style="white" data-placeholder="Select a label...">
                                        <?php foreach($labels as $label): ?>
                                            <option value="<?=$label['id']?>" <?php echo set_select('label', $label["id"]); ?>><?=ucfirst(strtolower($label['label']))?></option>
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

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Surat Disposisi
                                    <span class="pull-right"> &nbsp; <a href="#" class="signature-add">TAMBAH</a> | <a href="#" class="signature-delete">HAPUS</a></span>
                                </label>
                                <div class="col-sm-12 m-t-10 signature-nofile">No signature file enclosed</div>
                                <div class="col-sm-12 m-t-10 signature-container"></div>
                            </div>

                        </div>
                    </div>

            </div>
            <div class="panel-footer">
                <a href="<?=site_url()?>inbox.html" class="btn btn-default btn-embossed"><i class="fa fa-chevron-left"></i> Back</a>
                <button type="submit" class="btn btn-primary btn-embossed pull-right">Create In-Mail</button>
            </div>
            </form>
        </div>
    </div>
</div>