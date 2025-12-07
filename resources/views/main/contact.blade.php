@extends('main.header.header')
@section('content')
<!-- **************** MAIN CONTENT START **************** -->
<main>
	
<!-- =======================
Page Banner START -->
<section class="pt-5 pb-0" style="background-image:url(assets/images/element/map.svg); background-position: center left; background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-xl-6 text-center mx-auto">
				<!-- Title -->
				<h6 class="text-primary">{{ __('messages.contact') }}</h6>
				<h1 class="mb-4 fs-4">{{ __('messages.contactHeading1') }}</h1>
			</div>
		</div>
		
		<!-- Contact info box -->
		<div class="row g-4 g-md-5 mt-0 mt-lg-3">
			<!-- Box item -->

            @if(count($contactaddress))
			<div class="col-lg-4 mt-lg-0">
				<div class="card card-body bg-primary shadow py-5 text-center h-100">
					<!-- Title -->
					<h5 class="text-white mb-3 fw-normal">{{ __('messages.address') }}</h5>
					<ul class="list-inline mb-0">
						<!-- Address -->
						@foreach($contactaddress as $cntctaddress)
						<li class="list-item mb-3">
							<a class="text-white"> <i class="fas fa-fw fa-map-marker-alt me-2 mt-1"></i>{{$cntctaddress->name}}</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
            @endif
			<!-- Box item -->
            @if(count($contactphone))
			<div class="col-lg-4 mt-lg-0">
				<div class="card card-body shadow py-5 text-center h-100">
					<!-- Title -->
					<h5 class="mb-3 fw-normal">{{ __('messages.contactInformation') }}</h5>
					<ul class="list-inline mb-0">
						<!-- Address -->
						@foreach($contactphone as $cntctphone)
						<li class="list-item mb-3 h6 fw-light">
							<a href="{{$cntctphone->link}}"> <i class="fas fa-fw fa-phone-alt me-2 mt-1"></i>{{$cntctphone->name}}</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
            @endif
			<!-- Box item -->
            @if(count($contactemail))
			<div class="col-lg-4 mt-lg-0">
				<div class="card card-body shadow py-5 text-center h-100">
					<!-- Title -->
					<h5 class="mb-3 fw-normal">{{ __('messages.emailAddress') }}</h5>
					<ul class="list-inline mb-0">
						
						<!-- Phone number -->
						@foreach($contactemail as $cntctemail)
						<li class="list-item mb-3 h6 fw-light">
							<a href="{{$cntctemail->link}}"> <i class="fas fa-fw fa-envelope me-2"></i>{{$cntctemail->name}}</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
            @endif
		</div>
	</div>
</section>
<!-- =======================
Page Banner END -->

<!-- =======================
Image and contact form START -->
<section >
	<div class="container">
		<div class="row g-4 g-lg-0 align-items-center">

			<div class="col-md-6 align-items-center text-center">
				<!-- Image -->
				<img src="assets/images/element/contact.svg" class="h-400px" alt="">

			</div>

			<!-- Contact form START -->
			<div class="col-md-6">
				<!-- Title -->
				<h2 class="mt-4 mt-md-0 fs-4">{{ __('messages.Stayintouchwithus') }}</h2>
			    @if (\Session::has('success'))
                    <p class="mt-3 alert alert-success"
                    style="color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6;padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;"
                    >{!! \Session::get('success') !!}</p>
                @endif
				<form action="/contact-submit" method="post">
				    @csrf
					<!-- Name -->
					<div class="mb-4 bg-light-input">
						<label for="yourName" class="form-label">{{ __('messages.name') }} *</label>
						<input type="text" name="name" value="{{old('name')}}" maxlength="50" class="form-control form-control-lg">
						 @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
					</div>
					
					<div class="mb-4 bg-light-input">
						<label for="yourName" class="form-label">{{ __('messages.phone') }} *</label>
						<input type="tel" name="phone" value="{{old('phone')}}" minlength="11" maxlength="11" class="form-control form-control-lg">
					@if($errors->has('phone'))
                            <span class="text-danger">{{$errors->first('phone')}}</span>
                        @endif
					</div>
					
					<!-- Email -->
					<div class="mb-4 bg-light-input">
						<label for="emailInput" class="form-label">{{ __('messages.emailAddress') }} *</label>
						<input type="email" name="email" value="{{old('email')}}" maxlength="50" class="form-control form-control-lg">
						@if($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
					</div>
					
					<div class="mb-4 bg-light-input">
						<label for="yourName" class="form-label">{{ __('messages.subject') }} *</label>
						<input type="text" name="title" value="{{old('title')}}" maxlength="50" class="form-control form-control-lg">
					    @if($errors->has('title'))
                            <span class="text-danger">{{$errors->first('title')}}</span>
                        @endif
					</div>
					<!-- Message -->
					<div class="mb-4 bg-light-input">
						<label for="textareaBox" class="form-label">{{ __('messages.messageText') }} *</label>
						<textarea name="message" rows="5" maxlength="500" class="form-control" rows="4"></textarea>
					    @if($errors->has('message'))
                            <span class="text-danger">{{$errors->first('message')}}</span>
                        @endif
					</div>
					<!-- Button -->
					<div class="d-grid">
						<button class="btn btn-lg btn-primary mb-0" type="submit">{{ __('messages.send') }}</button>
					</div>	
				</form>
			</div>
			<!-- Contact form END -->
		</div>
	</div>
</section>
<!-- =======================
Image and contact form END -->

<!-- =======================
Map START -->
<section class="pt-0">
	<div class="container">
		<div class="row">
			<div class="col-12">
			    <iframe class="w-100 h-400px grayscale rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d202.5497278508425!2d51.164637468053435!3d35.68203350000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8df14cf0336961%3A0x84fd5423c57e8ab5!2z2LTYsdqp2Kog2KfbjNix2KfZhiDZvtqY2YjZh9i0!5e0!3m2!1sen!2sde!4v1734453358146!5m2!1sen!2sde" width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>	
			</div>
		</div>
	</div>
</section>
<!-- =======================
Map END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->
@endsection