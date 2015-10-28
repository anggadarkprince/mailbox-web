<div class="header">
    <h2>Mailbox <strong>Dashboard</strong></h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>archive.html">Archive</a></li>
            <li><a href="<?= site_url() ?>report.html">Report</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        The Archive Information System (AS) is a generic tool for indexing data archives and is fully
        integrated into the Mailbox Data Archiving environment. The indexes created with this tool, which are
        called Archive Information Structures, are used to display archived data.
        <div class="row">
            <div class="col-md-4">
                <h3 class="member-name"><strong><?=get_setting("website")?></strong></h3>
                <p class="member-job"><?=$this->session->userdata(User_model::$SESSION_NAME)?></strong></p>
                <p><i class="icon-globe c-gray-light p-r-10"></i> <?=get_setting("website")?></p>
                <p><i class="icon-envelope c-gray-light p-r-10"></i> <?=get_setting("email")?></p>
                <p><i class="fa fa-phone c-gray-light p-r-10"></i> <?=get_setting("contact")?></p>
            </div>
            <div class="col-md-8">
                <h3><strong>Mailbox</strong> Statistic</h3>
                <canvas id="line-chart" height="140"></canvas>
            </div>
        </div>
    </div>
</div>