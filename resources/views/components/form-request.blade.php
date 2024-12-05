@php
    $form=(isset($form) && $form)? $form : 'form';
    $route=(isset($route) && $route)? $route : null;
    $reload=(isset($reload) && $reload)? $reload : false;
    // $message=(isset($message) && $message)? $message : 'تم الاضافة بنجاح';
@endphp
<script>


$("{{$form}}").submit(function(e){
                e.preventDefault();

                var fd = new FormData(this);
                var route = $(this).attr('action');

                $.ajax({
                  url: ("{{ $route }}") ? "{{ $route }}" : route ,
                  data: fd,
                  processData: false,
                  contentType: false,
                  type: 'POST',
                  success: function(data,textStatus){
                        toastr.success(data.message)
                        // console.log(data)

                        if(fd.get('_method') != 'put'){
                            $('.profile-pic').attr('src', 'https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg');
                            $("{{$form}}")[0].reset();
                            $('select').selectpicker('refresh');
                        }
                        if("{{$reload}}"){
                            location.reload();
                        }
                  },
                  error: function(XMLHttpRequest, textStatus, errorThrown) {
                        toastr.error(XMLHttpRequest.responseJSON.message)
                        // console.log(XMLHttpRequest.responseJSON.message )
                }
                });

            });
</script>
