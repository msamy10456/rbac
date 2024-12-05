@extends('layout.app')
@section('title', 'الاعدادات العامة')
@section('body')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">الاعدادات العامة</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form id="general_settings" class="needs-validation" novalidate method="post"
                        enctype="multipart/form-data">@csrf
                        @method('put')
                        <div class="row">
                            <center>
                                <div class="col-12 col-form-label">
                                    <div class="small-12 medium-2 large-2 columns">
                                        <div class="circle">
                                            <img class="profile-pic"
                                                src="{{ $general?->logo ? $general?->logo : 'https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg' }}">
                                        </div>
                                        <div class="p-image">
                                            <i class="fa fa-camera upload-button"></i>
                                            <input class="file-upload" type="file" name="image" accept="image/*" />
                                        </div>
                                    </div>
                                </div>
                            </center>
                            <div class="col-xl-6">
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">اسم الشركة
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="validationCustom01"
                                            placeholder="ادخل اسم الشركة" value="{{ $general?->title }}" name="title"
                                            required>
                                        <div class="invalid-feedback">
                                            من فضلك ادخل اسم الشركة
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="validationCustom02">العنوان <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input class="form-control" name="address" id="validationCustom02"
                                            placeholder="ادخل العنوان" value="{{ $general?->address }}" required>
                                        <div class="invalid-feedback">
                                            من فضلك ادخل العنوان
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="validationCustom02">الهاتف <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input class="form-control" name="phone" id="validationCustom02"
                                            placeholder="ادخل الهاتف" value="{{ $general?->phone }}" required>
                                        <div class="invalid-feedback">
                                            من فضلك الهاتف
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <div class="col-12 me-auto">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
    <x-form-request :form="'#general_settings'" route="{{ route('admin.generalsettings.update') }}"  />

@endsection
