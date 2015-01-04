<?php

class CurlyNode
{
	public $body = "";
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
	if($val == '{')
	{
		$node = new CurlyNode();
		if(isset($data[$key+1]) && $data[$key+1] !='}')
		{
			for($i=$key; $i <count($data); $i++)
			{
				if(isset($data[$i+1]) && $data[$i+1] !='}')
				{
					$node->body .= $data[$i+1];
					
				} else {
					break;
				}
			}
		} else {
			$node->body = "";
		}
		$tree[] = $node;
	}
	
}
echo '<pre />';
print_r($tree);