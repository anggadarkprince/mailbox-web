<div class="header">
    <h2>Mail <strong>Last Week</strong></h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li><a href="<?=site_url()?>dashboard.html">Dashboard</a></li>
            <li><a href="<?=site_url()?>archive.html">Archive</a></li>
            <li class="active">Last Week</li>
        </ol>
    </div>
</div>
<ul class="nav nav-tabs nav-primary">
    <li class="active"><a href="#tab2_1" data-toggle="tab"><i class="icon-arrow-down"></i> Inbox</a></li>
    <li class=""><a href="#tab2_2" data-toggle="tab"><i class="icon-arrow-up"></i> Outbox</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade active in" id="tab2_1">
        <?php $last_date = ""; ?>
        <?php foreach($report['inbox'] as $mail): ?>
            <?php if($mail['mail_date'] != $last_date){
                $last_date = $mail['mail_date']; ?>

                <div class="clearfix">
                    <h2 class="pull-left c-primary">Inbox : <?=date_format(date_create($mail['mail_date']), "d F")?> <strong><?=date_format(date_create($mail['mail_date']), "Y")?></strong></h2>
                </div>

            <?php } ?>

            <div>
                <div class="border-bottom">
                    <h3><i class="fa fa-envelope"></i> Mail Number <strong><?=$mail['mail_number']?></strong>
                        <?php
                        $label = "success";
                        if($mail["label"] == "IMPORTANT"){
                            $label = "danger";
                        }
                        else if($mail["label"] == "SOON"){
                            $label = "warning";
                        }
                        else if($mail["label"] == "GENERAL"){
                            $label = "primary";
                        }
                        ?>
                        <span class="pull-right label label-<?=$label?>"><?=$mail['label']?></span>
                    </h3>
                </div>
                <div class="report">
                    <form class="form-horizontal">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="no_agenda">No Agenda</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?=$mail['agenda_number']?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="from">Dari</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?=$mail['from']?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="to">Tujuan</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?=$mail['to']?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="subject">Perihal</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?=$mail['subject']?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="description">Disposisi</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?=$mail['authorizing_signature']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="no_mail">Tanggal Surat</label>
                                    <div class="col-sm-8 prepend-icon">
                                        <p class="form-control-static"><?=date_format(date_create($mail['mail_date']), "d F Y")?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="receive_date">Tanggal Diterima</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static"><?=date_format(date_create($mail['mail_date']), "d F Y")?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">File Surat</label>
                                    <div class="col-sm-8">
                                        <?=count($mail['attachment_original']) == 0 ? "<p class='m-t-10'>No File Available</p>" : "" ?>
                                        <?php foreach($mail['attachment_original'] as $attachment): ?>
                                            <p class="form-control-static"><a href="<?=base_url()?>assets/global/file/<?=$attachment['resource']?>"><?=$attachment['resource']?></a></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">File Disposisi</label>
                                    <div class="col-sm-8">
                                        <?=count($mail['attachment_signature']) == 0 ? "<p class='m-t-10'>No File Available</p>" : "" ?>
                                        <?php foreach($mail['attachment_signature'] as $attachment): ?>
                                            <p class="form-control-static"><a href="<?=base_url()?>assets/global/file/<?=$attachment['resource']?>"><?=$attachment['resource']?></a></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
    <div class="tab-pane fade" id="tab2_2">
        <?php $last_date = ""; ?>
        <?php foreach($report['outbox'] as $mail): ?>
            <?php if($mail['mail_date'] != $last_date){
                $last_date = $mail['mail_date']; ?>

                <div class="clearfix">
                    <h2 class="pull-left c-primary">Outbox : <?=date_format(date_create($mail['mail_date']), "d F")?> <strong><?=date_format(date_create($mail['mail_date']), "Y")?></strong></h2>
                </div>

            <?php } ?>

            <div>
                <div class="border-bottom">
                    <h3><i class="fa fa-envelope"></i> Mail Number <strong><?=$mail['mail_number']?></strong>
                        <?php
                        $label = "success";
                        if($mail["label"] == "IMPORTANT"){
                            $label = "danger";
                        }
                        else if($mail["label"] == "SOON"){
                            $label = "warning";
                        }
                        else if($mail["label"] == "GENERAL"){
                            $label = "primary";
                        }
                        ?>
                        <span class="pull-right label label-<?=$label?>"><?=$mail['label']?></span>
                    </h3>
                </div>
                <div class="report">
                    <form class="form-horizontal">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="subject">No Agenda</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?=$mail['agenda_number']?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="subject">Perihal</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?=$mail['subject']?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="no_mail">Tanggal Surat</label>
                                    <div class="col-sm-9 prepend-icon">
                                        <p class="form-control-static"><?=date_format(date_create($mail['mail_date']), "d F Y")?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="description">Description</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?=$mail['description']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="from">Dari</label>
                                    <div class="col-sm-9 prepend-icon">
                                        <p class="form-control-static"><?=$mail['from']?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="to">Kepada</label>
                                    <div class="col-sm-9 prepend-icon">
                                        <p class="form-control-static"><?=$mail['to']?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="attachment">File Surat</label>
                                    <div class="col-sm-9">
                                        <?=count($mail['attachment_original']) == 0 ? "<p class='m-t-10'>No File Available</p>" : "" ?>
                                        <?php foreach($mail['attachment_original'] as $attachment): ?>
                                            <p class="form-control-static"><a href="<?=base_url()?>assets/global/file/<?=$attachment['resource']?>"><?=$attachment['resource']?></a></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>

