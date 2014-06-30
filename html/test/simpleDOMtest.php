<?php
include('simple_html_dom.php');

$html = file_get_html('http://davidwalsh.name/');

foreach($html->find('a') as $e) {
	echo $e->href.'<br />';
}

?>
