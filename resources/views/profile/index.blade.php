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
						<h3 class="mb-0 fs-5 ff-vb">{{ __('messages.dashboard') }}</h3>
					</div>
					<!-- Card header END -->

					<!-- Card body START -->
					<div class="card-body">
                        @if (\Session::has('error'))
                            <p class="mt-3 alert alert-success"
                                style="color: darkred;background-color: #dc444433;border-color: darkred;padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;"
                                >{!! \Session::get('error') !!}
                            </p>
                        @endif
                        
                        @if (\Session::has('success'))
                            <p class="mt-3 alert alert-success" style="color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6;padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;">
                                {!! \Session::get('success') !!}
                            </p>
                        @endif
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
									<a href="/storage/inquiry/SealbanDataSheet.pdf" download class="btn btn-sm btn-success-soft mb-3">{{ __('messages.download_form') }}</a>
									</div>
									</div>
								  
									<!-- Upload image END -->
									<div class="col-12 col-lg-6">
										<div class="position-relative">
											<!-- Image -->
											<img src="/storage/inquiry/SealbanDataSheet-1.webp" class="rounded-4" alt="">
										</div>
									</div>	
									<div class="col-12 col-lg-6">
										<div class="position-relative">
											<!-- Image -->
											<img src="/storage/inquiry/SealbanDataSheet-2.webp" class="rounded-4" alt="">
										</div>
									</div>		
						</div>
                       
						<!-- Course list table START -->
						<div class="row g-4 mt-3">
						    <h3 class="mb-0 fs-5 ff-vb">{{ __('messages.favorite_list') }}</h3>
						 @if(count($wishlists))
						    @foreach($wishlists as $wishlist)
    						    @if($wishlist->product)
                        			<!-- Card item START -->
                        			<div class="col-sm-6 col-lg-4 col-xl-4">
                        				<div class="card shadow">
                        					<!-- Image -->
                        					<img src="/storage/{{$wishlist->product->image}}" style="height: 230px;" class="card-img-top" alt="course image">
                        					<div class="card-body pb-0">
                        						<!-- Badge and favorite -->
                        						<div class="d-flex justify-content-between mb-2">
                        							<a href="{{ route('product', ['id' => $wishlist->id]) }}" class="badge bg-success bg-opacity-10 text-success">{{$wishlist->product->category->name ?? ''}}</a>
                        						</div>
                        						<!-- Title -->
                        						<h5 class="card-title fw-normal"><a href="{{ route('product', ['id' => $wishlist->id]) }}">{{$wishlist->product->name}}</a></h5>
                        						<a href="/profile/delete-wishlist/{{$wishlist->id}}" class="text-danger"><i class="fas fa-trash"></i></a>
                        					</div>
                        				</div>
                        			</div>
                        			<!-- Card item END -->
                    			@endif
                            @endforeach
                        @else
                            <p>{{ __('messages.no_item') }}</p>
                        @endif
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