<?php

/*
	database datetime to view dd-mm-yyyy
*/
if (! function_exists('dateDBtoView')) {
    function dateDBtoView($date) {
        return date("d-m-Y", strtotime($date));
    }
}