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
                title: 'Added to  Shopping Cart',
                icon: 'success'
            });
        });
    </script>
<?php }?>

  <!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0"><div class="row"><div class="col-12">
    <nav class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
            <div class="container-fluid px-0">
              <a class="navbar-brand font-weight-bolder ms-sm-3" href="https://demos.creative-tim.com/soft-ui-design-system/index.html" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                <img src="<?php echo base_url('assets/image/system_logo/' . $data2['result']['system_logo']) ?>" class="system_logo" alt="main_logo">
                <b class="ms-2"><?php echo $data2['result']['system_tittle'] ?></b> 
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
                <ul class="navbar-nav navbar-nav-hover ms-lg-9 ps-lg-5 w-100">
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

  
          <!-- All Products BTN -->
          <li class="nav-item  mx-2">
            <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="<?php echo base_url('index.php/display_all_products') ?>" aria-expanded="false">
              All Products
            </a>
          </li>
          <!--END All Products BTN -->


            <li class="nav-link ms-2 me-2">
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

  

  

<header class="header-2 ">
  <div class="user_page_header  page_header2 relative" style="background-image: url('<?php echo base_url('assets/image/system_background_img/' . $data2['result']['system_background_image']) ?>')">
 
    <div class="container cont_dis">
      <div class="row  ">
        <div class="col-lg-7 text-center mt-5 mx-auto">
          <h1 class="text-white pt-3 mt-5 text_shadow">All Products</h1>
          
          
        </div>
        
      </div>
      
    </div>
    <div class="wave_position w-100 z-index-1 bottom-20">
      <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
          <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="moving-waves">
          <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
          <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
          <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
          <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
          <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
          <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />
        </g>
      </svg>
    </div>
  </div>
  
</header>

<!-- <section class="my-5 py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 ms-auto">
        <div class="row justify-content-start">
          <div class="col-md-6">
            <div class="info">
              <div class="icon icon-sm">
                <svg class="text-primary" width="25px" height="25px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>document</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(154.000000, 300.000000)">
                                  <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                  <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                              </g>
                          </g>
                      </g>
                  </g>
              </svg>
              </div>
              <h5 class="font-weight-bolder mt-3">Full Documentation</h5>
              <p class="pe-5">Built by developers for developers. Check the foundation and you will find everything inside our documentation.</p>

            </div>
          </div>
          <div class="col-md-6">
            <div class="info">
              <div class="icon icon-sm">
                <svg class="text-primary" width="25px" height="25px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>shop </title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                              <g id="shop-" transform="translate(0.000000, 148.000000)">
                                  <path class="color-background" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z" opacity="0.598981585"></path>
                                  <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                              </g>
                          </g>
                      </g>
                  </g>
              </svg>
              </div>

              <h5 class="font-weight-bolder mt-3">Bootstrap 5 Ready</h5>
              <p class="pe-3">The world’s most popular front-end open source toolkit, featuring Sass variables and mixins.</p>

            </div>
          </div>
        </div>
        <div class="row justify-content-start mt-5">
          <div class="col-md-6 mt-3">
            <div class="info">
              <div class="icon icon-sm">
                <svg class="text-primary" width="25px" height="25px" viewBox="0 0 42 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>time-alarm</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2319.000000, -440.000000)" fill="#923DFA" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                                <g id="time-alarm" transform="translate(603.000000, 149.000000)">
                                    <path class="color-background" d="M18.8086957,4.70034783 C15.3814926,0.343541521 9.0713063,-0.410050841 4.7145,3.01715217 C0.357693695,6.44435519 -0.395898667,12.7545415 3.03130435,17.1113478 C5.53738466,10.3360568 11.6337901,5.54042955 18.8086957,4.70034783 L18.8086957,4.70034783 Z" opacity="0.6"></path>
                                    <path class="color-background" d="M38.9686957,17.1113478 C42.3958987,12.7545415 41.6423063,6.44435519 37.2855,3.01715217 C32.9286937,-0.410050841 26.6185074,0.343541521 23.1913043,4.70034783 C30.3662099,5.54042955 36.4626153,10.3360568 38.9686957,17.1113478 Z" opacity="0.6"></path>
                                    <path class="color-background" d="M34.3815652,34.7668696 C40.2057958,27.7073059 39.5440671,17.3375603 32.869743,11.0755718 C26.1954189,4.81358341 15.8045811,4.81358341 9.13025701,11.0755718 C2.45593289,17.3375603 1.79420418,27.7073059 7.61843478,34.7668696 L3.9753913,40.0506522 C3.58549114,40.5871271 3.51710058,41.2928217 3.79673036,41.8941824 C4.07636014,42.4955431 4.66004722,42.8980248 5.32153275,42.9456105 C5.98301828,42.9931963 6.61830436,42.6784048 6.98113043,42.1232609 L10.2744783,37.3434783 C16.5555112,42.3298213 25.4444888,42.3298213 31.7255217,37.3434783 L35.0188696,42.1196087 C35.6014207,42.9211577 36.7169135,43.1118605 37.53266,42.5493622 C38.3484064,41.9868639 38.5667083,40.8764423 38.0246087,40.047 L34.3815652,34.7668696 Z M30.1304348,25.5652174 L21,25.5652174 C20.49574,25.5652174 20.0869565,25.1564339 20.0869565,24.6521739 L20.0869565,15.5217391 C20.0869565,15.0174791 20.49574,14.6086957 21,14.6086957 C21.50426,14.6086957 21.9130435,15.0174791 21.9130435,15.5217391 L21.9130435,23.7391304 L30.1304348,23.7391304 C30.6346948,23.7391304 31.0434783,24.1479139 31.0434783,24.6521739 C31.0434783,25.1564339 30.6346948,25.5652174 30.1304348,25.5652174 Z"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
              </div>

              <h5 class="font-weight-bolder mt-3">Save Time & Money</h5>
              <p class="pe-5">Creating your design from scratch with dedicated designers can be very expensive. Start with our Design System.</p>

            </div>
          </div>
          <div class="col-md-6 mt-3">
            <div class="info">
              <div class="icon icon-sm">
                <svg class="text-primary" width="25px" height="25px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>office</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                  <g transform="translate(1716.000000, 291.000000)">
                      <g id="office" transform="translate(153.000000, 2.000000)">
                          <path class="color-background" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z" opacity="0.6"></path>
                          <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                      </g>
                  </g>
                  </g>
                  </g>
                </svg>
              </div>

              <h5 class="font-weight-bolder mt-3">Fully Responsive</h5>
              <p class="pe-3">Regardless of the screen size, the website content will naturally fit the given resolution.</p>

            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
          <div class="card card-background card-background-mask-primary tilt" data-tilt>
            <div class="full-background" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/team-working.jpg')"></div>
            <div class="card-body pt-7 text-center">
              <div class="icon icon-lg up mb-3 mt-3">
                <svg width="50px" height="50px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>box-3d-50</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                  <g transform="translate(1716.000000, 291.000000)">
                    <g id="box-3d-50" transform="translate(603.000000, 0.000000)">
                      <path d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                      <path d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                      <path d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                    </g>
                  </g>
                  </g>
                  </g>
                  </svg>
              </div>
              <h2 class="text-white up mb-0">Feel the <br/> Soft UI Design System</h2>
              <a href=".//sections/elements/buttons.html" target="_blank" class="btn btn-outline-white mt-5 up btn-round">Start with Elements</a>
            </div>
          </div>
      </div>
    </div>
  </div>
</section> -->


<section class="my-5 py-5">

  <div class="container">
    <div class="row">
      <div class="row justify-content-center text-center my-sm-5">
        <div class="col-lg-6">
          <h2 class="text-dark mb-0">Huge collection of Items</h2>
          <h2 class="text-primary text-gradient">ALL PRODUCTS </h2>
          <!-- <p class="lead">We have created multiple options for you to put together and customise into pixel perfect pages. </p> -->
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-sm-5 mt-3">
    <div class="row">
      <!-- <div class="col-lg-2">
        <div class="position-sticky pb-lg-5 pb-3 mt-lg-0 mt-5 ps-2" style="top: 100px">
          <h3 class="mt-5 pt-5">ITEMS</h3>
        </div>
      </div> -->

      <div class="col-lg-12">
        <div class="row mt-3">
          <!-- Buttons color -->
        <div class="col-12">
        <div class="position-relative border-radius-xl overflow-hidden  mb-3">
          <div class="container  row">
              <!-- item cards -->
              <?php foreach( $data1['result'] as $row){  ?>
                <div class="col-sm-12 col-12 col-lg-4 col-md-4 mb-4 m-auto">
                  <div class="card  shadow">
                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                      <a href="<?php echo base_url('index.php/user_page_controller/views_item_details/' .$row['item_id']) ?>" >
                        <img src="<?php echo base_url('assets/image/all_item_img/' . $row['item_image']) ?>" class=" border-radius-lg item_image_userpage" >
                      </a>
                    </div>

                    <div class="">
                      <div class="text-center ">
                        <h5 class="pt-4 itm_txt font-weight-bolder"><?php echo $row['item_name_model'] ?></h5>
                        <div class="d-flex justify-content-center gap-3">
                          <p class="font-weight-bolder">QTY:  <b class="itm_txt"><?php echo $row['item_quantity'] ?></b> </p> 
                          <p class="font-weight-bolder">PRICE: <b class="itm_txt"> ₱ <?php echo $row['item_price'] ?></b> </p> 
                        </div>
                        
                        <!-- <div class=" d-flex justify-content-center gap-3 ">
                          <form action="<?php echo base_url('index.php/add_to_cart') ?>" method="POST">
                            <input class="d-none" type="text" name="item_id" value="<?php echo $row['item_id'] ?>">
                            <input class="d-none" type="text" name="customer_id" value="<?php echo $sess2 ?>">
                            <button class="cart_button" type="submit">
                              <img class="add_to_cart_icon" src="<?php echo base_url('assets/items_img/add_to_cart.png') ?>" alt="">
                            </button>
                          </form>

                          <button type="button" class="btn btn-success">Buy</button>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              <?php }?>
              <!--END item cards -->
          </div>
        <div class="tab-content tab-space">
          <div class="tab-pane active" id="preview-btn-color">

          </div>
          <div class="tab-pane" id="code-btn-color">
            <div class="position-relative p-4 pb-2">
              <a class="btn btn-sm bg-gradient-dark position-absolute end-4 mt-3" onclick="copyCode(this);" href="javascript:;"><i class="fas fa-copy text-sm me-1"></i> Copy</a>
            </div>
          </div>
        </div>
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

