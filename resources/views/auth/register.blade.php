@extends('main.header.header')
@section('content')
<main>
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
                
                
							<h2 class="">{{ __('messages.Signup') }}</h2>
							<!-- Form START -->
							<form action="{{route('user.register.submit')}}" method="post">
							    @csrf
							    <div class="mb-4">
									<label class="form-label">{{ __('messages.name') }}</label>
									<div class="input-group input-group-lg">
										<input type="text" name="name" maxlength="50" required value="{{old('name')}}" class="form-control border-0 bg-light rounded-end ps-1">
									</div>
										@if($errors->has('name'))
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        @endif
								</div>
								<div class="mb-4">
									<label class="form-label">{{ __('messages.phone') }}</label>
									<div class="input-group input-group-lg">
										<input type="tel" name="phone" minlength="11" required maxlength="11" value="{{old('phone')}}" class="form-control border-0 bg-light rounded-end ps-1" placeholder="09000000000">
									</div>
										@if($errors->has('phone'))
                                            <span class="text-danger">{{$errors->first('phone')}}</span>
                                        @endif
								</div>
								<!-- Email -->
								<div class="mb-4">
									<label for="exampleInputEmail1" class="form-label">{{ __('messages.emailAddress') }}</label>
									<div class="input-group input-group-lg">
										<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
										<input type="email" name="email" maxlength="50" required value="{{old('email')}}" class="form-control border-0 bg-light rounded-end ps-1" placeholder="***@gmail.com" id="exampleInputEmail1">
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
										<input type="password" name="password" minlength="8" required maxlength="16" value="{{old('password')}}" class="form-control border-0 bg-light rounded-end ps-1" placeholder="*********" id="inputPassword5">
									</div>
										@if($errors->has('password'))
                                            <span class="text-danger">{{$errors->first('password')}}</span>
                                        @endif
								</div>
								<!-- Check box -->
								<div class="mb-4">
									<div class="form-check">
										<input type="checkbox" name="term" class="form-check-input" required id="checkbox-1">
										<label class="form-check-label" for="checkbox-1">{{ __('messages.by_registering') }} <a href="/term">{{ __('messages.terms_conditions') }}</a>{{ __('messages.of_site') }}</label>
									</div>
								@if($errors->has('term'))
                                            <span class="text-danger">{{$errors->first('term')}}</span>
                                        @endif
								</div>
								<!-- Button -->
								<div class="align-items-center mt-0">
									<div class="d-grid">
										<button class="btn btn-primary mb-0" type="submit">{{ __('messages.Signup_here') }}</button>
									</div>
								</div>
							</form>
							<!-- Form END -->
							<!-- Sign up link -->
							<div class="mt-4 text-center">
								<span>{{ __('messages.Already_have_account') }}<a href="/login"> {{ __('messages.login') }}</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
@endsection