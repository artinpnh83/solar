<!DOCTYPE html>
@if(app()->getLocale() == 'fa')
<html lang="fa" dir="rtl">
@else
<html lang="en" dir="ltr">
@endif

<head>
	<title>{{ __('messages.title') }}</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="">
	<meta name="description" content="{{ __('messages.title') }}">


	<!-- Favicon -->
	<link rel="shortcut icon" href="/assets/images/favicon.ico">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendor/tiny-slider/tiny-slider.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendor/aos/aos.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/glightbox/css/glightbox.css">

	<!-- Theme CSS -->
	@if(app()->getLocale() == 'fa')
	<link rel="stylesheet" type="text/css" href="/assets/css/style-rtl.css">
	@else
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	@endif

</head>
<style>
	.breadcrumb-item + .breadcrumb-item::before {
		content: unset
	}
</style>
<body>

<!-- Header START -->
<header class="navbar-light navbar-sticky">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand" href="{{ route('index') }}">
				<img class="light-mode-item navbar-brand-item" src="/assets/images/logo.png" style="height: 65px" alt="logo">
			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
			<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</button>

			<!-- Main navbar START -->
			<div class="navbar-collapse w-100 collapse" id="navbarCollapse">

				<!-- Nav Main menu START -->
				<ul class="navbar-nav navbar-nav-scroll mx-auto">
					<!-- Nav item 1 Demos -->
					<li class="nav-item"><a class="nav-link" href="{{ route('index') }}">{{ __('messages.home') }}</a></li>
					
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="{{ route('products') }}" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('messages.products') }}</a>
						<ul class="dropdown-menu" aria-labelledby="pagesMenu">
						    @foreach ($categories_main as $category)
							    <li class="dropdown-submenu dropend">
								<a class="dropdown-item " 
								href="@if($category->cat==1)
								{{ route('products_category', ['id' => $category->id]) }}
								@else
								{{ route('categories', ['id' => $category->id]) }}
								@endif"
								>{{ $category->name }}</a>
								@if ($category->children->count())
    								<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
    								    @foreach ($category->children as $child)
    									    <li> <a class="dropdown-item" 
    							href="@if($child->cat==1)
								{{ route('products_category', ['id' => $child->id]) }}
								@else
								{{ route('categories', ['id' => $child->id]) }}
								@endif">{{ $child->name }}</a></li>
    									@endforeach
    								</ul>
    							@endif
							</li>
							@endforeach
						</ul>
					</li>
					
					<li class="nav-item"><a class="nav-link" href="{{ route('industry') }}">{{ __('messages.industries') }}</a></li>
					
					<li class="nav-item"><a class="nav-link" href="{{ route('services') }}">{{ __('messages.services') }}</a></li>
					
					<li class="nav-item"><a class="nav-link" href="{{ route('blogs') }}">{{ __('messages.blogs') }}</a></li>
					
					<li class="nav-item"><a class="nav-link" href="{{ route('about_us') }}">{{ __('messages.about') }}</a></li>
					
					<li class="nav-item"><a class="nav-link" href="{{ route('contact_us') }}">{{ __('messages.contact') }}</a></li>
					
					<li class="nav-item"><a class="nav-link" href="{{ route('faq') }}">{{ __('messages.faq') }}</a></li>
					@if (auth('web')->user())
					<li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">{{ __('messages.profile') }}</a></li>
					@else
					<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
					@endif
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="accounntMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('messages.lang') }}</a>
						<ul class="dropdown-menu" aria-labelledby="accounntMenu">
						
							<li> <a class="dropdown-item" href="{{ route('locales.changes', ['lang'=>'fa']) }}"><img src="/assets/images/flags/ir.svg" style="width:30px; margin-right: 5px; margin-left: 5px;"/>{{ __('messages.fa') }}</a> </li>
							<li> <a class="dropdown-item" href="{{ route('locales.changes', ['lang'=>'en']) }}"><img src="/assets/images/flags/Untitled.webp" style="width:30px; margin-right: 5px; margin-left: 5px;"/>{{ __('messages.en') }}</a> </li>
							
						</ul>
					</li>
					
					<!--<form method="POST" action="{{ route('locale.change') }}">-->
     <!--               @csrf -->
    	<!--				<select name="locale" id="locale" onchange="this.form.submit()">-->
     <!--                       @foreach(config('app.locales') as $locale)-->
     <!--                           <option value="{{ $locale }}" {{ $locale === app()->getLocale() ? 'selected' : '' }}>-->
     <!--                               {{ __('languages.' . $locale) }} -->
     <!--                           </option>-->
     <!--                       @endforeach-->
     <!--                   </select>-->
     <!--               </form>-->
					
				</ul>
				<!-- Nav Main menu END -->

			</div>
			<!-- Main navbar END -->
			
			<!-- Logo START -->
			<a class="navbar-brand logo-type" href="{{ route('index') }}">
			    @if(app()->getLocale() == 'fa')
				<img class="light-mode-item navbar-brand-item" src="/assets/images/logo-type.png" style="height: 65px" alt="logo">
				@else
				<img class="light-mode-item navbar-brand-item" src="/assets/images/logo-type-en.png" alt="logo">
				@endif
			</a>
			<!-- Logo END -->

		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
<!-- Header END -->
<style>
    @media only screen and (max-width: 1199px) {
      .logo-type {
        display:none;
      }
    }
.position-relative a img{
    height: 270px;
    width: 100%;
    object-fit: cover;
}
.tiny-slider-inner img{
    object-fit: cover;
}

</style>
@if(Route::is('index') )
    <style>
    
    .bg-blur {
        -webkit-backdrop-filter: blur(5px);
        backdrop-filter: blur(4px);
        background: #ffffff99;
    }
    
    @media only screen and (min-width: 991px) {
      .first-section {
        padding:0
      }
        header {
            position: absolute;
            z-index: 1020;
            width: 100%;
                    background: #ffffff;

        }
      
    }
    @media only screen and (max-width: 991px) {
       .first-items{
           display:none; 
        }
       .first-items-mobile{
           display:block; 
        }
      
    }
     .first-items-mobile{
           display:none !important; 
        }
        
             .img-sliders{
                 height:90vh !important;
             }
         @media only screen and (max-width: 770px) {
             .img-sliders{
                 height:auto !important;
             }
         }
    </style>
@endif
@yield('content')


<!-- =======================
Footer START -->
<footer class="bg-light pt-5">
		<div class="container">
		<!-- Row START -->
		<div class="row g-4">

			<!-- Widget 1 START -->
			<div class="col-lg-3 mb-5">
				<!-- logo -->
				<a class="me-0" href="{{ route('index') }}">
				    @if(app()->getLocale() == 'fa')
					<img class="light-mode-item" style="height: 70px;" src="/assets/images/logo.png" alt="logo">
					@else
					<img class="light-mode-item" style="height: 70px;" src="/assets/images/logo-en.png" alt="logo">
					@endif
				</a>
				<p class="my-3">{{ __('messages.footerP') }}</p>
				<!-- Social media icon -->
		
			</div>
			<!-- Widget 1 END -->

			<!-- Widget 2 START -->
			<div class="col-lg-6">
				<div class="row g-4">
					<!-- Link block -->
					<div class="col-6 col-md-6">
						<h5 class="mb-2 mb-md-4">{{ __('messages.footerlink') }}</h5>
						<ul class="nav flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('industry') }}">{{ __('messages.industries') }}</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('services') }}">{{ __('messages.services') }}</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('blogs') }}">{{ __('messages.blogs') }}</a></li>
						</ul>
					</div>
									
					<!-- Link block -->
					<div class="col-6 col-md-6">
						<h5 class="mb-2 mb-md-4">{{ __('messages.footerHelp') }}</h5>
						<ul class="nav flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('about_us') }}">{{ __('messages.about') }}</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('contact_us') }}">{{ __('messages.contact') }}</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('faq') }}">{{ __('messages.faq') }}</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('term') }}">{{ __('messages.term') }}</a></li>
						</ul>
					</div>
					
				</div>
			</div>
			<!-- Widget 2 END -->

			<!-- Widget 3 START -->
			<div class="col-lg-3">
				<h5 class="mb-2 mb-md-4">{{ __('messages.contact') }}</h5>
				<!-- Time -->
				@foreach($contacts_main as $c)
    				<p class="mb-2">
    					{{$c->title}}: 
    					<a href="{{$c->link}}"><span class="h6 fw-light ms-2">{{$c->name}}</span></a>
    				</p>
                @endforeach
				
			</div> 
			<!-- Widget 3 END -->
		</div><!-- Row END -->

	
	</div>
</footer>
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

<!-- Bootstrap JS -->
<script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
@if(app()->getLocale() == 'fa')
<script src="/assets/vendor/tiny-slider/tiny-slider-rtl.js"></script>
@else
<script src="/assets/vendor/tiny-slider/tiny-slider.js"></script>
@endif
<script src="/assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/isotope/isotope.pkgd.min.js"></script>
<script src="assets/vendor/imagesLoaded/imagesloaded.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.js"></script>
<script src="assets/vendor/purecounterjs/dist/purecounter_vanilla.js"></script>
<!-- Template Functions -->
<script src="/assets/js/functions.js"></script>
<script>
     document.querySelector(".upload-button").onclick = function() {
	      document.querySelector(".hidden-upload").click(); 
    };

	   document.querySelector(".hidden-upload").onchange = function() {
	      document.querySelector(".upload-name").value = event.target.files[0].name;
	};
	// Upload File .mp4
	    document.querySelector(".upload-button-mp4").onclick = function() {
	      document.querySelector(".hidden-upload-mp4").click(); 
    };

	   document.querySelector(".hidden-upload-mp4").onchange = function() {
	      document.querySelector(".upload-name-mp4").value = event.target.files[0].name;
	};
	// Upload File .WebM
	    document.querySelector(".upload-button-web").onclick = function() {
	      document.querySelector(".hidden-upload-web").click(); 
    };

	   document.querySelector(".hidden-upload-web").onchange = function() {
	      document.querySelector(".upload-name-web").value = event.target.files[0].name;
	};
	// Upload File .OGG
	    document.querySelector(".upload-button-ogg").onclick = function() {
	      document.querySelector(".hidden-upload-ogg").click(); 
    };

	   document.querySelector(".hidden-upload-ogg").onchange = function() {
	      document.querySelector(".upload-name-ogg").value = event.target.files[0].name;
	};
</script>







<div class="floating-container">
  <div class="floating-button">
      <!--<span class="float-element tooltip-left">-->
            <img src="{{ asset('icon/support.svg') }}" style="width:25px">
        <!--</span>-->
        </div>
  <div class="element-container" style="text-align:center">

    <a href="https://www.instagram.com/sealbanco/profilecard/?igsh=bDExemJuMXh6YTBh">
        <span class="float-element tooltip-left">
            <img src="{{ asset('icon/instagram.png') }}" style="width:25px">
        </span>
    </a>
    <a href="https://x.com/sealbanco?s=21&t=wAXxnz6zjxPdL9sVieGK-A">
        <span class="float-element">
            <img src="{{ asset('icon/x.png') }}" style="width:25px">
        </span>
    </a>
    <a href="https://www.Linkedin.com/in/sealban-co-32b918344/">
        <span class="float-element tooltip-left">
            <img src="{{ asset('icon/linkedin.png') }}" style="width:25px">
        </span>
    </a>
    <a href="https://t.me/+4LOcKKA89p9hYmY8">
        <span class="float-element tooltip-left">
            <img src="{{ asset('icon/telegram.png') }}" style="width:25px">
        </span>
    </a>
    <a href="https://t.me/sealban">
        <span class="float-element tooltip-left">
            <img src="{{ asset('icon/telegram.png') }}" style="width:25px">
        </span>
    </a>
    <a href="https://www.facebook.com/share/18b7Fnf2Mz/?mibextid=wwXIfr">
        <span class="float-element tooltip-left">
            <img src="{{ asset('icon/face.png') }}" style="width:25px">
        </span>
    </a>
      
  </div>
</div>
<style>
    @import url("https://fonts.googleapis.com/css?family=Roboto");
@-webkit-keyframes come-in {
  0% {
    -webkit-transform: translatey(100px);
            transform: translatey(100px);
    opacity: 0;
  }
  30% {
    -webkit-transform: translateX(-50px) scale(0.4);
            transform: translateX(-50px) scale(0.4);
  }
  70% {
    -webkit-transform: translateX(0px) scale(1.2);
            transform: translateX(0px) scale(1.2);
  }
  100% {
    -webkit-transform: translatey(0px) scale(1);
            transform: translatey(0px) scale(1);
    opacity: 1;
  }
}
@keyframes come-in {
  0% {
    -webkit-transform: translatey(100px);
            transform: translatey(100px);
    opacity: 0;
  }
  30% {
    -webkit-transform: translateX(-50px) scale(0.4);
            transform: translateX(-50px) scale(0.4);
  }
  70% {
    -webkit-transform: translateX(0px) scale(1.2);
            transform: translateX(0px) scale(1.2);
  }
  100% {
    -webkit-transform: translatey(0px) scale(1);
            transform: translatey(0px) scale(1);
    opacity: 1;
  }
}


.floating-container {
    z-index: 999;
    position: fixed;
    width: 60px;
    height: 100px;
    bottom: 12px;
    right: 12px;
}
.floating-container:hover {
  height: 458px;
}
.floating-container:hover .floating-button {
  box-shadow:0 20px 20px -10px rgb(187 175 159);
  -webkit-transform: translatey(5px);
          transform: translatey(5px);
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}
.floating-container:hover .element-container .float-element:nth-child(1) {
  -webkit-animation: come-in 0.4s forwards 0.2s;
          animation: come-in 0.4s forwards 0.2s;
}
.floating-container:hover .element-container .float-element:nth-child(2) {
  -webkit-animation: come-in 0.4s forwards 0.4s;
          animation: come-in 0.4s forwards 0.4s;
}
.floating-container:hover .element-container .float-element:nth-child(3) {
  -webkit-animation: come-in 0.4s forwards 0.6s;
          animation: come-in 0.4s forwards 0.6s;
}
.floating-container .floating-button {
  position: absolute;
  width: 60px;
  height: 60px;
      border: solid 1px #404040;
  bottom: 0;
  border-radius: 50%;
  left: 0;
  right: 0;
  /*margin: auto;*/
  color: #404040;
  line-height: 58px;
  text-align: center;
  font-size: 23px;
  z-index: 100;
  /*box-shadow: 0 10px 25px -5px rgba(44, 179, 240, 0.6);*/
  cursor: pointer;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}
.floating-container .float-element {
  position: relative;
  display: block;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  margin: 15px auto;
  color: white;
  font-weight: 500;
  text-align: center;
  line-height: 50px;
  z-index: 0;
  opacity: 0;
  -webkit-transform: translateY(100px);
          transform: translateY(100px);
}
.floating-container .float-element .material-icons {
  vertical-align: middle;
  font-size: 16px;
}
.floating-container .float-element:nth-child(1) {
  background: #ed6953;
  box-shadow: 0 20px 20px -10px rgb(187 175 159);
}
.floating-container .float-element:nth-child(2) {
  background: #ed6953;
  box-shadow: 0 20px 20px -10px rgb(187 175 159);
}
.floating-container .float-element:nth-child(3) {
  background: #ed6953;
  box-shadow: 0 20px 20px -10px rgb(187 175 159);
}
body, p , button, li, ul, span, a, h1, h2, h3, h4, h5, h6{
    font-family:IRANSans !important;
}
</style>





</body>

</html>