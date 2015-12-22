
<?php
	$this_php_file_charset = 'utf-8';
	require_once('conn.php');
	header('Content-type:text/json'); 
	
	class Map{
		public $id,$name,$cnname,$score,$des,$workshop,$d1,$d2;
	}
	
	$sql = "select * from l4d2";
	$res = mysql_query($sql,$db);
	
	$arr=array();
	
	while ($row=mysql_fetch_object($res)) {
		$m=new Map();
		$m->id=$row->id;
		$m->name=$row->name;
		$m->cnname=$row->cnname;
		$m->score=$row->score;
		$m->des=$row->des;
		$m->workshop=$row->workshop;
		$m->d1=$row->d1;
		$m->d2=$row->d2;
		$arr[]=$m;
	}
	$str = "var data = ".json_encode(array('list'=>$arr));

//	echo $str;

	file_put_contents("maps.js",$str); 
	mysql_free_result($res);
	mysql_close($db);
?>
