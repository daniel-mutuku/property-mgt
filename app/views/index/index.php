<?php
/**
 * Created by PhpStorm.
 * User: DANIEL
 * Date: 10 Dec 2021
 * Time: 06:18
 */
$max = 0;
$min = 0;

$pmax = $_GET['max'];
$pmin = $_GET['min'];

if($pmax > 0)
    $max = $pmax;
if($pmin > 0)
    $min = $pmin;

?>
<?php if ($this->session->flashdata('success-msg')) { ?>
    <script>alert("Booking completed successfully")</script>
<?php } ?>
<?php if ($this->session->flashdata('error-msg')) { ?>
    <script>alert("Booking failed, try again")</script>
<?php } ?>
<div class="container-fluid">
    <div class=" row bg-info">
        <div class="container" style="margin: 20px;">
            <form style="margin-top: 30px;" method="get">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3">
                        <label>Min Price</label>
                        <input type="number" value="<?=$pmin;?>" name="min" class="form-control" placeholder="Min Price">
                    </div>
                    <div class="col-sm-3">
                        <label>Max Price</label>
                        <input type="number" value="<?=$pmax;?>" name="max" class="form-control" placeholder="Max Price">
                    </div>
                    <div class="col-sm-1">
                        <label>.</label><br>
                        <input type="submit" class="btn btn-danger" value="Filter" style="padding: 8px !important;">
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <?php foreach($houses as $one){
                if($one['status'] == "available"){
                    if($max > 0 && $min > 0){
                        if($one['price'] >= $min && $one['price'] <= $max){ ?>
                            <div class="row" style="margin-top: 15px;border: 1px solid grey;">
                                <div class="col-sm-6">
                                    <img style="width: 100%;height: 200px;" src="<?=base_url();?>uploads/<?=$one['img'];?>">
                                </div>
                                <div class="col-sm-6">
                                    <h4>Ksh <?=number_format($one['price'],2,".",",");?></h4>
                                    <h5><?=$one['bedrooms'];?> bedroom house.</h5>
                                    <h5><b><?=$one['location'];?></b></h5>
                                    <p><b><i class="fa fa-bed"></i>&nbsp;<?=$one['bedrooms'];?> &nbsp;
                                            <i class="fas fa-bath"></i>&nbsp;<?=$one['bathrooms'];?> &nbsp;
                                            <i class="fas fa-car"></i>&nbsp;<?=$one['parking_spacs'];?> &nbsp;
                                            <i class="fas fa-landmark"></i>&nbsp;<?=$one['floor_size'];?> &nbsp;
                                        </b>
                                    </p>
                                    <button class=" btn btn-outline-success buy_now" data-id="<?=$one['id'];?>" style="margin-top: 15px;">BOOK NOW</button>
                                </div>
                            </div>
                     <?php   }
                    }  else if($max > 0 && $min==0){
                        if($one['price'] <= $max){?>
                            <div class="row" style="margin-top: 15px;border: 1px solid grey;">
                                <div class="col-sm-6">
                                    <img style="width: 100%;height: 200px;" src="<?=base_url();?>uploads/<?=$one['img'];?>">
                                </div>
                                <div class="col-sm-6">
                                    <h4>Ksh <?=number_format($one['price'],2,".",",");?></h4>
                                    <h5><?=$one['bedrooms'];?> bedroom house.</h5>
                                    <h5><b><?=$one['location'];?></b></h5>
                                    <p><b><i class="fa fa-bed"></i>&nbsp;<?=$one['bedrooms'];?> &nbsp;
                                            <i class="fas fa-bath"></i>&nbsp;<?=$one['bathrooms'];?> &nbsp;
                                            <i class="fas fa-car"></i>&nbsp;<?=$one['parking_spacs'];?> &nbsp;
                                            <i class="fas fa-landmark"></i>&nbsp;<?=$one['floor_size'];?> &nbsp;
                                        </b>
                                    </p>
                                    <button class=" btn btn-outline-success buy_now" data-id="<?=$one['id'];?>" style="margin-top: 15px;">BOOK NOW</button>
                                </div>
                            </div>
                        <?php   }
                    } else if($min > 0 && $max==0){
                        if($one['price'] >= $min){?>
                            <div class="row" style="margin-top: 15px;border: 1px solid grey;">
                                <div class="col-sm-6">
                                    <img style="width: 100%;height: 200px;" src="<?=base_url();?>uploads/<?=$one['img'];?>">
                                </div>
                                <div class="col-sm-6">
                                    <h4>Ksh <?=number_format($one['price'],2,".",",");?></h4>
                                    <h5><?=$one['bedrooms'];?> bedroom house.</h5>
                                    <h5><b><?=$one['location'];?></b></h5>
                                    <p><b><i class="fa fa-bed"></i>&nbsp;<?=$one['bedrooms'];?> &nbsp;
                                            <i class="fas fa-bath"></i>&nbsp;<?=$one['bathrooms'];?> &nbsp;
                                            <i class="fas fa-car"></i>&nbsp;<?=$one['parking_spacs'];?> &nbsp;
                                            <i class="fas fa-landmark"></i>&nbsp;<?=$one['floor_size'];?> &nbsp;
                                        </b>
                                    </p>
                                    <button class=" btn btn-outline-success buy_now" data-id="<?=$one['id'];?>" style="margin-top: 15px;">BOOK NOW</button>
                                </div>
                            </div>
                        <?php   }
                    } else{log_message('error',$min." ".$max);?>
                        <div class="row" style="margin-top: 15px;border: 1px solid grey;">
                            <div class="col-sm-6">
                                <img style="width: 100%;height: 200px;" src="<?=base_url();?>uploads/<?=$one['img'];?>">
                            </div>
                            <div class="col-sm-6">
                                <h4>Ksh <?=number_format($one['price'],2,".",",");?></h4>
                                <h5><?=$one['bedrooms'];?> bedroom house.</h5>
                                <h5><b><?=$one['location'];?></b></h5>
                                <p><b><i class="fa fa-bed"></i>&nbsp;<?=$one['bedrooms'];?> &nbsp;
                                        <i class="fas fa-bath"></i>&nbsp;<?=$one['bathrooms'];?> &nbsp;
                                        <i class="fas fa-car"></i>&nbsp;<?=$one['parking_spacs'];?> &nbsp;
                                        <i class="fas fa-landmark"></i>&nbsp;<?=$one['floor_size'];?> &nbsp;
                                    </b>
                                </p>
                                <button class=" btn btn-outline-success buy_now" data-id="<?=$one['id'];?>" style="margin-top: 15px;">BOOK NOW</button>
                            </div>
                        </div>
                    <?php } ?>
            <?php } }?>
        </div>
    </div>
</div>

<div class="modal fade" id="book-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="<?php echo base_url();?>index/book" method="post">
                    <div class="row">
                        <input type="hidden" id="house_no" name="house_no" required>
                        <div class="form-group col-sm-6">
                            <label>Name<small class="required">*</small></label>
                            <input type="text" id="name" name="client_name" class="form-control" placeholder="Your name.." required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>ID No<small class="required">*</small></label>
                            <input type="tel" name="id_no" minlength="8" class="form-control" placeholder="ID no.." required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Email<small class="required">*</small></label>
                            <input type="email" name="email" class="form-control" placeholder="Your email.." required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Gender<small class="required">*</small></label>
                            <select class="form-control" name="gender" required>
                                <option value="">--Choose</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Phone<small class="required">*</small></label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="Phone.." required>
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
    $('.buy_now').click(function() {
        console.log("asd");
        var thishouse = $(this).attr("data-id");
        $("#house_no").val(thishouse);
        console.log(thishouse);
        $('#book-modal').modal('show');
    });
</script>
