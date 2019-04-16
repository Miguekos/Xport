<?php


		$p = UserData::getById($_POST["id"]);
		$p->name = $_POST["name"];
		$p->lastname = $_POST["lastname"];
		// $p->username = $_POST["username"];
		$p->email = $_POST["email"];
		$p->password = $_POST["password"];
		$p->kind = $_POST["kind"];
		$p->status = isset($_POST["status"])?1:0;
		
		$p->update();



		if($_POST["password"]!=""){
		$p = UserData::getById($_POST["id"]);
		$p->password= sha1(md5($_POST["password"]));
		$p->update_passwd();

		}



		Core::redir("./?view=edituser&id=".$_POST["id"]);
?>