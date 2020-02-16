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
                                <div class="form-group">
                                    <label for="name">Tên dự án</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Ngày bắt đầu</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input readonly type="text" class="form-control pull-right datepicker">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Ngày kết thúc</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input readonly type="text" class="form-control pull-right datepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Ưu tiên</label>
                                        <select class="form-control">
                                            <option value="">Ưu tiên nhất</option>
                                            <option value="">Ưu tiên nhì</option>
                                            <option value="">Ưu tiên ba</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Trạng thái</label>
                                        <select class="form-control">
                                            <option value="">đã duyệt</option>
                                            <option value="">chưa duyệt</option>
                                            <option value="">đã xem</option>
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
                            <h4 class="card-title dp-inline-block">Danh sách các dự án</h4>
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên dự án</th>
                                            <th>Ưu tiên</th>
                                            <th>Người tạo</th>
                                            <th>Trạng thái</th>
                                            <th>Ngày tạo</th>
                                            <th>Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Dự án 1</td>
                                            <td>Ưu tiên nhất</td>
                                            <td>Xuân Hiếu</td>
                                            <td>Đã duyệt</td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>
                                                <a class="btn bg-purple" style="color: white" href="{{route('projectnoteview')}}">Ghi chú</a>
                                                <a class="btn bg-success" style="color: white" href="{{route('projecttaskview')}}">Công việc</a>
                                                <a class="btn bg-info" style="color: white" href="{{route('gantttview')}}">Gantt</a>
                                                <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Dự án 2</td>
                                            <td>Ưu tiên nhì</td>
                                            <td>Xuân Hiếu</td>
                                            <td>Chưa duyệt</td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>
                                                <a class="btn bg-purple" style="color: white" href="{{route('projectnoteview')}}">Ghi chú</a>
                                                <a class="btn bg-success" style="color: white" href="{{route('projecttaskview')}}">Công việc</a>
                                                <a class="btn bg-info" style="color: white" href="{{route('gantttview')}}">Gantt</a>
                                                <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Dự án 3</td>
                                            <td>Ưu tiên ba</td>
                                            <td>Xuân Hiếu</td>
                                            <td>Đã Xem</td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>
                                                <a class="btn bg-purple" style="color: white" href="{{route('projectnoteview')}}">Ghi chú</a>
                                                <a class="btn bg-success" style="color: white" href="{{route('projecttaskview')}}">Công việc</a>
                                                <a class="btn bg-info" style="color: white" href="{{route('gantttview')}}">Gantt</a>
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