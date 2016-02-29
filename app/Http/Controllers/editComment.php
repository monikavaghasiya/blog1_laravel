<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\comment;
use App\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;

class editComment extends Controller {

	protected $post_repository;

	public function __construct(PostRepositoryInterface $post_repo){
		$this->post_repository = $post_repo;
	}

	public function editCommentStatus($id)
	{
		return view('BlogView.editCommentStatus')->with('success',"")->with('comment_id',$id);
	}

	public function updateCommentStatus()
	{
		$data = Input::all();

		$post = $this->post_repository->updateComment($data);


		if($post==1)
		{
			$msg = "Comment is successfully updated" ;
			return view('BlogView.editCommentStatus')->with('success',$msg)->with('comment_id',$data['comment_id']);
		}
		else{
			$msg = "There is some error while updating";
			return view('BlogView.edit')->with('error_msg',$msg)->with('success',"")->with('comment_id',$data['comment_id']);

		}
	}

}
