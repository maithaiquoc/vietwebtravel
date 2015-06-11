<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AUTOZONE - Điều Hành Hệ Thống</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url() ?>assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<!--    <script type="text/javascript" src="--><?php //echo base_url() ?><!--assets/wysiwyg/iwysiwyg.js"></script>-->
<!--    <script type="text/javascript" src="--><?php //echo base_url() ?><!--assets/js/jsPDF/base64.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js" charset="utf-8"></script>

    <?php
    if($this->session->userdata('email') == ''){
        header('Location: '.base_url()."login");
    }
    else{
        if($this->session->userdata('isAdmin') == '0'){
            header('Location: '.base_url()."admin/deny");
        }
    }
    header('Content-Type: text/html; charset=utf-8');
    ?>

    <?php echo $map['js']; ?>

</head>
