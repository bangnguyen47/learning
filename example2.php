<?php

/**
 * @author
 * 
 * Issue #2
 * 
 * Ref: https://github.com/bangnguyen47/learning/issues/2
 */

echo token_name(308);
$source = file_get_contents('temp.php');
$tokens = token_get_all($source);
//var_dump($tokens);die;

if (is_string($token)) {
    echo $token;
} else {
    for($i=0; $i < count($tokens); $i++) {
        list ($id, $text) = $tokens[$i];
        switch ($id) {
            case T_CLASS :
                echo '//Start class' .PHP_EOL .$text;
                break;
            case T_COMMENT :
                break;
            case T_STRING :
                if ($text === 'true' || $text === 'false' || $text === 'null') {
                    echo strtoupper($text);
                    break;
                }

            default :
                echo $text;
                break;
        }
    }
}