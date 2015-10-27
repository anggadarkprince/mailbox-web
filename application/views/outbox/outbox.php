<div class="header">
    <h2>Outbox <strong>Data</strong> <a href="<?=site_url()?>outbox/create.html" class="btn btn-primary btn-embossed m-t-10">New Out-Mail</a></h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li><a href="<?=site_url()?>dashboard.html">Dashboard</a></li>
            <li><a href="<?=site_url()?>archive.html">Mailbox</a></li>
            <li class="active">Outbox</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12 portlets">
        <div class="panel">
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
                        <th>To</th>
                        <th>Date</th>
                        <th>Detail</th>
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
                            <td><?=$mail['to']?></td>
                            <td><?=date_format(date_create($mail['mail_date']), "d F Y")?></td>
                            <td><a href="<?=site_url()?>outbox/show/<?=$mail['id']?>.html">Detail</a></td>
                            <td>
                                <a href="<?=site_url()?>outbox/edit/<?=$mail['id']?>.html" class="btn btn-primary btn-sm m-r-0">EDIT</a>
                                <a href="#modal-delete" data-link="<?=site_url()?>outbox/delete/<?=$mail['id']?>.html" data-toggle="modal" class="btn btn-danger btn-sm m-l-0 btn-delete">DELETE</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>