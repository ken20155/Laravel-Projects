<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title><?= $page ?> | <?= env('PROJECTTITLE') ?></title>
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/main/signin-signup/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/main/signin-signup/vendor/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/main/signin-signup/css/style.css">
</head>
<body>

    <div class="main">
        <?= $content ?>
    </div>

    <!-- JS -->
    <script>
        var baseUrl = "<?= env('APP_URL') ?>";
    </script>
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/main/login/vendor/jquery/jquery.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/main/signin-signup/vendor/nouislider/nouislider.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/main/signin-signup/vendor/wnumb/wNumb.js"></script>
    <script src="<?= env('APP_URL') ?>public/main/signin-signup/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/main/signin-signup/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/main/signin-signup/js/main.js"></script>
    <script src="<?= env('APP_URL') ?>public/main/js/main.js"></script>
    <script src="<?= env('APP_URL') ?>public/main/js/common.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>