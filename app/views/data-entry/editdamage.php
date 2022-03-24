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
                                <form action="<?php echo base_url(); ?>dashboard/editdamage/<?= $id;?>" method="post">
                                    <div class="row">

                                        <div class="form-group col-sm-6">
                                            <label>Cost
                                                <small class="required">*</small>
                                            </label>
                                            <input type="number" min="0" value="<?= $damage['cost'];?>"  name="cost" class="form-control" placeholder="Cost...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>House
                                                <small class="required">*</small>
                                            </label>
                                            <select class="form-control" name="house_no">
                                                <option value="">--Choose</option>
                                                <?php foreach($houses as $one){?>
                                                    <option value="<?=$one['id'];?>" <?php if($one['id'] == $damage['house_no']) echo "selected"; ?>><?= $one['serial_no'];?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Description
                                                <small class="required">*</small>
                                            </label>
                                            <textarea class="form-control" name="description"> <?= $damage['description'];?></textarea>
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
