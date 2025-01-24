<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('sneat') }}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="{{ asset('sneat') }}/https://fonts.googleapis.com" />
    <link rel="preconnect" href="{{ asset('sneat') }}/https://fonts.gstatic.com" crossorigin />
    <link
      href="{{ asset('sneat') }}/https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('sneat') }}/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('sneat') }}/../assets/js/config.js"></script>
  </head>
  <body>
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <img src="{{ asset('img/hanoman.png') }}" alt="Icon" width="90" height="70">
            </span>
            <span style="font-weight: bold; font-size: 26px; color: black; font-family: 'jawa','sans-serif';">ANOMAN</span>
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>
        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item active">
            <a href="{{route('dashboard')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>
          <!-- Tables -->
          <li class="menu-item">
            <a href="{{route('karyawan.karyawan')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-group"></i>
              <div data-i18n="Tables">Karyawan</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{route('golongan.golongan')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-category"></i>
              <div data-i18n="Tables">Golongan</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{route('jabatan.jabatan')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-briefcase"></i>
              <div data-i18n="Tables">Jabatan</div>
            </a>
          </li>

          <!-- Misc -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Log Out</span></li>

          <li class="menu-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                {{ __('Log Out') }}
              </x-responsive-nav-link>
            </form>
          </li>
          
          
        
        </ul>
      </aside>
     <!-- build:js assets/vendor/js/core.js -->
     <script src="{{ asset('sneat') }}/assets/vendor/libs/jquery/jquery.js"></script>
     <script src="{{ asset('sneat') }}/assets/vendor/libs/popper/popper.js"></script>
     <script src="{{ asset('sneat') }}/assets/vendor/js/bootstrap.js"></script>
     <script src="{{ asset('sneat') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
 
     <script src="{{ asset('sneat') }}/assets/vendor/js/menu.js"></script>
     <!-- endbuild -->
 
     <!-- Vendors JS -->
     <script src="{{ asset('sneat') }}/assets/vendor/libs/apex-charts/apexcharts.js"></script>
 
     <!-- Main JS -->
     <script src="{{ asset('sneat') }}/assets/js/main.js"></script>
 
     <!-- Page JS -->
     <script src="{{ asset('sneat') }}/assets/js/dashboards-analytics.js"></script>
 
     <!-- Place this tag in your head or just before your close body tag. -->
     <script async defer src="{{ asset('sneat') }}/https://buttons.github.io/buttons.js"></script>
   </body>
 </html>
