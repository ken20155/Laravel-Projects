<script>
  var baseUrl = "<?= env('APP_URL') ?>";
  var myModule = "<?= $params ?>";
</script>
<!-- Start -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= env('APP_URL') ?>public/plugins/lib/wow/wow.min.js"></script>
<script src="<?= env('APP_URL') ?>public/plugins/lib/easing/easing.min.js"></script>
<script src="<?= env('APP_URL') ?>public/plugins/lib/waypoints/waypoints.min.js"></script>
<script src="<?= env('APP_URL') ?>public/plugins/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= env('APP_URL') ?>public/plugins/js/main.js"></script>
<!-- End -->


<script src="<?= env('APP_URL') ?>public/plugins/js/sweetalert/sweetalert.min.js"></script>
<script src="<?= env('APP_URL') ?>public/plugins/js/block-ui/jquery.blockUI.min.js"></script>
<script src="<?= env('APP_URL') ?>public/main/js/main.js"></script>
<script src="<?= env('APP_URL').'user-components/'.$params ?>/js/custom"></script>
<script src="<?= env('APP_URL') ?>public/main/js/common.js"></script>

</body>
</html>
