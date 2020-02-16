@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Nhân sự</li>
                <li class="breadcrumb-item active">User List</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a id="tab1" class="nav-link" data-toggle="tab" href="#listtab">Danh sách Nhân sự</a>
        </li>
        <li class="nav-item">
            <a id="tab2" class="nav-link" data-toggle="tab" href="#addtab">@if(!empty($EmployeeInfo)) Cập nhật @else Thêm mới @endif</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="listtab" class="tab-pane tab1"><br>
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
                            {{-- <h4 class="card-title dp-inline-block">Danh sách Nhân sự</h4> --}}
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên Nhân viên</th>
                                            <th>Phòng ban</th>
                                            <th>Chức vụ</th>
                                            <th>Group</th>
                                            <th>Trạng thái</th>
                                            {{-- <th>Ngày tạo</th> --}}
                                            <th>Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Nguyễn Văn A</td>
                                            <td>Phòng ban 1</td>
                                            <td>Nhân viên</td>
                                            <td>Group</td>
                                            <td>Cấp phép</td>
                                            <td>
                                                <a class="btn bg-purple" style="color: white" href="{{route('projectnoteview')}}">Cập nhật</a>
                                                <a class="btn bg-success" style="color: white" href="{{route('detailemployeeview')}}">Chi tiết</a>
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
        <div id="addtab" class="tab-pane tab2"><br>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-block">
                            @include('layout.validate_error')
                            <form action="@if(!empty($EmployeeInfo)){{route('editemployee', $EmployeeInfo->id)}}@else{{route('addemployee')}}@endif" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-8 @if($errors->has('name'))has_error @endif">
                                        <label for="name">Họ tên</label>
                                        <input value="@if(!empty($EmployeeInfo)){{$EmployeeInfo->name}}@elseif(!empty(old('name'))){{old('name')}}@endif" type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('approve'))has_error @endif">
                                        <label for="approve">TT Duyệt</label>
                                        <select id="approve" name="approve" class="form-control">
                                            <option value="0">Cấp phép</option>
                                            <option value="1">Không cấp phép</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('email'))has_error @endif">
                                    <label for="email">Email</label>
                                    <input value="@if(!empty($EmployeeInfo)){{$EmployeeInfo->email}}@elseif(!empty(old('email'))){{old('email')}}@endif" type="email" id="email" name="email" class="form-control">
                                </div>
                                <div class="form-group @if($errors->has('password'))has_error @endif">
                                    <label for="password">Mật khẩu</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 @if($errors->has('department_id'))has_error @endif">
                                        <label for="department_id">Phòng ban</label>
                                        <select id="department_id" name="department_id" class="form-control">
                                            @foreach($DepartmentList as $row)
                                            <option @if(!empty($EmployeeInfo) && $EmployeeInfo->department_id==$row->id) selected @elseif(!empty(old('department_id'))&&old('department_id')==$row->id) selected @endif value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('position_id'))has_error @endif">
                                        <label for="position_id" for="name">Chức vụ</label>
                                        <select id="position_id" name="position_id" class="form-control">
                                            @foreach($PositionList as $row)
                                            <option @if(!empty($EmployeeInfo) && $EmployeeInfo->position_id==$row->id) selected @elseif(!empty(old('position_id'))&&old('position_id')==$row->id) selected @endif value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('groupemployee_id'))has_error @endif">
                                        <label for="groupemployee_id">Group</label>
                                        <select name="groupemployee_id" class="form-control">
                                            @foreach($GroupEmployeeList as $row)
                                            <option @if(!empty($EmployeeInfo) && $EmployeeInfo->groupemployee_id==$row->id) selected @elseif(!empty(old('groupemployee_id'))&&old('groupemployee_id')==$row->id) selected @endif value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        @if(!empty($EmployeeInfo))
                                        <button class="btn btn-info">Update</button>
                                        @else
                                        <button class="btn btn-success">Add</button>
                                        @endif
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
$('#dataTable').DataTable({
        processing: true,
        serverSide: false,
        ajax: '{!! route('employeelist') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'department.name', name: 'department.name' },
            { data: 'position.name', name: 'position.name' },
            { data: 'group_employee.name', name: 'group_employee.name' },
            { data: 'approve', name: 'approve' },
            { data: 'action', name: 'action' },
        ]
    });
    @include('layout.tab_active',['SessionResult' => session()->get('result')])
</script>
@endpush