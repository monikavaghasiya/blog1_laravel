<?php
namespace App\Interfaces;

use App\Post;
interface PostRepositoryInterface
{

	public function save(post $post,$data);


}