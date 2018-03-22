<?php

/*
	database datetime to view dd-mm-yyyy
*/
if (! function_exists('dateDBtoView')) {

	function dateDBtoView($date) {
    
        return date("d-m-Y", strtotime($date));
    }
}

/*
	view dd-mm-yyyy to database datetime 
*/
if (! function_exists('dateViewToDB')) {
    
    function dateViewToDB($date) {
    	
    	date_default_timezone_set('Asia/Riyadh');
    	
    	$date = $date ? $date : date("Y-m-d");
	
		return date("Y-m-d", strtotime($date)).' '.date("H:i:s");
    }
}