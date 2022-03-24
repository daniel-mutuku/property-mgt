<div class="container-fluid page-body-wrapper">

    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
                    <i class="mdi mdi-grid-large menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Data Entry</li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/addhouse"><span
                            class="menu-title">Add House</span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/adddamage"><span
                            class="menu-title">Add Damage</span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/addcaretaker"><span
                            class="menu-title">Add Caretakers</span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/addstaff"><span
                            class="menu-title">Add Agent</span></a></li>

            <li class="nav-item nav-category">Administration</li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/houses"><span
                            class="menu-title">Houses</span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/damages"><span
                            class="menu-title">Damages</span></a></li>

            <li class="nav-item nav-category">Sale Center</li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/bookings"><span
                            class="menu-title">Bookings</span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/payments"
                                    id="topclients"><span class="menu-title">Payments</span></a></li>


            <li class="nav-item nav-category">Settings</li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/caretakers" id="caretakers"><span
                            class="menu-title">Caretakers</span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/staff" id="staff"><span
                            class="menu-title">Agents</span></a></li>


        </ul>
    </nav>