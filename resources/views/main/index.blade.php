@extends('main.header.header')
@section('content')
    <!-- **************** MAIN CONTENT START **************** -->
    <style>
        p {
            text-align: justify;
        }
    </style>
    <main>

        <!-- =======================
    Main Banner START -->
        <section class="position-relative overflow-hidden pt-0 pt-lg-0" style="padding:0">
            <!-- SVG START -->
            <!-- SVG END -->



            <!-- Content START -->
            <div style="display: flex;justify-content: center;">
                <!-- Title -->
                <div class="row align-items-center g-5">
                    <!-- Left content START -->
                    <div class="col-lg-5 col-xl-4 position-relative z-index-1 text-center text-lg-start mb-5 mb-sm-0" style="display: flex;flex-direction: column;align-items: center;">
                        <!-- SVG -->

                        <!--<h1 class="mb-0 display-6">{{ __('messages.secOneH1') }}<br>{{ __('messages.sealban') }}-->
                        <!--<img src="/storage/home/logo-text.png" style="width: 40%;" />-->
                        <!--</h1>-->
                        
                        @if(app()->getLocale() == 'fa')
        				    <img src="/assets/images/logo-type.webp" style="width: 40%;">
        				@else
        				    <img src="/assets/images/logo-type-en.webp" style="width: 40%;">
        				@endif

                        <!-- Content -->
                        <!--<p class="my-4">{{ __('messages.secOnep') }}</p>-->

                        <!-- Info -->
                        <!--<ul class="list-inline position-relative justify-content-center justify-content-lg-start my-4">-->
                        <!--    <li class="list-inline-item me-2"> <i-->
                        <!--            class="bi bi-patch-check-fill h6 me-1"></i>{{ __('messages.secOneli1') }}</li>-->
                        <!--    <li class="list-inline-item me-2"> <i-->
                        <!--            class="bi bi-patch-check-fill h6 me-1"></i>{{ __('messages.secOneli2') }}</li>-->
                        <!--    <li class="list-inline-item"> <i-->
                        <!--            class="bi bi-patch-check-fill h6 me-1"></i>{{ __('messages.secOneli3') }}</li>-->
                        <!--</ul>-->

                    </div>
                    <!-- Left content END -->

                    <!-- Right content START -->
                    <div class="col-lg-7 col-xl-8 text-center position-relative">
                        <!-- Image -->
                        <div class="position-relative">
                           
                           <div id="tin" class="tiny-slider arrow-round arrow-blur arrow-hover">
                            <div class="tiny-slider-inner pb-1" data-autoplay="true" data-arrow="false" data-speed="1000" data-mode="gallery" data-autoplaytime="5000" data-edge="2" data-dots="false" data-items="1" data-items-lg="1" data-items-sm="1" speed="500">
                               <img src="assets/banner/1.png" class="img-sliders" />
                               <img src="assets/banner/2.png" class="img-sliders" />
                               <img src="assets/banner/3.png" class="img-sliders" />
                               <img src="assets/banner/4.png" class="img-sliders" />
                               <img src="assets/banner/5.png" class="img-sliders" />
                               <!-- <img src="assets/banner/6.png" class="img-sliders" />
                               <img src="assets/banner/7.png" class="img-sliders" />
                               <img src="assets/banner/8.png" class="img-sliders" />
                               <img src="assets/banner/9.png" class="img-sliders" />
                               <img src="assets/banner/10.png" class="img-sliders" /> -->
                            </div>
                        </div>
                           
                        </div>
                    </div>
                    
                    
             
                    <!-- Right content END -->
                </div>
                <style>
                    .h-box {
                        width: 30%;
                        margin-top: 0px !important;
                    }

                    @media only screen and (max-width: 960px) {
                        .h-box {
                            width: 100%;
                            margin-top: 10px !important;
                        }
                    }
                </style>
                <div class="container first-items" style="position: absolute;z-index: 999999;bottom: 0;margin: auto;width: 100vw;">
                    <div class="row align-items-center g-5 mt-5 mb-3" style="justify-content: space-between;">
                        <div class="p-3 bg-blur border border-light shadow rounded-4 col-md-4 h-box" style="display: flex;">
                            <div class="d-flex justify-start align-items-center">
                                <!-- Icon -->
                                <span class="icon-lg bg-warning rounded-circle" style="background-color: #ed6953 !important"><i
                                        class="fas fa-check text-white"></i></span>
                                <!-- Info -->
                                <div class="text-start ms-3">
                                    <h6 class="mb-0" style="color:#213a8f">{{ __('messages.secOneOp1') }}<span
                                            class="ms-4"></span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 bg-blur border border-light shadow rounded-4 mt-2 col-md-4 h-box"
                            style="display: flex;">
                            <div class="d-flex justify-start align-items-center">
                                <!-- Icon -->
                                <span class="icon-lg bg-warning rounded-circle" style="background-color: #ed6953 !important"><i
                                        class="fas fa-check text-white"></i></span>
                                <!-- Info -->
                                <div class="text-start ms-3">
                                    <h6 class="mb-0" style="color:#213a8f">{{ __('messages.secOneOp2') }}<span
                                            class="ms-4"></span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 bg-blur border border-light shadow rounded-4 mt-2 col-md-4 h-box"
                            style="display: flex;">
                            <div class="d-flex justify-start align-items-center">
                                <!-- Icon -->
                                <span class="icon-lg bg-warning rounded-circle" style="background-color: #ed6953 !important"><i
                                        class="fas fa-check text-white"></i></span>
                                <!-- Info -->
                                <div class="text-start ms-3">
                                    <h6 class="mb-0" style="color:#213a8f">{{ __('messages.secOneOp3') }}<span
                                            class="ms-4"></span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="p-3 bg-blur border border-light shadow rounded-4 col-md-4 h-box first-items-mobile">
                    <div class="d-flex justify-start align-items-center">
                        <!-- Icon -->
                        <span class="icon-lg bg-warning rounded-circle" style="background-color: #ed6953 !important"><i
                                class="fas fa-check text-white"></i></span>
                        <!-- Info -->
                        <div class="text-start ms-3">
                            <h6 class="mb-0" style="color:#213a8f">{{ __('messages.secOneOp1') }}<span
                                    class="ms-4"></span></h6>
                        </div>
                    </div>
                </div>
                    
                    
            </div>
            <!-- Content END -->
        </section>



        <section class="pt-0 pt-md-5">
            <div class="container">
                <div class="row g-md-5 align-items-center">
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <!-- Title -->
                        <h2 class="mb-0">{{ __('messages.about_index') }}</h2>
                        <p style="font-weight:100">{{ __('messages.aboutsealban') }}</p>
                        <!-- Content -->
                        <div class="row g-4">
                            <!-- Item -->
                            <div class="col-12">
                                <div class="d-sm-flex align-items-center">
                                    <div class="ms-0 mt-2 mt-sm-0">
                                        <h6 class="mb-0 fw-normal" style="text-align: justify;">
                                            <span style="font-weight:bold">
                                               {{ __('messages.about1_index') }}
                                            </span>
                                               {{ __('messages.secThreep') }}
                                        </h6>
                                        <h6 class="mb-0 fw-normal mt-3" style="text-align: justify;">
                                            <span style="font-weight:bold">
                                               {{ __('messages.about2_index') }}
                                            </span>
                                               {{ __('messages.about3_index') }}
                                        </h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <a href="/about-us" class="btn btn-primary-soft mb-0 mt-3 mt-lg-4">
                        {{ __('messages.about4_index') }}
                        </a>
                    </div>

                    <div class="col-lg-6 mb-3 mb-lg-0">
                        <div class="row mt-4 mt-md-0">
                            <!-- Image 1 -->
                            <!--<div class="col-6">-->
                            <!--    <img class="rounded" src="assets/images/about/01.jpg" alt="">-->
                            <!--</div>-->

                            <!-- Image 2 -->
                            <!--<div class="col-6 mt-5 position-relative">-->
                            <!--    <img class="rounded" src="assets/images/about/02.jpg" alt="">-->
                                <!-- SVG decoration -->
                            <!--</div>-->

                            <!-- Content -->
                            <!--<div class="col-8 col-sm-5 mt-n6 align-items-end position-relative">-->
                                <!-- SVG decoration -->
                            <!--    <div class="p-3 card card-body shadow rounded-3 d-inline-block position-relative mt-n2">-->
                                    <!-- Info -->
                            <!--        <h6 class="mb-2">{{ __('messages.about5_index') }}<span class="ms-1"></span></h6>-->
                            <!--        <p class="mb-0 small">{{ __('messages.about6_index') }} </p>-->
                                    <!-- Icon -->
                            <!--        <div-->
                            <!--            class="icon-lg bg-primary rounded-circle position-absolute top-100 start-100 translate-middle">-->
                            <!--            <i class="bi bi-shield-check text-white"></i>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <video muted autoplay loop style="height: 400px; width: 100%; object-fit: cover;">
                                <source src="{{asset('assets/images/a.mp4')}}" type="video/mp4">
                            </video>
                        </div> <!-- Row END -->
                    </div>
                </div>
            </div>
        </section>

<div style="width:100%; text-align: center;">
    <img src="{{ asset('assets/main/PIC.webp') }}" style="max-height:350px; margin:auto;" />
</div>




        <section class="pb-5 pt-0 pt-lg-5">
            <div class="container">
                <!-- Title -->
                <div class="row mb-4">
                    <div class="col-lg-8 mx-auto text-center">
                         <h2 class="fs-3">{{ __('messages.pro1_index') }}</h2>
                        <p class="mb-0" style="text-align:center">
                           {{ __('messages.pro2_index') }}
                            <a href="/products">{{ __('messages.pro3_index') }}</a>
                            {{ __('messages.pro4_index') }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <!-- Slider START -->
                    <div class="tiny-slider arrow-round arrow-blur arrow-hover">
                        <div class="tiny-slider-inner pb-1" data-autoplay="true" data-arrow="true" data-edge="2"
                            data-dots="false" data-items="4" data-items-lg="3" data-items-sm="1">
                            @foreach ($products as $product)
                                <div>
                                    <div class="card shadow h-100">
                                        <!-- Image -->
                                        <img src="/storage/{{ $product->image }}" class="card-img-top"
                                            style="height: 270px; object-fit:cover; width:100%" alt="">
                                        <!-- Card body -->
                                        <div class="card-body pb-0">
                                            <!-- Badge and favorite -->
                                            <div class="d-flex justify-content-between mb-2">
                                                @if($product->category)
                                                <a href="/product/{{ $product->id }}"
                                                    class="badge bg-purple bg-opacity-10 text-purple">{{ $product->category->name }}</a>
                                                @endif
                                                <a href="/profile/add-wishlist/{{ $product->id }}" class="h6 mb-0"><i
                                                        class="far fa-heart"></i></a>
                                            </div>
                                            <!-- Title -->
                                            <h5 class="card-title fw-normal"><a
                                                    href="/product/{{ $product->id }}">{{ $product->name }}</a></h5>
                                            <p class="mb-2 text-truncate-2" style="height: 45px;  text-align: justify; text-align-last: start">{!! mb_substr(strip_tags($product->features), 0, 82) !!}
                                                @if (mb_substr(strip_tags($product->features), 0, 55) != strip_tags($product->features))
                                                    ...
                                                @endif
                                            </p>
                                        </div>
                                        <!-- Card footer -->
                                        <div class="card-footer pt-0 pb-3">
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <span class="h6 fw-light mb-0">
                                                    <a href="/product/{{ $product->id }}"
                                                        class="btn btn-primary-soft mb-0 mt-0 "> {{ __('messages.pro5_index') }}</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Slider END -->
                </div>
            </div>
        </section>



        <section class="pt-0 pt-lg-5">
            <div class="container position-relative">
                <!-- SVG decoration START -->
                <figure class="position-absolute top-50 start-50 translate-middle ms-2">
                    <svg>
                        <path class="fill-white opacity-4"
                            d="m496 22.999c0 10.493-8.506 18.999-18.999 18.999s-19-8.506-19-18.999 8.507-18.999 19-18.999 18.999 8.506 18.999 18.999z" />
                        <path class="fill-white opacity-4"
                            d="m775 102.5c0 5.799-4.701 10.5-10.5 10.5-5.798 0-10.499-4.701-10.499-10.5 0-5.798 4.701-10.499 10.499-10.499 5.799 0 10.5 4.701 10.5 10.499z" />
                        <path class="fill-white opacity-4"
                            d="m192 102c0 6.626-5.373 11.999-12 11.999s-11.999-5.373-11.999-11.999c0-6.628 5.372-12 11.999-12s12 5.372 12 12z" />
                        <path class="fill-white opacity-4"
                            d="m20.499 10.25c0 5.66-4.589 10.249-10.25 10.249-5.66 0-10.249-4.589-10.249-10.249-0-5.661 4.589-10.25 10.249-10.25 5.661-0 10.25 4.589 10.25 10.25z" />
                    </svg>
                </figure>
                <!-- SVG decoration END -->

                <div class="row">
                    <div class="col-12">
                        <div class="bg-info p-4 p-sm-5 rounded-3">
                            <div class="row position-relative">
                                <!-- Svg decoration -->
                                <figure class="fill-white opacity-1 position-absolute top-50 start-0 translate-middle-y">
                                    <svg width="141px" height="141px">
                                        <path
                                            d="M140.520,70.258 C140.520,109.064 109.062,140.519 70.258,140.519 C31.454,140.519 -0.004,109.064 -0.004,70.258 C-0.004,31.455 31.454,-0.003 70.258,-0.003 C109.062,-0.003 140.520,31.455 140.520,70.258 Z" />
                                    </svg>
                                </figure>
                                <!-- Action box -->
                                <div class="col-11 mx-auto position-relative">
                                    <div class="row align-items-center">
                                        <!-- Title -->
                                        <div class="col-lg-7">
                                            <h3 class="text-white0">{{ __('messages.title') }}</h3>
                                            <p class="text-white0 mb-3 mb-lg-0" style="text-align: justify;">{{ __('messages.box_index') }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- Row END -->
                        </div>
                    </div>
                </div> <!-- Row END -->
            </div>
        </section>


        <!--<section class="pb-0 pb-md-5">-->
        <!--    <div class="container">-->
                <!-- Title -->
        <!--        <div class="row mb-4">-->
        <!--            <h2 class="mb-0">{{ __('messages.Exhebitions') }}</h2>-->
        <!--        </div>-->
        <!--        <div class="row">-->
        <!--            <div class="tiny-slider arrow-round arrow-creative arrow-blur arrow-hover">-->
        <!--                <div class="tiny-slider-inner" data-autoplay="false" data-arrow="true" data-dots="false"-->
        <!--                    data-items-xl="3" data-items-md="2" data-items-xs="1">-->

        <!--                    <div class="card bg-transparent">-->
        <!--                        <div class="position-relative">-->
        <!--                            <img src="/storage/exhebitions/1.jpg" class="card-img" alt="course image"-->
        <!--                                style="height: 331px;object-fit:cover;border-radius: 0px;">-->
        <!--                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
        <!--                                <div class="w-100 mt-auto">-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="card bg-transparent">-->
        <!--                        <div class="position-relative">-->
        <!--                            <img src="/storage/exhebitions/2.jpg" class="card-img" alt="course image"-->
        <!--                                style="height: 331px;object-fit:cover;border-radius: 0px;">-->
        <!--                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
        <!--                                <div class="w-100 mt-auto">-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="card bg-transparent">-->
        <!--                        <div class="position-relative">-->
        <!--                            <img src="/storage/exhebitions/3.jpg" class="card-img" alt="course image"-->
        <!--                                style="height: 331px;object-fit:cover;border-radius: 0px;">-->
        <!--                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
        <!--                                <div class="w-100 mt-auto">-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->

        <!--                    <div class="card bg-transparent">-->
        <!--                        <div class="position-relative">-->
        <!--                            <img src="/storage/exhebitions/4.jpg" class="card-img" alt="course image"-->
        <!--                                style="height: 331px;object-fit:cover;border-radius: 0px;">-->
        <!--                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
        <!--                                <div class="w-100 mt-auto">-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->

        <!--                    <div class="card bg-transparent">-->
        <!--                        <div class="position-relative">-->
        <!--                            <img src="/storage/exhebitions/5.jpg" class="card-img" alt="course image"-->
        <!--                                style="height: 331px;object-fit:cover;border-radius: 0px;">-->
        <!--                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
        <!--                                <div class="w-100 mt-auto">-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="card bg-transparent">-->
        <!--                        <div class="position-relative">-->
        <!--                            <img src="/storage/exhebitions/hhh.jpg" class="card-img" alt="course image"-->
        <!--                                style="height: 331px;object-fit:cover;border-radius: 0px;">-->
        <!--                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
        <!--                                <div class="w-100 mt-auto">-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="card bg-transparent">-->
        <!--                        <div class="position-relative">-->
        <!--                            <img src="/storage/exhebitions/7.jpg" class="card-img" alt="course image"-->
        <!--                                style="height: 331px;object-fit:cover;border-radius: 0px;">-->
        <!--                        </div>-->
        <!--                    </div>-->


        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->


        <div id="ourfleet" class=" mt-3 direc row col-12 justify-content-end m-0 p-0 "
            style="border-radius: 16px;background: #f7f7f7;">
            <div class="col-lg-6 p-0 d-flex justify-content-start mb-0 ax-1">
                <img class="card-img-top  imagea" src="{{ asset('storage/about/banner.webp') }}" alt="baneer-car-rent">
            </div>
            <div class=" fleet col-lg-6 py-4 d-flex px-xl-5 txt-1" style="align-items: center;justify-content: center;">
                <div class="card ourfleet m-0 mb-1 mt-3 mt-md-0">
                    <h3 class="card-title fleet1"><span style="font-weight: 100; text-align:center">{{ __('messages.str1_index') }}</span>{{ __('messages.str2_index') }}
                    </h3>
                    <p class="py-md-4 px-xl-5 p-0 fleettxt card-text " style="COLOR: #7e7e7e;">
                       {{ __('messages.str3_index') }}
                    </p>
                </div>
            </div>
        </div>



        @if (count($industries))
            <section class="pb-5 pt-0 pt-lg-5">
                <div class="container">
                    <!-- Title -->
                    <div class="row mb-4">
                        <div class="col-lg-8 mx-auto text-center">
                            <h2 class="fs-3">{{ __('messages.secFourHeading') }}</h2>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Slider START -->
                        <div class="tiny-slider arrow-round arrow-blur arrow-hover">
                            <div class="tiny-slider-inner pb-1" data-autoplay="true" data-arrow="true" data-edge="2"
                                data-dots="false" data-items="3" data-items-lg="2" data-items-sm="1">
                                @foreach ($industries as $industry)
                                    <!-- Card item START -->
                                    <div>
                                        <div class="card action-trigger-hover border bg-transparent">
                                            <!-- Image -->
                                            <img src="/storage/{{ $industry->image }}" class="card-img-top"
                                                style="height:270px;" alt="course image">

                                            <div class="card-body pb-0">
                                                <h5 class="card-title fw-normal"><a
                                                        href="/industry_detail/{{ $industry->id }}">{{ $industry->title }}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card item END -->
                                @endforeach
                            </div>
                        </div>
                        <!-- Slider END -->
                    </div>
                </div>
            </section>
        @endif


        <section class="pb-5 pt-0 pt-lg-5">
            <div class="container">
                <!-- Title -->
                <div class="row mb-4">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="fs-3">{{ __('messages.ser1_index') }}</h2>
                        <p class="mb-0" style="text-align:center">
                        {{ __('messages.ser2_index') }}
                            <a href="/services">{{ __('messages.ser3_index') }}</a>
                           {{ __('messages.ser4_index') }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <!-- Slider START -->
                    <div class="tiny-slider arrow-round arrow-blur arrow-hover">
                        <div class="tiny-slider-inner pb-1" data-autoplay="true" data-arrow="true" data-edge="2"
                            data-dots="false" data-items="4" data-items-lg="3" data-items-sm="1">
                            @foreach ($service as $service)
                                <div>
                                    <div class="card shadow h-100">
                                        <img src="/storage/{{ $service->image }}" class="card-img-top"
                                            style="height: 270px; object-fit:cover; width:100%" alt="">
                                        <div class="card-body pb-0">
                                            <h5 class="card-title fw-normal"><a
                                                    href="/service_detail/{{ $service->id }}">{{ $service->title }}</a>
                                            </h5>
                                            <p class="mb-2 text-truncate-2" style="height: 45px; text-align: justify; text-align-last: start">{!! mb_substr(strip_tags($service->short_des), 0, 82) !!}
                                                @if (mb_substr(strip_tags($service->short_des), 0, 55) != strip_tags($service->short_des))
                                                    ...
                                                @endif
                                            </p>
                                        </div>
                                        <!-- Card footer -->
                                        <div class="card-footer pt-0 pb-3">
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <span class="h6 fw-light mb-0">
                                                    <a href="/service_detail/{{ $service->id }}"
                                                        class="btn btn-primary-soft mb-0 mt-0 ">{{ __('messages.pro5_index') }}</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Slider END -->
                </div>
            </div>
        </section>


        <img src="{{ asset('assets/main/PICc.jpg') }}" />

    </main>
    <style>
        .bg-purple {
            --bs-bg-opacity: 1;
            background-color: rgb(231 103 84 / 17%) !important;
        }

        .text-purple {
            --bs-text-opacity: 1;
            color: rgb(231 103 84) !important;
        }

        .bg-info {
            --bs-bg-opacity: 1;
            background-color: rgb(231 103 84 / 14%) !important;
            box-shadow: 2px 2px 15px #00000033;
        }

        .imagea {
            height: 500px;
            width: auto;
            margin-top: -2px;
        }

        @media only screen and (max-width: 600px) {
            .imagea {
                height: auto;
            }
        }

        .fleet1 {
            text-align: center;
        }

        .ourfleet {
            background: #f7f7f7;
        }
        .text-white0{
            color: #e76754 !important;
        }
    </style>
@endsection
