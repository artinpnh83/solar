@extends('main.header.header')
@section('content')
{!!html_entity_decode($blog->meta)!!}
<!-- **************** MAIN CONTENT START **************** -->
<main>
	
	<!-- =======================
	Main Content START -->
	<section class="pb-0 pt-4 pb-md-5">
		<div class="container">
		    <div class="row">
			<div class="col-12">
				<div class="p-4 text-center rounded-3">
				
					<div class="d-flex">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb breadcrumb-dots mb-0">
								<li class="breadcrumb-item"><a href="/">{{ __('messages.home') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page">{{ __('messages.industries') }}</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-12">
					<!-- Title and Info START -->
					<div class="row">
						<!-- Content -->
						<div class="col-lg-12 order-1">
							<img style="width: 100%; border-radius: 20px;" src="{{asset('storage/'.$blog->image)}}" alt="">
						</div>
						
					</div>
					<!-- Title and Info END -->
	
					<!-- Quote and content START -->
					<div class="row mt-4">
						<h2>
							{{$blog->title}}
						</h2>
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
	
	</main>
	<!-- **************** MAIN CONTENT END **************** -->
	
@endsection