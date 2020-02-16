@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Cấu hình</a></li>
                <li class="breadcrumb-item">Công ty</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" id="tab1" data-toggle="tab" href="#listtab">Thông tin công ty</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab2" data-toggle="tab" href="#party">Đại diện</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="listtab" class="tab1 tab-pane"><br>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-block">
                    @if(!$errors->isEmpty() && session()->get('result')['ErrorForm'] == 'AddCompany')
                    @include('layout.validate_error')
                    @endif
                    <form action="{{route('editcompany')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-8 @if($errors->has('name'))has_error @endif">
                                    <label for="name">Name</label>
                                    <div class="input-group date">
                                    <input type="text" id="name" value="@if(!empty($companyInfo)){{$companyInfo->name}}@endif" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="taxcode">Tax code</label>
                                    <div class="input-group date">
                                        <input type="text" id="taxcode" value="@if(!empty($companyInfo)){{$companyInfo->taxcode}}@endif" name="taxcode" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8 @if($errors->has('address'))has_error @endif">
                                    <label for="address">Address</label>
                                    <div class="input-group date">
                                        <input type="text" id="address" value="@if(!empty($companyInfo)){{$companyInfo->address}}@endif" name="address" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-md-4 @if($errors->has('logo'))has_error @endif">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="logo">Logo</label>
                                            <div class="input-group date">
                                                <input type="file" id="imagefile" name="logo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 img_right">
                                        <img accept="image/*" id="imagepreview" src="@if(!empty($companyInfo)){{url('/upload/company').'/'.$companyInfo->logo}}@endif" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3 @if($errors->has('phone'))has_error @endif">
                                    <label for="phone">Phone</label>
                                    <div class="input-group date">
                                        <input type="text" id="phone" value="@if(!empty($companyInfo)){{$companyInfo->phone}}@endif" name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-md-3 @if($errors->has('email'))has_error @endif">
                                    <label for="email">Email</label>
                                    <div class="input-group date">
                                        <input type="text" id="email" value="@if(!empty($companyInfo)){{$companyInfo->email}}@endif" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 @if($errors->has('homepage'))has_error @endif">
                                    <label for="homepage">Home Page</label>
                                    <div class="input-group date">
                                        <input type="text" id="homepage" value="@if(!empty($companyInfo)){{$companyInfo->homepage}}@endif" name="homepage" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group @if($errors->has('intro'))has_error @endif">
                                <label for="intro">Intro</label>
                                <textarea name="intro" class="form-control">@if(!empty($companyInfo)){{$companyInfo->intro}}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 padding-unset">
                                    <button class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="party" class="tab2 tab-pane"><br>
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-block">
                        @if(!$errors->isEmpty() && session()->get('result')['ErrorForm'] == 'AddCompanyRepresentatives')
                        @include('layout.validate_error')
                        @endif
                        <form action="@if(!empty($editRepresentatives)){{route('editcompanyrepresentatives',$editRepresentatives->id)}}@else{{route('addcompanyrepresentatives')}}@endif" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-8 @if($errors->has('representatives_name'))has_error @endif">
                                        <label for="representatives_name">Name</label>
                                        <div class="input-group">
                                        <input type="text" id="representatives_name" name="representatives_name" class="form-control" value="@if(!empty($editRepresentatives)){{$editRepresentatives->name}}@elseif(!empty(old('representatives_name'))){{old('representatives_name')}}@endif">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('representatives_taxcode'))has_error @endif">
                                        <label for="representatives_taxcode">Tax code</label>
                                        <div class="input-group">
                                            <input type="text" id="representatives_taxcode" name="representatives_taxcode" class="form-control" value="@if(!empty($editRepresentatives)){{$editRepresentatives->taxcode}}@elseif(!empty(old('representatives_taxcode'))){{old('representatives_taxcode')}}@endif">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-8 @if($errors->has('representatives_email'))has_error @endif">
                                        <label for="representatives_email">Email</label>
                                        <div class="input-group">
                                            <input value="@if(!empty($editRepresentatives)){{$editRepresentatives->email}}@elseif(!empty(old('representatives_email'))){{old('representatives_email')}}@endif" type="text" id="representatives_email" name="representatives_email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('representatives_phone'))has_error @endif">
                                        <label for="representatives_phone">Phone</label>
                                        <div class="input-group">
                                            <input value="@if(!empty($editRepresentatives)){{$editRepresentatives->phone}}@elseif(!empty(old('representatives_phone'))){{old('representatives_phone')}}@endif" type="text" id="representatives_phone" name="representatives_phone" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('representatives_address'))has_error @endif">
                                    <label for="representatives_address">Address</label>
                                    <input value="@if(!empty($editRepresentatives)){{$editRepresentatives->address}}@elseif(!empty(old('representatives_address'))){{old('representatives_address')}}@endif" type="text" id="representatives_address" name="representatives_address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        @if(!empty($editRepresentatives))
                                        <button class="btn btn-info">Update</button>
                                        @else
                                        <button class="btn btn-success">Add</button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table dataTable" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên Công ty</th>
                                            <th>MST</th>
                                            <th>SĐT</th>
                                            <th>Email</th>
                                            <th>Địa chỉ</th>
                                            <th>Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-css')
<link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@push('custom-scripts')
{{-- Jquery Data table --}}
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
$(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('companyrepresentativeslist') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'taxcode', name: 'taxcode' },
            { data: 'phone', name: 'phone' },
            { data: 'email', name: 'email' },
            { data: 'address', name: 'address' },
            { data: 'action', name: 'action' },
        ]
    });
    
    @include('layout.tab_active',['SessionResult' => session()->get('result')])
});
</script>
@endpush