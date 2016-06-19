@extends('main')

@section('title','|All Posts')

@section('content')

<div class="row">

	<div class="col-md-10">

		<h1> All Posts </h1>


	</div>
	<div class="col-md-2">
		<a href="{{ route('posts.create')}}" class="btn btn-lg btn-block btn-primary btn-margin"> create post </a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<hr>
	</div>
</div>

<div class="row">

	<div class="col-md-12">

<table class="table">
	<thead>
<th>#</th>
<th>Title</th>
<th>Body</th>
<th>Created at</th>
<th></th>
	</thead>


	<tbody>
		@foreach($post as $posts)
		<tr>
		<th>{{$posts->id}} </th>
		<td> {{$posts->title}}</td>
		<td> {{substr($posts->body,0,50)}}{{ strlen($posts->body)>50?"....":""}}</td>
		<td> {{date('M j,Y',strtotime($posts->created_at))}}</td>
		<td> <a href="{{route('posts.show',$posts->id)}}" class="btn btn-default btn-sm"> View </a> 
			<a href="{{route('posts.edit', $posts->id)}}" class="btn btn-default btn-sm"> Edit</a></td>

		</tr>
			@endforeach
	</tbody>


</table>
<div class="text-center"> 
{!! $post->links() !!}

</div>

	</div>
</div>
@endsection
