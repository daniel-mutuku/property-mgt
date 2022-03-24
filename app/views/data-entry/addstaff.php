<?php
/**
 * Created by PhpStorm.
 * User: DANIEL
 * Date: 6 Nov 2021
 * Time: 09:54
 */ ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="card shadow mb-4">
                        <?php if (validation_errors()) { ?>
                            <div class="alert alert-danger">
                                <p><?php echo validation_errors(); ?></p>
                            </div>
                        <?php } ?>
                        <?php $this->load->view('includes/flashmessages'); ?>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="card shadow mb-4 col-sm-12">
                            <div class="card-body">
                                <form action="<?php echo base_url(); ?>dashboard/addstaff" method="post">
                                    <div class="row">

                                        <div class="form-group col-sm-6">
                                            <label>Name
                                                <small class="required">*</small>
                                            </label>
                                            <input type="text"  name="name" class="form-control" placeholder="Name...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Email
                                                <small class="required">*</small>
                                            </label>
                                            <input type="email"  name="email" class="form-control" placeholder="Email...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Location
                                                <small class="required">*</small>
                                            </label>
                                            <input type="text"  name="location" class="form-control" placeholder="Location...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Role
                                                <small class="required">*</small>
                                            </label>
                                            <input type="text"  name="role" class="form-control" placeholder="Role...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Password
                                                <small class="required">*</small>
                                            </label>
                                            <input type="password"  name="password" class="form-control" placeholder="Name...">
                                        </div>

                                    </div>

                                    <input type="submit" class="btn btn-outline-success">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
