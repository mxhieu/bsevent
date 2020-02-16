@if(!empty($SessionResult['message']))
	alertify.success('{{$SessionResult['message']}}');
@endif