@extends("layout.master")
@section("title", "Remates")
@section("content")
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
    {{Html::script("js/remates.js")}}
@endsection
