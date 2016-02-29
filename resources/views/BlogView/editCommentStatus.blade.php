@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-body" align="center">
                        <form enctype="multipart/form-data" action="http://localhost-monika/laravel/blog1_laravel/public/editComment" method="post">

                            <input type="hidden" name="comment_id" value="{{ $comment_id }}">

                            @if($success!="")
                                <h3><font color="blue">Comment Status: {{ $success }}</font></h3>
                            @endif

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <p>Select "0" for inactive Comment</p>
                                    <p>Select "1" for active Comment</p>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <select name="CommentStatus">
                                        <option value="">Select...</option>
                                        <option value=0>0</option>
                                        <option value=1>1</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">
                                        Edit Comment Status
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection