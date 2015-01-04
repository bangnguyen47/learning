<?php

class CurlyNode
{
	var $body = "";
}

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
	if($val == '{' && isset($data[$key+1]) && $data[$key+1] !='}')
	{
		$node = new CurlyNode();
		$node->body = $data[$key+1];
		$tree[] = $node;
	}
	
}
echo '<pre />';
print_r($tree);