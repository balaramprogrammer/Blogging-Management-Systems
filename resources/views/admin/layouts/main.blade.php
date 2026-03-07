@include('admin.layouts.header')
<div class="pc-container">
   <div class="pc-content">
      @yield('main')
   </div>
</div>
 @yield('scripts')
@include('admin.layouts.footer')