@extends('main.header.header')
@section('content')
<!-- **************** MAIN CONTENT START **************** -->
<style>
    p{
        text-align: justify;
    }
</style>
<main>
	


<section class="position-relative">
	<div class="container">
		<div class="row g-4 align-items-center justify-content-between">
			<!-- Content -->
			<div class="col-md-12 col-xl-12">
				<h2 class="fs-3" style="text-align:center;">
				    {{ __('messages.about') }}
				</h2>
				<p style="text-align:justify;text-align-last:center">
				    {{ __('messages.aboutDescription') }}
				</p>
			</div>

			<!-- Course video START -->
			<div class="col-md-12 col-xl-12">
				<div class="row">
					<!-- Slider START -->
					<!--<div class="tiny-slider arrow-round arrow-blur">-->
					<!--	<div class="tiny-slider-inner" data-autoplay="false" data-edge="2" data-arrow="true" data-dots="false" data-items-lg="1" data-items-xl="2">-->
						
					<!--		<div>-->
					<!--			<div class="card p-2">-->
					<!--				<div class="position-relative">-->
					<!--					<img src="/storage/about/1.jpg" class="card-img" alt="Card image" style="border-radius:0px">-->
					<!--				</div>-->

					<!--			</div>-->
					<!--		</div>	-->
					<!--		<div>-->
					<!--			<div class="card p-2">-->
					<!--				<div class="position-relative">-->
					<!--					<img src="/storage/about/2.jpg" class="card-img" alt="Card image" style="border-radius:0px">-->
										
					<!--				</div>-->

								
					<!--			</div>-->
					<!--		</div>	-->
					<!--		<div>-->
					<!--			<div class="card p-2">-->
					<!--				<div class="position-relative">-->
					<!--					<img src="/storage/about/3.jpg" class="card-img" alt="Card image" style="border-radius:0px">-->
										
					<!--				</div>-->

					<!--			</div>-->
					<!--		</div>	-->
					<!--		<div>-->
					<!--			<div class="card p-2">-->
					<!--				<div class="position-relative">-->
										<!-- Image -->
					<!--					<img src="/storage/about/4.jpg" class="card-img" alt="Card image" style="border-radius:0px">-->
										
					<!--				</div>-->

					<!--			</div>-->
					<!--		</div>	-->
						
					<!--	</div>-->
					<!--</div>		-->
					<img src="{{asset('assets/images/about/PIC.jpg')}}" />
					<!-- Slider END -->
				</div>
			</div>
			<!-- Course video END -->
		</div>
	</div>
</section>

<section class="pt-0 pt-md-5">
	<div class="container">
		<!-- Title -->
		<div class="row mb-4">
			<div class="col-lg-12">
				<h2 style="text-align:center">{{ __('messages.IntroducingTheCEO') }}</h2>
				<p style="text-align:center" class="mb-0">{{ __('messages.IntroducingTheCEOp') }}</p>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-5 position-relative">

				<!-- Image -->
				<img src="/storage/{{ $about->image ?? 'about/BLANK.jpg' }}" class="rounded" alt="" style="height:auto">
			</div>

			<div class="col-lg-7 mt-4 mt-lg-0">
				<!-- Title -->
				<h1>{!! $about->title ?? '' !!}</h1>

				<p>{!! $about->des ?? '' !!}</p>
				<!-- Progress bar START -->
			
				<!-- Progress bar END -->
			</div>	
		</div>
	</div>
</section>


<section>
    <img src="/storage/catalog/cataloge.png" />
</section>

<!--<section class="position-relative overflow-hidden">-->

<!--	<div class="container position-relative">-->
		<!-- Title -->
<!--		<div class="row mb-4">-->
<!--			<div class="col-12">-->
<!--				<h2 class="fs-3 fw-bold">-->
<!--					<span class="position-relative z-index-9">-->
<!--					    {{ __('messages.CorporateValues') }}-->
<!--					</span>-->
<!--				</h2>-->
<!--			</div>-->
<!--		</div>-->
	 
		<!-- Outer tabs START -->
<!--		<ul class="nav nav-tabs nav-tabs-line mb-3" id="course-pills-tab" role="tablist">-->
			<!-- Tab item -->
<!--			<li class="nav-item me-2 me-sm-5" role="presentation">-->
<!--				<a class="nav-link active" id="course-pills-tab-1" data-bs-toggle="pill" data-bs-target="#course-pills-tab1" type="button" role="tab" aria-controls="course-pills-tab1" aria-selected="true">-->
<!--				{{ __('messages.responsibility') }}-->
<!--				</a>-->
<!--			</li>-->
			<!-- Tab item -->
<!--			<li class="nav-item me-2 me-sm-5" role="presentation">-->
<!--				<a class="nav-link" id="course-pills-tab-2" data-bs-toggle="pill" data-bs-target="#course-pills-tab2" type="button" role="tab" aria-controls="course-pills-tab2" aria-selected="false">-->
<!--				    {{ __('messages.Ethics') }}-->
<!--				</a>-->
<!--			</li>-->
			<!-- Tab item -->
<!--			<li class="nav-item me-2 me-sm-5" role="presentation">-->
<!--				<a class="nav-link" id="course-pills-tab-3" data-bs-toggle="pill" data-bs-target="#course-pills-tab3" type="button" role="tab" aria-controls="course-pills-tab3" aria-selected="false">-->
<!--				    {{ __('messages.teamWork') }}-->
<!--				</a>-->
<!--			</li>-->
			<!-- Tab item -->
<!--			<li class="nav-item me-2 me-sm-5" role="presentation">-->
<!--				<a class="nav-link" id="course-pills-tab-4" data-bs-toggle="pill" data-bs-target="#course-pills-tab4" type="button" role="tab" aria-controls="course-pills-tab4" aria-selected="false">-->
<!--				    {{ __('messages.PASSION') }}-->
<!--				</a>-->
<!--			</li>-->
			<!-- Tab item -->
<!--			<li class="nav-item me-2 me-sm-5" role="presentation">-->
<!--				<a class="nav-link" id="course-pills-tab-5" data-bs-toggle="pill" data-bs-target="#course-pills-tab5" type="button" role="tab" aria-controls="course-pills-tab5" aria-selected="false">-->
<!--				{{ __('messages.DIVERSITY') }}-->
<!--				</a>-->
<!--			</li>-->
<!--		</ul> -->
<!--		<div class="tab-content mb-0" id="course-pills-tabContent">-->
<!--			<div class="tab-pane fade show active" id="course-pills-tab1" role="tabpanel" aria-labelledby="course-pills-tab-1">-->
<!--				<div class="row">-->
<!--					<div class="col-12">-->
<!--						<div class="row justify-content-between">-->
<!--							<div class="col-lg-12">-->
<!--								<h5>{{ __('messages.responsibility') }}</h5>-->
<!--								<p class="mb-3">{{ __('messages.about1') }}</p>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div> -->
<!--			</div>-->
<!--			<div class="tab-pane fade" id="course-pills-tab2" role="tabpanel" aria-labelledby="course-pills-tab-2">-->
<!--				<div class="row">-->
<!--					<div class="col-12">-->
<!--						<div class="row justify-content-between">-->
<!--							<div class="col-lg-12">-->
<!--								<h5>{{ __('messages.Ethics') }}</h5>-->
<!--								<p class="mb-3">-->
<!--								    {{ __('messages.about2') }}-->
<!--								    </p>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div> -->
<!--			</div>-->

<!--			<div class="tab-pane fade" id="course-pills-tab3" role="tabpanel" aria-labelledby="course-pills-tab-3">-->
<!--				<div class="row">-->
<!--					<div class="col-12">-->
<!--						<div class="row justify-content-between">-->
<!--							<div class="col-lg-12">-->
<!--								<h5>{{ __('messages.teamWork') }}</h5>-->
<!--								<p class="mb-3">-->
<!--								{{ __('messages.about3') }}-->
<!--								</p>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div> -->
<!--			</div>-->

<!--			<div class="tab-pane fade" id="course-pills-tab4" role="tabpanel" aria-labelledby="course-pills-tab-4">-->
<!--				<div class="row">-->
<!--					<div class="col-12">-->
<!--						<div class="row justify-content-between">-->
<!--							<div class="col-lg-12">-->
<!--								<h5>{{ __('messages.PASSION') }}</h5>-->
<!--								<p class="mb-3">-->
<!--								    {{ __('messages.about4') }}-->
<!--								</p>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div> -->
<!--			</div>-->

<!--			<div class="tab-pane fade" id="course-pills-tab5" role="tabpanel" aria-labelledby="course-pills-tab-5">-->
<!--				<div class="row">-->
<!--					<div class="col-12">-->
<!--						<div class="row justify-content-between">-->
<!--							<div class="col-lg-12">-->
<!--								<h5>{{ __('messages.DIVERSITY') }}</h5>-->
<!--								<p class="mb-3">-->
<!--								    {{ __('messages.about5') }}-->
<!--								</p>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div> -->
<!--			</div>-->
<!--		</div>-->
		
<!--	</div>-->
	
<!--</section>-->


<!--<section class="pb-0 pb-md-5">-->
<!--	<div class="container">-->
		<!-- Title -->
<!--		<div class="row mb-4">-->
<!--			<h2 class="mb-0">{{ __('messages.Exhebitions') }}</h2>-->
<!--		</div>-->
<!--		<div class="row">-->
<!--			<div class="tiny-slider arrow-round arrow-creative arrow-blur arrow-hover">-->
<!--				<div class="tiny-slider-inner" data-autoplay="false" data-arrow="true" data-dots="false" data-items-xl="3" data-items-md="2" data-items-xs="1">-->
					
<!--					<div class="card bg-transparent">-->
<!--						<div class="position-relative">-->
<!--							<img src="/storage/exhebitions/1.jpg" class="card-img" alt="course image" style="height: 331px;object-fit:cover;border-radius: 0px;">-->
<!--							<div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
<!--								<div class="w-100 mt-auto">-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="card bg-transparent">-->
<!--						<div class="position-relative">-->
<!--							<img src="/storage/exhebitions/2.jpg" class="card-img" alt="course image" style="height: 331px;object-fit:cover;border-radius: 0px;">-->
<!--							<div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
<!--								<div class="w-100 mt-auto">-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="card bg-transparent">-->
<!--						<div class="position-relative">-->
<!--							<img src="/storage/exhebitions/3.jpg" class="card-img" alt="course image" style="height: 331px;object-fit:cover;border-radius: 0px;">-->
<!--							<div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
<!--								<div class="w-100 mt-auto">-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
					
<!--					<div class="card bg-transparent">-->
<!--						<div class="position-relative">-->
<!--							<img src="/storage/exhebitions/4.jpg" class="card-img" alt="course image" style="height: 331px;object-fit:cover;border-radius: 0px;">-->
<!--							<div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
<!--								<div class="w-100 mt-auto">-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
					
<!--					<div class="card bg-transparent">-->
<!--						<div class="position-relative">-->
<!--							<img src="/storage/exhebitions/5.jpg" class="card-img" alt="course image" style="height: 331px;object-fit:cover;border-radius: 0px;">-->
<!--							<div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
<!--								<div class="w-100 mt-auto">-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="card bg-transparent">-->
<!--						<div class="position-relative">-->
<!--							<img src="/storage/exhebitions/hhh.jpg" class="card-img" alt="course image" style="height: 331px;object-fit:cover;border-radius: 0px;">-->
<!--							<div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
<!--								<div class="w-100 mt-auto">-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="card bg-transparent">-->
<!--						<div class="position-relative">-->
<!--							<img src="/storage/exhebitions/7.jpg" class="card-img" alt="course image" style="height: 331px;object-fit:cover;border-radius: 0px;">-->
<!--						</div>-->
<!--					</div>-->
					

<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</section>-->








</main>

@endsection