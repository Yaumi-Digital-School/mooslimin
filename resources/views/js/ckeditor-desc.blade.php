<script>
  $('#exampleModal').on('shown.bs.modal', function() {
      $(document).off('focusin.modal');
  });
  var isi = document.getElementById("desc");
    CKEDITOR.replace(isi,{
    language:'en-gb',
  });
  CKEDITOR.config.allowedContent = true;
</script>