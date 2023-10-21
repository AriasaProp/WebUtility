<?php
//avoid empty string
$page_content = getcwd();
$page_title = '';
if ($path_last == '/') {
  $page_title = 'Home';
  $page_content .= '/home.phtml';
} else {
  $page_title = str_replace('/', '', $path_last);
  $page_title = str_replace('_', ' ', $page_title);
  $page_title = ucwords($page_title);
  $page_content .= $path_last . '.phtml';
}
if (!file_exists($page_content)) {
  $page_title = 'Error';
  $page_content = '404.phtml';
} else {
  $nav_menu = array_filter($nav_menu, function($key) use ($path_last) {
    return $key !== $path_last;
  }, ARRAY_FILTER_USE_KEY);
}

?>