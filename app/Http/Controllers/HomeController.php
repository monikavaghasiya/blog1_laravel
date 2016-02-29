<?php namespace App\Http\Controllers;

use App\post;
use App\Interfaces\PostRepositoryInterface;

class HomeController extends Controller {


	protected $post_repository;

	public function __construct(PostRepositoryInterface $post_repo){
		$this->post_repository = $post_repo;
	}

	public function index()
	{
		$data = $this->post_repository->show();
		$data->setPath('home');

		//$post = post::with('comment')->get();

//		$all_post = $post::all()->toArray();
		return view('home')->with('all_post',$data);
	}

}
