@extends('layout.app')
@section('title','Role')

@section('css')
<link href="{{ asset('front/') }}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('body')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Roles</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table_datatable" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created at</th>
                            <th>control</th>
                        </tr>
                    </thead>
                     <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('front/') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('front/') }}/js/plugins-init/datatables.init.js"></script>

    <x-datatable tableId="#table_datatable"
    url="{{route('admin.role.index')}}"
    :columns="$columns" />
@endsection


