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
                <?php if ($this->session->role == 0) { ?>
                    <li class="<?= (array_filter([strpos($final_url, "backend/workers")], 'is_numeric')) ? 'mm-active' : '' ?>">
                        <a href="<?= base_url('backend/Workers') ?>" class="waves-effect">
                            <a href="<?= base_url('backend/Workers') ?>">
                                <i class="ion ion-md-contact"></i>
                                <span>Manage Workers</span>
                            </a>
                    </li>
                    <li class="<?= (array_filter([strpos($final_url, "backend/shops")], 'is_numeric')) ? 'mm-active' : '' ?>">
                        <a href="<?= base_url('backend/Shops') ?>" class="waves-effect">
                            <a href="<?= base_url('backend/Shops') ?>">
                                <i class="ion ion-md-contact"></i>
                                <span>Manage Shops</span>
                            </a>
                    </li>
                    <li class="<?= (array_filter([strpos($final_url, "backend/Transport")], 'is_numeric')) ? 'mm-active' : '' ?>">
                        <a href="<?= base_url('backend/Transport') ?>" class="waves-effect">
                            <a href="<?= base_url('backend/Transport') ?>">
                                <i class="ion ion-md-contact"></i>
                                <span>Manage Transports</span>
                            </a>
                    </li>
                    <li class="">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ion ion-md-contact"></i>
                            <span>Manage Products</span>
                        </a>
                        <ul class="sub-menu mm-collapse">

                            <li class="<?= (array_filter([strpos($final_url, "backend/productcategory")], 'is_numeric')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url('backend/ProductCategory') ?>" class="waves-effect">
                                    <span>Category</span></a>
                            </li>
                            <li class="<?= (array_filter([strpos($final_url, "backend/Brands")], 'is_numeric')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url('backend/Brands') ?>" class="waves-effect">
                                    <span>Brands</span></a>
                            </li>
                            <li class="<?= (array_filter([strpos($final_url, "backend/Products")], 'is_numeric')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url('backend/Products') ?>" class="waves-effect">
                                    <span>Products</span></a>
                            </li>
                            <li class="<?= (array_filter([strpos($final_url, "backend/banners")], 'is_numeric')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url('backend/Banners') ?>" class="waves-effect">
                                    <span>Banners</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ion ion-md-contact"></i>
                            <span>Masters</span>
                        </a>
                        <ul class="sub-menu mm-collapse">

                            <li class="<?= (array_filter([strpos($final_url, "backend/category")], 'is_numeric')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url('backend/Category') ?>" class="waves-effect">
                                    <span>Category</span></a>
                            </li>

                            <li class="<?= (array_filter([strpos($final_url, "backend/location")], 'is_numeric')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url('backend/Location') ?>" class="waves-effect">
                                    <span>Location</span></a>
                            </li>

                        </ul>
                    </li>

                    <li class="">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ion ion-md-contact"></i>
                            <span>Sell Items</span>
                        </a>
                        <ul class="sub-menu mm-collapse">

                            <li class="<?= (array_filter([strpos($final_url, "backend/attributes"), strpos($final_url, "backend/attributeoptions")], 'is_numeric')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url('backend/Attributes') ?>" class="waves-effect">
                                    <span>Attributes</span></a>
                            </li>
                            <li class="<?= (array_filter([strpos($final_url, "backend/sellcategory")], 'is_numeric')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url('backend/SellCategory') ?>" class="waves-effect">
                                    <span>Category</span></a>
                            </li>

                            <li class="<?= (array_filter([strpos($final_url, "backend/sellsubcategory"), strpos($final_url, "backend/subcategoryfields")], 'is_numeric')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url('backend/SellSubCategory') ?>" class="waves-effect">
                                    <span>Sub Category</span></a>
                            </li>

                            <li class="<?= (array_filter([strpos($final_url, "backend/sellitem")], 'is_numeric')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url('backend/SellItem') ?>" class="waves-effect">
                                    <span>Sell Items</span></a>
                            </li>

                        </ul>
                    </li>

                    <li class="<?= (array_filter([strpos($final_url, "backend/users")], 'is_numeric')) ? 'mm-active' : '' ?>">
                        <a href="<?= base_url('backend/Users') ?>" class="waves-effect">
                            <i class="ion ion-md-contact"></i>
                            <span>Users</span></a>
                    </li>
                    <li class="<?= (array_filter([strpos($final_url, "backend/workers/contact")], 'is_numeric')) ? 'mm-active' : '' ?>">
                        <a href="<?= base_url('backend/Workers/Contact') ?>" class="waves-effect">
                            <i class="ion ion-md-contact"></i>
                            <span>Contact to Workers</span></a>
                    </li>
                    <li class="<?= (array_filter([strpos($final_url, "backend/transport/contact")], 'is_numeric')) ? 'mm-active' : '' ?>">
                        <a href="<?= base_url('backend/Transport/Contact') ?>" class="waves-effect">
                            <i class="ion ion-md-contact"></i>
                            <span>Contact to Transport</span></a>
                    </li>
                <?php } else { ?>
                    <li class="">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ion ion-md-contact"></i>
                            <span>Manage Products</span>
                        </a>
                        <ul class="sub-menu mm-collapse">

                            <li class="<?= (array_filter([strpos($final_url, "backend/productcategory")], 'is_numeric')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url('backend/ProductCategory') ?>" class="waves-effect">
                                    <span>Category</span></a>
                            </li>
                            <li class="<?= (array_filter([strpos($final_url, "backend/Brands")], 'is_numeric')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url('backend/Brands') ?>" class="waves-effect">
                                    <span>Brands</span></a>
                            </li>
                            <li class="<?= (array_filter([strpos($final_url, "backend/Products")], 'is_numeric')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url('backend/Products') ?>" class="waves-effect">
                                    <span>Products</span></a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
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
                            // if($this->uri->segment(2)=='dashboard'){
                            //          echo '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Generate Bill</button>';

                            // }
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