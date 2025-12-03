<div class="offcanvas-body p-3 p-xl-0">
	<div class="bg-dark border rounded-3 p-3 w-100">
		<!-- Dashboard menu -->
		<div class="list-group list-group-dark list-group-borderless collapse-list">
			<a class="list-group-item 
			@if(url()->current()=='https://sealban.com/profile')
			active
			@endif
			" href="{{route('profile')}}"><i class="bi bi-ui-checks-grid fa-fw me-2"></i>{{ __('messages.dashboard') }}</a>
			<a class="list-group-item
			@if(url()->current()=='https://sealban.com/profile/inquiry')
			active
			@endif" href="{{route('inquiry')}}"><i class="bi bi-card-checklist fa-fw me-2"></i>{{ __('messages.inquiry_forms') }}</a>
			<a class="list-group-item
			@if(url()->current()=='https://sealban.com/profile/wishlist')
			active
			@endif" href="{{route('wishlist')}}"><i class="bi bi-heart fa-fw me-2"></i>{{ __('messages.favorite_list') }}</a>
			<a class="list-group-item
			@if(url()->current()=='https://sealban.com/profile/edit-profile')
			active
			@endif" href="{{route('edit-profile')}}"><i class="bi bi-pencil-square fa-fw me-2"></i>{{ __('messages.edit_profile') }}</a>
			<a class="list-group-item
			@if(url()->current()=='https://sealban.com/profile/edit-password')
			active
			@endif" href="{{route('edit-password')}}"><i class="bi bi-lock fa-fw me-2"></i>{{ __('messages.edit_password') }}</a>
			<a class="list-group-item text-danger bg-danger-soft-hover" href="{{route('user.logout')}}"><i class="fas fa-sign-out-alt fa-fw me-2"></i>{{ __('messages.logout') }}</a>
		</div>
	</div>
</div>