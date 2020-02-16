@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            {{-- <h3 class="text-themecolor m-b-0 m-t-0">Cập nhật phương thức thanh toán</h3> --}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Cấu hình</a></li>
                <li class="breadcrumb-item">Phương thức thanh toán</li>
                <li class="breadcrumb-item active">Cập nhật phương thức thanh toán</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-block">
                    {{-- <h4 class="card-title">Cập nhật phương thức thanh toán</h4> --}}
                    <form action="http://demo_bs.test/admin/adddepartmentaction" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Phương thức thanh toán</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Ghi chú</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 padding-unset">
                                <button class="btn btn-success">Cập nhật</button>
                                <a class="btn btn-warning" href="{{route('paymentmethod')}}">Quay về</a>
                            </div>
                        </div>
                    </form>
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

@endpush