

    <!doctype html>
    <html lang="en">
        <head>
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <title><?= $title ?> | <?= env('PROJECTTITLE') ?></title>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta
                content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
                name="viewport"
            />
        <!-- Simple bar CSS -->
        <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/simplebar.css">
        <link rel="stylesheet" href="<?= env('APP_URL') ?>public/main/css/main.css" />
        <!-- Fonts CSS -->
        <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Icons CSS -->
        <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/feather.css">
        <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/select2.css">
        <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/dropzone.css">
        <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/uppy.min.css">
        <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/jquery.steps.css">
        <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/jquery.timepicker.css">
        <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/quill.snow.css">
        <!-- Date Range Picker CSS -->
        <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/daterangepicker.css">
        <!-- App CSS -->
        <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/app-light.css" id="lightTheme">
        <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/app-dark.css" id="darkTheme" disabled>
      </head>
      <body class="vertical  light  ">

{{-- 
    <div id="preloader">
        <div class="spinner-border text-secondary" style="width: 3rem; height: 3rem;"  role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div id="preloader-text">Loading...</div>
    </div> --}}