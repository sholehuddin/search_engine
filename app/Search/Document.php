<?php

namespace App\Search;

class Document extends Base
{
	public function results()
	{
		if (is_null($this->results)){
			$this->results = \App\Document::search($this->keywords)->paginate($this->per_page);
		}
		return $this->results;
	}
}
