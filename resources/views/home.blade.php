@extends('app')

@section('title')
{{$title}}
@endsection

@section('content')

@if ( !$posts->count() )
No posts untill now.
@else
<div class="">
	@foreach( $posts as $post )
	<div class="list-group">
		<div class="list-group-item">
			<p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By {{ $post->author->name }}</p>
		</div>
		<div class="list-group-item">
			<article>
				{!! str_limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}
			</article>
		</div>
	</div>
	@endforeach
	{!! $posts->render() !!}
</div>
@endif

@endsection
