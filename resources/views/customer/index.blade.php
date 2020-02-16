@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            {{-- <h3 class="text-themecolor m-b-0 m-t-0">Khách hàng</h3> --}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Khách hàng</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#addtab">Thêm mới</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#listtab">Danh sách Khách hàng</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="addtab" class="tab-pane fade"><br>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Thêm khách hàng</h4>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Tên</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Logo</label>
                                        <input type="file" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Mã</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Xếp hạng</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Mã số thuế</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Fax</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Finance(MVND)</label>
                                        <input type="number" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Size(Human)</label>
                                        <input type="number" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Khuyến mãi</label>
                                        <input type="number" id="name" name="name" class="form-control">
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
                                        <label for="name">Nhóm khách hàng</label>
                                        <select class="form-control">
                                            <option value="">Nhóm 1</option>
                                            <option value="">Nhóm 2</option>
                                            <option value="">Nhóm 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Trạng thái</label>
                                        <select class="form-control">
                                            <option value="">Hoạt động</option>
                                            <option value="">Ngừng hoạt động</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <label for="name">Địa chỉ</label>
                                        <textarea class="form-control"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Thị trường</label>
                                        <select class="form-control">
                                            <option value="">Hồ Chí Minh</option>
                                            <option value="">Hà Nội</option>
                                            <option value="">Cần thơ</option>
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
        <div id="listtab" class="tab-pane active"><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title dp-inline-block">Danh sách Khách hàng</h4>
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mã KH</th>
                                            <th>Tên</th>
                                            <th>Nhóm</th>
                                            <th>Xếp hạng</th>
                                            <th>Tổng(vnđ)</th>
                                            <th>Giám sát</th>
                                            <th>Ngày tạo</th>
                                            <th>Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>KH001</td>
                                            <td>Khách hàng A</td>
                                            <td>Nhóm KH1</td>
                                            <td>Level 1</td>
                                            <td>100000</td>
                                            <td>Nhân viên 1</td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>
                                                <a class="btn bg-purple" style="color: white" href="{{route('saleforcustomer')}}">Bán</a>
                                                <a class="btn bg-success" style="color: white" href="{{route('evalcustomer')}}">Đánh giá</a>
                                                <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>KH002</td>
                                            <td>Khách hàng B</td>
                                            <td>Nhóm KH1</td>
                                            <td>Level 2</td>
                                            <td>100000</td>
                                            <td>Nhân viên 2</td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>
                                                <a class="btn bg-purple" style="color: white" href="{{route('saleforcustomer')}}">Bán</a>
                                                <a class="btn bg-success" style="color: white" href="{{route('evalcustomer')}}">Đánh giá</a>
                                                <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>KH003</td>
                                            <td>Khách hàng C</td>
                                            <td>Nhóm KH3</td>
                                            <td>Level 3</td>
                                            <td>100000</td>
                                            <td>Nhân viên 3</td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>
                                                <a class="btn bg-purple" style="color: white" href="{{route('saleforcustomer')}}">Bán</a>
                                                <a class="btn bg-success" style="color: white" href="{{route('evalcustomer')}}">Đánh giá</a>
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