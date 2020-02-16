@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            {{-- <h3 class="text-themecolor m-b-0 m-t-0">Bán cho khách hàng</h3> --}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Danh sách mua</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#addtab">Thêm mới</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#listtab">Danh sách mua</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="addtab" class="tab-pane fade"><br>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-block">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                <div class="form-group">
                                    <label for="name">Nhà Cung Cấp</label>
                                    <select class="form-control">
                                        <option value="">NCC 1</option>
                                        <option value="">NCC 2</option>
                                        <option value="">NCC 3</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Tên</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Mã</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Tổng vnđ</label>
                                        <input readonly type="text" id="name" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Request Form</label>
                                        <select class="form-control">
                                            <option value="">Rq Form 1</option>
                                            <option value="">Rq Form 2</option>
                                            <option value="">Rq Form 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name"><a href="">Dự án 1</a></label>
                                        <select class="form-control">
                                            <option value=""><a href="">Dự án 1</a> 1</option>
                                            <option value=""><a href="">Dự án 1</a> 2</option>
                                            <option value=""><a href="">Dự án 1</a> 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Giảm</label>
                                        <table>
                                            <td style="width: 50%">
                                                <select class="form-control" disabled="">
                                                    <option>10%</option>
                                                    <option>20%</option>
                                                </select>
                                            </td>
                                            <td>+</td>
                                            <td><input type="text" id="name" name="name" class="form-control" value="0" readonly=""></td>
                                        </table>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Người duyệt</label>
                                        <select class="form-control">
                                            <option value="">Nhân viên 1</option>
                                            <option value="">Nhân viên 2</option>
                                            <option value="">Nhân viên 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Trang thái duyệt</label>
                                        <select class="form-control">
                                            <option value="">open</option>
                                            <option value="">accepted</option>
                                            <option value="">rejected</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Thuế</label>
                                        <select class="form-control" disabled="">
                                            <option>10%</option>
                                            <option>20%</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Giám sát</label>
                                        <select class="form-control">
                                            <option value="">Nhân viên 1</option>
                                            <option value="">Nhân viên 2</option>
                                            <option value="">Nhân viên 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Trạng thái xử lý</label>
                                        <select class="form-control">
                                            <option value="">trạng thái 1</option>
                                            <option value="">trạng thái 2</option>
                                            <option value="">trạng thái 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Thanh Toán</label>
                                        <input readonly type="number" id="name" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Ghi chú</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        <button class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="listtab" class="tab-pane active"><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group text-right">
                        <table style="width: 100%">
                            <td style="width: 100%">
                                <input type="" name="" class="form-control">
                            </td>
                            <td>
                                <a href="" class="btn btn-info">Filter</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-primary">Import</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-warning">Export</a>
                            </td>
                        </table>
                    </div>
                    <div class="card">
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NCC</th>
                                            <th>Tên</th>
                                            <th>Dự án</th>
                                            <th>Tổng vnđ</th>
                                            <th>TT Duyệt</th>
                                            <th>TT Xử lý</th>
                                            <th>Ngày tạo</th>
                                            <th>Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><a href="">KH001</a></td>
                                            <td><a href="">Sự kiện 1</a></td>
                                            <td><a href="">Dự án 1</a></td>
                                            <td>100000</td>
                                            <td>Mở</td>
                                            <td>not yet</td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>
                                                <a class="btn bg-warning" style="color: white" href="{{route('purchaseitem')}}">Chi tiết</a>
                                                <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                            </td>
                                        </tr>
                                    </tbody>
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