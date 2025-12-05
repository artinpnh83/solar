@extends('main.header.header')
@section('content')
<main>
	
<!-- =======================
Page Banner START -->
<section class="pt-0">

	<div class="container mt-n4">
		<div class="row">
			<div class="col-12">
				<div class="card bg-transparent card-body pb-0 px-0 mt-2 mt-sm-0">
					<div class="row d-sm-flex justify-sm-content-between mt-2 mt-md-0">
						
						<!-- Profile info -->
						<div class="col d-sm-flex justify-content-between align-items-center">
							<div>
								<h1 class="my-1 fs-4 mt-5">{{ $user->name }}</h1>
							</div>
						</div>
					</div>
				</div>

				<!-- Advanced filter responsive toggler START -->
				<!-- Divider -->
				<hr class="d-xl-none">
				<div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
					<a class="h6 mb-0 fw-bold d-xl-none" href="#">{{ __('messages.menu') }}</a>
					<button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
						<i class="fas fa-sliders-h"></i>
					</button>
				</div>
				<!-- Advanced filter responsive toggler END -->
			</div>
		</div>
	</div>
</section>
<!-- =======================
Page Banner END -->

<!-- =======================
Page content START -->
<section class="pt-0">
	<div class="container">
		<div class="row">

			<!-- Left sidebar START -->
			<div class="col-xl-3">
				<!-- Responsive offcanvas body START -->
				<div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar">
					<!-- Offcanvas header -->
					<div class="offcanvas-header bg-light">
						<h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
						<button  type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
					</div>
					<!-- Offcanvas body -->
					@include('main.header.sidebar')
					
				</div>
				<!-- Responsive offcanvas body END -->
			</div>
			<!-- Left sidebar END -->

			<!-- Main content START -->
			<div class="col-xl-9">

				<div class="card bg-transparent border rounded-3">
					<!-- Card header START -->
					<div class="card-header bg-transparent border-bottom">
						<h3 class="mb-0 fs-5 ff-vb">{{ __('messages.Register_an_inquiry_form') }}</h3>
					</div>
					<!-- Card header END -->

					<!-- Card body START -->
					<div class="card-body">

								<div class="row">
									<!-- Upload image START -->
									<div class="col-12 col-lg-12">
									<h5 class="mb-2">{{ __('messages.download_message') }}</h5>
									
									@foreach($contacts_main as $c)
									@if($c['type']=='email')
                        				<p class="mb-2">
                        					{{$c->title}}: 
                        					<a href="{{$c->link}}"><span class="h6 fw-light ms-2">{{$c->name}}</span></a>
                        				</p>
                        			@endif	
                                    @endforeach
									<div class="d-sm-flex justify-content-start mt-2">
									<a href="/storage/inquiry/SurinShineEnergyDataSheet.pdf" download class="btn btn-sm btn-success-soft mb-3">{{ __('messages.download_form') }}</a>
									</div>
									</div>
								  
									<!-- Upload image END -->
										<div class="position-relative">
											<!-- Image -->
											<img src="/storage/inquiry/SurinShineEnergyDataSheet-1.webp" class="rounded-4" alt="">
											
										</div>
										<div class="position-relative">
											<!-- Image -->
											<img src="/storage/inquiry/SealbanDataSheet-2.webp" class="rounded-4" alt="">
											
										</div>
								</div>


					</div>
					<!-- Card body START -->
				</div>
			<!-- Main content END -->
			</div><!-- Row END -->
		</div>
	</div>	
</section>
<!-- =======================
Page content END -->

</main>
@endsection