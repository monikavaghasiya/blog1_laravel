<?php namespace App;
use App\post;

use Illuminate\Database\Eloquent\Model;

class comment extends Model {
	protected $table = 'comments';
	protected $primaryKey='comment_id';

	public function post()
	{
		return $this->belongsTo('post');
	}

}
