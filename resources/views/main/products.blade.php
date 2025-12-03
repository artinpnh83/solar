@extends('main.header.header')
@section('content')
<!-- **************** MAIN CONTENT START **************** -->
<main style="min-height: 70vh;">

    <section class="bg-light py-5 position-relative overflow-hidden">
	<!-- SVG decoration -->
	<figure class="fill-primary opacity-1 position-absolute top-50 end-0 me-n6 d-none d-sm-block">
		<svg style="transform: scale(-1,1)" width="211px" height="211px">
			<path d="M210.030,105.011 C210.030,163.014 163.010,210.029 105.012,210.029 C47.013,210.029 -0.005,163.014 -0.005,105.011 C-0.005,47.015 47.013,-0.004 105.012,-0.004 C163.010,-0.004 210.030,47.015 210.030,105.011 Z"></path>
		</svg>
	</figure>

	<!-- SVG decoration -->
	<figure class="fill-primary position-absolute top-50 start-100 translate-middle ms-n7 mt-7 d-none d-sm-block">
		<svg style="transform: scale(-1,1)" class="opacity-5" enable-background="new 0 0 160.7 159.8" height="180px">
			<path d="m153.2 114.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z"></path>
			<path d="m116.4 114.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z"></path>
			<path d="m134.8 114.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z"></path>
			<path d="m135.1 96.9c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z"></path>
			<path d="m153.5 96.9c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z"></path>
			<path d="m98.3 96.9c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z"></path>
			<ellipse cx="116.7" cy="99.1" rx="2.1" ry="2.2"></ellipse>
			<path d="m153.2 149.8c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.3 0.9-2.2 2.1-2.2z"></path>
			<path d="m135.1 132.2c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2 0-1.3 0.9-2.2 2.1-2.2z"></path>
			<path d="m153.5 132.2c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.3 0.9-2.2 2.1-2.2z"></path>
			<path d="m80.2 79.3c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2z"></path>
			<path d="m117 79.3c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z"></path>
			<path d="m98.6 79.3c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z"></path>
			<path d="m135.4 79.3c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z"></path>
			<path d="m153.8 79.3c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z"></path>
			<path d="m80.6 61.7c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z"></path>
			<ellipse cx="98.9" cy="63.9" rx="2.1" ry="2.2"></ellipse>
			<path d="m117.3 61.7c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z"></path>
			<ellipse cx="62.2" cy="63.9" rx="2.1" ry="2.2"></ellipse>
			<ellipse cx="154.1" cy="63.9" rx="2.1" ry="2.2"></ellipse>
			<path d="m135.7 61.7c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z"></path>
			<path d="m154.4 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z"></path>
			<path d="m80.9 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z"></path>
			<path d="m44.1 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z"></path>
			<path d="m99.2 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2z"></path>
			<ellipse cx="117.6" cy="46.3" rx="2.1" ry="2.2"></ellipse>
			<path d="m136 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z"></path>
			<path d="m62.5 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z"></path>
			<path d="m154.7 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z"></path>
			<path d="m62.8 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z"></path>
			<ellipse cx="136.3" cy="28.6" rx="2.1" ry="2.2"></ellipse>
			<path d="m99.6 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z"></path>
			<path d="m117.9 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2z"></path>
			<path d="m81.2 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z"></path>
			<path d="m26 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z"></path>
			<ellipse cx="44.4" cy="28.6" rx="2.1" ry="2.2"></ellipse>
			<path d="m136.6 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2 0.1 1.2-0.9 2.2-2.1 2.2z"></path>
			<path d="m155 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2 0.1 1.2-0.9 2.2-2.1 2.2z"></path>
			<path d="m26.3 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2s-0.9 2.2-2.1 2.2z"></path>
			<path d="m81.5 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2s-0.9 2.2-2.1 2.2z"></path>
			<path d="m63.1 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2s-0.9 2.2-2.1 2.2z"></path>
			<path d="m44.7 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2s-0.9 2.2-2.1 2.2z"></path>
			<path d="m118.2 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2 0.1 1.2-0.9 2.2-2.1 2.2z"></path>
			<path d="m7.9 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2 0.1 1.2-0.9 2.2-2.1 2.2z"></path>
			<path d="m99.9 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2z"></path>
		</svg>
	</figure>

	<!-- SVG decoration -->
	<figure class="position-absolute bottom-0 start-0 d-none d-lg-block">
		<svg style="transform: scale(-1,1)" width="822.2px" height="301.9px" viewBox="0 0 822.2 301.9">
			<path class="fill-warning" d="M752.5,51.9c-4.5,3.9-8.9,7.8-13.4,11.8c-51.5,45.3-104.8,92.2-171.7,101.4c-39.9,5.5-80.2-3.4-119.2-12.1 c-32.3-7.2-65.6-14.6-98.9-13.9c-66.5,1.3-128.9,35.2-175.7,64.6c-11.9,7.5-23.9,15.3-35.5,22.8c-40.5,26.4-82.5,53.8-128.4,70.7 c-2.1,0.8-4.2,1.5-6.2,2.2L0,301.9c3.3-1.1,6.7-2.3,10.2-3.5c46.1-17,88.1-44.4,128.7-70.9c11.6-7.6,23.6-15.4,35.4-22.8 c46.7-29.3,108.9-63.1,175.1-64.4c33.1-0.6,66.4,6.8,98.6,13.9c39.1,8.7,79.6,17.7,119.7,12.1C634.8,157,688.3,110,740,64.6 c4.5-3.9,9-7.9,13.4-11.8C773.8,35,797,16.4,822.2,1l-0.7-1C796.2,15.4,773,34,752.5,51.9z"></path>
		</svg>
	</figure>

	<div class="container position-relative">
	    @if($categ)
    		<div class="row g-4 align-items-center">
    			<div class="col-md-6">
    				<!-- Title -->
    				<h1>{{$categ->name}} {{ __('messages.in') }} {{ __('messages.sealban') }}</h1>
    				<p>{!! $categ->des !!}</p>
    			</div>
    
    			<div class="col-md-6 text-center">
    				<!-- Image -->
    				<img src="/storage/{{ $categ->image }}" class="h-400px h-xl-500px" alt="">
    			</div>
    		</div>
    	@else
    		<div class="row g-4 align-items-center">
    			<div class="col-md-6">
    				<!-- Title -->
    				<h1> {{ __('messages.All Products') }} {{ __('messages.in') }} {{ __('messages.sealban') }}</h1>
    			</div>
    
    			<div class="col-md-6 text-center">
    				<!-- Image -->
    				 @if(app()->getLocale() == 'fa')
    				    <img class="h-200px h-xl-200px" src="/assets/images/logo.png" style="height: 65px" alt="logo">
    				@else
    				    <img class="h-200px h-xl-200px" src="/assets/images/logo-en.png" alt="logo">
    				@endif
    			</div>
    		</div>
    	@endif
	</div>
</section>

<!-- =======================
Page content START -->
<section class="py-5">
	<div class="container">
	    <div class="row">
			<div class="col-12">
				<div class="p-4 text-center rounded-3">
				
					<div class="d-flex justify-content-center">
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
		<div class="row">
			<!-- Main content START -->
			<div class="col-12">

				<!-- Search option START -->
				<div class="row mb-4 align-items-center">

					<!-- Title -->
					<div class="col-md-4">
						<h5 class="mb-0">{{ __('messages.products') }}</h5>
					</div>
				</div>
				<!-- Search option END -->

				<!-- Book Grid START -->
				<div class="row g-4">
@if(count($products))  
@foreach($products as $product)
					<!-- Card item START -->
					<div class="col-sm-6 col-lg-4 col-xl-3">
						<div class="card shadow h-100">
							<div class="position-relative">
								<!-- Image -->
								<a href="/product/{{$product->id}}">
								    <img src="/storage/{{$product->image}}" style="height: 270px;" class="card-img-top" alt="book image">
								</a>
							</div>

							<!-- Card body -->
							<div class="card-body px-3">
								<!-- Title -->
								<h5 class="card-title mb-0">
									<a href="/product/{{$product->id}}" class="badge bg-purple bg-opacity-10 text-purple" style="white-space: pre-line;">{{$product->category->name ?? ''}}</a>
									<a href="/profile/add-wishlist/{{$product->id}}" class="h6 mb-0">
									    @if (Auth::user())
    									    @if ($product->wishlist->where('user_id', Auth::user()->id)->count() > 0)
                                                <i class="fas fa-heart"></i>
                                            @else
                                                <i class="far fa-heart"></i>
                                            @endif
                                        @else
                                            <i class="far fa-heart"></i>
                                        @endif
									    
									 </a>
								</h5>
							</div>

							<!-- Card footer -->
							<div class="card-footer pt-0 px-3">
								<div class="d-flex justify-content-between align-items-center">
									<a href="/product/{{$product->id}}"><span class="h6 fw-light mb-0">{{$product->name}}</span></a>
								</div>
							</div>
						</div>
					</div>
					<!-- Card item END -->
@endforeach
@else
                    <p>{{ __('messages.no_product') }}</p>
@endif
				</div>
				<!-- Book Grid END -->

			</div>
			<!-- Main content END -->
		</div><!-- Row END -->
	</div>
</section>
<!-- =======================
Page content END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->
@endsection