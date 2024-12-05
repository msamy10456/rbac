@extends('layout.app')
@php $title ="Create task"; @endphp
@section('title', $title)

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $title }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" novalidate action="{{ route('admin.task.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="name">Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="name" name="title"
                                            placeholder="Enter title" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label">Description
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea type="text" class="form-control" placeholder="Enter description"
                                            name="description" required></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label">Priority
                                    </label>
                                    <div class="col-lg-6">

                                        <select class="form-control two-select" name="priority">
                                            @foreach ($priorities as $priority)
                                        <option value="{{$priority}}">{{$priority}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label">Status
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control two-select" name="status" >
                                            @foreach ($status as  $s)
                                            <option value="{{$s->value}}">{{$s->value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label">Employees
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control two-select"  multiple name="employees[]" >
                                            @foreach ($employees as $employee)
                                            <option value="{{$employee->id}}">{{$employee->name}}</option>
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
