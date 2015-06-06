<?php
/**
* 
*/

function my_autoload($class)
{
	require_once ($class.".php");
}
spl_autoload_register('my_autoload');

$count = 71;
if(is_numeric($_GET['page'])){
	$curPage = $_GET['page'];
} else {
	$curPage = 1;
}
$num = 5;
$url = 'index.php';
$pagenum = 5;
$AjaxPage = new \Zsc\AjaxPage($count, $curPage, $num, $url, $pagenum);
$html = $AjaxPage->linkArray();

foreach ($html as $key => $value) {

	$cur = "#000";
	if($key == $curPage){
	$cur = "red";
	}
	echo'<a href="' . $value['href'] . '" style="color:' . $cur . ';">' . $key . '</a> ';

}
?>
