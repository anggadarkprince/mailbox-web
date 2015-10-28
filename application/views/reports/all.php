<div class="header">
    <h2>Report <strong>Data</strong></h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li><a href="<?=site_url()?>dashboard.html">Dashboard</a></li>
            <li><a href="<?=site_url()?>archive.html">Mailbox</a></li>
            <li class="active">Report</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12 portlets">
        <div class="panel">
            <div class="panel-header panel-controls">
                <h3><i class="fa fa-envelope"></i> Summaries <strong>Mail List</strong></h3>
            </div>
            <div class="panel-content">
                <table class="table table-hover table-dynamic">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Total In-Mail</th>
                        <th>Total Out-Mail</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($report as $mail): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=date_format(date_create($mail['all_date']), "d F Y")?></td>
                            <td><?=$mail['inbox']?></td>
                            <td><?=$mail['outbox']?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>