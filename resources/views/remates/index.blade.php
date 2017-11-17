@extends("layout.master")
@section("title", "Remates")
@section("css")
    {{Html::style("css/wickedpicker.css")}}
    {{Html::style("//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css")}}
@endsection
@section("content")
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="panel pangel-groups">
    
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <h1 class="panel-title">Remate</h1>
            </div>
            
            <div class="panel-body">
                {{Form::open(["action" => "RematesController@store", "method" => "post", "class" => "form-horizontal", "role" => "form"])}}
                    @include("remates.form")
                    @include("remates.table")
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm">Rematar</button>
                    </div>
                {{Form::close()}}
            </div>
        
        </div>
    
    </div>
    
@endsection
@section("scripts")
    {{Html::script("js/wickedpicker.js")}}
    {{Html::script("js/remates.js")}}
@endsection
