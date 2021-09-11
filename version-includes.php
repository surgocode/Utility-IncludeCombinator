<?php

// ob_start();

//========== ### INCLUDES ### ==========

// ======== THIS SECTION ==========
// include('includes/this.php');
// include('includes/that.php');

// ======== THAT SECTION ==========
// include('includes/another.php');

// $html = ob_get_flush();

// $location = SURGO_COMBINATOR_DIR.'version-combinded.php';

// file_put_contents($location, $html);

// empty output buffer -- this messed it up
// ob_clean();


function stripFirstLine($text) {        
  return substr($text, strpos($text, "\n") + 1);
}

function clean_initial_php($text) {
	return stripFirstLine($text);
}



 $txt1 = '<?php';
 $txt1 .= "\n" . clean_initial_php(file_get_contents(SURGO_COMBINATOR_DIR.'includes/this.php'));
 $txt1 .= "\n" . clean_initial_php(file_get_contents(SURGO_COMBINATOR_DIR.'includes/that.php'));
 $txt1 .= "\n" . clean_initial_php(file_get_contents(SURGO_COMBINATOR_DIR.'includes/another.php'));

 $fp = fopen(SURGO_COMBINATOR_DIR.'version-combinded.php', 'w');
 if(!$fp)
   die('Could not create / open text file for writing.');
   if(fwrite($fp, $txt1) === false)
   die('Could not write to text file.');

  echo 'Text files have been merged.';    

 ?> 