@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Bán cho khách hàng</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Bán cho khách hàng</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tablistsale">Danh sách bán</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#dkchi">ĐK Chi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#dkgiao">ĐK Giao</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#infosale">Thông tin bán</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="tablistsale" class="tab-pane active"><br>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#addlistsale">Thêm item</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#infolistsale">Danh sách bán</a>
                </li>
                
            </ul>
            <div class="tab-content">
                <div id="addlistsale" class="tab-pane fade"><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title">ĐK CHI</h4>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                        <div class="table-responsive">
                                            <table class="table" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Chọn</th>
                                                        <th>Mã</th>
                                                        <th>Tên</th>
                                                        <th>Hình</th>
                                                        <th>Đơn vị</th>
                                                        <th>TG chuẩn bị</th>
                                                        <th>Giá</th>
                                                        <th>Số lượng</th>
                                                        <th>Hạn</th>
                                                        <th>Giao</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td><input type="checkbox" name="checkbox"></td>
                                                        <td><a href="">SP001</a></td>
                                                        <td><a href="">SP: SP1</a></td>
                                                        <td><img style="width: 60px;height: 60px;" src="{{asset('upload/images/oFFA_shopping.png')}}"></td>
                                                        <td>met</td>
                                                        <td>2</td>
                                                        <td>10000</td>
                                                        <td><input class="form-control" style="max-width: 70px;" type="number" name=""></td>
                                                        <td>
                                                            <div class="input-group date" style="max-width: 200px;">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                                <input readonly type="text" class="form-control pull-right datepicker">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <select class="form-control">
                                                                <option>Địa điểm A</option>
                                                                <option>Địa điểm B</option>
                                                                <option>Địa điểm C</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td><input type="checkbox" name="checkbox"></td>
                                                        <td><a href="">SP001</a></td>
                                                        <td><a href="">SP: SP1</a></td>
                                                        <td><img style="width: 60px;height: 60px;" src="{{asset('upload/images/oFFA_shopping.png')}}"></td>
                                                        <td>met</td>
                                                        <td>2</td>
                                                        <td>10000</td>
                                                        <td><input class="form-control" style="max-width: 70px;" type="number" name=""></td>
                                                        <td>
                                                            <div class="input-group date" style="max-width: 200px;">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                                <input readonly type="text" class="form-control pull-right datepicker">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <select class="form-control">
                                                                <option>Địa điểm A</option>
                                                                <option>Địa điểm B</option>
                                                                <option>Địa điểm C</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td><input type="checkbox" name="checkbox"></td>
                                                        <td><a href="">SP001</a></td>
                                                        <td><a href="">SP: SP1</a></td>
                                                        <td><img style="width: 60px;height: 60px;" src="{{asset('upload/images/oFFA_shopping.png')}}"></td>
                                                        <td>met</td>
                                                        <td>2</td>
                                                        <td>10000</td>
                                                        <td><input class="form-control" style="max-width: 70px;" type="number" name=""></td>
                                                        <td>
                                                            <div class="input-group date" style="max-width: 200px;">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                                <input readonly type="text" class="form-control pull-right datepicker">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <select class="form-control">
                                                                <option>Địa điểm A</option>
                                                                <option>Địa điểm B</option>
                                                                <option>Địa điểm C</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="infolistsale" class="tab-pane active"><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title dp-inline-block">Khách hàng: KH001</h4>
                                    <div class="table-responsive">
                                        <table class="table" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Mã</th>
                                                    <th>Tên</th>
                                                    <th>Dự án</th>
                                                    <th>Tổng vnđ</th>
                                                    <th>TT Duyệt</th>
                                                    <th>Trạng thái</th>
                                                    <th>Ngày tạo</th>
                                                    <th>Tùy chỉnh</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>SP001</td>
                                                    <td><a href="">Sự kiện 1</a></td>
                                                    <td><a href="">Dự án 1</a></td>
                                                    <td>100000</td>
                                                    <td>Mở</td>
                                                    <td>not yet</td>
                                                    <td>{{date('d-m-Y',time())}}</td>
                                                    <td>
                                                        <a class="btn bg-warning" style="color: white" href="{{route('detailsaleforcustomer')}}">Chi tiết</a>
                                                        <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>SP002</td>
                                                    <td><a href="">Sự kiện 2</a></td>
                                                    <td><a href="">Dự án 2</a></td>
                                                    <td>100000</td>
                                                    <td>Mở</td>
                                                    <td>not yet</td>
                                                    <td>{{date('d-m-Y',time())}}</td>
                                                    <td>
                                                        <a class="btn bg-warning" style="color: white" href="{{route('detailsaleforcustomer')}}">Chi tiết</a>
                                                        <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>SP003</td>
                                                    <td><a href="">Sự kiện 3</a></td>
                                                    <td><a href="">Dự án 3</a></td>
                                                    <td>100000</td>
                                                    <td>Mở</td>
                                                    <td>not yet</td>
                                                    <td>{{date('d-m-Y',time())}}</td>
                                                    <td>
                                                        <a class="btn bg-warning" style="color: white" href="{{route('detailsaleforcustomer')}}">Chi tiết</a>
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
        <div id="dkchi" class="tab-pane fade"><br>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">ĐK CHI</h4>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="name">Số tiền</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="name">Ngày</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input readonly type="text" class="form-control pull-right datepicker">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Nội dung</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        <button class="btn btn-success">Thêm</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Số tiền</th>
                                                <th>Ngày</th>
                                                <th>Tùy chọn</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>10000</td>
                                                <td>{{date('d-m-Y',time())}}</td>
                                                <td>
                                                    <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>15000</td>
                                                <td>{{date('d-m-Y',time())}}</td>
                                                <td>
                                                    <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>12300</td>
                                                <td>{{date('d-m-Y',time())}}</td>
                                                <td>
                                                    <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div><p>Tổng tiền: <span style="color: red;font-weight: bold">240000 vnđ</span></p></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="dkgiao" class="tab-pane fade"><br>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">ĐK Giao</h4>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="name">Tên</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="name">Ngày</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input readonly type="text" class="form-control pull-right datepicker">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Địa chỉ</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label for="name">Chú thích</label>
                                        <textarea class="form-control"></textarea>
                                    </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        <button class="btn btn-success">Thêm</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên</th>
                                                <th>Ngày</th>
                                                <th>Địa chỉ</th>
                                                <th>Chú thích</th>
                                                <th>Tùy chọn</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Đia điểm A</td>
                                                <td>{{date('d-m-Y',time())}}</td>
                                                <td>424/4/3, Quốc lộ 1A, Bình Hưng Hòa, Quận Bình Tân, Tp.HCM</td>
                                                <td>Chú thích</td>
                                                <td>
                                                    <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Đia điểm B</td>
                                                <td>{{date('d-m-Y',time())}}</td>
                                                <td>424/4/3, Quốc lộ 1A, Bình Hưng Hòa, Quận Bình Tân, Tp.HCM</td>
                                                <td>Chú thích</td>
                                                <td>
                                                    <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Đia điểm C</td>
                                                <td>{{date('d-m-Y',time())}}</td>
                                                <td>424/4/3, Quốc lộ 1A, Bình Hưng Hòa, Quận Bình Tân, Tp.HCM</td>
                                                <td>Chú thích</td>
                                                <td>
                                                    <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="infosale" class="tab-pane fade"><br>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">KH: KH001</h4>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
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
                                        <label for="name">Danh mục</label>
                                        <select class="form-control">
                                            <option value="">Danh mục 1</option>
                                            <option value="">Danh mục 2</option>
                                            <option value="">Danh mục 3</option>
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
                                        <label for="name">Tỉ lệ giảm</label>
                                        <input readonly type="text" id="name" name="name" class="form-control">
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
                                        <label for="name">Giảm(VND)</label>
                                        <input readonly type="number" id="name" name="name" class="form-control">
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
                                        <label for="name">Hình thức thanh toán</label>
                                        <select class="form-control">
                                            <option value="">Ngân hàng</option>
                                            <option value="">Tiền mặt</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Ghi chú</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        <button class="btn btn-success">Thêm</button>
                                    </div>
                                </div>
                            </form>
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