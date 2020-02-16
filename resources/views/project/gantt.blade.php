@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Giản đồ gannt</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Các dự án</li>
                <li class="breadcrumb-item active">Giản đồ gannt</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Dự án 001</h4>
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-css')
@endpush
@push('custom-scripts')
<script type="text/javascript" src="{{asset('admin/js/highcharts-gantt.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
    Highcharts.ganttChart('container', {
      title: {
        text: 'Dự án 001'
      },
      xAxis: {
        min: Date.UTC(2019, 10, 17),
        max: Date.UTC(2019, 10, 30),
        dateTimeLabelFormats :{
            millisecond: '%H:%M:%S.%L',
            second: '%H:%M:%S',
            minute: '%H:%M',
            hour: '%H:%M',
            day: '%e. %b',
            week: '%e. %b',
            month: '%b \'%y',
            year: '%Y'
        }
      },

      series: [{
        name: 'Project 1',
        data: [
        {
          name: '111',
          start: Date.UTC(2019, 10, 18),
          end: Date.UTC(2019, 10, 25),
          completed: 0.25
        },
        {
          name: 'Start prototype',
          start: Date.UTC(2019, 10, 18),
          end: Date.UTC(2019, 10, 25),
          completed: 0.9
        },
        {
          name: 'Test prototype',
          start: Date.UTC(2019, 10, 27),
          end: Date.UTC(2019, 10, 29),
          completed: 0
        }, 
        {
          name: 'Develop',
          start: Date.UTC(2019, 10, 20),
          end: Date.UTC(2019, 10, 25),
          completed: {
            amount: 0.12,
            fill: '#fa0'
          }
        }, 
        {
          name: 'Run acceptance tests',
          start: Date.UTC(2019, 10, 23),
          end: Date.UTC(2019, 10, 26)
        }]
      }]
    });
    $('.highcharts-credits').css('display','none')
})

</script>
@endpush