<?php
    function getColaborators(){
		$sql = "SELECT * FROM usersales where role = 'colaborator' order by fullname asc";

		$result = mysql_query($sql);
		$colaborators = array();
		while($row = mysql_fetch_array($result)){
			array_push($colaborators, $row);
		}		
		return $colaborators;
	}
?>