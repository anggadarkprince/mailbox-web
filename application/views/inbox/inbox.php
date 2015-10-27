<div class="header">
    <h2>Inbox <strong>Data</strong> <a href="<?=site_url()?>inbox/create.html" class="btn btn-primary btn-embossed m-t-10">New In-Mail</a></h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li><a href="<?=site_url()?>dashboard.html">Dashboard</a></li>
            <li><a href="<?=site_url()?>archive.html">Mailbox</a></li>
            <li class="active">Inbox</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12 portlets">
        <div class="panel">
            <div class="panel-header panel-controls">
                <h3><i class="fa fa-envelope"></i> Inbox <strong>List</strong></h3>
            </div>
            <div class="panel-content">

                <!-- alert -->
                <?php if($this->session->flashdata('operation') != NULL){ ?>
                    <div class="alert alert-<?=$this->session->flashdata('operation')?>" role="alert">
                        <p><?=$this->session->flashdata('message'); ?></p>
                    </div>
                <?php } ?>
                <!-- end of alert -->

                <table class="table table-hover table-dynamic">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Mail Number</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Detail</th>
                        <th>Label</th>
                        <th width="150">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($inbox as $mail): ?>

                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$mail['mail_number']?></td>
                            <td><?=word_limiter($mail['subject'], 5)?></td>
                            <td><?=date_format(date_create($mail['mail_date']), "d F Y")?></td>
                            <td><a href="<?=site_url()?>inbox/show/<?=$mail['id']?>.html">Detail</a></td>
                            <td>
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
                                <span class="label label-<?=$label?>"><?=$mail['label']?></span>
                            </td>
                            <td>
                                <a href="<?=site_url()?>inbox/edit/<?=$mail['id']?>.html" class="btn btn-primary btn-sm m-r-0">EDIT</a>
                                <a href="#modal-delete" data-link="<?=site_url()?>inbox/delete/<?=$mail['id']?>.html" data-toggle="modal" class="btn btn-danger btn-sm m-l-0 btn-delete">DELETE</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>
                </table>
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
                <p class="lead">Are you sure want to delete In-mail:</p>
                <p class="text-muted">All related data will be deleted</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-embossed m-r-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger btn-embossed m-l-0 btn-delete-inbox" data-dismiss="modal">Delete Mail</button>
            </div>
        </div>
    </div>
</div>