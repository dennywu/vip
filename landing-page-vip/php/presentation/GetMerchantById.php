<?php
	function getMerchant($id){
		$sql = "SELECT m.id,m.name,m.discount,m.description, m.short_desc,m.path FROM merchants m where m.id = $id";

		$result = mysql_query($sql);
		$merchant;
		while($row = mysql_fetch_array($result)){
			$merchant = $row;
		}
		
		return $merchant;
	}
?>