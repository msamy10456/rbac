@if (session()->get('message'))
    <script>
        toastr.success("{{session()->get('message')}}");
    </script>
@endif
@if (session()->get('errors'))
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{{$error}}");
        </script>
    @endforeach
@endif

@if (session()->get('error'))
        <script>
            toastr.error("{{session()->get('error')}}");
        </script>
@endif

<div class="modal fade" id="deletemodel">
    <div class="modal-dialog" role="document">
        <form class="modal-content" id="modelFormDelete" method="post" >
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title">حذف</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">سيتم الحذف نهائيا</div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger light" data-bs-dismiss="modal">الغاء</button>
                <button type="submit" class="btn btn-danger">حذف</button>
            </div>
        </form>
    </div>
</div>

<script>
    $('body').on('click','.delete-button',function(){
        // console.log($(this).data('href'))
        $('#modelFormDelete').attr('action', $(this).data('href'));
    })
</script>
