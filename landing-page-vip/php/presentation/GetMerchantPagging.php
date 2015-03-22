<?php
	
	function getMerchants($offset){
		$offset = $offset * 12;
		$sql = "SELECT m.id,m.name,m.discount,m.short_desc,m.path FROM merchants m ORDER BY RAND() LIMIT 12 offset $offset";
        $result = mysql_query($sql);
        $merchants = array();
        while($row = mysql_fetch_array($result)){
            array_push($merchants, $row);
        }
        return $merchants;
    }
	
	function getMerchantsByCategory($cateId, $offset){
		$offset = $offset * 12;
		$sql = "SELECT m.id,m.name,m.discount,m.short_desc,m.path FROM merchants m where m.category_id = ' $cateId' ORDER BY RAND() LIMIT 12 offset $offset";
        $result = mysql_query($sql);
        $merchants = array();
        while($row = mysql_fetch_array($result)){
            array_push($merchants, $row);
        }
        return $merchants;
	}
	
	function getMerchantsByKeyword($keyword){
		$sql = "SELECT m.id,m.name,m.discount,m.short_desc,m.path FROM merchants m where m.name like '%$keyword%' ORDER BY RAND() LIMIT 12";
        $result = mysql_query($sql);
        $merchants = array();
        while($row = mysql_fetch_array($result)){
            array_push($merchants, $row);
        }
        return $merchants;
	}
	
	function countMerchants($category){
        if($category == ''){
            $qry = "select count(*) as total from merchants";
        }
        else{
			$qry = "select count(*) as total from merchants where category_id = '$category'";
        }
        $result = mysql_query($qry);
        $total;
        while($row = mysql_fetch_array($result)){
            $total = $row['total'];
        }
        return $total;
    }
?>