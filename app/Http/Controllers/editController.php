<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;



class editController extends Controller {


	public function edit($id)
	{
		$comment_var = post::find($id)->toArray();

		return view('BlogView.edit')->with('error_msg',"")->with('data',$comment_var)->with('success',"")->with('post_id',$id);

	}


	protected $post_repository;

	public function __construct(PostRepositoryInterface $post_repo){
		$this->post_repository = $post_repo;
	}

	public function update($id)
	{
		$inputs = Input::all();
		$post = new post();

		$rules = [
			'post_title' => 'required|min:15',
			'post_data' => 'required|min:30',
			'post_image'=>'mimes:jpeg,png',
		];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$post = $this->post_repository->updatePost($post,$inputs,$id);

		$post1 = new post();
		$data = $this->post_repository->updatedData($post1,$id);

		if($post==1)
		{
			$msg = "blog is successfully updated" ;
			return view('BlogView.edit')->with('success',$msg)->with('error_msg',"")->with('post_id',$id)->with('data',$data);
		}
		else{
			$msg = "there is some error while updating";
			return view('BlogView.edit')->with('error_msg',$msg)->with('success',"")->with('post_id',$id)->with('data',$data);

		}

	}

}
