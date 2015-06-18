<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>
<!-- Bootstrap's JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.js"></script>
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<!-- Min Bootstrap's JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!---->
</body>
</html>
