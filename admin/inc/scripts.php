<!-- Map JS -->
<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

<!-- Vendor JS -->
<script src="../assets/js/vendor.bundle.js"></script>

<!-- Theme JS -->
<script src="../assets/js/theme.bundle.js"></script>

<script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>

<!-- Contador de Caracteres -->
<script>
	$(document).on("keydown", "#resumo", function () {
	    var caracteresRestantes = 255;
	    var caracteresDigitados = parseInt($(this).val().length);
	    var caracteresRestantes = caracteresRestantes - caracteresDigitados;

	    $(".caracteres").text(caracteresRestantes);
	});
</script>
<!-- // Contador de Caracteres -->

<script>
    var quill = new Quill('#quill_editor', {
            theme: 'snow'
    });
   quill.on('text-change', function(delta, oldDelta, source) {
        document.getElementById("quill_html").value = quill.root.innerHTML;
    });
</script>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'texto' );
    CKEDITOR.replace( 'descritivo' );
    CKEDITOR.replace( 'beneficios' );
    CKEDITOR.replace( 'aplicacoes' );
    CKEDITOR.replace( 'operacao' );
    CKEDITOR.replace( 'outros' );
    config.extraPlugins = 'filebrowser';
</script>