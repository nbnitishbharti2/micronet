<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
 
use App\Model\Settings;

class Comman {
	
	 public static function socialLink(){
		$data = Settings::first('id'); 
		return $data;
	}

}
