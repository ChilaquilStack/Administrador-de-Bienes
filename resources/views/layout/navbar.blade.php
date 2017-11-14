<nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
            <a class="navbar-brand" href="#">
                <img src="img/jal01.svg" height="30px" width="30px" alt="logo jalisco"/>
            </a>
        </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    @auth
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
			<li><a href="{{action('CreditosController@index')}}">Créditos<span class="sr-only">(current)</span></a></li>
			<li><a href="{{action('ContribuyenteController@index')}}">Contribuyentes</a></li>
			<li><a href="{{action('BienesController@index')}}">Bienes</a></li>
			<li><a href="{{action('RematesController@index')}}">Remates</a></li>
        </ul>
    @endauth
        <ul class="nav navbar-nav navbar-right">
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">{{ Auth::user()->nombre." ".Auth::user()->apellido_paterno}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>