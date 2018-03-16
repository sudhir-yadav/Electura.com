<?php
   if($GET) {
    require('../../elec_core/elec_config.php'); 
    $groupID=$_GET['a'];
    
	mysql_connect(DB_SERVER, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	$query = "select * from electura_image_comments where fileID='$groupID'";
	$result = mysql_query($query1);
	$numResult=mysql_num_rows($result);

	if($numResult==0) {
		echo "No comments have been made yet. Be the first one to comment.";
	}

	while($row = mysql_fetch_array) {
		$userNameQuery="select user_name from electura_user where user_id='".$row['user_id']."'";
		$userNameResult=mysql_query($userNameQuery);

		while($res=mysql_fetch_array($userNameResult)) {
			$userName=$res['user_name'];
		}
	}

	echo "Comment:".$row['commentDesc'];
	
}
//echo "from the php file".$comment;

?>