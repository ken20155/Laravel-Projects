


<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $title ?> | <?= env('PROJECTTITLE') ?></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- start --}}
    <link href="<?= env('APP_URL') ?>public/plugins/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= env('APP_URL') ?>public/plugins/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= env('APP_URL') ?>public/plugins/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= env('APP_URL') ?>public/plugins/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= env('APP_URL') ?>public/plugins/css/style.css" rel="stylesheet">
    <link href="<?= env('APP_URL') ?>public/plugins/css/main.css" rel="stylesheet">
     {{-- end --}}
  </head>
  <body>
  <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" role="status"></div>
  </div>
  <!-- Spinner End -->

