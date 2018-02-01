<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Custom CSS -->
    {{--
    {{Html::style("https://jalisco.gob.mx/guias/grafico/cdn/style.min.css")}}
    {{Html::style("https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.4.2/b-colvis-1.4.2/b-flash-1.4.2/b-html5-1.4.2/b-print-1.4.2/cr-1.4.1/fc-3.2.3/fh-3.1.3/kt-2.3.2/r-2.2.0/rg-1.0.2/rr-1.2.3/sc-1.4.3/sl-1.2.3/datatables.min.css")}}
    {{Html::style("css/shop-homepage.css")}}
    --}}
    {{Html::style("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css")}}
    {{Html::style("https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css")}}
    {{Html::style("css/style.css")}}
    @yield("css")
    <title>@yield("title")</title>
  </head>
  <body>
    @include("layout.navbar")
    <div class="container" id="app">
      @yield("content")
    </div>
    <div class="container">
      @include("layout.footer")
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{Html::script("https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js")}}
    {{Html::script('js/app.js')}}
    {{--
    {{Html::script("https://code.jquery.com/jquery-3.2.1.js")}}
    {{Html::script("https://code.jquery.com/ui/1.12.1/jquery-ui.js")}}
    {{Html::script("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js")}}
    {{Html::script("https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js")}}
    {{Html::script("https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.4.2/b-colvis-1.4.2/b-flash-1.4.2/b-html5-1.4.2/b-print-1.4.2/cr-1.4.1/fc-3.2.3/fh-3.1.3/kt-2.3.2/r-2.2.0/rg-1.0.2/rr-1.2.3/sc-1.4.3/sl-1.2.3/datatables.min.js")}}
    {{Html::script("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js")}}
    --}}
    @yield("scripts")

  </body>
</html>