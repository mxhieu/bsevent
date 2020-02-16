@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Các dự án</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Các dự án</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#addtab">Thêm mới</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#listtab">Danh sách các dự án</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="addtab" class="tab-pane fade"><br>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Thêm các dự án</h4>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Item</label>
                                        <select class="form-control">
                                            <option value="">Sản phẩm 1</option>
                                            <option value="">Sản phẩm 2</option>
                                            <option value="">Sản phẩm 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">1 Đơn vị Bán</label>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 50%">
                                                        <select class="form-control" name="sunit_id">
                                                            <option value="1" selected="">Met</option>
                                                            <option value="2">Kg</option>
                                                            <option value="3">Can</option>
                                                            <option value="4">Box</option>
                                                            <option value="5">Set</option>
                                                            <option value="6">Package</option>
                                                            <option value="7">g</option>
                                                            <option value="8">cm</option>
                                                            <option value="9">thung</option>
                                                            <option value="10">khoi</option>
                                                            <option value="11">chai</option>
                                                        </select>
                                                    </td>
                                                    <td>=</td>
                                                    <td><input class="form-control" type="number" min="0" step="0.01" name="s2b" value="5"></td>
                                                    <td>Met</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Trạng thái</label>
                                        <select class="form-control">
                                            <option value="">active</option>
                                            <option value="">inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Trạng thái</label>
                                        <select class="form-control">
                                            <option value="">active</option>
                                            <option value="">inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Hình</label>
                                        <input type="file" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Đính kèm</label>
                                        <input type="file" id="name" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Giá</label>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 50%"><input class="form-control" type="number" min="0" name="price"></td>
                                                    <td>
                                                        <select class="form-control" name="munit_id">
                                                            <option value="1">VND</option>
                                                            <option value="2">USD</option>
                                                            <option value="3">JPY</option>
                                                            <option value="4">AUD</option>
                                                            <option value="5">CAD</option>
                                                            <option value="6">EUR</option>
                                                            <option value="7">HKD</option>
                                                            <option value="8">SGD</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Khả năng</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">TG chuẩn bị</label>
                                        <input type="text" id="name" name="name" class="form-control">
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
                            <h4 class="card-title">ĐK CHI</h4>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                <div class="table-responsive">
                                    <table class="table" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên</th>
                                                <th>Hình</th>
                                                <th>Đơn vị</th>
                                                <th>Giá</th>
                                                <th>Trạng thái</th>
                                                <th>Tùy chỉnh</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><a href="">SP: SP1</a></td>
                                                <td><img style="width: 60px;height: 60px;" src="{{asset('upload/images/oFFA_shopping.png')}}"></td>
                                                <td>met</td>
                                                <td>10000</td>
                                                <td>active</td>
                                                <td>
                                                    <a class="btn bg-warning" style="color: white" href="{{route('detailsaleforcustomer')}}">Chi tiết</a>
                                                    <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td><a href="">SP: SP1</a></td>
                                                <td><img style="width: 60px;height: 60px;" src="{{asset('upload/images/oFFA_shopping.png')}}"></td>
                                                <td>met</td>
                                                <td>10000</td>
                                                <td>active</td>
                                                <td>
                                                    <a class="btn bg-warning" style="color: white" href="{{route('detailsaleforcustomer')}}">Chi tiết</a>
                                                    <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td><a href="">SP: SP1</a></td>
                                                <td><img style="width: 60px;height: 60px;" src="{{asset('upload/images/oFFA_shopping.png')}}"></td>
                                                <td>met</td>
                                                <td>10000</td>
                                                <td>active</td>
                                                <td>
                                                    <a class="btn bg-warning" style="color: white" href="{{route('detailsaleforcustomer')}}">Chi tiết</a>
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