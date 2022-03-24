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
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Houses</h6><br>
                                <?php $this->load->view('includes/tablebuttons'); ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered datatable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Serial</th>
                                            <th>Location</th>
                                            <th>Price</th>
                                            <th>Size</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Serial</th>
                                            <th>Location</th>
                                            <th>Price</th>
                                            <th>Size</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php if (!empty($houses)) {
                                            $i = 0;
                                            foreach ($houses as $one) {
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $one['serial_no'];?></td>
                                                    <td><?= $one['location'];?></td>
                                                    <td>Ksh. <?= $one['price'];?></td>
                                                    <td><?= $one['floor_size'];?></td>
                                                    <td><?= $one['status'];?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="btn btn-info" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item view-teacher" href="<?php echo base_url();?>dashboard/edithouse/<?=$one['id'];?>">Edit</a>
                                                                <a class="dropdown-item delete-teacher" href="<?php echo base_url();?>dashboard/deletehouse/<?=$one['id'];?>">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

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
