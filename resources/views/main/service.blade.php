@extends('main.header.header')
@section('content')
{!!html_entity_decode($service->meta)!!}
<!-- **************** MAIN CONTENT START **************** -->
<style>
    p{
        text-align: justify;
    }
</style>
<main>
	
<!-- =======================
Main Content START -->
<section class="pb-0 pt-4 pb-md-5">
	<div class="container">
		<div class="row">
			<div class="col-12">

				<!-- Title and Info START -->
				<div class="row">
					<!-- Avatar and Share -->
					

					<!-- Content -->
					<div class="col-lg-9 order-1">
						<!-- Pre title -->
						@if(app()->getLocale() == 'fa')
						<span>{{ \Morilog\Jalali\Jalalian::forge($service->updated_at)->format("%d %B %Y") }}</span><span class="mx-2">|</span>
						@else
						<span>{{ $service->updated_at->format("Y M d") }}</span><span class="mx-2">|</span>
						@endif
						{{-- <div class="badge text-bg-success">{{$service->category->name}}</div> --}}
						<!-- Title -->
						<h1 class="mt-2 mb-0 fs-4">{{$service->title}}</h1>
					</div>
				</div>
				<!-- Title and Info END -->

				<!-- Video START -->
				<div class="row mt-4">
					<div class="col-xl-10 mx-auto">
					
						<div class="col-lg-12 order-1">
							<img style="width: 100%; border-radius: 20px;" src="{{asset('storage/'.$service->image)}}" alt="">
						</div>
					
						<!-- Card item END -->
					</div>
				</div>
				<!-- Video END -->

				<!-- Quote and content START -->
				<div class="row mt-4">
					<!-- Content -->
					<div class="col-12 mt-4 mt-lg-0">
						<p class="mb-0">{!! $service->des !!}</p>
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