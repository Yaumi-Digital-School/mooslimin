/*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
function readProfile(input) {
  if (input.files && input.files[1]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#imageResult')
            .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[1]);
  }
}

$(function () {
  $('#upload-profile').on('change', function () {
    readProfile(input);
  });
});

/*  ==========================================
  SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById( 'upload-profile' );
var infoArea = document.getElementById( 'upload-label-profile' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
var input = event.srcElement;
var fileName = input.files[1].name;
infoArea.textContent = 'File name: ' + fileName;
}