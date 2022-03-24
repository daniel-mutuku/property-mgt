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
                                <form action="<?php echo base_url(); ?>dashboard/editcaretaker/<?=$id;?>" method="post">
                                    <div class="row">

                                        <div class="form-group col-sm-6">
                                            <label>Name
                                                <small class="required">*</small>
                                            </label>
                                            <input type="text" name="name" value="<?= $caretaker['name'];?>" class="form-control" placeholder="Name...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>ID No
                                                <small class="required">*</small>
                                            </label>
                                            <input type="tel" name="id_no" value="<?= $caretaker['id_no'];?>" maxlength="8" minlength="8" class="form-control" placeholder="ID No...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Phone No
                                                <small class="required">*</small>
                                            </label>
                                            <input type="tel" maxlength="12" value="<?= $caretaker['phone'];?>" minlength="12"  name="phone" class="form-control" placeholder="Phone...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>House
                                                <small class="required">*</small>
                                            </label>
                                            <select class="form-control" name="house_no">
                                                <option value="">--Choose</option>
                                                <?php foreach($houses as $one){?>
                                                    <option value="<?=$one['id'];?>" <?php if($one['id'] == $caretaker['house_no']) echo "selected";?>><?= $one['serial_no'];?></option>
                                                <?php } ?>

                                            </select>
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
