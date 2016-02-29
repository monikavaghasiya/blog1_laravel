<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\post;
use Illuminate\Http\Request;
use App\Interfaces\PostRepositoryInterface;


class deleteController extends Controller {


	protected $post_repository;

	public function __construct(PostRepositoryInterface $post_repo){
		$this->post_repository = $post_repo;
	}

	public function destroy($id)
	{
		$post = new post();
		$post_var = $this->post_repository->delete($post,$id);

		return view('home')->with('all_post',$post_var);


	}

}
