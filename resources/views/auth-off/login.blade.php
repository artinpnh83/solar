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
							<h2 class="">{{ __('messages.login') }}</h2>
						
							<!-- Form START -->
							<form action="{{route('user.login.submit')}}" method="post">
							    @csrf
								<!-- Email -->
								<div class="mb-4">
									<label for="exampleInputEmail1" class="form-label">{{ __('messages.email') }} *</label>
									<div class="input-group input-group-lg">
										<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
										<input type="email" name="email" maxlength="50" class="form-control border-0 bg-light rounded-end ps-1" value="{{old('email')}}" placeholder="***@gmail.com" id="exampleInputEmail1">
									</div>
									@if($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
								</div>
								<!-- Password -->
								<div class="mb-4">
									<label for="inputPassword5" class="form-label">{{ __('messages.password') }} *</label>
									<div class="input-group input-group-lg">
										<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
										<input type="password" name="password" minlength="8" maxlength="16" class="form-control border-0 bg-light rounded-end ps-1" value="{{old('password')}}" placeholder="*********" id="inputPassword5">
									</div>
									@if($errors->has('password'))
                                        <span class="text-danger">{{$errors->first('password')}}</span>
                                    @endif
								</div>
								<!-- Button -->
								<div class="align-items-center mt-0">
									<div class="d-grid">
										<button class="btn btn-primary mb-0" type="submit">{{ __('messages.login') }}</button>
									</div>
								</div>
							</form>
							<!-- Form END -->

							<!-- Sign up link -->
							<div class="mt-4 text-center">
								<span>{{ __('messages.forgotpasswordquestion') }}<a href="/forget"> {{ __('messages.forgotpassword') }}</a></span><br>
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