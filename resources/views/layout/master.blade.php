<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield("title")</title>
    <!-- Bootstrap CSS -->
    {{Html::style("https://jalisco.gob.mx/guias/grafico/cdn/style.min.css")}}
    {{Html::style("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css")}}
    {{Html::style("https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css")}}
    {{Html::style("https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css")}}
  </head>
  <body>
    <div class="container">
      @yield("content")
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{Html::script("https://code.jquery.com/jquery-3.2.1.slim.min.js")}}
    {{Html::script("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js")}}
    {{Html::script("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js")}}
    {{Html::script("https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js")}}
  </body>
</html>
@section("js")
  {{Html::script("js/script.js")}}
@endsection
@yield("scripts")