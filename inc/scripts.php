<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Map JS -->
<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

<!-- Vendor JS -->
<script src="./assets/js/vendor.bundle.js"></script>

<!-- Theme JS -->
<script src="./assets/js/theme.bundle.js"></script>

<!-- JQuery-->
<script src="./assets/js/jquery.3.2.1.min.js"></script>



<!-- APP -->
<script src="./js/app.js?v=<?= filemtime('js/app.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
//Politica de Privacidade
$( "#bt_politica" ).click(function() {
    $("#politica").hide();
    $.post("privacidade-cookie.php", { modo: "on" });
});
//Politica de Privacidade
</script>

<!-- Politica de Privacidade -->
<?php if(isset($_COOKIE["Privacidade"])){ ?>
    <script type="text/javascript">
        $("#politica").hide();
    </script>
<?php } ?>
<!-- Politica de Privacidade -->