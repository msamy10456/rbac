@extends('layout.app')
@section('title','Create role')
@section('body')
 <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ 'Create role' }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" novalidate action="{{ route('admin.role.update',$role->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="name">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter title" value="{{$role->name}}" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label">Permissions
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control two-select"  multiple name="permissions[]" >
                                            @foreach ($permissions as $permission)
                                            <option @selected(in_array($permission->id,$role->permissions->pluck('id')->toArray())) value="{{$permission->id}}">{{$permission->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-12 ">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
      <x-form-request />
      <script>
               $('.two-select').select2();

    </script>
@endsection

