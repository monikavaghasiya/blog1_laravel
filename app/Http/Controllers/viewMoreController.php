<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\post;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Interfaces\PostRepositoryInterface;



class viewMoreController extends Controller {

	protected $post_repository;

	public function __construct(PostRepositoryInterface $post_repo){
		$this->post_repository = $post_repo;
	}

	public function viewMore($id)
	{
		$comment_var = $this->post_repository->viewmore($id);

		return view('viewMore')->with('all', $comment_var)->with('post_id', $id);

	}


	/*public  function  addComment($id)
	{
		$data=Input::all();

		if($data!=null) {
			$success = $this->post_repository->add_comment($data);

			$post_id = Input::get('post_id');
			$comment_var = $this->post_repository->viewmore($post_id);
			return view('viewMore')->with('success', $success)->with('all',$comment_var)->with('post_id',Input::get('post_id'));
		}else{
			return view('viewMore')->with("success",null);
		}

	}*/

	public function ajaxAddComment($comment,$id){


			$success = $this->post_repository->add_comment($comment,$id,null);
			return $success;
			//$comment_var = $this->post_repository->viewmore($id);
			//return view('viewMore')->with('post_id',$id)->with('all',$comment_var);

	}
	public  function  guestAjaxAddComment($comment,$id,$guestName){
		$success = $this->post_repository->add_comment($comment,$id,$guestName);
		return $success;
	}
}
