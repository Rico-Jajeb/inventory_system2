<!--
=========================================================
* Soft UI Design System - v1.0.9
=========================================================

* Product Page:  https://www.creative-tim.com/product/soft-ui-design-system 
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
  
<!--SESSION -->
<?php
    // Check if the user is logged in
    if ($this->session->userdata('connect') == true ){
        $sess = $this->session->userdata('user_name');
        $sess2 = $this->session->userdata('user_id');
    } else {
        // Set default values if the user is not logged in
        $sess = "Guest";
        $sess2 = "";
    }
?>
<!--END SESSION -->

<?php if($this->session->flashdata('status')) {?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Added to Shopping Cart',
                icon: 'success'
            });
        });
    </script>
<?php }?>

<?php if($this->session->flashdata('status3')) {?>
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Check Out Successfully',
                icon: 'success'
            });
        });
    </script>
<?php }?>

  <!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0"><div class="row"><div class="col-12">
    <nav class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
            <div class="container-fluid px-0">
            <a class="navbar-brand font-weight-bolder ms-sm-3" href="" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                <img src="<?php echo base_url('assets/image/system_logo/' . $data4['result']['system_logo']) ?>" class="system_logo" alt="main_logo">
                <b class="ms-2"><?php echo $data4['result']['system_tittle'] ?></b> 
              </a>
              <div class=" d-flex  align-items-center justify-content-center row">
                <form method="post" action="<?= base_url('index.php/search_products') ?>" method="post">
                    <div class="container4">
                        <input placeholder="Type to search..." required="" value="" class="search_input5" name="search_defective_items" type="text">
                        <div class="search_icon8">
                            <svg viewBox="0 0 512 512" class="ionicon" xmlns="http://www.w3.org/2000/svg">
                                <title>Search</title>
                                <path stroke-width="32" stroke-miterlimit="10" stroke="currentColor" fill="none" d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"></path>
                                <path d="M338.29 338.29L448 448" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke="currentColor" fill="none"></path>
                            </svg>
                        </div>
                    </div>
                    <input type="hidden" name="page" value="2"> <!-- Add a hidden input to indicate page 2 -->
                </form>
              </div>
              <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </span>
              </button> 
              <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ms-lg-8 ps-lg-5 w-100">

                <li class="nav-link me-1">
                  <a href="<?php echo base_url('index.php/user_page')?>">
                    Home
                  </a>
                </li>
                  <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="javascript:;" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                      Categories
                      <!-- <img src="<?php echo base_url('assets/assets/img/down-arrow-dark.svg')?>" alt="down-arrow " class="arrow ms-1"> -->
                      <img src="<?php echo base_url('assets/assets/img/down-arrow-dark.svg') ?>" alt="down-arrow " class="arrow ms-1">
                    </a>
              <div class="dropdown-menu dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages">
              <div class="d-none d-lg-block">
              <?php foreach($data3['result'] as $row){  ?>
                  <a href="<?php echo base_url('index.php/display_items_category?category_name=' . $row['category_name']) ?>">
                  <div class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0 ">
                    <div class="d-inline-block">
                      <div class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>shop </title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(0.000000, 148.000000)">
                                  <path
                                    d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z" opacity="0.598981585"></path>
                                  <path
                                    d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                    </div>
                
                      <?php echo $row['category_name'] ?>
                 
                  </div> 
                  </a>
                  <?php }?>   

          </div>



          <div class="d-lg-none">
            <div class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0">
              <div class="d-inline-block">
                <div class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                  <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>shop</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                          <g transform="translate(0.000000, 148.000000)">
                            <path
                              d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z" opacity="0.598981585"></path>
                            <path
                              d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                          </g>
                        </g>
                      </g>
                    </g>
                  </svg>
                </div>
              </div>
              Landing Pages
            </div>

            <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
              <span class="ps-3">About Us </span>
            </a>
            <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
              <span class="ps-3">Contact Us</span>
            </a>
            <a href="./pages/author.html" class="dropdown-item border-radius-md">
              <span class="ps-3">Author</span>
            </a>

            <div class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0 mt-3">
              <div class="d-inline-block">
                <div class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center ps-0">
                  <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>office</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                          <g transform="translate(153.000000, 2.000000)">
                            <path d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z" opacity="0.6"></path>
                            <path
                              d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                          </g>
                        </g>
                      </g>
                    </g>
                  </svg>
                </div>
              </div>
              Account
            </div>
            <a href="./pages/sign-in.html" class="dropdown-item border-radius-md">
              <span class="ps-3">Sign In</span>
            </a>

            </div>

          </div>
                  </li>

          <li class="nav-item  mx-2">
            <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="<?php echo base_url('index.php/display_all_products') ?>" aria-expanded="false">
              All Products
            </a>
          </li>
<!-- 
          <li class="nav-item dropdown dropdown-hover mx-2">
            <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="javascript:;" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
              Docs
              <img src="<?php echo base_url('assets/assets/img/down-arrow-dark.svg') ?>" alt="down-arrow" class="arrow ms-1"/>
            </a>
            <div class="dropdown-menu dropdown-menu-animation dropdown-lg mt-0 mt-lg-3 p-3 border-radius-lg" aria-labelledby="dropdownMenuDocs">
              <div class="d-none d-lg-block">
            <ul class="list-group">
              <li class="nav-item list-group-item border-0 p-0">
                <a class="dropdown-item py-2 ps-3 border-radius-md" href=" https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-design-system ">
                  <div class="d-flex">
                    <div class="icon h-10 me-3 d-flex mt-1">
                      <svg class="text-secondary" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>spaceship</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(4.000000, 301.000000)">
                                <path class="color-background"
                                  d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z">
                                </path>
                                <path class="color-background"
                                  d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z">
                                </path>
                                <path class="color-background"
                                  d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z"
                                  opacity="0.598539807"></path>
                                <path class="color-background"
                                  d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z"
                                  opacity="0.598539807"></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <div>
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Getting Started</h6>
                      <span class="text-sm">All about </span>
                    </div>
                  </div>
                  </a>
                </li>
                </ul>
              </div>
              </div>
            </li> -->

            <li class="nav-link ms-3 me-3">
              <a href="<?php echo base_url('index.php/add_to_cart_page') ?>">
                <img class="cart_icon2" src="<?php echo base_url('assets/items_img/add_to_cart.png') ?>" alt=""> 
              </a>
     
            </li>

            <li class="nav-item dropdown dropdown-hover mx-2">
              <a class="nav-link ps-2  d-flex justify-content-between cursor-pointer align-items-center" href="javascript:;" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                <b class=""><?php echo $sess ?></b> 
                <img src="<?php echo base_url('assets/assets/img/down-arrow-dark.svg') ?>" alt="down-arrow" class="arrow ms-1"/>
              </a>
              <div  class="dropdown-menu  " aria-labelledby="dropdownMenuDocs">
                <div class="d-none d-lg-block">
                  <ul class="list-group ">
                  <li class="nav-item list-group-item border-0 p-0 pb-1">
                    <?php if($sess == "Guest") {?> 
                      <a class="dropdown-item py-2 ps-3 border-radius-md " href="<?php echo base_url('index.php/login') ?>">
                        <div class="d-flex">
                          <div class="icon h-10 me-3 d-flex mt-1">
                            <img src="<?php echo base_url('assets/items_img/user2.png') ?>" alt="">
                          </div>
                          <div>
                            <h6 class="dropdown-header itm_txt font-weight-bolder d-flex justify-content-cente align-items-center p-0">Profile</h6>
                          </div>
                        </div>
                      </a>
                      <?php }else{ ?>
                        <a class="dropdown-item py-2 ps-3 border-radius-md " href="<?php echo base_url('index.php/user_profile_page') ?>">
                        <div class="d-flex">
                          <div class="icon h-10 me-3 d-flex mt-1">
                            <img src="<?php echo base_url('assets/items_img/user2.png') ?>" alt="">
                          </div>
                          <div>
                            <h6 class="dropdown-header itm_txt font-weight-bolder d-flex justify-content-cente align-items-center p-0">Profile</h6>
                          </div>
                        </div>
                      </a>
                      <?php }?> 
                    </li>
                    <li class="nav-item list-group-item border-0 p-0 pb-1">
                    <?php if($sess == "Guest") {?> 
                      <a class="dropdown-item py-2 ps-3 border-radius-md " href="<?php echo base_url('index.php/login') ?>">
                        <div class="d-flex">
                          <div class="icon h-10 me-3 d-flex mt-1">
                            <img src="<?php echo base_url('assets/items_img/purchase.png') ?>" alt="">
                          </div>
                          <div>
                            <h6 class="dropdown-header itm_txt font-weight-bolder d-flex justify-content-cente align-items-center p-0">My Purchase</h6>
                          </div>
                        </div>
                      </a>
                      <?php }else{ ?>
                        <a class="dropdown-item py-2 ps-3 border-radius-md " href="<?php echo base_url('index.php/user_profile_order') ?>">
                        <div class="d-flex">
                          <div class="icon h-10 me-3 d-flex mt-1">
                            <img src="<?php echo base_url('assets/items_img/purchase.png') ?>" alt="">
                          </div>
                          <div>
                            <h6 class="dropdown-header itm_txt font-weight-bolder d-flex justify-content-cente align-items-center p-0">My Purchase</h6>
                          </div>
                        </div>
                      </a>
                      <?php }?> 
                    </li>
                    <li class="nav-item list-group-item border-0 p-0 ">
                    <?php if($sess == "Guest") {?>  
                        <a class="dropdown-item py-2 ps-3 border-radius-md " href="<?php echo base_url('index.php/login') ?>">
                          <div class="d-flex">
                            <div class="icon h-10 me-3 d-flex mt-1">
                              <img src="<?php echo base_url('assets/items_img/logout.png') ?>" alt="">
                            </div>
                              <div>
                                <h6 class="dropdown-header itm_txt font-weight-bolder d-flex justify-content-cente align-items-center p-0">Login</h6>
                              </div>                        
                          </div>
                        </a>
                        <?php }else{ ?>
                          <a class="dropdown-item py-2 ps-3 border-radius-md " href="<?php echo base_url('index.php/user_logout') ?>">
                              <div class="d-flex">
                                <div class="icon h-10 me-3 d-flex mt-1">
                                  <img src="<?php echo base_url('assets/items_img/logout.png') ?>" alt="">
                                </div>
                                  <div>
                                    <h6 class="dropdown-header itm_txt font-weight-bolder d-flex justify-content-cente align-items-center p-0">Logout</h6>
                                  </div>                        
                              </div>
                            </a>
                        <?php }?>  
                    </li>
                  </ul>
                </div>
              </div>
            </li>

    </ul>   
</div>

    </nav>
    <!-- End Navbar -->
</div></div></div>

  

  

<header class="header-2 mb-5">
  <div class="user_page_header  page_header2 relative" style="background-image: url('<?php echo base_url('assets/image/system_background_img/' . $data4['result']['system_background_image']) ?>')">
 
    <div class="container cont_dis">
      <div class="row  ">
        <div class="col-lg-7 text-center mt-5 mx-auto">
          <h1 class="text-white pt-3 mt-5 not_affected"><b class="text_shadow">Product Details</b> </h1>
        </div>
      </div>
    </div>
  </div>
</header>




<section class="my-5 py-5">
      <div class="container-fluid row ">


        <div class="col-10 card m-auto mb-3 row">
            <div class="row  item_details_container m-auto pt-2">
                <div class="col-12 col-sm-5 col-md-5 col-lg-5 pb-2 pt-2 d-flex justify-content-center">
                    <img class="item_img_container" src="<?php echo base_url('assets/image/all_item_img/' . $data2['result']['item_image']) ?>" alt="">
                </div>
                <div class="col-12 col-sm-7 col-md-7 col-lg-7 pt-4 ">
                    <div class="text-dark font-weight-bold d-flex align-items-center">Product:&nbsp;&nbsp;&nbsp;&nbsp; <h2 class="itm_txt"><?php echo $data2['result']['item_name_model'] ?></h2></div>
                    <!-- <div class="mb-3 mt-2">
                        <span class="text-dark font-weight-bold">******</span>
                        <span class="ms-2 me-2 p-1 border_rate text-dark font-weight-bold">28.1k Ratings</span>
                        <span class="text-dark font-weight-bold">88K Sold</span>
                    </div> -->
                    <p class="text-dark font-weight-bold mt-1">Brand:&nbsp;  <b class="itm_txt"><?php echo $data2['result']['item_brand'] ?></b></p>
                    <p class="text-dark font-weight-bold">Description:&nbsp;  <b class="itm_txt"><?php echo $data2['result']['item_description'] ?></b></p>
                    <form action="<?php echo base_url('index.php/add_to_cart') ?>" method="POST">
                      <input class="d-none" type="text" name="item_id" value=" <?php echo $data2['result']['item_id'] ?>">
                      <input class="d-none" type="text" name="item_price" value=" <?php echo $data2['result']['item_price'] ?>">
                      <input class="d-none" type="text" name="customer_id" value=" <?php echo $sess2 ?>">
                      <div class="d-flex align-items-center  ">
                        <p class="text-dark font-weight-bold ">Available Qty : <b class="itm_txt h5">&nbsp;  <?php echo $data2['result']['item_quantity'] ?></b></p>
                        <div class="d-flex  align-items-center ms-5 ">
                          <h6 class=" qty_cont">Select Qty: </h6>
                          <input type="number" name="item_quantity" id="item_quantity" value="" class="form-control name" placeholder="Quantity"  max="<?php echo $data2['result']['item_quantity'] ?>"  min="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Select Quantity" required>
                        </div>
                      </div>                    
                      <p class="text-dark font-weight-bold">Price: <b class="itm_txt h4">&nbsp;  ₱ <?php echo $data2['result']['item_price'] ?></b> </p>
                      <b  class="text-dark font-weight-bold">Total price: <b class="itm_txt  h3">&nbsp;  ₱ <span class="itm_txt h3 text-danger" id="total_price"> </span></b></b>
                      <div class="row d-flex gap-2 mt-4 ">
                        <?php if($sess == "Guest") {?>
                          <a href="<?php echo base_url('index.php/login') ?>" class="col-3 ms-2 btn btn-success">Add to cart</a>
                        <?php } else{?>
                            <button class="col-3 ms-2 btn btn-success">Add to cart</button>
                        <?php }?>
                    </form> 
                          <!-- <a href="" class="col-3 btn btn-success">Check out</a> -->
                      </div>
                   
                </div>
            </div>
            
        </div>

      </div>



</section>
<!-- END Section Content -->


<!-- -------   START PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
<div class="pt-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 ms-auto">
        <h4 class="mb-1">Thank you for your support!</h4>
        <p class="lead mb-0">We deliver the best web products</p>
      </div>
      <div class="col-lg-5 me-lg-auto my-lg-auto text-lg-end mt-5">
        <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Design%20System%20made%20by%20%40CreativeTim%20%23webdesign%20%23designsystem%20%23bootstrap5&url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-design-system" class="btn btn-info mb-0 me-2" target="_blank">
          <i class="fab fa-twitter me-1"></i> Tweet
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-design-system" class="btn btn-primary mb-0 me-2" target="_blank">
          <i class="fab fa-facebook-square me-1"></i> Share
        </a>
        <a href="https://www.pinterest.com/pin/create/button/?url=https://www.creative-tim.com/product/soft-ui-design-system" class="btn btn-dark mb-0 me-2" target="_blank">
          <i class="fab fa-pinterest me-1"></i> Pin it
        </a>
      </div>
    </div>
  </div>
</div>

<script>
    // Get the input field and item price
      const quantityInput = document.getElementById('item_quantity');
      const itemPrice = parseFloat(<?php echo $data2['result']['item_price'] ?>);
       // convert to float


      // Calculate the initial total price
      const initialQuantity = parseInt(quantityInput.value);
      const initialTotalPrice = initialQuantity * itemPrice;

      // Set the initial total price element value
      document.getElementById('total_price').textContent = initialTotalPrice;

      // Add event listener to update the total price when the quantity changes
      quantityInput.addEventListener('input', function() {
        const quantity = parseInt(quantityInput.value);
        const totalPrice = quantity * itemPrice;
        // Update the total price element
        document.getElementById('total_price').textContent = totalPrice;
        // Update the h1 element with the total price
        document.getElementById('total_price_display').textContent = totalPrice;
    });
</script>



