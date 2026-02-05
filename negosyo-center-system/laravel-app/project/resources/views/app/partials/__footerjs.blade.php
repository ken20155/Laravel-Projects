<script>
  var baseUrl = "<?= env('APP_URL') ?>";
  var myModule = "<?= $params ?>";
</script>
<script src="<?= env('APP_URL') ?>public/plugins/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["<?= env('APP_URL') ?>public/plugins/assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/core/popper.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/plugin/html-print-page/html2canvas.min.js"></script>
    <!-- jQuery Scrollbar -->
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/plugin/datatables/datatables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/1.0.2/js/dataTables.responsive.js"></script>

    <!-- Bootstrap Notify -->
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/plugin/karik-fileupload/file.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/setting-demo.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/demo.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/plugin/block-ui/jquery.blockUI.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale-all.js'></script>
    <script src="<?= env('APP_URL') ?>public/main/js/common.js"></script>
    <script src="<?= env('APP_URL').$params ?>/js/custom"></script>
    <script src="<?= env('APP_URL') ?>public/main/js/main.js"></script>
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>
</body>
