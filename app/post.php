<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\comment;

class post extends Model {
	protected $table = 'posts';
	protected $primaryKey='post_id';


	public  function comment()
	{
		return $this->hasMany(comment::class);
	}

	//protected $fillable = ['post_title','post_data', 'post_image', 'post_expire_date'];


}
