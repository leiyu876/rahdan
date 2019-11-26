<?php

/*
    return random icons based on adminlte template
*/
if (! function_exists('icon_random_adminlte')) {

    function icon_random_adminlte() {
        
        $icons_file = fopen(storage_path("adminlte_icons_leo.txt"), "r");
        
        $icons = array();
        
        while(!feof($icons_file)) {
            
            $icons[] =  str_replace("\r\n", '', fgets($icons_file));
        }
        
        fclose($icons_file);

        return $icons[array_rand($icons)];
    }
}