<script>
    function setComment() {

        $.ajax({
            url:'{{ url('ajaxAddComment')}}'+'/'+$('#comment_data').val()+'/'+$('#postid').val(),
            method:"GET",
            success:function(data)
            {

                var str='<table><tr>'+
                '<td>'+
                '<p><font color="blue">'+data[0]+':</font>'+$('#comment_data').val()+'</p>'+
                '</td>'+
                '<td>'+
                '<p>&nbsp&nbsp&nbsp&nbsp<a href="http://localhost-monika/laravel/blog1_laravel/public/editComment/'+data[1]+'"><span class="glyphicon glyphicon-pencil"></span>Edit Status</a><p>'+
                '</td>'+ '</tr></table>';
                $('#append').append(str);
            }

        });
    }
</script>



    <script>
        function guestComment() {

            $.ajax({
                url:'{{ url('guestAjaxAddComment')}}'+'/'+$('#comment_data').val()+'/'+$('#postid').val()+'/'+$('#guestName').val(),
                method:"GET",
                success:function(data)
                {
                    alert("guest");
                    var str='<table><tr>'+
                            '<td>'+
                            '<p><font color="blue">'+$('#guestName').val()+':</font>'+$('#comment_data').val()+'</p>'+
                            '</td>'+
                            '<td>'+
                            '<p>&nbsp&nbsp&nbsp&nbsp<a href="http://localhost-monika/laravel/blog1_laravel/public/editComment/'+data[1]+'"><span class="glyphicon glyphicon-pencil"></span>Edit Status</a><p>'+
                            '</td>'+ '</tr></table>';
                    $('#append').append(str);
                }

            });
        }
    </script>


<div id="comment">  </div>
<div id="appDiv">@extends('app')


@section('content')


    <div class="container">

        <div id="mainDiv">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <h2>
                @if (Auth::guest())
                    {{ "you can not update things without LOGIN So PLEASE LOGIN"  }}
                @endif
            </h2>
            <div class="panel panel-default">

                <div class="panel-body" align="center">

                    <h3>Post Title: {{  $all['post_title'] }}</h3><br>
                    <p><img src="http://localhost-monika/laravel/blog1_laravel/public/{{ $all['post_image'] }}"></p>
                    <p><b> Posted By: </b>{{ $all['user_name'] }}</p>
                    <p><b> Poste data: </b>{{ $all['post_data'] }}</p>


                    <p><a href="http://localhost-monika/laravel/blog1_laravel/public/delete/{{ $post_id }}"><span class="glyphicon glyphicon-trash">Delete</a></p>
                    <p><a href="http://localhost-monika/laravel/blog1_laravel/public/edit/{{ $post_id }}"><span class="glyphicon glyphicon-pencil"></span>edit</a></p>

                    @if(count($all['comment'])>0)
                        <h4>Comments:</h4>
                         <div id="append">
                        @for($i=0; $i<count($all['comment']); $i++)
                            @if(($all['comment'][$i]['comment_status']) == 1)
                                <table>
                                    <tr>
                                        <td>
                                            <p><font color="blue">{{ $all['comment'][$i]['user_name'] }}:</font>{{ $all['comment'][$i]['comment_data'] }}</p>
                                        </td>
                                        <td>
                                            <p>&nbsp&nbsp&nbsp&nbsp<a href="http://localhost-monika/laravel/blog1_laravel/public/editComment/{{ $all['comment'][$i]['comment_id'] }}"><span class="glyphicon glyphicon-pencil"></span>Edit Status</a><p>
                                        </td>

                                    </tr>
                                </table>
                            @endif
                        @endfor
                         </div>
                    @endif



                       <input type="hidden" name="post_id" value="{{$post_id}}" id="postid">


                            @if (Auth::guest())
                                <div class="form-group" style="margin-left: 300px;">
                                    <div class="col-md-6" >
                                        <center><input type="text" id="guestName" class="form-control" name="guest_name" placeholder="write your name" ></center>
                                    </div>
                                </div><br>
                            @endif

                        <div class="form-group" style="margin-left: 300px;">
                            <div class="col-md-6" >
                                <center><textarea class="form-control" name="comment_data" id="comment_data" placeholder="write your comment" ></textarea></center>
                            </div>
                        </div>

                        @if (Auth::guest())
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4"><br>
                                <center><button type="button" style="margin-left: -150px;" class="btn btn-primary" name="commentButtom" onclick="guestComment()">Submit</button></center>
                            </div>
                        </div>
                        @else
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4"><br>
                                    <center><button type="button" class="btn btn-primary" style="margin-left: -150px;" name="commentButtom" onclick="setComment()">Submit</button></center>
                                </div>
                            </div>
                        @endif
                        <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
</div>
    </div>