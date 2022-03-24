
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $pg_title; ?> </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>res/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url(); ?>res/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>res/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>res/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>res/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>res/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>res/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <script src="<?php echo base_url(); ?>res/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>res/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>res/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>res/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- End plugin css for this page -->
    <!-- inject:css -->

    <!-- Select 2 || searchable dropdown -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script> //var day = "<?= time();?>";</script>

    <style type="text/css">
        .form-error {
            color: red;
            font-size: 11px;
        }

        .select2 {
            width: 100% !important;
        }

        .delete-notes {
            font-weight: bold;
            color: red;
        }

        label {
            font-weight: bold;
        }

        .required {
            color: red;
            margin-left: 10px;
        }

    </style>
</head>