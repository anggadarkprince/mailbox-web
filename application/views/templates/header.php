<!-- BEGIN TOPBAR -->
<div class="topbar">
    <div class="header-left">
        <div class="topnav">
            <a class="menutoggle" href="#" data-toggle="sidebar-collapsed">
                <span class="menu__handle"><span>Menu</span></span>
            </a>
        </div>
    </div>
    <div class="header-right">
        <ul class="header-menu nav navbar-nav">
            <!-- BEGIN MESSAGES DROPDOWN -->
            <li class="dropdown" id="messages-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="octicon octicon-mail-read"></i>
                <span class="badge badge-primary badge-header">
                <?=count(get_mail()["inbox"])?>
                </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="dropdown-header clearfix">
                        <p class="pull-left">
                            You have <?=count(get_mail()["inbox"])?> Messages
                        </p>
                    </li>
                    <li class="dropdown-body">
                        <ul class="dropdown-menu-list withScroll">
                            <?php $mails = get_mail()["inbox"]; ?>
                            <?php foreach($mails as $mail): ?>
                                <li class="clearfix">
                                    <a href="<?=site_url()?>inbox/show/<?=$mail['id']?>.html">
                                        <div>
                                            <strong><?=substr($mail['subject'], 0, 30)?>...</strong>
                                        </div>
                                        <p><?=substr($mail['from'], 0, 40)?>...</p>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="dropdown-footer clearfix">
                        <a href="<?= site_url() ?>archive.html" class="pull-left">See all messages</a>
                        <a href="<?=site_url()?>archive.html" class="pull-right">
                            <i class="icon-settings"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- END MESSAGES DROPDOWN -->
            <!-- BEGIN USER DROPDOWN -->
            <li class="dropdown" id="user-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img src="<?= base_url() ?>assets/global/images/avatars/<?=$this->session->userdata(User_model::$SESSION_AVATAR)?>" alt="user image">
                    <span class="username">Hi, <?=$this->session->userdata(User_model::$SESSION_NAME)?></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= site_url() ?>account.html"><i class="icon-user"></i><span>My Profile</span></a>
                    </li>
                    <li>
                        <a href="<?= site_url() ?>calendar.html"><i class="icon-calendar"></i><span>My Calendar</span></a>
                    </li>
                    <li>
                        <a href="<?= site_url() ?>settings.html"><i class="icon-settings"></i><span>Settings</span></a>
                    </li>
                    <li>
                        <a href="<?= site_url() ?>logout.html"><i class="icon-logout"></i><span>Logout</span></a>
                    </li>
                </ul>
            </li>
            <!-- END USER DROPDOWN -->
        </ul>
    </div>
    <!-- header-right -->
</div>
<!-- END TOPBAR -->