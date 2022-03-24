<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Daily Income
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Ksh. <?= number_format($dailyincome,"2",".",",");?></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Monthly Income
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Ksh. <?= number_format($monthlyincome,"2",".",",");?></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Annual Income
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Ksh. <?= number_format($annualincome,"2",".",",");?></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->



<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>res/vendor/chart.js/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<!-- Page level custom scripts -->
<script>
    var incomechartdata = JSON.parse('<?php echo $incomechart;?>');
    var incomelabels = incomechartdata["labels"];
    var incomedata = incomechartdata["data"];

    var pkgchartdata = JSON.parse('<?php echo $pkgchart;?>');
    var pkglabels = pkgchartdata["labels"];
    var pkgdata = pkgchartdata["data"]
</script>
<script src="<?php echo base_url(); ?>res/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url(); ?>res/js/demo/chart-pie-demo.js"></script>
