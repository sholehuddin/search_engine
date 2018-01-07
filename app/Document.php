<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Document extends Model
{
    use Searchable;
    protected $fillable = ['title', 'tag', 'path'];

	/**
	* Get the indexable data array for the model.
	*
	* @return array
	*/
    public function toSearchableArray()
    {
		$array = [
			'id'	=> $this->id,
			'tag'  	=> $this->tag,
			'title'	=> $this->title,
		];

        return $array;
    }
}
