<?php 
$a=[1,2,3];
$b=["a","b"];
function GhepPhanTu($a,$b){
    $dta = array();
    foreach($a as $i){
        foreach($b as $j){
            $temp=[];
            if(is_array($i)){
            	 $temp = array_merge($temp, $i);
            }
            else {
            	array_push($temp, $i);
            }
            if(is_array($j)){
            	$temp = array_merge($temp, $j);
            } 
            else{
            	array_push($temp, $j);
            } 
            array_push($dta, $temp);

        }
    }
    return $dta;
}
/* ý tưởng là sử dụng một mảng rỗng để lưu lại các phần tử
dử dụng 2 vòng lặp để đếm số phần tử của 2 mảng .
mỗi lần lập khởi tạo một mảng rỗng để lưu lại các item rổi đẩy vào trong mảng dta trước đóa.
sử dụng hàm is_array để kiểm tra xem $i,$j có phải phần tử mảng hay không nếu đúng sử dụng hàm array_merge để gộp 2 mạng lại .
// sau khi gộp thì $temp không còn là mảng rỗng nữa mà sẽ là mảng có chứa 1 item bên trong là giá trị của $i
if(is_array($i)) $temp = array_merge($temp, $i);
// nếu $i không phải là mảng thì chỉ cần dùng lệnh array_push để đẩy item $i vào trong mảng $temp else array_push($temp, $i);*/
$c=GhepPhanTu($a,$b);
echo "<pre>";
print_r($c);
echo "</pre>";
//ket qua mong cho la 1 mang , moi item la 1 mang nhu sau:
// [[1,"a"],[1,"b"],[2,"a"],[2,"b"],[3,"a"],[3,"b"]]

$d=["x",1];
$e= GhepPhanTu($c,$d);
echo "<pre>"; 
print_r($e);
echo "</pre>";
//ket qua mong cho la 1 mang , moi item la 1 mang nhu sau:
// [[1,"a","x"],[1,"a",1],[1,"b","x"],[1,"b",1],[2,"a","x"],[2,"a",1],...]

function GhepPhanTuNangCao($arrayInput){
//write your code here
	$dta = $arrayInput[0];
	$count = count($arrayInput);
    for ($i=1; $i < $count ; $i++) { 
    	$dta = GhepPhanTu($dta,$arrayInput[$i]);
    }
    return $dta;
}

$arr=[[1,"a"],[2,"b"],[3,"c"]];// $arr co the co so luong item bat ki
$r= GhepPhanTuNangCao($arr);
echo "<pre>";
print_r($r);
echo "</pre>";
//ket qua mong cho la 1 mang , moi item la 1 mang nhu sau:
// [[1,"a","x"],[1,"a",1],[1,"b","x"],[1,"b",1],[2,"a","x"],[2,"a",1],...]