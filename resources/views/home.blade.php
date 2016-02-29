@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				<div class="panel-body" align="center">
                    <?php $post_count = count($all_post) ?>

                    @foreach($all_post as $post)
                        <h3>Post Title: {{  $post->post_title }}</h3><br>
                        <p>Posted By: {{ $post->user_name }}</p><br>
                        <p>Postes At: {{ $post->created_at }}</p><br>
                        <p>Postes Data: {{ $post->post_data }}</p><br>
                        <p><img src="http://localhost-monika/laravel/blog1_laravel/public/{{ $post->post_image }}"></p><br>
                        <p><a href="http://localhost-monika/laravel/blog1_laravel/public/viewMore/{{ $post->post_id }}"><input type="button" name="view_more" value="view more"></a> </p><br><br><br>

                    @endforeach

				</div>
			</div>
		</div>
	</div>
</div>
    {!! $all_post->render() !!}
@endsection
