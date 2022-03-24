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
                                <form action="<?php echo base_url(); ?>dashboard/addhouse" enctype="multipart/form-data" method="post">
                                    <div class="row">

                                        <div class="form-group col-sm-6">
                                            <label>Serial No
                                                <small class="required">*</small>
                                            </label>
                                            <input type="text" name="serial_no" class="form-control" placeholder="Serial...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Location
                                                <small class="required">*</small>
                                            </label>
                                            <input type="text" name="location" class="form-control" placeholder="Location...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Price
                                                <small class="required">*</small>
                                            </label>
                                            <input type="number" min="0"  name="price" class="form-control" placeholder="Price...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Bedroomd
                                                <small class="required">*</small>
                                            </label>
                                            <input type="number" min="0"  name="bedrooms" class="form-control" placeholder="Bedrooms...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Bathrooms
                                                <small class="required">*</small>
                                            </label>
                                            <input type="number" min="0"  name="bathrooms" class="form-control" placeholder="Bathrooms...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Parking Spaces
                                                <small class="required">*</small>
                                            </label>
                                            <input type="number" min="0"  name="parking_spaces" class="form-control" placeholder="Parking slots...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Floor Size
                                                <small class="required">*</small>
                                            </label>
                                            <input type="text" min="0"  name="floor_size" class="form-control" placeholder="Floor Size...">
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="exampleText" class="">House Image</label>
                                            <div class="input-group">
                                                <input name="file" type="file" class="form-control-file">
                                            </div>
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
