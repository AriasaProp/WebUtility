<?php
//avoid empty string
$page_title = str_replace('/', '', $path_last);
$page_title = str_replace('_', ' ', $page_title);
$page_title = ucwords($page_title);

$page_content = getcwd() . '/games/game_template.phtml';
$page_src = getcwd() . '/games/list' . $path_last . '.phtml';

?>