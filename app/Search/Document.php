<?php

namespace App\Search;

class Document
{
	public $keywords, $page, $per_page, $results;
	public function __construct(array $params)
	{
		if (isset($params["keywords"])){
	    	$this->keywords = $params["keywords"];
		}else{
	    	$this->keywords = '';	
		}
		if (isset($params["page"])){
	    	$this->page = $params["page"];
		}else{
	    	$this->page = 1;
		}

		if (isset($params["per_page"])) {
	    	$this->per_page = $params["per_page"];
		}else{
	    	$this->per_page = 10;
		}
	}

	public function results()
	{
		if (is_null($this->results)){
			$this->results = \App\Document::search($this->keywords)->paginate($this->per_page);
		}
		return $this->results;
	}

	public function data()
	{
		return $this->results->toArray()["data"];
	}
}
