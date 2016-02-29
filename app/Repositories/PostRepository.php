<?php
namespace App\Repositories;

use App\post;
use App\comment;
use App\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class PostRepository implements PostRepositoryInterface
{
	public function save(post $post,$data)
	{
		$user = Auth::user();
		$name = $user->first_name." ".$user->last_name;

		if($data!=null){
			$destinationPath = 'resources/assets/uploads/';
			$filename = $data['post_image']->getClientOriginalName();

			if($data['post_image']->move($destinationPath,$filename)){
				$post->post_image = $destinationPath.$filename;
			}


			$post->post_title=$data['post_title'];
			$post->post_data=$data['post_data'];
			$post->user_id = $user->id;
			$post->user_name = $name;

			$post->save();

			if(($post->save())==true){
				return $success='post added successfully';
			}
			else{
				return $success='unable to add post';
			}

		}

	}


	public function show()
	{
		return Post::paginate(3);
	}

	public function searchPost(post $post,$data)
	{
		$in=$data['post_title']."%";

		$search_result=$post::where('post_title','like',$in)->get();
		return $search_result;
	}


	public function delete(post $post,$id)
	{
		$affectedRows = post::where('post_id', '=', $id)->delete();

		$post_var = $post::orderBy('created_at', 'desc')->get();

		return $post_var;
	}


	public function updateComment($data){

		$id = $data['comment_id'];
		$status = $data['CommentStatus'];

		$post = comment::where('comment_id','=',$id)->update(['comment_status' => $status]);

		return $post;
	}


	public  function  updatePost(post $post,$inputs,$id){

		$destinationPath = 'resources/assets/uploads/';
		$filename = $inputs['post_image']->getClientOriginalName();
		if($inputs['post_image']->move($destinationPath,$filename)){
			$img = $destinationPath.$filename;
			$post = post::where('post_id','=',$id)->update(['post_title' => $inputs['post_title'], 'post_data' => $inputs['post_data'], 'post_expire_date' => $inputs['post_expire_date'], 'post_image' => $img]);
		}
		return $post;
	}


	public  function  updatedData(post $post,$id)
	{
		$data = post::find($id)->toArray();
		return $data;

	}


	public function viewmore($id)
	{
		//comment::paginate(3);
		//$comment_var=post::find($id)->with('comment')->paginate(5);
		//$comment_var->toArray();//;dd($comment_var[0]['comment'][0]['comment_data']);
		//echo "<pre>";
		//var_dump($comment_var->toArray());exit;
		$comment_var = post::with('comment')->find($id)->toArray();
		return $comment_var;
	}


	public function add_comment($data,$id,$guestName)
	{
		$object = new \App\comment();


		if (Auth::guest()){
			$object->comment_data = $data;
			$object->post_id      = $id;
			$object->user_id      = 0;
			$object->user_name    = $guestName;

			if (($object->save()) == true) {
				return array($guestName,$object->comment_id);
			} else {
				return false;
			}
		}else {
			$user = Auth::user();
			$name = $user->first_name . " " . $user->last_name;

			$object->comment_data = $data;
			$object->post_id      = $id;
			$object->user_id      = $user->id;
			$object->user_name    = $name;

			if (($object->save()) == true) {
				return array($name,$object->comment_id);
			} else {
				return false;
			}
		}
	}

}