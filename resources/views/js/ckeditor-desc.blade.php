<script>
  $('#exampleModal').on('shown.bs.modal', function() {
      $(document).off('focusin.modal');
  });

  CKEDITOR.replaceAll();
  CKEDITOR.config.allowedContent = true;
</script>