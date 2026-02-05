<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $title ?> | <?= env('PROJECTTITLE') ?></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
        rel="icon"
        href="<?= env('APP_URL') ?>public\main\image\sidebar_logo.png"
        type="image/x-icon"
    />



    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/main/css/main.css" />
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/assets/css/fileinput.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/assets/css/demo.css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css'>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css"/>


</head>
<body>

    <div id="preloader">
        <div class="spinner-border text-secondary" style="width: 3rem; height: 3rem;"  role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div id="preloader-text">Loading...</div>
    </div>