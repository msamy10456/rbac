@extends('layout.app')
@section('title','Create employee')
@section('body')
 <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ 'Create employee' }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" novalidate action="{{ route('admin.employee.update',$employee->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="name">name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" placeholder="Enter name" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" >Email
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control"   placeholder="Enter email" value="{{ $employee->email }}"   name="email" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" >Password
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control"   placeholder="Enter password"   name="password" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" >Confirm password
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control"   placeholder="Enter confirmation password"  name="password_confirmation" required>
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
@endsection

