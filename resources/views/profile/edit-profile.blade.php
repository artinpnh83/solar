@extends('main.header.header')
@section('content')
<main>
	
<!-- =======================
Page Banner START -->
<section class="pt-0">
	<!-- Main banner background image -->
	
	<div class="container mt-n4">
		<div class="row">
			<!-- Profile banner START -->
			<div class="col-12">
				<div class="card bg-transparent card-body p-0">
					<div class="row d-flex justify-content-between">
						
						<!-- Profile info -->
						<div class="col d-md-flex justify-content-between align-items-center mt-4">
							<div>
								<h1 class="my-1 fs-5 mt-5">{{ $user->name }}</h1>
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- Profile banner END -->

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
						<h5 class="offcanvas-title" id="offcanvasNavbarLabel">{{ __('messages.edit_profile') }}</h5>
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
				<!-- Edit profile START -->
				<div class="card bg-transparent border rounded-3">
					<!-- Card header -->
					<div class="card-header bg-transparent border-bottom">
						<h3 class="card-header-title mb-0 ff-vb fs-5">{{ __('messages.edit_profile') }}</h3>
					</div>
					<!-- Card body START -->
					<div class="card-body">
						<!-- Form -->
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
						<form class="row g-4" action="{{route('update-profile')}}" method="post">
                        @csrf
							<!-- Full name -->
							<div class="col-12">
								<label class="form-label">{{ __('messages.name') }}</label>
								<div class="input-group">
									<input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="{{ __('messages.name') }}">
								</div>
								@if($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
							</div>
						
							<!-- Email id -->
							<div class="col-md-12">
								<label class="form-label">{{ __('messages.emailAddress') }}</label>
								<input class="form-control" type="email" readonly value="{{$user->email}}"  placeholder="{{ __('messages.emailAddress') }}">
							</div>

							<!-- Phone number -->
							<div class="col-md-12">
								<label class="form-label">{{ __('messages.phone') }}</label>
								<input type="tel" minlength="11" maxlength="11" name="phone" class="form-control" value="{{$user->phone}}" placeholder="{{ __('messages.phone') }}">
								@if($errors->has('phone'))
                                    <span class="text-danger">{{$errors->first('phone')}}</span>
                                @endif
							</div>
							<!-- Save button -->
							<div class="d-sm-flex justify-content-end">
								<button type="submit" class="btn btn-primary mb-0">{{ __('messages.save') }}</button>
							</div>
						</form>
					</div>
					<!-- Card body END -->
				</div>
				<!-- Edit profile END -->
				
			</div>
			<!-- Main content END -->
		</div><!-- Row END -->
	</div>
</section>
<!-- =======================
Page content END -->

</main>
@endsection