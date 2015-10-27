<div class="header">
    <h2>Detail <strong>In-mail</strong></h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>dashboard.html">Dashboard</a></li>
            <li><a href="<?= site_url() ?>inbox.html">Inbox</a></li>
            <li class="active">Detail</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12 portlets">
        <div class="panel">
            <div class="panel-header panel-controls">
                <h3><i class="fa fa-envelope"></i> Detail <strong><?=$mail['mail_number']?></strong></h3>
            </div>
            <div class="panel-content">
                <form action="#" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="no_agenda">No Agenda</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><?=$mail['agenda_number']?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="no_mail">No Surat</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><?=$mail['mail_number']?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="subject">Perihal</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><?=$mail['subject']?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="signature">Disposisi</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><?=$mail['authorizing_signature']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="receiver">Tujuan</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><?=$mail['receiver']?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="no_mail">Tanggal Surat</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><?=date_format(date_create($mail['mail_date']), "d F Y")?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="receive_date">Tanggal Diterima</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><?=date_format(date_create($mail['receive_date']), "d F Y")?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="attachment">File Surat</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><a href="<?=base_url()?>assets/global/file/<?=$mail['attachment']?>">DOWNLOAD</a></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="label">Label</label>
                                <div class="col-sm-8">
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
                                    <p class="form-control-static"><span class="label label-<?=$label?>"><?=$mail['label']?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">
                <a href="<?=site_url()?>inbox.html" class="btn btn-default btn-embossed"><i class="fa fa-chevron-left"></i> Back</a>
                <a href="<?=site_url()?>inbox/delete/<?=$mail['subject']?>.html" class="btn btn-danger btn-embossed pull-right"><i class="fa fa-trash"></i> Delete</a>
                <a href="<?=site_url()?>inbox/edit/<?=$mail['subject']?>.html" class="btn btn-primary btn-embossed pull-right"><i class="fa fa-pencil"></i> Edit</a>
                <a href="<?=site_url()?>inbox/print/<?=$mail['subject']?>.html" class="btn btn-primary btn-embossed pull-right"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>
    </div>
</div>