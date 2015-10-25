<div class="header">
    <h2>Detail <strong>Out-mail</strong></h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>dashboard.html">Dashboard</a></li>
            <li><a href="<?= site_url() ?>outbox.html">Outbox</a></li>
            <li class="active">Detail</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12 portlets">
        <div class="panel">
            <div class="panel-header panel-controls">
                <h3><i class="fa fa-envelope"></i> Detail <strong>Mail Number</strong></h3>
            </div>
            <div class="panel-content">
                <form action="#" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mail ID</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">#23</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="no_mail">No Surat</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">XDA-3909SDF</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="subject">Perihal</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">Meeting for business plan</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="no_mail">Tanggal Surat</label>
                        <div class="col-sm-9 prepend-icon">
                            <p class="form-control-static">28 September 2015</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="from">From</label>
                        <div class="col-sm-9 prepend-icon">
                            <p class="form-control-static">Biro Keuangan</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="to">To</label>
                        <div class="col-sm-9 prepend-icon">
                            <p class="form-control-static">Sekjen Kemendesa</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="description">Description</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet asperiores culpa et eveniet id libero necessitatibus nesciunt tenetur. Dolorem dolores eligendi eveniet nam quaerat sit tempore velit vero voluptate.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="attachment">File Surat</label>
                        <div class="col-sm-9">
                            <p class="form-control-static"><a href="#">DOWNLOAD</a></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="label">Label</label>
                        <div class="col-sm-9">
                            <p class="form-control-static"><span class="label label-danger">Important</span></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">
                <a href="<?=site_url()?>outbox.html" class="btn btn-default btn-embossed"><i class="fa fa-chevron-left"></i> Back</a>
                <a href="<?=site_url()?>outbox/delete.html" class="btn btn-danger btn-embossed pull-right"><i class="fa fa-trash"></i> Delete</a>
                <a href="<?=site_url()?>outbox/edit.html" class="btn btn-primary btn-embossed pull-right"><i class="fa fa-pencil"></i> Edit</a>
                <a href="<?=site_url()?>outbox/print.html" class="btn btn-primary btn-embossed pull-right"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>
    </div>
</div>