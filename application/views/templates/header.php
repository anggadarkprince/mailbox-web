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
            <!-- BEGIN NOTIFICATION DROPDOWN -->
            <li class="dropdown" id="notifications-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-bell"></i>
                    <span class="badge badge-danger badge-header">6</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="dropdown-header clearfix">
                        <p class="pull-left">12 Pending Notifications</p>
                    </li>
                    <li>
                        <ul class="dropdown-menu-list withScroll" data-height="220">
                            <li>
                                <a href="#">
                                    <i class="fa fa-star p-r-10 f-18 c-orange"></i>
                                    Steve have rated your photo
                                    <span class="dropdown-time">Just now</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-heart p-r-10 f-18 c-red"></i>
                                    John added you to his favs
                                    <span class="dropdown-time">15 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-file-text p-r-10 f-18"></i>
                                    New document available
                                    <span class="dropdown-time">22 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-picture-o p-r-10 f-18 c-blue"></i>
                                    New picture added
                                    <span class="dropdown-time">40 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-bell p-r-10 f-18 c-orange"></i>
                                    Meeting in 1 hour
                                    <span class="dropdown-time">1 hour</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-bell p-r-10 f-18"></i>
                                    Server 5 overloaded
                                    <span class="dropdown-time">2 hours</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-comment p-r-10 f-18 c-gray"></i>
                                    Bill comment your post
                                    <span class="dropdown-time">3 hours</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-picture-o p-r-10 f-18 c-blue"></i>
                                    New picture added
                                    <span class="dropdown-time">2 days</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-footer clearfix">
                        <a href="#" class="pull-left">See all notifications</a>
                        <a href="#" class="pull-right">
                            <i class="icon-settings"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- END NOTIFICATION DROPDOWN -->
            <!-- BEGIN MESSAGES DROPDOWN -->
            <li class="dropdown" id="messages-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-paper-plane"></i>
                <span class="badge badge-primary badge-header">
                8
                </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="dropdown-header clearfix">
                        <p class="pull-left">
                            You have 8 Messages
                        </p>
                    </li>
                    <li class="dropdown-body">
                        <ul class="dropdown-menu-list withScroll" data-height="220">
                            <li class="clearfix">
                        <span class="pull-left p-r-5">
                        <img src="<?= base_url() ?>assets/global/images/avatars/avatar3.png" alt="avatar 3">
                        </span>

                                <div class="clearfix">
                                    <div>
                                        <strong>Alexa Johnson</strong>
                                        <small class="pull-right text-muted">
                                            <span class="glyphicon glyphicon-time p-r-5"></span>12 mins ago
                                        </small>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </li>
                            <li class="clearfix">
                        <span class="pull-left p-r-5">
                        <img src="<?= base_url() ?>assets/global/images/avatars/avatar4.png" alt="avatar 4">
                        </span>

                                <div class="clearfix">
                                    <div>
                                        <strong>John Smith</strong>
                                        <small class="pull-right text-muted">
                                            <span class="glyphicon glyphicon-time p-r-5"></span>47 mins ago
                                        </small>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </li>
                            <li class="clearfix">
                        <span class="pull-left p-r-5">
                        <img src="<?= base_url() ?>assets/global/images/avatars/avatar5.png" alt="avatar 5">
                        </span>

                                <div class="clearfix">
                                    <div>
                                        <strong>Bobby Brown</strong>
                                        <small class="pull-right text-muted">
                                            <span class="glyphicon glyphicon-time p-r-5"></span>1 hour ago
                                        </small>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </li>
                            <li class="clearfix">
                        <span class="pull-left p-r-5">
                        <img src="<?= base_url() ?>assets/global/images/avatars/avatar6.png" alt="avatar 6">
                        </span>

                                <div class="clearfix">
                                    <div>
                                        <strong>James Miller</strong>
                                        <small class="pull-right text-muted">
                                            <span class="glyphicon glyphicon-time p-r-5"></span>2 days ago
                                        </small>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-footer clearfix">
                        <a href="mailbox.html" class="pull-left">See all messages</a>
                        <a href="#" class="pull-right">
                            <i class="icon-settings"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- END MESSAGES DROPDOWN -->
            <!-- BEGIN USER DROPDOWN -->
            <li class="dropdown" id="user-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img src="<?=base_url()?>assets/global/images/avatars/user1.png" alt="user image">
                    <span class="username">Hi, John Doe</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="icon-user"></i><span>My Profile</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-calendar"></i><span>My Calendar</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-settings"></i><span>Settings</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-logout"></i><span>Logout</span></a>
                    </li>
                </ul>
            </li>
            <!-- END USER DROPDOWN -->
        </ul>
    </div>
    <!-- header-right -->
</div>
<!-- END TOPBAR -->