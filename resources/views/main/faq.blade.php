@extends('main.header.header')
@section('content')

<!-- **************** MAIN CONTENT START **************** -->
<main style="min-height: 70vh;">
     <!-- =======================
     Page Banner START -->
     <section class="bg-light py-5">
          <div class="container">
               <div class="row g-4 g-md-5 position-relative">
                    <!-- SVG decoration -->
                  
                    <!-- Title and Search -->
                    <div class="col-lg-10 mx-auto text-center position-relative">
                         <!-- SVG decoration -->
                         
                         <!-- Title -->
                         <h1 class="fs-3">{{ __('messages.faqHeading') }}</h1>
                    </div>

                    <!-- Category END -->
               </div>
          </div>
     </section>
     <!-- =======================
     Page Banner END -->
     
     <!-- =======================
     Page content START -->
     <section class="pt-5 pb-0 pb-lg-5">
          <div class="container">
          
               <div class="row g-4 g-md-5" style="justify-content: center;">
                    <!-- Main content START -->
                    <div class="col-lg-9">
                         <!-- Title -->
                         <h3 class="mb-4 fs-5">{{ __('messages.faq') }}</h3>
     
                         <!-- FAQ START -->
                         <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
                             @if(count($faqs))
                              @foreach ($faqs as $faq)
                                   <!-- Item -->
                                   <div class="accordion-item mb-3">
                                        <h6 class="accordion-header font-base" id="heading-{{$faq->id}}">
                                             <button class="accordion-button fw-bold rounded d-inline-block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$faq->id}}" aria-expanded="true" aria-controls="collapse-{{$faq->id}}">
                                                  {{$faq->question}}
                                             </button>
                                        </h6>
                                        <!-- Body -->
                                        <div id="collapse-{{$faq->id}}" class="accordion-collapse collapse show" aria-labelledby="heading-{{$faq->id}}" data-bs-parent="#accordionExample{{$faq->id}}">
                                             <div class="accordion-body mt-3">
                                                  {!!$faq->answers!!}
                                             </div>
                                        </div>
                                   </div>
                              @endforeach
                              @else
                                <p>{{ __('messages.no_faq') }}</p>
                              @endif
                         </div>
                         <!-- FAQ END -->
                    </div>
                    <!-- Main content END -->
               </div><!-- Row END -->
          </div>
     </section>
     <!-- =======================
     Page content END -->
     
     </main>
     <!-- **************** MAIN CONTENT END **************** -->
@endsection