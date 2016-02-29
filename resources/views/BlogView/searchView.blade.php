@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-body" align="center">
                        <form class="form-horizontal" role="form" method="POST" action="http://localhost-monika/laravel/blog1_laravel/public/search">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Search By Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="post_title" >
                            </div>
                        </div>

                        <br>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                            </div>
                        </div>

                            </form>
                        @if($searchResult!=null)

                            @for($i=0; $i<count($searchResult); $i++)
                            <h3>Post Title:{{ $searchResult[$i]['post_title'] }}</h3>
                                <p><img src="http://localhost-monika/laravel/blog1_laravel/public/{{ $searchResult[$i]['post_image'] }}"></p><br>
                                <p>Posted By: {{ $searchResult[$i]['user_name'] }}</p><br>
                            <p>Postes At: {{ $searchResult[$i]['post_create_date'] }}</p><br>
                            <p>Postes Data: {{ $searchResult[$i]['post_data'] }}</p><br>
                            @endfor
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection