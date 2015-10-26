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
                <table class="table table-hover table-dynamic">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Mail Number</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Detail</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($inbox as $mail): ?>

                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$mail['mail_number']?></td>
                            <td><?=$mail['subject']?><?=$mail['subject']?></td>
                            <td><?=date_format(date_create($mail['mail_date']), "d F Y")?></td>
                            <td><a href="<?=site_url()?>inbox/show/<?=$mail['id']?>.html">Detail</a></td>
                            <td>
                                <a href="<?=site_url()?>inbox/edit/<?=$mail['id']?>.html" class="btn btn-primary btn-sm m-r-0">EDIT</a>
                                <a href="<?=site_url()?>inbox/delete/<?=$mail['id']?>.html" class="btn btn-danger btn-sm m-l-0">DELETE</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>