<!-- This is our wrapping HTML where we will nest all of our HTML views -->

<!DOCTYPE html>
<html lang="en" dir="ltr" class="gr__getbootstrap_com">
  <head>
    <meta charset="utf-8">
    <title>Danny Learns Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Danny Learns Laravel">
    <meta name="author" content="Danny Brown">
    <link rel="icon" href="../../../../favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/global_styles.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
  </head>

  <a name="top"></a>

  <body data-gr-c-s-loaded="true">

    <div id="above-footer">
      <header>
        @include ('layouts.nav')
      </header>

      <div class="blog-header">
        @yield('header')
      </div>

      <div class="content container">
        <div class="row">

          <div class="col-sm-8">
            @yield('content')
          </div>

          @include('layouts.sidebar')

        </div>
      </div>
    </div>

    <div class="footer">
      @include ('layouts.footer')
    </div>


  </body>

</html>
