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
                                <h6 class="m-0 font-weight-bold text-primary">Damages</h6><br>
                                <?php $this->load->view('includes/tablebuttons'); ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered datatable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>House</th>
                                            <th>Description</th>
                                            <th>Cost.</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>House</th>
                                            <th>Description</th>
                                            <th>Cost.</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php if (!empty($damages)) {
                                            $i = 0;
                                            $start = 0;
                                            $etart = 0;
                                            foreach ($damages as $one) {
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
                                                            <td><?= $one['description'];?></td>
                                                            <td><?= $one['cost'];?></td>
                                                            <td style='<?php if($one['status'] == "unrepaired") echo "color: red;";?>'><?= $one['status'];?></td>
                                                            <td><?= date('d/m/Y H:i',strtotime($one['created_at']));?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a class="btn btn-info" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Action
                                                                    </a>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/editdamage/<?=$one['id'];?>">Edit</a>
                                                                        <a class="dropdown-item delete-teacher" href="<?php echo base_url();?>dashboard/deletedamage/<?=$one['id'];?>">Delete</a>
                                                                        <?php if($one['status'] == "unrepaired"){?><a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/markrepaired/<?=$one['id'];?>">Mark as Repaired</a><?php } ?>
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
                                                            <td><?= $one['description'];?></td>
                                                            <td><?= $one['cost'];?></td>
                                                            <td style='<?php if($one['status'] == "unrepaired") echo "color: red;";?>'><?= $one['status'];?></td>
                                                            <td><?= date('d/m/Y H:i',strtotime($one['created_at']));?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a class="btn btn-info" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Action
                                                                    </a>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/editdamage/<?=$one['id'];?>">Edit</a>
                                                                        <a class="dropdown-item delete-teacher" href="<?php echo base_url();?>dashboard/deletedamage/<?=$one['id'];?>">Delete</a>
                                                                        <?php if($one['status'] == "unrepaired"){?><a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/markrepaired/<?=$one['id'];?>">Mark as Repaired</a><?php } ?>
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
                                                            <td><?= $one['description'];?></td>
                                                            <td><?= $one['cost'];?></td>
                                                            <td style='<?php if($one['status'] == "unrepaired") echo "color: red;";?>'><?= $one['status'];?></td>
                                                            <td><?= date('d/m/Y H:i',strtotime($one['created_at']));?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a class="btn btn-info" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Action
                                                                    </a>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/editdamage/<?=$one['id'];?>">Edit</a>
                                                                        <a class="dropdown-item delete-teacher" href="<?php echo base_url();?>dashboard/deletedamage/<?=$one['id'];?>">Delete</a>
                                                                        <?php if($one['status'] == "unrepaired"){?><a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/markrepaired/<?=$one['id'];?>">Mark as Repaired</a><?php } ?>
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
                                                        <td><?= $one['description'];?></td>
                                                        <td><?= $one['cost'];?></td>
                                                        <td style='<?php if($one['status'] == "unrepaired") echo "color: red;";?>'><?= $one['status'];?></td>
                                                        <td><?= date('d/m/Y H:i',strtotime($one['created_at']));?></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a class="btn btn-info" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Action
                                                                </a>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/editdamage/<?=$one['id'];?>">Edit</a>
                                                                    <a class="dropdown-item delete-teacher" href="<?php echo base_url();?>dashboard/deletedamage/<?=$one['id'];?>">Delete</a>
                                                                    <?php if($one['status'] == "unrepaired"){?><a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/markrepaired/<?=$one['id'];?>">Mark as Repaired</a><?php } ?>
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
<script>
    $('.edit').click(function () {
        $('#editform').hide();
        $('#edit').modal('show');
        $('#viewloading').show();

        var id = $(this).attr("data-id");
        var url = "<?php echo base_url();?>" + "crm/viewclient/" + id;
        var editurl = "<?php echo base_url();?>" + "crm/editclient/" + id;
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function (response) {
                var teacher = response;
                $('#name').val(teacher['name']);
                $('#phone').val(teacher['phone']);
                $('#branch_id').val(teacher['branch_id']).change();

                $('#editform').show();
                $('#viewloading').hide();
                $('#editform').attr("action", editurl);
            }

        });
    });
    $('.pay').click(function () {
        var id = $(this).attr("data-id");
        $('#client_id').val(id);
        $('#pay').modal('show');
    });
    $('.delete').click(function () {
        var del = confirm("Are you sure you want to delete this Payment? NB: All the associated data will be deleted too!");
        if (del == true) {
            var id = $(this).attr("data-id");
            var url = "<?php echo base_url();?>" + "crm/deletepmt/" + id;
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>

