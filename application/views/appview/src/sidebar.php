<?php
$actual_link = (($this->input->server('HTTPS') === 'on') ? "https" : "http") . "://" . $this->input->server('HTTP_HOST') . $this->input->server('REQUEST_URI');
$final_url = str_replace(strtolower(base_url()), '', strtolower($actual_link));
?>
<!-- Top Bar End -->
<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu" style="background-image: url('<?= base_url('assets/images/sp_bg.png') ?>');">
    <div class="slimscroll-menu" id="remove-scroll">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li>
                    <a href="<?= base_url('app/dashboard') ?>" class="waves-effect"><i class="ti-home"></i>
                        <span>Dashboard</span> 
                    </a>
                </li>
                <li class="menu-title">Content</li>
                <li class="">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ion ion-md-podium"></i>
                        <span>Scoreboard</span>
                    </a>
                    <ul class="sub-menu mm-collapse">

                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>Target</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>Sales</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ion ion-md-checkmark-circle"></i>
                        <span>Tasks</span>
                    </a>
                    <ul class="sub-menu mm-collapse">

                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>Active</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>Missed</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>Finished</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ion ion-md-calendar"></i>
                        <span>Today</span>
                    </a>
                    <ul class="sub-menu mm-collapse">

                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>Calls</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>Meetings</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>Birthdays</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>Wedding Anniversaries</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ion ion-md-contact"></i>
                        <span>Contacts</span>
                    </a>
                    <ul class="sub-menu mm-collapse">

                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>All</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>Hot</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>Missed</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>Import</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ion ion-md-trophy"></i>
                        <span>Masters</span>
                    </a>
                    <ul class="sub-menu mm-collapse">

                        <li class="<?= (array_filter([strpos($final_url, "app/mastercategory")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('app/mastercategory') ?>" class="waves-effect">
                                <span>Category</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "app/mastersubcategory")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('app/mastersubcategory') ?>" class="waves-effect">
                                <span>Sub Category</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "app/masterproduct")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('app/masterproduct') ?>" class="waves-effect">
                                <span>Product</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "app/mastersource")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('app/mastersource') ?>" class="waves-effect">
                                <span>Source</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>Executive</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ion ion-md-person"></i>
                        <span>Account</span>
                    </a>
                    <ul class="sub-menu mm-collapse">

                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "app/user")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('app/user') ?>" class="waves-effect">
                                <span>User</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "app/files")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('app/files') ?>" class="waves-effect">
                                <span>Files</span>
                            </a>
                        </li>
                        <li class="<?= (array_filter([strpos($final_url, "#")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('#') ?>" class="waves-effect">
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </li>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"><?= $title ?></h4>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-right d-md-block">
                            <?php
                            if (isset($SideBarbutton) && isset($SideBarbutton[1])) {
                            ?>
                                <a href="<?= base_url($SideBarbutton[0]) ?>" class="btn btn-primary btn-lg btn-dashboard custom-btn">
                                    <?= $SideBarbutton[1] ?></a>
                            <?php
                            } ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->