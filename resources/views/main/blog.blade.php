@extends('main.header.header')
@section('content')
{!!html_entity_decode($blog->meta)!!}
<!-- **************** MAIN CONTENT START **************** -->
<main>
	<style>
	    body {
	        text-align: justify;
	    }
	</style>
	<!-- =======================
	Main Content START -->
	<section class="pb-0 pt-4 pb-md-5">
		<div class="container">
			<div class="row">
				<div class="col-12">
	
					<!-- Title and Info START -->
					<div class="row">
						<!-- Avatar and Share -->
						<div class="col-lg-3 align-items-center mt-4 mt-lg-5 order-2 order-lg-1">
							<div class="text-lg-center">
								<!-- Author info -->
								<div class="position-relative">
									
									<a href="#" class="h5 stretched-link mt-2 mb-0 d-block">SURINSHINEENERGY</a>
								</div>
								<!-- Info -->
								<ul class="list-inline list-unstyled">
								    @if(app()->getLocale() == 'fa')
									    <li class="list-inline-item d-lg-block my-lg-2">{{ \Morilog\Jalali\Jalalian::forge($blog->updated_at)->format("%d %B %Y") }}</li>
									@else
									    <li class="list-inline-item d-lg-block my-lg-2">{{ $blog->updated_at->format("Y M d") }}</li>
									@endif
								</ul>
							</div>
						</div>
	
						<!-- Content -->
						<div class="col-lg-9 order-1">
							<img style="width: 800px; border-radius: 20px;" src="{{asset('storage/'.$blog->image)}}" alt="">
						</div>
					</div>
					<!-- Title and Info END -->
	
					<!-- Quote and content START -->
					<div class="row mt-4">
						<h2>
							{{$blog->title}}
						</h2>
						<!-- Content -->
						<div class="col-12 mt-4 mt-lg-0">
							{!! $blog->short_des !!}
						</div>
	
						<!-- Quote -->
						<div class="col-lg-12 col-xl-12 mx-auto mt-4">
							{!! $blog->des !!}
						</div>
					</div>
					<!-- Quote and content END -->
				</div>
			</div> <!-- Row END -->
		</div>
	</section>
	<!-- =======================
	Main Content END -->
	
	<!-- =======================
	Related blog START -->
	<section class="pt-0">
		<div class="container">
	    <!-- Title -->
			<div class="row mb-4">
				<div class="col-12">
				<h2 class="mb-0 fs-4">{{ __('messages.blogSingleH1') }}</h2>
				</div>
			</div>
			
			<!-- Slider START -->
			<div class="tiny-slider arrow-round arrow-hover arrow-dark">
				<div class="tiny-slider-inner" data-autoplay="false" data-arrow="true" data-edge="2" data-dots="false" data-items="3" data-items-lg="2" data-items-sm="1">
					@foreach ($related as $blog)
						<!-- Slider item -->
						<div class="card bg-transparent">
							<div class="row g-0">
								<!-- Image -->
								<div class="col-md-4">
									<img src="{{asset('storage/'.$blog->image)}}" class="img-fluid rounded-start" alt="...">
								</div>
								<!-- Card body -->
								<div class="col-md-8">
									<div class="card-body">
										<!-- Title -->
										<h6 class="card-title fw-normal"><a href="{{route('blog_detail', ['id'=>$blog->id])}}">{{$blog->title}}</a></h6>
										@if(app()->getLocale() == 'fa')
										<span class="small">{{ \Morilog\Jalali\Jalalian::forge($blog->updated_at)->format("%d %B %Y") }}</span>
										@else
										<span class="small">{{ $blog->updated_at->format("Y M d") }}</span>
										@endif
									</div>
								</div>
							</div>
						</div>
					@endforeach

				</div>
			</div>
			<!-- Slider END -->
		</div>
	</section>
	<!-- =======================
	Related blog END -->
	
	</main>
	<!-- **************** MAIN CONTENT END **************** -->
	
@endsection