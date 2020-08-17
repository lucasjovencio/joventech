<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>
  <div id="preloader-form"></div>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('dev-folio/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('dev-folio/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('dev-folio/lib/popper/popper.min.js') }}"></script>
  <script src="{{ asset('dev-folio/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('dev-folio/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('dev-folio/lib/counterup/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('dev-folio/lib/counterup/jquery.counterup.js') }}"></script>
  <script src="{{ asset('dev-folio/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('dev-folio/lib/lightbox/js/lightbox.min.js') }}"></script>
  <script src="{{ asset('dev-folio/lib/typed/typed.min.js') }}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('dev-folio/contactform/contactform.js?v='.time()) }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('dev-folio/js/main.js?v='.time()) }}"></script>

  @if(config('app.hubspot.script'))
    <!-- Start of HubSpot Embed Code -->
      <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/{{config('app.hubspot.script')}}.js"></script>
    <!-- End of HubSpot Embed Code -->
  @endif
  
  @yield('js')
</body>
</html>