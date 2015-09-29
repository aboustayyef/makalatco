<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\ScoresGetter;
use \Cache;

class Post extends Model
{
    //

	protected $fillable = array('title', 'url', 'excerpt', 'content', 'publishing_date');

	public function source(){
		return $this->belongsTo('App\Source');
	}

	public function image()
	{
		return $this->hasOne('App\Image');
	}

	public function score()
	{
		return $this->hasOne('App\Score');
	}

	/*
	 * Get Scores from Social media
	 */
	public function getScores(){
		(new ScoresGetter($this))->get();
	}

	/*
	 * Gets a Cache of the last 200 items
	 */
	
	public static function getCache(){
	}

}
