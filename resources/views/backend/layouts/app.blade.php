
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Morshed Khan Rana">
  <meta name="author" content="Morshed Khan Rana">

  <title>Dashboard</title>

  @include('backend.partial.style')
  @yield('style')
  <style>
    .toast.toast-success {
        background: #45a770;
    }

    .toast.toast-info {
        background: #1a90a2;
    }

    .toast.toast-warning {
        background: #ffc107;
    }

    .toast.toast-error {
        background: #dc3545;
    }
  </style>

</head>
<body id="page-top" class="nav-fixed">
  <div id="app">
    @include('backend.partial.navbar')
    <div id="layoutSidenav">
      @include('backend.partial.sidebar')
      <div id="layoutSidenav_content">
          <div class="mt-3 ml-3">
            @yield('content')
          </div>
        @include('backend.partial.footer')
      </div>
    </div>
  </div>
    @include('backend.partial.script')
    @yield('script')
    {!! Toastr::message() !!}
</body>
</html>
