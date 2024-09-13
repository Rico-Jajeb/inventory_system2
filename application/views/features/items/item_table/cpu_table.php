<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!--SESSION -->
<?php if ($this->session->userdata('connect') == true ){
      $sess = $this->session->userdata('user_name');
      $admin_level = $this->session->userdata('admin_level');

}?>
<!--END SESSION -->



<?php if($this->session->flashdata('status')) {?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Update Successfully',
                icon: 'success'
            });
        });
    </script>
<?php }?>
<?php if($this->session->flashdata('status2')) {?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Save Successfully',
                icon: 'success'
            });
        });
    </script>
<?php }?>
<?php if($this->session->flashdata('status3')) {?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Item set to INACTIVE',
                icon: 'success'
            });
        });
    </script>
<?php }?>
<?php if($this->session->flashdata('status4')) {?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Item set  Success',
                icon: 'success'
            });
        });
    </script>
<?php }?>




<?php $category_name = $_GET['category_name'];?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
<div class="sidenav-header pt-3">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class=" ms-3 d-flex ">
        <img src="<?php echo base_url('assets/image/system_logo/' . $data4['result']['system_logo']) ?>" class="system_logo" alt="main_logo">
        <span class="d-flex align-items-center ms-2 font-weight-bold truncate"><?php echo $data4['result']['system_tittle'] ?></span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  " href="<?php echo base_url('index.php/dashboard') ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img class="nav_icons" src="<?php echo base_url('assets/items_img/dashboard.gif') ?>" alt="">
            </div>
            <span class="nav-link-text ms-1 itm_txt">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" href="<?php echo base_url('index.php/items') ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img class="nav_icons" src="<?php echo base_url('assets/items_img/item5.gif') ?>" alt="">
            </div>
            <span class="nav-link-text ms-1 itm_txt">Items</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="<?php echo base_url('index.php/defective') ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>credit-card</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1 itm_txt">Defectives</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link  " href="<?php echo base_url('index.php/supplier') ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>settings</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(304.000000, 151.000000)">
                        <polygon class="color-background opacity-6" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                        <path class="color-background opacity-6" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"></path>
                        <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1 itm_txt">Suppliers</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link  " href="<?php echo base_url('index.php/orders_table') ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>settings</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(304.000000, 151.000000)">
                        <polygon class="color-background opacity-6" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                        <path class="color-background opacity-6" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"></path>
                        <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1 itm_txt">Order Management</span>
          </a>
        </li>
          <br>

        <?php if($admin_level == "admin") {?>
          <li class="nav-item">
            <a class="nav-link" type="submit" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <img class="nav_icons" src="<?php echo base_url('assets/items_img/chat2.gif') ?>" alt="">
              </div>
              <span class="nav-link-text ms-1 itm_txt">Audit Logs</span>
            </a>
              <div class="collapse" id="collapseExample">
                <div class="audit_logs_btn">
                  <div class="audit_logs">
                    <a href="<?php echo base_url('index.php/admin_logs') ?>">admin logs</a>
                    <a href="<?php echo base_url('index.php/user_logs') ?>">user logs</a>
                  </div>

                </div>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="<?php echo base_url('index.php/staff_creation') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <img class="nav_icons" src="<?php echo base_url('assets/items_img/chat2.gif') ?>" alt="">
              </div>
              <span class="nav-link-text ms-1 itm_txt">Staff Creation</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/Customize') ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <img class="nav_icons" src="<?php echo base_url('assets/items_img/custom.png') ?>" alt="">
              </div>
              <span class="nav-link-text ms-1 itm_txt">Customize</span>
            </a>
          </li>
        <?php }else{ ?>
        <?php }?>

      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
        <div class="full-background" style="background-image: url('../assets/img/curved-images/white-curved.jpg')"></div>

      </div>
    
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Categories</li>
          </ol>
          <h6 class="font-weight-bolder mb-0"><?= $category_name ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><img class="search_icon" src="<?php echo base_url('assets/items_img/search.gif') ?>" alt=""></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
  
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->





 <!-- CONTENT -->
 <div class="container-fluid py-4 active_items" id="active_items">
  
      <div class="row">
        
        <div class="col-12">
          <div class="card mb-4">
            
            <div class=" mt-4">
              <h4 class="text-center itm_txt"><?= $category_name ?> ITEMS</h4>
              <div class="d-flex justify-content-between pt-3">
                <div class="ms-3 ps-4 d-flex">
                  <form class="" method='post' action="<?= base_url('index.php/retrieve_cpu_data') ?>" >
                    <div class="input-group">
                        <button type='submit' name='submit' value='search' class="input-group-text text-body"><img class="search_icon" src="<?php echo base_url('assets/items_img/search.gif') ?>" alt=""></button>
                        <input type="text" class="form-control" placeholder="Search here...">
                    </div>  
                  </form>
                </div>

                <div class="d-flex me-3  gap-2">
                      <?php if($admin_level == "admin") {?> 
                      <button class="icon_btn add_btn me-2" onclick="pop_modal2()">
                          <div class="add_icon"></div>
                          <div class=" btn_txt ">Add Item</div>
                      </button>
                      <?php }else{ ?>
                      <?php }?> 
                      <button class=" btn btn-dark" onclick="active_itm()" >Active items</button>
                      <a href="<?php echo base_url('index.php/Items_inactive_table') ?>" class=" btn "><b class="itm_txt">Inactive items</b> </a>
                </div>   
              
              </div>

            </div>         
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive   ">
                <table class="table align-items-center mb-0 tbl_hover pe-3 ps-3 pb-3">
                  <thead>
                    <tr >
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">NO.</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Img</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Product</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Brand</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Category</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Description</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Supplier</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Quantity</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Price</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Cost</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Date/Time</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Active?</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Best Selling?</th>
                      <?php if($admin_level == "admin") {?>
                        <th class="text-uppercase table_title font-weight-bolder itm_txt ">Action</th>
                      <?php }else{ ?>
                      <?php }?>
                    </tr>
                  </thead>
                  <tbody id="active_items" class="active_items">

    
            <!-- This code is to select which data should be display in the table -->
            <?php 
                $dataPerPage = 5; // set number of data per page
                $data = $data1['result'];
                rsort($data); // sort the data array in reverse order (latest data first)
                $category_name = isset($_GET['category_name']) ? $_GET['category_name'] : '';
                $category_data = array_filter($data, function($row) use ($category_name) {
                    return $row['category_name'] == $category_name && $row['active'] == 1; // filter out the items with active value 0
                });
                $totalData = count($category_data); // count the total number of data for the category
                $totalPages = ceil($totalData / $dataPerPage); // calculate the total number of pages
                $page = isset($_GET['page']) ? $_GET['page'] : 1; // get current page number
                if($totalPages > 1 && $page > $totalPages) {
                    header("Location: ?category_name=$category_name&page=$totalPages");
                }
                $start = ($page - 1) * $dataPerPage; // calculate the starting point for fetching data
                $data = array_slice($category_data, $start, $dataPerPage); // slice the data to get only the ones for the current page
                $counter = $start; // initialize the counter variable


            if (count($data) > 0) {
                ?>

    <?php foreach($data as $row) { ?>
        <tr>

        
            <td><p class="mb-0 px-4 py-1 itm_txt text-sm font-weight-bold "><?php echo ++$counter ?></p></td>
            <td>
              <span class=" ps-3 text-sm font-weight-bold"> 
                <img class="itm_imgs"  src="<?php echo base_url('assets/image/all_item_img/' . $row['item_image']) ?>" alt="">
              </span>
            </td>    
            <td><p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row['item_name_model'] ?></p> </td>
            <td><p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row['item_brand'] ?></p> </td>
            <td><p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row['category_name'] ?></p> </td>
            <td><p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row['item_description'] ?></p> </td>
            <td><p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row['supplier'] ?></p> </td>
            <td><p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row['item_quantity'] ?></p> </td>
            <td><p class="text-sm ps-4 font-weight-bold mb-0">₱ <?php echo $row['item_price'] ?></p> </td>
            <td><p class="text-sm ps-4 font-weight-bold mb-0">₱ <?php echo $row['item_cost'] ?></p> </td>
            <td><p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row['date_time'] ?></p> </td>
            <!-- THIS IS FOR THE ACTIVE AND INACTIVE -->
            <td>
            <?php if($admin_level == "admin") {?>
              <div class="form-check">
                <form class="myForm" action="<?php echo base_url('index.php/active_update_item') ?>" method="POST">
                  <input type="hidden" name="active" value="0">
                  <input type="hidden" name="defective_id" value="<?php echo $row['item_id'] ?>">
                  <input class="form-check-input fcustomCheck1" type="checkbox" value="1" name="active" id="fcustomCheck1" <?php if($row['active'] == 1)echo "checked"?>>
                  <label class="custom-control-label" for="customCheck1">Active</label>                              
                </form>
              </div>
              <?php }else{ ?>
                <div class="form-check">
          
                  <input type="hidden" name="active" value="0">
                  <input type="hidden" name="defective_id" value="<?php echo $row['item_id'] ?>">
                  <input class="form-check-input fcustomCheck1" type="checkbox" value="1" name="active" id="fcustomCheck1" <?php if($row['active'] == 1)echo "checked"?>>
                  <label class="custom-control-label" for="customCheck1">Active</label>                              
      
              </div>
              <?php }?>
            </td>
            <!-- END OF ACTIVE AND INACTIVE -->

            <!-- THIS IS FOR THE BEST SELLING ITEMS -->
            <td>
            <?php if($admin_level == "admin") {?>
              <div class="form-check">
                <form class="myForm" action="<?php echo base_url('index.php/best_selling_item') ?>" method="POST">
                  <input type="hidden" name="active" value="0">
                  <input type="hidden" name="defective_id" value="<?php echo $row['item_id'] ?>">
                  <input class="form-check-input fcustomCheck1" type="checkbox" value="1" name="active" id="fcustomCheck1" <?php if($row['best_selling'] == 1)echo "checked"?>>
                  <label class="custom-control-label" for="customCheck1">Best Selling</label>                              
                </form>
              </div>
              <?php }else{ ?>
                <div class="form-check">
          
                  <input type="hidden" name="active" value="0">
                  <input type="hidden" name="defective_id" value="<?php echo $row['item_id'] ?>">
                  <input class="form-check-input fcustomCheck1" type="checkbox" value="1" name="active" id="fcustomCheck1" <?php if($row['best_selling'] == 1)echo "checked"?>>
                  <label class="custom-control-label" for="customCheck1">Best Selling</label>                              
      
              </div>
              <?php }?>
            </td>
            <!--END OF THE BEST SELLING ITEMS -->

            <?php if($admin_level == "admin") {?>
              <td class="">
                <div class="d-flex ">
                  <span class="ms-3">
                    <a href="<?php echo base_url('index.php/features/items_cont/update_item/update_item_controller/get_item_Details/' .$row['item_id']) ?>"  data-bs-toggle="tooltip" data-bs-placement="top" title="Update">
                      <div class="edit_container">
                          <img class="edit_icon" src="<?php echo base_url('assets/items_img/edit.gif') ?>" alt="">
                      </div>
                    </a>
                  </span>
                </div>
              </td>
            <?php }else{ ?>
            <?php }?>
              

        </tr>
          <?php } ?>
          <!-- end -->


          <?php } else { ?>

              <tr>
                      <td class="text-center" colspan="12"><h3>No Data Available!!</h3> </td>
              </tr>
                  
      <?php
      }

      // display pagination links
      if ($totalPages > 1) {
          ?>
        </tbody>
              </table>

      <nav aria-label="..." id="active_pagination" class="active_pagination">
        <ul class="pagination ps-5">
          <?php
          $url = "?category_name=$category_name&page=";
          if ($page > 1) {
            ?>
            <li class="page-item">
              <a class="page-link" href="<?php echo $url . ($page - 1) ?>" tabindex="-1">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <?php
          } else {
            ?>
            <li class="page-item disabled">
              <a class="page-link" href="javascript:;" tabindex="-1">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <?php
          }

          for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $page) {
              ?>
              <li class="page-item active">
                <a class="page-link" href="javascript:;"><?php echo $i ?><span class="sr-only">(current)</span></a>
              </li>
              <?php
            } else {
              ?>
              <li class="page-item">
                <a class="page-link" href="<?php echo $url . $i ?>"><?php echo $i ?></a>
              </li>
              <?php
            }
          }

          if ($page < $totalPages) {
            ?>
            <li class="page-item">
              <a class="page-link" href="<?php echo $url . ($page + 1) ?>">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
              </a>
            </li>
            <?php
          } else {
            ?>
            <li class="page-item disabled">
              <a class="page-link" href="javascript:;">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
              </a>
            </li>
            <?php
          }
          ?>
        </ul>
      </nav>
      <?php }?>

   
        <table class="d_none table align-items-center mb-0 tbl_hover pe-3 ps-3 pb-3" >
        <tbody>
            <?php $no = 1;  foreach ($data3['result'] as $row2): ?>
              <tr>
                <td><p class="mb-0 px-4 py-1 itm_txt text-sm font-weight-bold "><?php echo $no ?></p></td>
                <td>
                  <span class=" ps-3 text-sm font-weight-bold"> 
                    <img class="itm_imgs"  src="<?php echo base_url('assets/image/all_item_img/' . $row2['item_image']) ?>" alt="">
                  </span>
                </td> 
                <td><p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row2['item_name_model'] ?></p> </td>
                <td><p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row2['item_brand'] ?></p> </td>
                <td><p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row2['category_name'] ?></p> </td>
                <td><p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row2['item_description'] ?></p> </td>
                <td><p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row2['supplier'] ?></p> </td>
                <td><p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row2['item_quantity'] ?></p> </td>
                <td><p class="text-sm ps-4 font-weight-bold mb-0">₱ <?php echo $row2['item_price'] ?></p> </td>
                <td><p class="text-sm ps-4 font-weight-bold mb-0">₱ <?php echo $row2['item_cost'] ?></p> </td>
                <td><p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row2['date_time'] ?></p> </td>
                <td>
                  <div class="form-check">
                      <form class="myForm" action="<?php echo base_url('index.php/inactive_update_item') ?>" method="POST">
                        <input type="hidden" name="active" value="0">
                        <input type="hidden" name="defective_id" value="<?php echo $row2['item_id'] ?>">
                        <input class="form-check-input fcustomCheck1" type="checkbox" value="1" name="active" id="fcustomCheck1" <?php if($row2['active'] == 1)echo "checked"?>>
                        <label class="custom-control-label" for="customCheck1">Active</label>                              
                      </form>
                    </div>
                </td>
              </tr>
              <?php $no++; ?>
            <?php endforeach; ?>
            </tbody>
            </table>
    
  

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End CONTENT -->

 <!-- CONTENT -->
 <div class="container-fluid py-4 d_none inactive_items" id="inactive_items">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class=" mt-4">
              <h4 class="text-center itm_txt"><?= $category_name ?> ITEMS</h4>
              <div class="d-flex justify-content-between pt-3">
                <div class="ms-3 ps-4 d-flex">
                  <form class="" method='post' action="<?= base_url('index.php/retrieve_cpu_data') ?>" >
                    <div class="input-group">
                        <button type='submit' name='submit' value='search' class="input-group-text text-body"><img class="search_icon" src="<?php echo base_url('assets/items_img/search.gif') ?>" alt=""></button>
                        <input type="text" class="form-control" placeholder="Search here...">
                    </div>  
                  </form>

                </div>

                <div class="d-flex me-3  gap-2">
                      <button class="icon_btn add_btn me-2" onclick="pop_modal2()">
                          <div class="add_icon"></div>
                          <div class=" btn_txt ">Add Item</div>
                      </button>
                      <button class=" btn " onclick="active_itm()" ><b class="itm_txt">Active items</b> </button>
                      <a href="<?php echo base_url('index.php/Items_inactive_table') ?>" class=" btn btn-dark">inactive items</a>
                </div>   
                <!-- <div class="d-flex me-3  gap-2">
                      <button class="icon_btn add_btn me-2" onclick="pop_modal2()">
                          <div class="add_icon"></div>
                          <div class=" btn_txt ">Add Item</div>
                      </button>
                      <button class=" btn " onclick="active_itm()" ><b class="itm_txt">Active items</b> </button>
                      <button class=" btn btn-dark" onclick="inactive_itm()">inactive items</button>
                </div>    -->
 
              </div>

 
            </div>         
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive   ">
                <table class="table align-items-center mb-0 tbl_hover pe-3 ps-3 pb-3">
                  <thead>
                    <tr id="active_navs">
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">NO.</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Img</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Product</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Brand</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Category</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Description</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Supplier</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Quantity</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Price</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Cost</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Date/Time</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Active?</th>
                      <th class="text-uppercase table_title font-weight-bolder itm_txt ">Best Selling?</th>
                      <?php if($admin_level == "admin") {?>
                        <th class="text-uppercase table_title font-weight-bolder itm_txt ">Action</th>
                      <?php }else{ ?>
                      <?php }?>
                    </tr>
                  </thead>
                  <tbody id="active_items" >
        <?php
        $totalItems2 = count($data3['result']);
        $itemsPerPage2 = 5;
        $totalPages2 = ceil($totalItems2 / $itemsPerPage2);
        $currentPage2 = isset($_GET['page2']) ? $_GET['page2'] : 1;
        $startIndex2 = ($currentPage2 - 1) * $itemsPerPage2;
        $endIndex2 = min($startIndex2 + $itemsPerPage2 - 1, $totalItems2 - 1);
        $no2 = $startIndex2 + 1;
        foreach (array_slice($data3['result'], $startIndex2, $itemsPerPage2) as $row2) {
 
            ?>
            <tr>
                <td>
                    <p class="mb-0 px-4 py-1 itm_txt text-sm font-weight-bold"><?php echo $no2 ?></p>
                </td>
                <td>
                    <span class="ps-3 text-sm font-weight-bold">
                        <img class="itm_imgs" src="<?php echo base_url('assets/image/all_item_img/' . $row2['item_image']) ?>" alt="">
                    </span>
                </td>
                <td>
                    <p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row2['item_name_model'] ?></p>
                </td>
                <td>
                    <p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row2['item_brand'] ?></p>
                </td>
                <td>
                    <p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row2['category_name'] ?></p>
                </td>
                <td>
                    <p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row2['item_description'] ?></p>
                </td>
                <td>
                    <p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row2['supplier'] ?></p>
                </td>
                <td>
                    <p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row2['item_quantity'] ?></p>
                </td>
                <td>
                    <p class="text-sm ps-4 font-weight-bold mb-0">₱ <?php echo $row2['item_price'] ?></p>
                </td>
                <td>
                    <p class="text-sm ps-4 font-weight-bold mb-0">₱ <?php echo $row2['item_cost'] ?></p>
                </td>
                <td>
                    <p class="text-sm ps-4 font-weight-bold mb-0"><?php echo $row2['date_time'] ?></p>
                </td>
                <!-- THIS IS FOR THE ACTIVE AND INACTIVE -->
            </tr>
            <?php
            $no2++;
        }
        ?>

<!-- Pagination links -->
<?php
$pagination2 = '<ul class="pagination">';
if ($currentPage2 > 1) {
    $pagination2 .= '<li class="page-item"><a class="page-link" href="?category_name=' . urlencode($category_name) . '&page2=' . ($currentPage2 - 1) . '">Previous</a></li>';
}

for ($page = 1; $page <= $totalPages2; $page++) {
    if ($page == $currentPage2) {
        $pagination2 .= '<li class="page-item active"><a class="page-link" href="?category_name=' . urlencode($category_name) . '&page2=' . $page . '">' . $page . '</a></li>';
    } else {
        $pagination2 .= '<li class="page-item"><a class="page-link" href="?category_name=' . urlencode($category_name) . '&page2=' . $page . '">' . $page . '</a></li>';
    }
}

if ($currentPage2 < $totalPages2) {
    $pagination2 .= '<li class="page-item"><a class="page-link" href="?category_name=' . urlencode($category_name) . '&page2=' . ($currentPage2 + 1) . '">Next</a></li>';
}

$pagination2 .= '</ul>';

echo $pagination2;
?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End CONTENT -->

  


    <footer class="footer pt-3  ">

    </footer>
    </div>
</main>
<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
        <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
            <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
            <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
            <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                <i class="fa fa-close"></i>
            </button>
        </div>
        <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
            <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
        </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
            <h6 class="mb-0">Sidenav Type</h6>
            <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
            <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
            <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
            <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <div class="pt-5">
            <a class="btn btn-gradient m-auto bg-danger text-light h5" href="<?php echo base_url('index.php/admin_logout') ?>">LOG-OUT</a>
        </div>
    </div>
    </div>
</div>







   <!--CPU Modal-->

   <div class="popup_modal_container modal3" >
        <div class="pb-5 popupModal  d-flex justify-content-center  modal4"   >
            <div class="mt-1  pb-4">  
              <div class=" modal_form_defective_cont2 shadow align-self-center ">
                      <div class="modal_box2 ">
                          <button class="modal_close_btn ms-3" type="submit"  onclick="close_pop_modal2()" >
                            <img class="close_icon" src="<?php echo base_url('assets/items_img/close.gif') ?>" alt="">
                          </button>
                      </div>
                      <div class="modal_title">
                          <h5 class="itm_txt">ADD ITEM TO <?= $category_name ?></h5>
                      </div>
                      <div class=" ps-4 pe-4 ">
                          <form   action="<?php echo base_url('index.php/insert_item') ?>" method="POST"  enctype="multipart/form-data">
                              <!--input category-->
                              <div class="" style="display:none;">
                                  <input type="text" value="1" name="active">
                                  <input name="category" type="text" value="<?= $category_name ?>" name="active">
                              </div>
                              <!--END input category-->
                              <div class="d-flex justify-content-end mb-2 item_mdal_inpt_container">
                                  <label class="me-4 mt-2 modal_label itm_pd" ><img class="general_icon" src="<?php echo base_url('assets/items_img') ?> /tag.png" alt=""></label>
                                  <input type="text" name="name_model"  class="form-control name" placeholder="Product" data-bs-toggle="tooltip" data-bs-placement="top" title="Product" required>
                              </div>
                              <div class="d-flex justify-content-end mb-2 item_mdal_inpt_container">
                                  <label class="me-4 mt-2 modal_label itm_pd" ><img class="general_icon " src="<?php echo base_url('assets/items_img') ?> /supplier.png" alt=""></label>
                                  <input type="text" name="supplier" class="form-control brnd" placeholder="Supplier" data-bs-toggle="tooltip" data-bs-placement="top" title="Supplier" required>
                              </div>
                              <div class="d-flex justify-content-end mb-2 item_mdal_inpt_container">
                                  <label class="me-4 mt-2 modal_label itm_pd" ><img class="general_icon" src="<?php echo base_url('assets/items_img') ?> /info.png" alt=""></label>
                                  <input type="text" name="description"  class="form-control" placeholder="Description" data-bs-toggle="tooltip" data-bs-placement="top" title="Description" required>
                              </div>
                              <div class="d-flex justify-content-end mb-2 item_mdal_inpt_container">
                                  <label class="me-4 mt-2 modal_label itm_pd"><img class="general_icon" src="<?php echo base_url('assets/items_img/image.png') ?> " alt=""></label>
                                  <input type="file" name="userfile"  class="form-control" placeholder="image"  data-bs-toggle="tooltip" data-bs-placement="top" title="Item Image" required>
                              </div>
                              <div class="row">
                                  <div class="d-flex justify-content-end mb-1 col item_mdal_inpt_container">
                                    <label class="me-3 mt-2 modal_label itm_pd" ><img class="general_icon" src="<?php echo base_url('assets/items_img') ?> /product.png" alt=""></label>
                                    <input type="number" name="quantity" class="form-control" placeholder="quantity" data-bs-toggle="tooltip" data-bs-placement="top" title="Quantity" required>
                                  </div>
                                  <div class="d-flex justify-content-end mb-1 col item_mdal_inpt_container">
                                    <label class="me-3 mt-2 modal_label itm_pd" ><img class="general_icon" src="<?php echo base_url('assets/items_img') ?> /brand.png" alt=""></label>
                                    <input type="text" name="brand" class="form-control" placeholder="Brand" data-bs-toggle="tooltip" data-bs-placement="top" title="Brand" required>
                                  </div>
                              </div> 
                              <div class="row">
                                  <div class="d-flex justify-content-end mb-1 col  item_mdal_inpt_container">
                                    <label class="me-3 mt-2 modal_label itm_pd" ><img class="general_icon" src="<?php echo base_url('assets/items_img') ?> /price.png" alt=""></label>
                                    <input type="number" name="price" class="form-control" placeholder="$Price" data-bs-toggle="tooltip" data-bs-placement="top" title="Price" required>
                                  </div>
                                  <div class="d-flex justify-content-end mb-1 col  item_mdal_inpt_container">
                                    <label class="me-3 mt-2 modal_label itm_pd" ><img class="general_icon" src="<?php echo base_url('assets/items_img') ?> /cost.png" alt=""></label>
                                    <input type="number" name="cost" class="form-control" placeholder="Item Cost" data-bs-toggle="tooltip" data-bs-placement="top" title="Item Cost" required>
                                  </div>
                              </div> 
                            
                              <div class="d-flex justify-content-center mt-4">
                                  <span>
                                    <div class="button-borders">
                                      <button type="submit"  class="primary-button" >save </button>
                                    </div>
                                  </span>
                              </div>
                          </form>
                      </div>
              </div>
            </div>
        </div>
      </div>
    <!-- end CPU modal-->







  <!--CPU UPDATE Modal-->

  <div class="popup_modal_container" id="modal1">
        <div class="popupModal d-flex align-items-center justify-content-center " id="modal2" >
            <div class="">  
              <div class=" modal_form_cont shadow align-self-center ">
                      <div class="modal_box2 ">
                          <button class="modal_close_btn" type="submit"  onclick="close_pop_modal()" >
                            <img class="close_icon" src="<?php echo base_url('assets/items_img/close.gif') ?>" alt="">
                          </button>
                      </div>
                      <div class="modal_title">
                          <h5 class="itm_txt">UPDATE CPU ITEM</h5>
                      </div>
                      <div class="  ">
                          <form  id="myform" class="ms-4 me-4  pb-3 " enctype="multipart/form-data">
                              <!--input category-->
                              <div class="" style="display:none;">
                                  <input type="text" value="CPU" name="category">
                              </div>
                              <!--END input category-->
                              <div class="d-flex justify-content-end mb-2 item_mdal_inpt_container">
                                  <label class="me-4 mt-2 modal_label itm_pd" id="name_error"><img class="general_icon" src="<?php echo base_url('assets/items_img') ?> /tag.png" alt=""></label>
                                  <input type="text" name="name_model" id="name_model" class="form-control name" value="<?php echo $result['item_name_model'] ?>"  required>
                              </div>
                              <div class="d-flex justify-content-end mb-2 item_mdal_inpt_container">
                                  <label class="me-4 mt-2 modal_label itm_pd" id="supplier_error"><img class="general_icon " src="<?php echo base_url('assets/items_img') ?> /supplier.png" alt=""></label>
                                  <input type="text" name="supplier" class="form-control brnd" placeholder="Supplier" required>
                              </div>
                              <div class="d-flex justify-content-end mb-2 item_mdal_inpt_container">
                                  <label class="me-4 mt-2 modal_label itm_pd" id="description_error"><img class="general_icon" src="<?php echo base_url('assets/items_img') ?> /info.png" alt=""></label>
                                  <input type="text" name="description"  class="form-control" placeholder="Description" required>
                              </div>
                              <div class="d-flex justify-content-end mb-2 item_mdal_inpt_container">
                                  <label class="me-4 mt-2 modal_label itm_pd" id="description_error"><img class="general_icon" src="<?php echo base_url('assets/items_img/image.png') ?> " alt=""></label>
                                  <input type="file" name="userfile" id="userfile"  class="form-control" placeholder="image" >
                              </div>
                              <div class="row">
                                  <div class="d-flex justify-content-end mb-1 col item_mdal_inpt_container">
                                    <label class="me-3 mt-2 modal_label itm_pd" id="quantity_error"><img class="general_icon" src="<?php echo base_url('assets/items_img') ?> /product.png" alt=""></label>
                                    <input type="number" name="quantity" class="form-control" placeholder="quantity" required>
                                  </div>
                                  <div class="d-flex justify-content-end mb-1 col item_mdal_inpt_container">
                                    <label class="me-3 mt-2 modal_label itm_pd" id="brand_error"><img class="general_icon" src="<?php echo base_url('assets/items_img') ?> /brand.png" alt=""></label>
                                    <input type="text" name="brand" class="form-control" placeholder="Brand" required>
                                  </div>
                              </div> 
                              <div class="row">
                                  <div class="d-flex justify-content-end mb-1 col  item_mdal_inpt_container">
                                    <label class="me-3 mt-2 modal_label itm_pd" id="price_error"><img class="general_icon" src="<?php echo base_url('assets/items_img') ?> /price.png" alt=""></label>
                                    <input type="number" name="price" class="form-control" placeholder="$Price" required>
                                  </div>
                                  <div class="d-flex justify-content-end mb-1 col  item_mdal_inpt_container">
                                    <label class="me-3 mt-2 modal_label itm_pd" id="cost_error"><img class="general_icon" src="<?php echo base_url('assets/items_img') ?> /cost.png" alt=""></label>
                                    <input type="number" name="cost" class="form-control" placeholder="Item Cost" required>
                                  </div>
                              </div> 
                            
                              <div class="d-flex justify-content-center mt-4">
                                  <span>
                                    <div class="button-borders">
                                      <button type="submit"  class="primary-button" id="itm_ajax_sbmit_bttn">save </button>
                                    </div>
                                  </span>
                              </div>
                          </form>
                      </div>
              </div>
            </div>
        </div>
      </div>
    <!-- end CPU modal-->















<script>
class DeleteLink {
    constructor(linkElement) {
        this.linkElement = linkElement;
        this.addClickHandler();
    }

    addClickHandler() {
        this.linkElement.addEventListener('click', (event) => {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.executeLink();
                }
            });
        });
    }

    executeLink() {
        window.location.href = this.linkElement.getAttribute('href');
    }
}

const deleteLinks = document.querySelectorAll('.delete-link');
deleteLinks.forEach((link) => {
    new DeleteLink(link);
});
</script>







<script>
  const forms = document.querySelectorAll('.myForm');

  forms.forEach(form => {
    const checkbox = form.querySelector('.fcustomCheck1');

    checkbox.addEventListener('change', () => {
      if (checkbox.checked) {
        form.querySelector('input[name="active"]').value = '1';
      } else {
        form.querySelector('input[name="active"]').value = '0';
      }
      form.submit();
    });
  });
</script>


<script>
    let active_items = document.getElementById('active_items');
    let active_pagination = document.getElementById('active_pagination');
    let inactive_items = document.getElementById('inactive_items');
    let inactive_items2 = document.getElementsByClassName('inactive_items')[0];
    let active_navs = document.getElementById('active_navs');


    function inactive_itm(){
        active_items.style.display = "none";
        // active_pagination.style.display = "none";
        inactive_items.style.display = "block";
        active_navs.style.display = "";
        
    }
    function active_itm(){
        active_items.style.display = "block";
        // active_pagination.style.display = "";
        inactive_items.style.display = "none";
        inactive_items2.style.display = "none";
        active_navs.style.display = "none";
    }
</script>



