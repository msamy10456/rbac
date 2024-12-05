<script>
    $('body').on('change',"{{ $getId }}",function(){

       var getId = $("{{ $getId }}").val();
        $.ajax({
                  url: "{{ $route }}",
                  data: {
                    id:getId
                  },
                //   processData: false,
                //   contentType: false,
                  type: 'GET',
                  success: function(data,textStatus){

                        $("{{ $putId }}").html('');
                        $("{{ $putId }}").append(data.html);
                        if("{{ (isset($selectPicker)  && $selectPicker)? $selectPicker :  1 }}" == 1){
                            $('select').selectpicker('refresh');
                        }
                  },
                  error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(XMLHttpRequest)
                }
                });
    })
</script>
