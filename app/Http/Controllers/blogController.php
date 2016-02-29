<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class blogController extends Controller {

	protected $post_repository;

	public function __construct(PostRepositoryInterface $post_repo){
		$this->post_repository = $post_repo;
	}

	//index function for save uploaded post
	public function index()
	{

		//dd(Auth::user()); //it wil give all information of login user
		$data = Input::all();

		$post = new post();



		if($data!=null) {

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

			$data = $this->post_repository->save($post,$data);

			return view('BlogView.view')->with('success',$data);
		}else{
			return view('BlogView.view')->with("success",null);
		}
	}

	public  function  search()
	{
		$data=Input::all();

		if($data!=null) {
			$post=new post;
			$search_result = $this->post_repository->searchPost($post,$data);

			return view('BlogView.searchView')->with('searchResult',$search_result);

		}else{
			$search_result="";
			return view('BlogView.searchView')->with('searchResult',$search_result);
		}

	}

}
