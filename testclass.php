<?php

class Version
{
	public $NumberOfVersion;
	public function ToString(){
		echo "Current version 1"."    ";
	}
	function __construct($NumberOfVersion) {
    	$this->NumberOfVersion = $NumberOfVersion;
  	}
	function get_Number() {
	    return $this->NumberOfVersion;
	}
    // write your code here
}
$ver1 = new version(1);
$ver2 = new version(2);
$ver3 = new version(3);

/*yeu cau:
bo xung property NumberOfVersion cho class Version
bo xung ham ToString khi duoc goi se tra ve vd: "Current version 1"

Khai bao cac object $ver1, $ver2, $ver3 va gan gia tri 1,2,3 tuong ung cho NumberOfVersion

    //advance: NumberOfVersion co the tu 0-> 1000000

*/

$currentV1 = $ver1->ToString() ;
// mong muon ket qua la: Current version 1
$arrVersion =[$ver1->get_Number(), $ver2->get_Number(), $ver3->get_Number()];
var_dump($arrVersion);
//in ra $arrVersion
//ket qua mong muon la 1, 2 , 3
function convert_number_to_words($number) {
$hyphen      = ' ';
$conjunction = '  ';
$separator   = ' ';
$negative    = 'âm ';
$decimal     = ' phẩy ';
$dictionary  = array(
0=> 'Không',
1=> 'Một',
2=> 'Hai',
3=> 'Ba',
4=> 'Bốn',
5=> 'Năm',
6=> 'Sáu',
7=> 'Bảy',
8=> 'Tám',
9=> 'Chín',
10=> 'Mười',
11=> 'Mười một',
12=> 'Mười hai',
13=> 'Mười ba',
14=> 'Mười bốn',
15=> 'Mười năm',
16=> 'Mười sáu',
17=> 'Mười bảy',
18=> 'Mười tám',
19=> 'Mười chín',
20=> 'Hai mươi',
30=> 'Ba mươi',
40=> 'Bốn mươi',
50=> 'Năm mươi',
60=> 'Sáu mươi',
70=> 'Bảy mươi',
80=> 'Tám mươi',
90=> 'Chín mươi',
100=> 'trăm',
1000=> 'ngàn',
1000000=>'triệu',
);
if (!is_numeric($number)) {
	return false;
}
if (($number < 0)||($number >1000000)) {
	echo "số chỉ nhân từ 0 ->1000000";
}
$string = $fraction = null;
if (strpos($number, '.') !== false) {
	list($number, $fraction) = explode('.', $number);
}
switch (true) {
	case $number < 21:
		$string = $dictionary[$number];
	break;
	case $number < 100:
		$tens   = ((int) ($number / 10)) * 10;
		$units  = $number % 10;
		$string = $dictionary[$tens];
	if ($units) {
		$string .= $hyphen . $dictionary[$units];
	}
	break;
	case $number < 1000:
		$hundreds  = $number / 100;
		$remainder = $number % 100;
		$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
	if ($remainder) {
		$string .= $conjunction . convert_number_to_words($remainder);
	}
	break;
	default:
		$baseUnit = pow(1000, floor(log($number, 1000)));
		$numBaseUnits = (int) ($number / $baseUnit);
		$remainder = $number % $baseUnit;
		$string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
		if ($remainder) {
			$string .= $remainder < 100 ? $conjunction : $separator;
			$string .= convert_number_to_words($remainder);
		}
		break;
		}
		if (null !== $fraction && is_numeric($fraction)) {
			$string .= $decimal;
			$words = array();
	foreach (str_split((string) $fraction) as $number) {
		$words[] = $dictionary[$number];
	}
	$string .= implode(' ', $words);
}
	return $string;
}

function ThayDoiVersion($arrVersion){
	for ($i=0; $i <count($arrVersion) ; $i++) { 
		echo convert_number_to_words($arrVersion[$i]).","; 
	}
    //write your code here
    // doi version cho cac object $ver1, $ver2, $ver3, dang tu 1,2, 3,
    // thanh MOT, HAI, BA,
    
}
$arrResult = ThayDoiVersion($arrVersion);
echo"        ";
var_dump($arrVersion);
//in ra $arrResult
//ket qua mong muon la MOT, HAI , BA

//in ra $arrVersion
//ket qua mong muon la 1, 2 , 3


//advance:
//khoi tao object $ver4 co NumberOfVersion=1000
// add $ver4 vao mang $arrVersion
$ver4 = new version(1000);
array_push($arrVersion, $ver4->get_Number());
$arrResult = ThayDoiVersion($arrVersion);

//in ra $arrResult
//ket qua mong muon la MOT, HAI , BA, MOT NGHIN
