@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            {{-- <h3 class="text-themecolor m-b-0 m-t-0">Thông tin nhân sự</h3> --}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Cấu hình</a></li>
                <li class="breadcrumb-item">Nhân sự</li>
                <li class="breadcrumb-item active">Thông tin nhân sự</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a id="tab1" class="nav-link" data-toggle="tab" href="#info">Thông tin</a>
        </li>
        <li class="nav-item">
            <a id="tab2" class="nav-link" data-toggle="tab" href="#edu">Học vấn</a>
        </li>
        <li class="nav-item">
            <a id="tab3" class="nav-link" data-toggle="tab" href="#skill">Kỹ năng</a>
        </li>
        <li class="nav-item">
            <a id="tab4" class="nav-link" data-toggle="tab" href="#job">Công việc</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="info" class="tab-pane tab1"><br>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-block">
                            @if(!$errors->isEmpty() && session()->get('result')['ErrorForm'] == 'detail')
                            @include('layout.validate_error')
                            @endif
                            <form action="{{route('detailemployee',$EmployeeInfo->id)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-8 @if($errors->has('name'))has_error @endif">
                                        <label for="name">Họ tên</label>
                                    <input type="text" value="@if(!empty($EmployeeInfo)){{$EmployeeInfo->name}}@endif" readonly id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('country'))has_error @endif">
                                        <label for="country">Quốc tịch</label>
                                        <input value="@if(!empty($EmployeeInfo)){{$EmployeeInfo->country}}@endif" type="text" id="country" name="country" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 @if($errors->has('birthday'))has_error @endif">
                                        <label for="birthday">Ngày sinh</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input value="@if(!empty($EmployeeInfo)){{$EmployeeInfo->birthday}}@endif" name="birthday" id="birthday" readonly type="text" class="form-control pull-right datepicker">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('gender'))has_error @endif">
                                        <label for="gender">Giới tính</label>
                                        <select name="gender" class="form-control" id="">
                                            <option value="0">Nam</option>
                                            <option value="1">Nữ</option>
                                            <option value="2">Không xác định</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('marital_status'))has_error @endif">
                                        <label for="marital_status">Tình trạng hôn nhân</label>
                                        <select name="marital_status" class="form-control" id="">
                                            <option value="0">Độc thân</option>
                                            <option value="1">Đã kết hôn</option>
                                            <option value="2">Ly thân</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-8 @if($errors->has('email'))has_error @endif">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" readonly value="@if(!empty($EmployeeInfo)){{$EmployeeInfo->email}}@endif" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('phone'))has_error @endif">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" value="@if(!empty($EmployeeInfo)){{$EmployeeInfo->phone}}@endif" id="phone" name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('remark'))has_error @endif">
                                    <label for="remark">Ghi chú</label>
                                    <textarea name="remark" class="form-control">@if(!empty($EmployeeInfo)){{$EmployeeInfo->remark}}@endif</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        <button class="btn btn-success">Cập nhật</button>
                                        <a class="btn btn-warning" href="{{route('employee')}}">Quay về</a>
                                        <a class="btn btn-info" href="{{route('employee')}}">Export</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="edu" class="tab-pane tab2"><br>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#addedu">Thêm học vấn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#listedu">Học vấn</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="addedu" class="tab-pane active"><br>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-block">
                                    @if(!$errors->isEmpty() && session()->get('result')['ErrorForm'] == 'education')
                                    @include('layout.validate_error')
                                    @endif
                                    <form action="@if(!empty($EmployeeEducationInfo)){{route('editeducation',['employeeId' => $EmployeeInfo->id,'id' => $EmployeeEducationInfo->id])}}@else{{route('addeducation',$EmployeeInfo->id)}}@endif" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group col-md-4 @if($errors->has('school_edu'))has_error @endif">
                                                <label for="school_edu">Trường</label>
                                                <input value="@if(!empty($EmployeeEducationInfo)){{$EmployeeEducationInfo->school}}@elseif(!empty(old('school_edu'))){{old('school_edu')}}@endif" type="text" id="school_edu" name="school_edu" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4 @if($errors->has('majors_edu'))has_error @endif">
                                                <label for="majors_edu">Nghành học</label>
                                                <input value="@if(!empty($EmployeeEducationInfo)){{$EmployeeEducationInfo->majors}}@elseif(!empty(old('majors_edu'))){{old('majors_edu')}}@endif" type="text" id="majors_edu" name="majors_edu" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4 @if($errors->has('level_edu'))has_error @endif">
                                                <label for="level_edu">Xếp loại</label>
                                                <input value="@if(!empty($EmployeeEducationInfo)){{$EmployeeEducationInfo->level}}@elseif(!empty(old('level_edu'))){{old('level_edu')}}@endif" type="text" id="level_edu" name="level_edu" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4 @if($errors->has('start_at_edu'))has_error @endif">
                                                <label for="start_at_edu">Bắt đầu</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input value="@if(!empty($EmployeeEducationInfo)){{$EmployeeEducationInfo->start_at}}@elseif(!empty(old('start_at_edu'))){{old('start_at_edu')}}@endif" id="start_at_edu" name="start_at_edu" readonly type="text" class="form-control pull-right datepicker">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4 @if($errors->has('end_at_edu'))has_error @endif">
                                                <label for="end_at_edu">Kết thúc</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input value="@if(!empty($EmployeeEducationInfo)){{$EmployeeEducationInfo->end_at}}@elseif(!empty(old('end_at_edu'))){{old('end_at_edu')}}@endif" id="end_at_edu" name="end_at_edu" readonly type="text" class="form-control pull-right datepicker">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4 @if($errors->has('certificate_edu'))has_error @endif">
                                                <label for="certificate_edu">Chứng chỉ</label>
                                                <input value="@if(!empty($EmployeeEducationInfo)){{$EmployeeEducationInfo->certificate}}@elseif(!empty(old('certificate_edu'))){{old('certificate_edu')}}@endif" type="text" id="certificate_edu" name="certificate_edu" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group @if($errors->has('remark_edu'))has_error @endif">
                                            <label for="remark_edu">Ghi chú</label>
                                            <textarea id="remark_edu" name="remark_edu" class="form-control">@if(!empty($EmployeeEducationInfo)){{$EmployeeEducationInfo->remark}}@elseif(!empty(old('remark_edu'))){{old('remark_edu')}}@endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12 padding-unset">
                                                @if(!empty($EmployeeEducationInfo))
                                                <button class="btn btn-info">Cập nhật</button>
                                                @else
                                                <button class="btn btn-success">Thêm</button>
                                                @endif
                                                <a class="btn btn-warning" href="{{route('employee')}}">Quay về</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="listedu" class="tab-pane fade"><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    {{-- <h4 class="card-title dp-inline-block">Danh sách về học vấn</h4> --}}
                                    <div class="table-responsive">
                                        <table class="table" id="dataTableEdu">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Bắt đầu</th>
                                                    <th>Kết thúc</th>
                                                    <th>Trường</th>
                                                    <th>Nghành</th>
                                                    <th>Xếp loại</th>
                                                    <th>Tùy chỉnh</th>
                                                </tr>
                                            </thead>
                                            {{-- <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>{{date('d-m-Y',time())}}</td>
                                                    <td>{{date('d-m-Y',time())}}</td>
                                                    <td>Trường ABC</td>
                                                    <td>Nghành xyz</td>
                                                    <td>Giỏi</td>
                                                    <td>
                                                        <a class="btn btn-success" href="{{route('employee')}}">Cập nhật</a>
                                                        <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>{{date('d-m-Y',time())}}</td>
                                                    <td>{{date('d-m-Y',time())}}</td>
                                                    <td>Trường ABC</td>
                                                    <td>Nghành xyz</td>
                                                    <td>Giỏi</td>
                                                    <td>
                                                        <a class="btn btn-success" href="{{route('employee')}}">Cập nhật</a>
                                                        <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>{{date('d-m-Y',time())}}</td>
                                                    <td>{{date('d-m-Y',time())}}</td>
                                                    <td>Trường ABC</td>
                                                    <td>Nghành xyz</td>
                                                    <td>Giỏi</td>
                                                    <td>
                                                        <a class="btn btn-success" href="{{route('employee')}}">Cập nhật</a>
                                                        <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                                    </td>
                                                </tr>
                                            </tbody> --}}
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="skill" class="tab-pane tab3"><br>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#addskill">Thêm kỹ năng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#listskill">Kỹ năng</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="addskill" class="tab-pane active"><br>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-block">
                                    @if(!$errors->isEmpty() && session()->get('result')['ErrorForm'] == 'skill')
                                    @include('layout.validate_error')
                                    @endif
                                    <form action="@if(!empty($EmployeeSkillInfo)){{route('editskill',['employeeId' => $EmployeeInfo->id,'id' => $EmployeeSkillInfo->id])}}@else{{route('addskill',$EmployeeInfo->id)}}@endif" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group col-md-4 @if($errors->has('name_skill'))has_error @endif">
                                                <label for="name_skill">Tên kỹ năng</label>
                                                <input value="@if(!empty($EmployeeSkillInfo)){{$EmployeeSkillInfo->name}}@elseif(!empty(old('name_skill'))){{old('name_skill')}}@endif" type="text" id="name_skill" name="name_skill" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4 @if($errors->has('level_skill'))has_error @endif">
                                                <label for="level_skill">Xếp loại</label>
                                                <input value="@if(!empty($EmployeeSkillInfo)){{$EmployeeSkillInfo->level}}@elseif(!empty(old('level_skill'))){{old('level_skill')}}@endif" type="text" id="level_skill" name="level_skill" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4 @if($errors->has('certificate_skill'))has_error @endif">
                                                <label for="certificate_skill">Chứng chỉ</label>
                                                <input value="@if(!empty($EmployeeSkillInfo)){{$EmployeeSkillInfo->certificate}}@elseif(!empty(old('certificate_skill'))){{old('certificate_skill')}}@endif" type="text" id="certificate_skill" name="certificate_skill" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group @if($errors->has('remark_skill'))has_error @endif">
                                            <label for="remark_skill">Ghi chú</label>
                                            <textarea name="remark_skill" class="form-control">@if(!empty($EmployeeSkillInfo)){{$EmployeeSkillInfo->remark}}@elseif(!empty(old('remark_skill'))){{old('remark_skill')}}@endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12 padding-unset">
                                                <button class="btn btn-success">Cập nhật</button>
                                                <a class="btn btn-warning" href="{{route('employee')}}">Quay về</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="listskill" class="tab-pane fade"><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    {{-- <h4 class="card-title dp-inline-block">Danh sách Ghi chú dự án</h4> --}}
                                    <div class="table-responsive">
                                        <table class="table" id="dataTableSkill">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên Kỹ năng</th>
                                                    <th>Xếp loại</th>
                                                    <th>Chứng chỉ</th>
                                                    <th>Tùy chỉnh</th>
                                                </tr>
                                            </thead>
                                            {{-- <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>kỹ năng 1</td>
                                                    <td>Giỏi</td>
                                                    <td>Chứng chỉ 1</td>
                                                    <td>
                                                        <a class="btn bg-success" style="color: white" href="">Cập nhật</a>
                                                        <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                                    </td>
                                                </tr>
                                            </tbody> --}}
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="job" class="tab-pane tab4"><br>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#addjob">Thêm công việc</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#listjob">danh sách công việc</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="addjob" class="tab-pane active"><br>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-block">
                                    @if(!$errors->isEmpty() && session()->get('result')['ErrorForm'] == 'job')
                                    @include('layout.validate_error')
                                    @endif
                                    <form action="@if(!empty($EmployeeJobInfo)){{route('editjob',['employeeId' => $EmployeeInfo->id,'id' => $EmployeeJobInfo->id])}}@else{{route('addjob',$EmployeeInfo->id)}}@endif" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group col-md-4 @if($errors->has('company_name_job'))has_error @endif">
                                                <label for="company_name_job">Công ty</label>
                                                <input value="@if(!empty($EmployeeJobInfo)){{$EmployeeJobInfo->company_name}}@elseif(!empty(old('company_name_job'))){{old('company_name_job')}}@endif" type="text" id="company_name_job" name="company_name_job" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4 @if($errors->has('department_job'))has_error @endif">
                                                <label for="department_job">Phòng ban</label>
                                                <input value="@if(!empty($EmployeeJobInfo)){{$EmployeeJobInfo->department}}@elseif(!empty(old('department_job'))){{old('department_job')}}@endif" type="text" id="department_job" name="department_job" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4 @if($errors->has('position_job'))has_error @endif">
                                                <label for="position_job">Chức vụ</label>
                                                <input value="@if(!empty($EmployeeJobInfo)){{$EmployeeJobInfo->position}}@elseif(!empty(old('position_job'))){{old('position_job')}}@endif" type="text" id="position_job" name="position_job" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4 @if($errors->has('start_at_job'))has_error @endif">
                                                <label for="start_at_job">Bắt đầu</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input value="@if(!empty($EmployeeJobInfo)){{$EmployeeJobInfo->start_at}}@elseif(!empty(old('start_at_job'))){{old('start_at_job')}}@endif" name="start_at_job" readonly type="text" class="form-control pull-right datepicker">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-8 @if($errors->has('responsibility_job'))has_error @endif">
                                                <label for="responsibility_job">Trách nhiệm</label>
                                                <input value="@if(!empty($EmployeeJobInfo)){{$EmployeeJobInfo->responsibility}}@elseif(!empty(old('responsibility_job'))){{old('responsibility_job')}}@endif" name="responsibility_job" type="text" id="responsibility_job" name="responsibility_job" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4 @if($errors->has('end_at_job'))has_error @endif">
                                                <label for="end_at_job">Kết thúc</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input value="@if(!empty($EmployeeJobInfo)){{$EmployeeJobInfo->end_at}}@elseif(!empty(old('end_at_job'))){{old('end_at_job')}}@endif" name="end_at_job" readonly type="text" class="form-control pull-right datepicker">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-8 @if($errors->has('leave_job'))has_error @endif">
                                                <label for="leave_job">Leave</label>
                                                <input value="@if(!empty($EmployeeJobInfo)){{$EmployeeJobInfo->leave}}@elseif(!empty(old('leave_job'))){{old('leave_job')}}@endif" type="text" id="leave_job" name="leave_job" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group @if($errors->has('remark_job'))has_error @endif">
                                            <label for="remark_job">Ghi chú</label>
                                            <textarea name="remark_job" class="form-control">@if(!empty($EmployeeJobInfo)){{$EmployeeJobInfo->remark}}@elseif(!empty(old('remark_job'))){{old('remark_job')}}@endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12 padding-unset">
                                                <button class="btn btn-success">Cập nhật</button>
                                                <a class="btn btn-warning" href="{{route('employee')}}">Quay về</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="listjob" class="tab-pane fade"><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    {{-- <h4 class="card-title dp-inline-block">Danh sách công việc</h4> --}}
                                    <div class="table-responsive">
                                        <table class="table" id="dataTableJob">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Bắt đầu</th>
                                                    <th>Kết thúc</th>
                                                    <th>Công ty</th>
                                                    <th>Phòng ban</th>
                                                    <th>Chức vụ</th>
                                                    <th>Tùy chỉnh</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
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
<link rel="stylesheet" href="{{asset('admin/css/bootstrap-datepicker.min.css')}}">
@endpush
@push('custom-scripts')
{{-- Jquery Data table --}}
<script type="text/javascript"  src="{{asset('admin/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">
    $('.datepicker').datepicker({
      autoclose: true,
      format: "dd/mm/yyyy",
    })
    $(function(){
        $('#dataTableEdu').DataTable({
            processing: true,
            serverSide: false,
            ajax: '{!! route('educationlist', $EmployeeInfo->id) !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'start_at', name: 'start_at' },
                { data: 'end_at', name: 'end_at' },
                { data: 'school', name: 'school' },
                { data: 'majors', name: 'majors' },
                { data: 'level', name: 'level' },
                { data: 'action', name: 'action' },
            ]
        });

        $('#dataTableSkill').DataTable({
            processing: true,
            serverSide: false,
            ajax: '{!! route('skilllist', $EmployeeInfo->id) !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'level', name: 'level' },
                { data: 'certificate', name: 'certificate' },
                { data: 'action', name: 'action' },
            ]
        });

        $('#dataTableJob').DataTable({
            processing: true,
            serverSide: false,
            ajax: '{!! route('joblist', $EmployeeInfo->id) !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'start_at', name: 'start_at' },
                { data: 'end_at', name: 'end_at' },
                { data: 'company_name', name: 'company_name' },
                { data: 'department', name: 'department' },
                { data: 'position', name: 'position' },
                { data: 'action', name: 'action' },
            ]
        });
    })
    
    @include('layout.tab_active',['SessionResult' => session()->get('result')])
</script>
@endpush