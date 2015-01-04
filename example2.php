<?php

// echo token_name(308);
$source = file_get_contents ( 'temp.php' );
$tokens = token_get_all ( $source );

$data =array();
foreach($tokens as $token ) {
	if(is_string($token)) {
		$data[] =  $token;
	} else {
		// token array
		list ($id, $text) = $token;
		$data[] = token_name($id);
// 		echo $text .' | ' .$id;
	}
}

$tree = array();
$open_flag = 0;
$closed_flag = 0;
foreach ($data as $val)
{
	if($val == '{')
	{
		$tree[] = array($val);
	} else if ($val == '}') {
		$tree[$open_flag][] = $val;
		$open_flag ++;
	}
	
}
echo '<pre />';
print_r($tree);