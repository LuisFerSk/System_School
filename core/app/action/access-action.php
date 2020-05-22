<?php
if (isset($_GET["opt"])&& $_GET["opt"]=="login") {
	if ($_POST["username"]!= ""&&$_POST["password"]!="") {
		$db=new Database();
		$con=$db->getCon();
		$sql="SELECT * from usuarios where username=\"$_POST[username]\" and password=\"".sha1(md5($_POST["password"]))."\"";
		$query=$con->query($sql);
		$user=null;
		if ($query) {
			$user=$query->fetch_array();
			if ($user!=null) {
				$_SESSION["user_id"]=$user["id_prof"];
				Core::redir("./");
			}
		}
		if ($user==null) {
			Core::alert("Datos incorrectos!");
			Core::redir("./");
		}
	}else
	Core::alert("Datos Vacios");
	Core::redir("./");
}
if (isset($_GET["opt"])&&$_GET["opt"]=="logout") {
	session_destroy();
	Core::redir("./");
}
?>