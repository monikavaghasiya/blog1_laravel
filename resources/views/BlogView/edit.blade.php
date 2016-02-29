@extends('app')

@section('content')

    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-body" align="center">
                        <input type="hidden" name="post_id" value={{ $post_id }}>

                        @if($error_msg!=null)
                            {{ $error_msg }}
                        @endif

                        @if($success!=null)
                            {{ $success }}
                        @endIf
                        <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="http://localhost-monika/laravel/blog1_laravel/public/edit/{{ $post_id }}">


                            <div class="form-group">
                                <label class="col-md-4 control-label">Post Title</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="post_title" value="{{ $data['post_title'] }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Post Data</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="post_data" value="{{ $data['post_data'] }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Post Image</label>
                                <div class="col-md-6">
                                    <input type="file" name="post_image" id="fileToUpload">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Post expire date</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="post_expire_date" value="{{ $data['post_expire_date'] }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
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