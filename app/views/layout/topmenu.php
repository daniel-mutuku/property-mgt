<body id="mainbody">
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
            </div>
            <div>
                <a class="navbar-brand brand-logo" href="<?= base_url(); ?>dashboard">
                    <h5>Jamii Housing</h5>
                </a>
                <a class="navbar-brand brand-logo-mini" href="<?= base_url(); ?>dashboard">
                    <h5>Jamii Housing</h5>
                </a>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text">Hello, <span class="text-black fw-bold"><?=$this->aauth->user()['name'];?></span></h1>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="<?php echo base_url();?>auth/logout" class="btn btn-warning"><i class="fas fa-lock"></i> Logout</a></li>
            </ul>

        </div>
    </nav>