@extends('main.header.header')
@section('content')
{!!html_entity_decode($product->meta)!!}
<style>
    p{
        text-align: justify;
    }
</style>
<main>

<!-- =======================
Page content START -->
<section class="pt-5">
	<div class="container" data-sticky-container>
	    <div class="row">
			<div class="col-12">
				<div class="py-4 text-center rounded-3">
				
					<div class="d-flex">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb breadcrumb-dots mb-0">
								<li class="breadcrumb-item"><a href="/">{{ __('messages.home') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page">{{ __('messages.products') }}</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	
	                        @if (\Session::has('error'))
                            <p class="mt-3 alert alert-success"
                                style="color: darkred;background-color: #dc444433;border-color: darkred;padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;"
                                >{!! \Session::get('error') !!}
                            </p>
                            @endif
                            
                            @if (\Session::has('success'))
                                <p class="mt-3 alert alert-success"
                                style="color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6;padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;"
                                >{!! \Session::get('success') !!}</p>
                            @endif
		<div class="row g-4 g-sm-5">

			<!-- Left sidebar START -->
			<div class="col-xl-4">
				<div data-sticky data-margin-top="80" data-sticky-for="992">
					<div class="row justify-content-center">
						<div class="col-md-8 col-xl-12">

							<!-- Card START -->
							<div class="card shadow">
								<!-- Image -->
								<div class="rounded-3">
                    				<div class="tiny-slider arrow-round arrow-blur arrow-hover rounded-3 overflow-hidden">
                    					<div class="tiny-slider-inner" data-autoplay="false" data-gutter="0" data-arrow="true" data-dots="false" data-items="1">
                    						<!-- Card item START -->
                    						<img src="/storage/{{$product->image}}" style="height: 300px;" class="card-img-top" alt="book image">
                    						@foreach($product->gallery as $gallery)
                    						<img src="/storage/{{$gallery->image}}" style="height: 300px;" class="card-img-top" alt="book image">
                    						@endforeach
                    					</div>
                    				</div>
								</div>
			
								<!-- Card body -->
								<div class="card-body pb-3">
									<!-- Buttons and price -->
									<div class="text-center">
										<a href="/profile/add-wishlist/{{$product->id}}" class="btn btn-light mb-0">
										    @if (Auth::user())
    										    @if ($product->wishlist->where('user_id', Auth::user()->id)->count() > 0)
                                                    <i class="bi bi-bookmark-fill me-2"></i>
                                                @else
                                                    <i class="bi bi-bookmark me-2"></i>
                                                @endif
                                            @else
                                                <i class="bi bi-bookmark me-2"></i>
                                            @endif
										    {{ __('messages.favorites') }}
										</a>
									</div>
								</div>
							</div>
							<!-- Card END -->

						</div>
					</div> <!-- Row End -->
				</div>
			</div>
			<!-- Left sidebar END -->
				
			<!-- Main content START -->
			<div class="col-xl-8">
				<!-- Title -->
				<h1 class="mb-4 fs-4">{{$product->name}}</h1>
				<h6 class="mb-4">{{ __('messages.category') }}: {{$product->category->name ?? ''}}</h6>
                @if($product->features)
				<h4 class="fs-5">{{ __('messages.features') }}</h4>
				<p>{!! $product->features !!}</p>
				@endif
				<hr>
				@if($product->structure)
				<h4 class="fs-5">{{ __('messages.structure') }}</h4>
				<p>{!! $product->structure !!}</p>
				@endif
				<hr>
				@if($product->description)
				<h4 class="fs-5">{{ __('messages.description') }}</h4>
				<p>{!! $product->description !!}</p>
				@endif
			</div>
			<!-- Main content END -->
		</div> <!-- Row END -->
	</div>
</section>
<!-- =======================
Page content END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->
@endsection