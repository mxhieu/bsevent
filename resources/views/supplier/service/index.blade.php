@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            {{-- <h3 class="text-themecolor m-b-0 m-t-0">Bán cho khách hàng</h3> --}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Dach mục dịch vụ</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#addtab">Thêm mới</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#listtab">Danh mục dịch vụ</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="addtab" class="tab-pane fade"><br>
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-block">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                <div class="form-group">
                                    <label for="name">Nhà Cung cấp</label>
                                    <select class="form-control">
                                        <option value="">Khách hàng 1</option>
                                        <option value="">Khách hàng 2</option>
                                        <option value="">Khách hàng 3</option>
                                    </select>
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
                                        <label for="name">Tên dịch vụ</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Mã</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                   
                                </div>
                                <div class="row">
                                     <div class="form-group col-md-4">
                                        <label for="name">Hình Ảnh</label>
                                        <input type="file" id="name" name="name" class="form-control">
                                    </div>
                                   
                                   <div class="form-group col-md-4">
                                        <label for="name">Giá(VND)(Min|Max|Đơn vị)</label>
                                        <table>
                                            <td><input type="number" min="0" name="name" class="form-control"></td>
                                            <td><input type="number" min="0" name="name" class="form-control"></td>
                                            <td>
                                                <input type="text" min="0" name="name" class="form-control">
                                            </td>
                                        </table>
                                        
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="name">Tỉ lệ chiết khẩu(%)</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                     <div class="form-group col-md-8">
                                        <label for="name">Chi tiết</label>
                                        <input type="file" name="name" class="form-control">
                                    </div>
                                   
                                    <div class="form-group col-md-2">
                                        <label for="name">Lead time</label>
                                        <input type="number" min="0" name="name" class="form-control">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="name">Status</label>
                                        <select class="form-control">
                                            <option>Active</option>
                                            <option>In Active</option>
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
                                            <th>Nhà Cung cấp</th>
                                            <th>Danh Mục</th>
                                            <th>Tên dịch vụ</th>
                                            <th>Giá(Min-Max)(VND)</th>
                                            <th>Đơn vị</th>
                                            <th>Leadtime</th>
                                            <th>Trạng thái</th>
                                            <th>Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><a href="">Ten NCC</a></td>
                                            <td><a href="">Danh mục 1</a></td>
                                            <td><a href="">ten dịch vụ</a></td>
                                            <td>100-200</td>
                                            <td>Met</td>
                                            <td>6</td>
                                            <td>Active</td>
                                            <td>
                                                <a class="btn bg-warning" style="color: white" href="">Chi tiết</a>
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