
<?php
include get_stylesheet_directory()."/common.php";

$company = [
	"name" =>"山陰松島遊覧株式会社",
	"name-disp" => "山陰松島遊覧株式会社",
	"telno"=>"0857731212",
	"telno-disp" => "0857-73-1212",
	"faxno-disp" => "0857-73-1261",
	"email" => "info@miurakankobus.co.jp",
	"zip-code" => "681-0073",
	"address"=> "鳥取県岩美郡岩美町大谷2182",
];

$metas =[
//	"keyword" => "観光,鳥取県,海,グルメ,浦富海岸,遊覧船,山陰海岸ジオパーク"
];


$navigation = [
];

foreach( $Pages as $k => $v){
	if($v["menu"]){
		$navigation[] = ["page"=>$k,"text"=>$v["menu"]];
	}
}




?>
