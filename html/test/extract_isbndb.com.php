<?php
echo "This page should extract the info of the following ISBN from isbndb.org: 9782266150958\n";
header("Content-type: text/plain");

// http://isbndb.com/api/v2/docs/books
// http://isbndb.com/api/v2/json/<user_key>/book/<isbn13>
$url = "http://isbndb.com/api/v2/json/PIBTN7BQ/book/9782266150958";

// Download the content of the URL via curl.
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($curl);
curl_close($curl);

$obj = json_decode($output);

// We need to use the latin title because the regular title
echo "title: ".$obj->data[0]->title_latin."\n";
echo "author: ".$obj->data[0]->author_data[0]->name."\n";
echo "publisher: ".$obj->data[0]->publisher_name."\n";
echo "isbn13: ".$obj->data[0]->isbn13."\n";
echo "isbn10: ".$obj->data[0]->isbn10."\n";
// the pages are formated as something like '411 pages'.
preg_match('/(\d+) pages/', $obj->data[0]->physical_description_text, $pages);
// $pages[0] is the full match
echo "pages: ".intval($pages[1])."\n";// intval converts str to int. To print an array, use print_r($pages).

?>
