<?php

	class cleanData
	{
	    public $data;
	    public $date;
	 	public $_error = false;

	    public function setProperty($val, $removespaces = FALSE)
	    {
	        $val = htmlspecialchars($val);
	        $val = htmlentities($val);
	        if ( $removespaces == TRUE ) {
					$val = preg_replace('/\s+/', '', $val);
			}
			$this->data = $val;
			echo $val;
	    }
	 
	    public function getProperty()
	    {
	        return htmlspecialchars_decode(html_entity_decode($this->data));
	    }

	    

	    public function setDate($date, $format='Y-m-d') {
	    	if ( $date == 'Jan 1, 1970' || $date == 'Nov 30, -0001' || $date == '0000-00-00 00:00:00' || $date == NULL ) {
	        	return $this->error = TRUE;
	        } else {
				$date = strtotime($date);
				$date = date($format, $date);
				
				// OUTPUT DATE
				$this->date = $date;			
			} 
	    }

	    public function getDate()
	    {
	        return $this->date;
	    }




	  //   function CHECK_DATE($DATE, $FORMAT='Y-m-d') {
			// if ( $DATE == 'Jan 1, 1970' || $DATE == 'Nov 30, -0001' || $DATE == '0000-00-00 00:00:00' || $DATE == NULL ) { 
			// 	echo 'N/A'; 
			// 	}
			// 	else {
					
			// 		$DATE = strtotime($DATE);
			// 		$DATE = date($FORMAT, $DATE);
					
			// 		// OUTPUT DATE
			// 		return $DATE;
						
			// 	} 
			// } 
			
			// function CHECK_DATE_INPUTFIELD($DATE, $FORMAT='Y-m-d\TH:i:s') {
			// if ( $DATE == 'Jan 1, 1970' || $DATE == 'Nov 30, -0001' || $DATE == '0000-00-00 00:00:00' ) { 
			// 	echo 'N/A'; 
			// 	}
			// 	else {
			// 		//echo($DATE);
			// 		$DATE = strtotime($DATE);
			// 		$DATE = date($FORMAT, $DATE);
					
			// 		// OUTPUT DATE
			// 		return $DATE;
						
			// 	} 
			// } 


	 //    function trim_text($input, $length, $ellipses = true, $strip_html = true) {
		//     //strip tags, if desired
		    
		//     if ($strip_html) {
		//         $input = strip_tags($input);
		//     }

		//     //no need to trim, already shorter than trim length
		//     if (strlen($input) <= $length) {
		//         return $input;
		//     }
		    

		//     //find last space within length
		//     $last_space = strrpos(substr($input, 0, $length), ' ');
		//     $trimmed_text = substr($input, 0, $last_space);
		  		    
		//     //add ellipses (...)
		//     if ($ellipses) {
		//         $trimmed_text .= '...';
		//     }
		  
		//     return $trimmed_text;
		// }


	}