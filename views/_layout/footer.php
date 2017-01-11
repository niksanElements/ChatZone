
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?=APP_ROOT?>/content/js/libs/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=APP_ROOT?>/content/js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>