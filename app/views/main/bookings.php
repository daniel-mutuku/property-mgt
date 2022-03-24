<?php
/**
 * Created by PhpStorm.
 * User: DANIEL
 * Date: 6 Nov 2021
 * Time: 09:54
 */
$sdate = $_GET['sdate'];
$edate = $_GET['edate'];?>
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
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-sm-5 form-group">
                                    <label>Start Date</label>
                                    <input class="form-control" type="date" value="<?= $sdate; ?>" name="sdate">
                                </div>
                                <div class="col-sm-5 form-group">
                                    <label>End Date</label>
                                    <input class="form-control" type="date" style="" value="<?= $edate; ?>" name="edate">
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-outline-success" style="margin-top: 30px;">Filter</button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="card shadow mb-4 col-sm-12">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Bookings</h6><br>
                                <?php $this->load->view('includes/tablebuttons'); ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered datatable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Serial</th>
                                            <th>Price</th>
                                            <th>Client</th>
                                            <th>Phone</th>
                                            <th>Payment Status</th>
                                            <th>Booking Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Serial</th>
                                            <th>Price</th>
                                            <th>Client</th>
                                            <th>Phone</th>
                                            <th>Payment Status</th>
                                            <th>Booking Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php if (!empty($houses)) {
                                            $i = 0;
                                            $start = 0;
                                            $etart = 0;
                                            foreach ($houses as $one) {
                                                $i++;
                                                ?>
                                                <?php if (isset($sdate)) {
                                                }
                                                $start = strtotime($sdate);
                                                if (isset($edate))
                                                    $etart = strtotime($edate) + 86400;
                                                if ($start > 0 && $etart > 86400) {
                                                    if (strtotime($one['created_at']) >= $start && strtotime($one['created_at']) <= $etart) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= $one['serial_no'];?></td>
                                                            <td>Ksh. <?= $one['price'];?></td>
                                                            <td><?= $one['client_name'];?></td>
                                                            <td><?= $one['phone'];?></td>
                                                            <td><?= $one['payment_status'];?></td>
                                                            <td><?= $one['status'];?></td>
                                                            <td><?= date('d/m/Y H:i',strtotime($one['status']));?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a class="btn btn-info" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Action
                                                                    </a>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <?php if($one['status'] != "approved"){
                                                                            if($one['status'] == "pending"){?>
                                                                                <a class="dropdown-item add-pmt" data-string='<?php echo json_encode($one);?>' href="#">Add Payment</a>
                                                                                <a class="dropdown-item delete-teacher" href="<?php echo base_url();?>dashboard/declinebooking/<?=$one['id'];?>">Decline</a>
                                                                            <?php } ?>
                                                                            <a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/deletebooking/<?=$one['id'];?>">Delete</a>
                                                                        <?php } ?>
                                                                        <?php if($one['status'] != "checked-out"){?>
                                                                            <a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/checkout/<?=$one['id'];?>/<?=$one['house_no'];?>">Check Out</a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } elseif ($start > 0 && $etart == 86400) {
                                                    if (strtotime($one['created_at']) >= $start) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= $one['serial_no'];?></td>
                                                            <td>Ksh. <?= $one['price'];?></td>
                                                            <td><?= $one['client_name'];?></td>
                                                            <td><?= $one['phone'];?></td>
                                                            <td><?= $one['payment_status'];?></td>
                                                            <td><?= $one['status'];?></td>
                                                            <td><?= date('d/m/Y H:i',strtotime($one['status']));?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a class="btn btn-info" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Action
                                                                    </a>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <?php if($one['status'] != "approved"){
                                                                            if($one['status'] == "pending"){?>
                                                                                <a class="dropdown-item add-pmt" data-string='<?php echo json_encode($one);?>' href="#">Add Payment</a>
                                                                                <a class="dropdown-item delete-teacher" href="<?php echo base_url();?>dashboard/declinebooking/<?=$one['id'];?>">Decline</a>
                                                                            <?php } ?>
                                                                            <a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/deletebooking/<?=$one['id'];?>">Delete</a>
                                                                        <?php } ?>
                                                                        <?php if($one['status'] != "checked-out"){?>
                                                                            <a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/checkout/<?=$one['id'];?>/<?=$one['house_no'];?>">Check Out</a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } elseif ($etart > 86400 && $start == 0) {
                                                    if (strtotime($one['created_at']) <= $etart) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= $one['serial_no'];?></td>
                                                            <td>Ksh. <?= $one['price'];?></td>
                                                            <td><?= $one['client_name'];?></td>
                                                            <td><?= $one['phone'];?></td>
                                                            <td><?= $one['payment_status'];?></td>
                                                            <td><?= $one['status'];?></td>
                                                            <td><?= date('d/m/Y H:i',strtotime($one['status']));?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a class="btn btn-info" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Action
                                                                    </a>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <?php if($one['status'] != "approved"){
                                                                            if($one['status'] == "pending"){?>
                                                                                <a class="dropdown-item add-pmt" data-string='<?php echo json_encode($one);?>' href="#">Add Payment</a>
                                                                                <a class="dropdown-item delete-teacher" href="<?php echo base_url();?>dashboard/declinebooking/<?=$one['id'];?>">Decline</a>
                                                                            <?php } ?>
                                                                            <a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/deletebooking/<?=$one['id'];?>">Delete</a>
                                                                        <?php } ?>
                                                                        <?php if($one['status'] != "checked-out"){?>
                                                                            <a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/checkout/<?=$one['id'];?>/<?=$one['house_no'];?>">Check Out</a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $one['serial_no'];?></td>
                                                        <td>Ksh. <?= $one['price'];?></td>
                                                        <td><?= $one['client_name'];?></td>
                                                        <td><?= $one['phone'];?></td>
                                                        <td><?= $one['payment_status'];?></td>
                                                        <td><?= $one['status'];?></td>
                                                        <td><?= date('d/m/Y H:i',strtotime($one['status']));?></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a class="btn btn-info" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Action
                                                                </a>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <?php if($one['status'] != "approved"){
                                                                        if($one['status'] == "pending"){?>
                                                                            <a class="dropdown-item add-pmt" data-string='<?php echo json_encode($one);?>' href="#">Add Payment</a>
                                                                            <a class="dropdown-item delete-teacher" href="<?php echo base_url();?>dashboard/declinebooking/<?=$one['id'];?>">Decline</a>
                                                                        <?php } ?>
                                                                        <a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/deletebooking/<?=$one['id'];?>">Delete</a>
                                                                    <?php } ?>
                                                                    <?php if($one['status'] != "checked-out"){?>
                                                                        <a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/checkout/<?=$one['id'];?>/<?=$one['house_no'];?>">Check Out</a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>

                                            <?php }
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<div class="modal fade" id="pay-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Book</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url();?>dashboard/addpayment" method="post">
                    <div class="row">
                        <input type="hidden" id="house_no" name="house_no" required>
                        <input type="hidden" id="booking_id" name="booking_id" required>

                        <div class="form-group col-sm-6">
                            <label>Amount<small class="required">*</small></label>
                            <input type="tel" id="amount" name="amount"  class="form-control" placeholder="ID no.." required readonly>
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Mode<small class="required">*</small></label>
                            <select class="form-control" name="mode" required>
                                <option value="">--Choose</option>
                                <option value="mpesa">MPESA</option>
                                <option value="cash">Cash</option>
                                <option value="bank">Bank</option>
                            </select>
                        </div>

                    </div>

                    <input type="submit" class="btn btn-outline-success">

                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>

    $('.add-pmt').click(function () {
        var booking = $(this).attr("data-string");
        var bookArr = JSON.parse(booking);
        $("#house_no").val(bookArr['house_no']);
        $("#amount").val(bookArr['price']);
        $("#booking_id").val(bookArr['id']);
        $('#pay-modal').modal('show');
    });

</script>

