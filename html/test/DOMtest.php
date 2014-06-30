<?php
$html = '
<html>
    <body>
        <div id="mango">
            This is the mango div. It has some text and a form too.
            <form>
                <input type="text" name="first_name" value="Yahoo" />
                <input type="text" name="last_name" value="Bingo" />
            </form>
             
            <table class="inner">
                <tr><td>Happy</td><td>Sky</td></tr>
            </table>
        </div>
         
        <table id="data" class="outer">
            <tr><td>Happy</td><td>Sky</td></tr>
            <tr><td>Happy</td><td>Sky</td></tr>
            <tr><td>Happy</td><td>Sky</td></tr>
            <tr><td>Happy</td><td>Sky</td></tr>
            <tr><td>Happy</td><td>Sky</td></tr>
        </table>
    </body>
</html>';

$dom = new DOMDocument();
$dom->loadHTML($html);
$mango_div = $dom->getElementById('mango');
if(!mango_div) {
	die("Element not found");
}

echo "element found";
?>
