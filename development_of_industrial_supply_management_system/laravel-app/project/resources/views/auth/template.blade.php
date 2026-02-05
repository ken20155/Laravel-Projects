<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title><?= $page ?> | <?= env('PROJECTTITLE') ?></title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/app-dark.css" id="darkTheme" disabled>
  </head>
  <body class="light ">

    <div class="main wrapper vh-100">
        <?= $content ?>
    </div>

    <!-- JS -->
    <script>
        var baseUrl = "<?= env('APP_URL') ?>";
    </script>
    <script src="<?= env('APP_URL') ?>public/plugins/js/sweetalert.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/js/jquery.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/js/popper.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/js/moment.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/js/bootstrap.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/js/simplebar.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/js/daterangepicker.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/js/jquery.stickOnScroll.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/js/tinycolor-min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/js/config.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/js/apps.js"></script>
    <script src="<?= env('APP_URL') ?>public/main/js/main.js"></script>
    <script src="<?= env('APP_URL') ?>public/main/js/common.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag()
    {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
    </script>
</body>
</html>
