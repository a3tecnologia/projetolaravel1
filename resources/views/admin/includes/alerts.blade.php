@if($errors->any())
	<div class="alert alert-danger">
		@foreach ($errors->all() as $error)
			<p>{{ $error }} </p> {{-- impressão dos erros --}}
		@endforeach
	</div>
@endif