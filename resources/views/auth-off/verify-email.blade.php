@extends('main.header.header')
@section('content')
<main style="min-height: 70vh; height: 70vh;">
	<section class="p-0 d-flex align-items-center position-relative overflow-hidden">
	
		<div class="container-fluid">
			<div class="row">

				<div class="col-12 col-lg-6 m-auto">
					<div class="row my-5">
						<div class="col-sm-10 col-xl-8 m-auto">
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
							<!-- Title -->
							<h2 class="">{{ __('messages.verify_email') }}</h2>
						
							<!-- Form START -->
							<form action="{{route('user.register.code')}}" method="post">
							    @csrf
								<!-- Email -->
								<div class="mb-4">
									<label for="exampleInputEmail1" class="form-label">{{ __('messages.code') }} *</label>
									<div class="input-group input-group-lg">
										<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"></span>
										<input type="code" name="code" maxlength="6" minlength="6" class="form-control border-0 bg-light rounded-end ps-1" value="{{old('code')}}" >
									</div>
									@if($errors->has('code'))
                                        <span class="text-danger">{{$errors->first('code')}}</span>
                                    @endif
								</div>
								<!-- Button -->
								<div class="align-items-center mt-0">
									<div class="d-grid">
										<button class="btn btn-primary mb-0" type="submit">{{ __('messages.save') }}</button>
									</div>
								</div>
							</form>
							<!-- Form END -->

							<!-- Sign up link -->
							<div class="mt-4 text-center">
								<span>{{ __('messages.not_registered') }}<a href="/register"> {{ __('messages.Signup_here') }}</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
@endsection