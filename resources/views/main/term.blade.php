@extends('main.header.header')
@section('content')
<style>
    p{
        text-align: justify;
    }
</style>
<main style="min-height: 70vh;">

<!-- =======================
Main Banner START -->
<section class="bg-light">
	<div class="container">

		<!-- Title -->
		<div class="row position-relative pb-4">
			<div class="col-lg-12 position-relative">
				<!-- Title -->
				<h1 class="fs-4">{{ __('messages.term_title') }}</h1>
			</div>
		</div>

	</div>
</section>

<section class="pt-5 pb-0 pb-lg-5">
    <div class="container">
        <div class="row g-4 g-md-5" style="justify-content: center;">
            @if($term)
				<h1 class="fs-4">{{$term->title ?? '' }}</h1>
				<p>{!! $term->des ?? '' !!}</p>
			@else
				<p></p>
			@endif
        </div>
    </div>
</section>
<!-- =======================
Main Banner END -->

</main>
@endsection