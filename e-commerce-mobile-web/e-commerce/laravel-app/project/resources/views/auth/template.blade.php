<!DOCTYPE html>
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - <?= env('PROJECTTITLE') ?></title>

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
    <style>
        .card-custom {
            min-height: 100vh;
        }

        .card-img-custom {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        .signinup{
            border-radius: 20px;
        }
    </style>
        <?= $content ?>

    <!-- JS -->
    <script>
        var baseUrl = "<?= env('APP_URL') ?>";
    </script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/lib/wow/wow.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/lib/easing/easing.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="<?= env('APP_URL') ?>public/plugins/js/sweetalert/sweetalert.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/js/block-ui/jquery.blockUI.min.js"></script>
    <!-- Template Javascript -->
    <script src="<?= env('APP_URL') ?>public/plugins/js/main.js"></script>


    {{-- main --}}
    <script src="<?= env('APP_URL') ?>public/main/js/main.js"></script>
    <script src="<?= env('APP_URL') ?>public/main/js/common.js"></script>





</body>
</html>
