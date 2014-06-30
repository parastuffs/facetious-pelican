<?php
header("Content-type: text/plain");
$url = "http://www.isbnsearch.org/isbn/9782266150958";
//$url = "facetious-pelican/test/phpinfo.php"
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($curl);
curl_close($curl);
//echo $output;

$dom_doc = new DOMDocument();
$dom_doc->loadHTML($output);
$dom_xpath = new DOMXpath($dom_doc);
$elements = $dom_xpath->query("//div[@class='bookinfo']");
//$elements = $dom_xpath->query("//div[@id='interestingbox']/div[@id='interestingdetails']");

foreach($elements as $element) {
	echo $element->nodeName." : ";
//		var_dump(trim($element->nodeValue));
	$nodes = $element->childNodes;
	foreach($nodes as $node) {
		echo trim($node->nodeValue)."\n";
	}
}

?>
