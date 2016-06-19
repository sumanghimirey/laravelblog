	<!DOCTYPE html>
	<html lang="en">

	@include('partials._head')


	<body>

	@include('partials._nav')

	
	<div class="container">
	@include('partials._messege')
		
	@yield('content') 

	<hr>

	</div>

	@include('partials._footer')


	@include('partials._js')
	@yield('scripts')
	</body>
	
	</html>