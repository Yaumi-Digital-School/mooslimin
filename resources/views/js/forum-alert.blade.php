<script>
  var title = "{{ Session::get('title') }}";
  var alert_success = "{{ Session::has('success') }}";
  var messange_success = "{!! Session::get('success') !!}";
  var alert_warning = "{{ Session::has('warning') }}";
  var messange_warning = "{!! Session::get('warning') !!}";
  var alert_error = "{{ Session::has('error') }}";
  var messange_error = "{!! Session::get('error') !!}";
  if (alert_success){
    Swal.fire({
      title: title,
      text: messange_success,
      icon: 'success', 
      timer: 5000,
    })
  }else if(alert_warning){
    Swal.fire({
      title: title,
      text: messange_warning,
      icon: 'warning', 
      timer: 5000,
    })
  }else if(alert_error){
    Swal.fire({
      title: title,
      text: messange_error,
      icon: 'error', 
      timer: 5000,
    })
  }
  var error_has_desc = "{{$errors->has('desc')}}";
  var error_has_img = "{{$errors->has('image')}}";
  var error_has_desc_mesg = "{{ $errors->first('desc') }}";
  var error_has_img_mesg = "{{ $errors->first('image') }}";
  if(error_has_desc || error_has_img){
    Swal.fire({
      title: 'Postingan',
      text: error_has_desc_mesg +' '+ error_has_img_mesg,
      icon: 'warning', 
      timer: 5000,
    })
  }
</script>