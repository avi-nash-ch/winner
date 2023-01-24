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
            <li><a href="<?= base_url('backend/dashboard') ?>" class="waves-effect"><i class="ti-home"></i>
                        <span>Dashboard</span></a></li>
                <li class="menu-title">Content</li>      
                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ion ion-md-contact"></i>
                        <span>Maange Products</span>
                    </a>  
                    <ul class="sub-menu mm-collapse">
                    <a href="<?= base_url('backend/Products') ?>" class="waves-effect">
                        <span>Products</span></a></li>
                        
                    </ul>  
                    <li class="">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ion ion-md-contact"></i>
                        <span>Masters</span>
                    </a>
                    <ul class="sub-menu mm-collapse">
                    <!-- <li
                            class="<?= (array_filter([strpos($final_url, "backend/type")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="#" class="waves-effect">
                                <span>Type</span></a>
                        </li>
                        <li
                            class="<?= (array_filter([strpos($final_url, "backend/age")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="" class="waves-effect">
                                <span>Age</span></a>
                        </li> -->
                        <li
                            class="<?= (array_filter([strpos($final_url, "backend/class")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('backend/Classes') ?>" class="waves-effect">
                                <span>Class</span></a>
                        </li>
                        <li
                            class="<?= (array_filter([strpos($final_url, "backend/author")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('backend/Author') ?>" class="waves-effect">
                                <span>Author</span></a>
                        </li>
                        <li
                            class="<?= (array_filter([strpos($final_url, "backend/language")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('backend/Language') ?>" class="waves-effect">
                                <span>Language</span></a>
                        </li>

                        <li
                            class="<?= (array_filter([strpos($final_url, "backend/publisher")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('backend/Publisher') ?>" class="waves-effect">
                                <span>Publisher</span></a>
                        </li>
                        <li
                            class="<?= (array_filter([strpos($final_url, "backend/board")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('backend/Board') ?>" class="waves-effect">
                                <span>Board</span></a>
                        </li>
                        <li
                            class="<?= (array_filter([strpos($final_url, "backend/subjects")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('backend/Subjects') ?>" class="waves-effect">
                                <span>Subject</span></a>
                        </li>
                        <li
                            class="<?= (array_filter([strpos($final_url, "backend/producttypes")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('backend/ProductTypes') ?>" class="waves-effect">
                                <span>Product Type</span></a>
                        </li>
                    </ul>
                </li>

                <li
                            class="<?= (array_filter([strpos($final_url, "backend/reports")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('backend/Reports') ?>" class="waves-effect">
                            <i class="ion ion-md-contact"></i>
                                <span>Reports</span></a>
                        </li>
                        <li
                            class="<?= (array_filter([strpos($final_url, "backend/users")], 'is_numeric')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url('backend/Users') ?>" class="waves-effect">
                            <i class="ion ion-md-contact"></i>
                                <span>Users</span></a>
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
if($this->uri->segment(2)=='dashboard'){
         echo '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Generate Bill</button>';

}
                     if (isset($SideBarbutton) && isset($SideBarbutton[1])) {
                         ?>

                            <a href="<?= base_url($SideBarbutton[0]) ?>"
                                class="btn btn-primary btn-lg btn-dashboard custom-btn">
                                <?= $SideBarbutton[1] ?></a>

                            <?php
                     } ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->