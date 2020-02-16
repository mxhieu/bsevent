@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Nhân sự</li>
                <li class="breadcrumb-item active">User Group</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    @foreach($PermissionList as $row)
                    <div class="form-group">
                        <label for="">{{$row['name']}}</label>
                        <div class="form-control permission_form">
                            @foreach($row['data'] as $key => $item)
                            <label class="container_checkbox">{{$item}}
                            <input value="{{$key}}" name="permission[]" type="checkbox" checked="">
                                <span class="checkmark_checkbox"></span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-css')

@endpush
@push('custom-scripts')

@endpush
