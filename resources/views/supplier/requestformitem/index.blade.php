@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            {{-- <h3 class="text-themecolor m-b-0 m-t-0">Bán cho khách hàng</h3> --}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Dơn yêu cầu: <code>tên</code></li>
                <li class="breadcrumb-item">Danh sách hàng hóa và dịch vụ</li>

            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#addtab">Thêm mới</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#listitemtab">Dach sách Hàng hóa</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#listservicetab">Dach sách Dịch vụ</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="addtab" class="tab-pane fade"><br>
            <div class="row">
                <div class="col-md-12">
                    <code>E tách giúp a mục thêm mới thành 2 tab (thêm mới hàng hóa, thêm mới dịch vụ)</code>
                    <div class="card">
                        <div class="card-block">
                            <form action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-block">
                                                <h4 class="card-title">Hàng hóa</h4>
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
                                                                    <th>Số lượng</th>
                                                                    <th>Đơn vị</th>
                                                                    <th>TG chuẩn bị</th>  
                                                                    <th>Địa điểm Giao</th>
                                                                    <th>Ghi chú</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td><input type="checkbox" name="checkbox"></td>
                                                                    <td><a href="">SP001</a></td>
                                                                    <td><a href="">SP: SP1</a></td>
                                                                    <td><img style="width: 60px;height: 60px;" src="{{asset('upload/images/oFFA_shopping.png')}}"></td>
                                                                    <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                    <td><input style="width: 100px" type=""  class="form-control" name=""></td>
                                                                    <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                    <td>
                                                                        <input type="" name="" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input type="" name="" class="form-control">
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row">
                                                        <button class="btn btn-success">Thêm</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <form action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-block">
                                                <h4 class="card-title">Dịch vụ</h4>
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
                                                                    <th>Số lượng</th>
                                                                    <th>Đơn vị</th>
                                                                    <th>TG chuẩn bị</th>  
                                                                    <th>Địa điểm giao</th>
                                                                    <th>Ghi chú</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td><input type="checkbox" name="checkbox"></td>
                                                                    <td><a href="">SP001</a></td>
                                                                    <td><a href="">SP: SP1</a></td>
                                                                    <td><img style="width: 60px;height: 60px;" src="{{asset('upload/images/oFFA_shopping.png')}}"></td>
                                                                    <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                    <td><input style="width: 100px" type=""  class="form-control" name=""></td>
                                                                    <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                    <td>
                                                                        <input type="" name="" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input type="" name="" class="form-control">
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row">
                                                        <button class="btn btn-success">Thêm</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="listitemtab" class="tab-pane active"><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <form action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-block">
                                                <h4 class="card-title">Hàng Hóa</h4>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                                    <div class="table-responsive">
                                                        <table class="table" id="dataTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Mã</th>
                                                                    <th>Tên</th>
                                                                    <th>Hình</th>
                                                                    <th>Số lượng</th>
                                                                    <th>Đơn vị</th>
                                                                    <th>TG chuẩn bị</th>  
                                                                    <th>Địa điểm giao</th>
                                                                    <th>Ghi chú</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td><a href="">SP001</a></td>
                                                                    <td><a href="">SP: SP1</a></td>
                                                                    <td><img style="width: 60px;height: 60px;" src="{{asset('upload/images/oFFA_shopping.png')}}"></td>
                                                                    <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                    <td><input style="width: 100px" type=""  class="form-control" name=""></td>
                                                                    <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                    <td>
                                                                        <input type="" name="" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input type="" name="" class="form-control">
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row text-left">
                                                        <button class="btn btn-success">Update</button>
                                                        <a  style="margin-left:10px" class="btn btn-warning" href="">Purchase</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="listservicetab" class="tab-pane"><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <form action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-block">
                                                <h4 class="card-title">Dịch vụ</h4>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                                    <div class="table-responsive">
                                                        <table class="table" id="dataTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Mã</th>
                                                                    <th>Tên</th>
                                                                    <th>Hình</th>
                                                                    <th>Số lượng</th>
                                                                    <th>Đơn vị</th>
                                                                    <th>TG chuẩn bị</th>  
                                                                    <th>Địa điểm giao</th>
                                                                    <th>Ghi chú</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td><a href="">SP001</a></td>
                                                                    <td><a href="">SP: SP1</a></td>
                                                                    <td><img style="width: 60px;height: 60px;" src="{{asset('upload/images/oFFA_shopping.png')}}"></td>
                                                                    <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                    <td><input style="width: 100px" type=""  class="form-control" name=""></td>
                                                                    <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                    <td>
                                                                        <input type="" name="" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input type="" name="" class="form-control">
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row text-left">
                                                        <button class="btn btn-success">Update</button>
                                                        <a  style="margin-left:10px" class="btn btn-warning" href="">Purchase</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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