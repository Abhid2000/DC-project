<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if ($str!='') {
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
	
	function get_product($con,$limit='',$product_id)
	{
		$sql="SELECT * FROM tbl_product where status=1";
		if ($product_id!='') {
			$sql.=" and id = $product_id";
		}
		if ($limit!='') {
			$sql.=" limit $limit";
		}
		$res=mysqli_query($con,$sql);
		$data=array();
		while ($row=mysqli_fetch_assoc($res)) {
			$data[]=$row;
		}
		return $data;
	}
}



?>