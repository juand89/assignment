@extends('app')

@section('title')
Add New Comment
@endsection

@section('content')



<form action="/new-post" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<input required="required" value="{{ old('body') }}" placeholder="Enter comment here" type="text" name = "body"class="form-control" />
	</div>
	<input type="submit" name='publish' class="btn btn-success" value = "Post"/>
</form>
@endsection
