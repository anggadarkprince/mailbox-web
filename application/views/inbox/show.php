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
                                <label class="col-sm-4 control-label" for="receiver">Dari</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><?=$mail['from']?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="receiver">Diteruskan</label>
                                <div class="col-sm-8">
                                    <ul class="m-l-20">
                                        <?php foreach($divisions as $division): ?>
                                            <li><?=$division['division']?></li>
                                        <?php endforeach; ?>

                                        <?php if(trim($mail['authorizing_signature']) != ""){ ?>
                                            <li><?=$mail['authorizing_signature']?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="signature">Disposisi</label>
                                <div class="col-sm-8">
                                    <ul class="m-l-20">
                                        <?php foreach($signatures as $signature): ?>
                                            <li><?=$signature['signature']?></li>
                                        <?php endforeach; ?>

                                        <?php if(trim($mail['to']) != ""){ ?>
                                            <li><?=$mail['to']?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="no_mail">Tanggal Surat</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><?=date_format(date_create($mail['mail_date']), "d F Y")?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="receive_date">Tanggal Diterima</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><?=date_format(date_create($mail['received_date']), "d F Y")?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="attachment">File Surat</label>
                                <div class="col-sm-8">
                                    <?=count($attachment_original) == 0 ? "<p class='m-t-10'>No File Available</p>" : "" ?>
                                    <?php foreach($attachment_original as $attachment): ?>
                                        <p class="form-control-static"><a href="<?=base_url()?>assets/global/file/<?=$attachment['resource']?>"><?=$attachment['resource']?></a></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="attachment">File Disposisi</label>
                                <div class="col-sm-8">
                                    <?=count($attachment_signature) == 0 ? "<p class='m-t-10'>No File Available</p>" : "" ?>
                                    <?php foreach($attachment_signature as $attachment): ?>
                                        <p class="form-control-static"><a href="<?=base_url()?>assets/global/file/<?=$attachment['resource']?>"><?=$attachment['resource']?></a></p>
                                    <?php endforeach; ?>
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
                <a href="#modal-delete" data-link="<?=site_url()?>inbox/delete/<?=$mail['id']?>.html" data-toggle="modal"  class="btn btn-danger btn-embossed pull-right btn-delete"><i class="fa fa-trash"></i> Delete</a>
                <a href="<?=site_url()?>inbox/edit/<?=$mail['id']?>.html" class="btn btn-primary btn-embossed pull-right"><i class="fa fa-pencil"></i> Edit</a>
                <a href="<?=site_url()?>inbox/print_inbox/<?=$mail['id']?>.html" class="btn btn-primary btn-embossed pull-right"><i class="fa fa-print"></i> Print</a>
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
                <p class="lead">Are you sure want to delete In-mail?</p>
                <p class="text-muted">All related data will be deleted</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-embossed m-r-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger btn-embossed m-l-0 btn-delete-inbox" data-dismiss="modal">Delete Mail</button>
            </div>
        </div>
    </div>
</div>