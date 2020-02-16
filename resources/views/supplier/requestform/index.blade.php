@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            {{-- <h3 class="text-themecolor m-b-0 m-t-0">Bán cho khách hàng</h3> --}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Dach sách đơn yêu cầu</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#addtab">Thêm mới</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#listtab">Dach sách đơn yêu cầu</a>
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
                               
                                <div class="row">
                                    <div class="form-group col-md-9">
                                        <label for="name">Tên đơn yêu cầu</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="name">Mã</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                   
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Chi tiết</label>
                                        <input type="file" name="name" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="name">Dự án</label>
                                        <select class="form-control">
                                            <option>Dự An 1</option>
                                            <option>Dự An 2</option>
                                        </select>
                                    </div>
                                   
                                    <div class="form-group col-md-3">
                                        <label for="name">Deadline</label>
                                        <input type="date" name="name" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="name">Người cấp phép</label>
                                        <select class="form-control">
                                            <option>Mr. A</option>
                                            <option>Mr. B</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="name">Trạng thái cấp phép</label>
                                        <select class="form-control">
                                            <option>Đã cấp phép</option>
                                            <option>không cấp phép</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="name">Người Thực thi</label>
                                        <select class="form-control">
                                            <option>Mr. A</option>
                                            <option>Mr. B</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="name">Trạng thái Thực thi</label>
                                        <select class="form-control">
                                            <option>Chưa chực hiện</option>
                                            <option>đang thực hiện</option>
                                            <option>kết thúc</option>
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
                                            <th>Tên đơn</th>
                                            <th>Mã đơn</th>
                                            <th>Dự Án</th>
                                            <th>Deadline</th>
                                            <th>Trạng thái cấp phép</th>
                                            <th>Trạng thái thực thi</th>
                                            <th>Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><a href="">Ten đơn</a></td>
                                            <td><a href="">mã đơn</a></td>
                                            <td><a href="">Dự Án</a></td>
                                            <td><a href="">08/2019</a></td>
                                            <td>đã cấp phép</td>
                                            <td>Đang thực thi</td>
                                            <td>
                                                <a class="btn bg-warning" style="color: white" href="{{route('requestformitem')}}">Chi tiết</a>
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