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
// echo '<pre />';print_r($tokens);die;
$tree = array();
foreach ($data as $key => $val)
{
	if($val == '{')
	{
		$node = new CurlyNode();
		$node->body = $data[$key+1];
		$tree[] = array($node);
	}
	
}
echo '<pre />';
print_r($tree);

class CurlyNode
{
	var $body = "";
}