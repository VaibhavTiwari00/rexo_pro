<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
  <!-- [Head] start -->

  <head>
    <title>@yield('TITLE','Docuement')</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
 <!-- Favicon -->
<link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/x-icon" />

<!-- [Font] Family -->
<link rel="stylesheet" href="{{ asset('fonts/inter/inter.css') }}" id="main-font-link" />

<!-- [Phosphor Icons] -->
<link rel="stylesheet" href="{{ asset('fonts/phosphor/duotone/style.css') }}" />

<!-- [Tabler Icons] -->
<link rel="stylesheet" href="{{ asset('fonts/tabler-icons.min.css') }}" />

<!-- [Feather Icons] -->
<link rel="stylesheet" href="{{ asset('fonts/feather.css') }}" />

<!-- [Font Awesome Icons] -->
<link rel="stylesheet" href="{{ asset('fonts/fontawesome.css') }}" />

<!-- [Material Icons] -->
<link rel="stylesheet" href="{{ asset('fonts/material.css') }}" />

<!-- [Template CSS Files] -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}" id="main-style-link" />
<script src="{{ asset('js/tech-stack.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/style-preset.css') }}" />

@yield('HEAD')
  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->

  <body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->





@hasSection('MAIN')
                 @yield('MAIN')
            @else
            <div class="pc-container">
      <div class="pc-content">
        <!-- [ Main Content ] start -->
        <div class="row">
                    <h1>MAIN SECTION NOT DEFINED</h1>
        </div></div></div>
                
            @endif
    

    <!-- [Page Specific JS] start -->
   <script src="{{ asset('js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ asset('js/pages/dashboard-default.js') }}"></script>
<!-- [Page Specific JS] end -->
<!-- Required Js -->
<script src="{{ asset('js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('js/pcoded.js') }}"></script>
<script src="{{ asset('js/plugins/feather.min.js') }}"></script>
    
    <script>
      layout_change('light');
    </script>
      
    <script>
      change_box_container('false');
    </script>
     
    <script>
      layout_caption_change('true');
    </script>
     
    <script>
      layout_rtl_change('false');
    </script>
     
    <script>
      preset_change('preset-1');
    </script>
     
    <script>
      main_layout_change('vertical');
    </script>
    
     @yield('FOOTER')


         @stack('scripts')
         

  </body>
  

</html>