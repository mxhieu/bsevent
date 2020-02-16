@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Phân công công việc</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Dự án</li>
                <li class="breadcrumb-item">Phân công công việc</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#addtab">Thêm mới</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#listtab">Danh sách Phân công công việc</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="addtab" class="tab-pane fade"><br>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Thêm công công việc</h4>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                <div class="form-group">
                                    <label for="name">Tên công việc</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Chọn form</label>
                                        <select class="form-control select2" multiple="multiple" data-placeholder="Chọn form" style="width: 100%;">
                                            <option>Form 1</option>
                                            <option>Form 2</option>
                                            <option>Form 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Giao đoạn</label>
                                        <select class="form-control">
                                            <option>Chọn giai đoạn</option>
                                            <option>A1. Thu nhập thông tin</option>
                                            <option>A2. Họp team nội bộ</option>
                                            <option>A3. Phát thảo concept</option>
                                        </select>
                                    </div>
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
                                        <label for="">Phòng ban</label>
                                        <select class="form-control">
                                            <option>Chọn giai đoạn</option>
                                            <option>Phòng ban 1</option>
                                            <option>Phòng ban 2</option>
                                            <option>Phòng ban 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Nhân viên</label>
                                        <select class="form-control select2" multiple="multiple" data-placeholder="Chọn nhân viên" style="width: 100%;">
                                            <option>Nhân viên 1</option>
                                            <option>Nhân viên 2</option>
                                            <option>Nhân viên 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Nội dung công việc</label>
                                    <textarea class="form-control"></textarea>
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
                            <h4 class="card-title dp-inline-block">Danh sách Phân công công việc</h4>
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên công việc</th>
                                            <th>Hạn</th>
                                            <th>Form sử dụng</th>
                                            <th>Hoành thành</th>
                                            <th>Phòng ban</th>
                                            <th>Nhân viên</th>
                                            <th>Giai đoạn</th>
                                            <th>Ngày tạo</th>
                                            <th>Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><a href="">Công việc 1</a></td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>Form 1, form 2</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                      aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                        70%
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Phòng ban 1</td>
                                            <td>Nhân viên 1</td>
                                            <td>Giai đoạn 2</td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>
                                                <a class="btn bg-warning" style="color: white" href="{{route('projecttaskresultview')}}">Kết quả</a>
                                                <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><a href="">Công việc 2</a></td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>Form 1, form 2</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                      aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                        70%
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Phòng ban 2</td>
                                            <td>Nhân viên 2</td>
                                            <td>Giai đoạn 2</td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>
                                                <a class="btn bg-warning" style="color: white" href="{{route('projecttaskresultview')}}">Kết quả</a>
                                                <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><a href="">Công việc 3</a></td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>Form 1, form 2</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                      aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                        70%
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Phòng ban 3</td>
                                            <td>Nhân viên 3</td>
                                            <td>A1. thu thập thông tin</td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>
                                                <a class="btn bg-warning" style="color: white" href="{{route('projecttaskresultview')}}">Kết quả</a>
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
<link rel="stylesheet" href="{{asset('Administrator/assets/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('Administrator/css/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('Administrator/css/select2.min.css')}}">
@endpush
@push('custom-scripts')
{{-- Jquery Data table --}}
<script type="text/javascript" src="{{asset('Administrator/assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Administrator/assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Administrator/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Administrator/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
    $('.datepicker').datepicker({
      autoclose: true
    })
    $('.select2').select2()
</script>
@endpush