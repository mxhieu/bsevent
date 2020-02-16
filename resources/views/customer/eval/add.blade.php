@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Chi tiết đánh giá</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Khách hàng</li>
                <li class="breadcrumb-item">Đánh giá</li>
                <li class="breadcrumb-item">Chi tiết đánh giá</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title dp-inline-block">Khách hàng: KH001, Form: Form A</h4>
                    <form action="">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Tên</label>
                                <input value="Chi tiết đánh giá 1" type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Đã Chi tiết đánh giá</label>
                                <input readonly value="15" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mã</th>
                                        <th>Nội dung</th>
                                        <th>Chi tiết đánh giá</th>
                                        <th>Chú thích</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>EV001</td>
                                        <td>uy tính</td>
                                        <td><input value="5" class="form-control" style="max-width: 70px;" type="number" name=""></td>
                                        <td><input class="form-control" style="min-width: 300px;" type="text" name=""></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>EV002</td>
                                        <td>Thái độ</td>
                                        <td><input value="5" class="form-control" style="max-width: 70px;" type="number" name=""></td>
                                        <td><input class="form-control" style="min-width: 300px;" type="text" name=""></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>EV003</td>
                                        <td>Tìm năng</td>
                                        <td><input value="5" class="form-control" style="max-width: 70px;" type="number" name=""></td>
                                        <td><input class="form-control" style="min-width: 300px;" type="text" name=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label>File đính kèm</label>
                                <input type="file" class="form-control">
                            </div>
                            <div class="form-group col-sm-2">
                                <button class="btn btn-success">Cập nhật</button>
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
<link rel="stylesheet" href="{{asset('admin/css/bootstrap-datepicker.min.css')}}">
@endpush
@push('custom-scripts')
{{-- Jquery Data table --}}
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
    $('.datepicker').datepicker({
      autoclose: true
    })
</script>
@endpush