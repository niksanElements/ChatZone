<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ChatServer</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=APP_ROOT?>/content/css/bootstrap.min.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">
    <nav class="navbar navbar-left col-lg-1 col-md-1">
        <?php
        if($this->isLoggedIn) {
            ?>
            <div>
                <p class="panel-title">Hi,<?= htmlspecialchars($_SESSION['username']) ?></p>
                <a href="<?= APP_ROOT ?>/user/logout" class="navbar-link">Log Out</a>
            </div>
            <?php
        }
        ?>
        <div><a href="<?=APP_ROOT?>" class="navbar-brand">Home</a></div>
        <?php
        if($this->isLoggedIn) {
            ?>
            <div><a href="<?= APP_ROOT ?>/profile" class="navbar-brand">profile</a></div>
            <div><a href="<?= APP_ROOT ?>/chat" class="navbar-brand">chat</a></div>
            <?php
        } else {
            ?>
            <div><a href="<?= APP_ROOT ?>/user/login" class="navbar-brand">log in</a></div>
            <?php
        }
        ?>
    </nav>