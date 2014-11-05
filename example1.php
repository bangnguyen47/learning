<?php

/**
 * @author
 * 
 * Issue #1
 * Turn true, flase and null into uppercase. And clear comment
 * Ref: https://github.com/bangnguyen47/learning/issues/1
 */
$source = file_get_contents ( 'temp.php' );
$tokens = token_get_all ( $source );

foreach($tokens as $token ) {
	if(is_string($token)) {
		// simple 1-character token
		echo $token;
	} else {
		// token array
		list ($id, $text) = $token;
		
		switch ($id) {
			case T_DOC_COMMENT :
				break;
			case T_COMMENT :
				break;
			case T_STRING :
				if ($text === 'true' ||
					$text === 'false' ||
					$text === 'null')
				{
					echo strtoupper($text);
					break;
				}
			
			default :
				echo $text;
				break;
		}
	}
}
