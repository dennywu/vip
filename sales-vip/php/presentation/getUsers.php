<?php
    function getUsers(){
		$sql = "SELECT u.*, COALESCE(p.fullname,'') as parentname FROM usersales as u left join usersales as p on u.parent = p.username order by parent asc, username asc, fullname asc";

		$result = mysql_query($sql);
		$users = array();
		while($row = mysql_fetch_array($result)){
			array_push($users, $row);
		}		
		return $users;
	}
?>