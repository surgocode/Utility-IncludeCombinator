<?php

/*
Simplifies and cleans up include process
----
Convert string to array and then includes
Ideas: 
-Could make a "require" version or add to this with second arg
-Could build in error log if include not found for an include
*/
function surgo_include($path, $includes_as_array) {

	/*
	This is a CSV-based version where you pass CSV values instead or array and this is what I used first
	// Remove whitespace that will likely occur with this method
	$includes_as_csv = preg_replace('/\s+/', '', $includes_as_csv);
	// Comma sperated entries into array
	$array = explode (",", $includes_as_csv); 
	
	*/
	$style = ' padding: 1px 3px; font-size: 12px;';
	$response = '';
	$response .= '<div style="margin: 3px; ">';
if(is_array($includes_as_array)) {
		
    foreach($includes_as_array as $value) {
				
		$include_link = $path.'/'.$value.'.php';
		if (file_exists($include_link)) {
			
			include($include_link);
			$response .= '<span style="color: green; border: 1px solid green; margin: 0px 2px 0px 0px;'.$style.'"> '.$value.'</span>';
		} else {
			$response .= '<span style="color: red; border: 1px solid red;'.$style.'">'.$value.'</span>';
		}
			
    }
	
}
	$response .= '</div>';
	echo $response;
}



