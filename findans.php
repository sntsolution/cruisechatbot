<?php

include "connection.php";

if(isset($_REQUEST["msg"])){	
	$msg=$_REQUEST["msg"];
	$sql_cruise="select * from cruise_master where cname ='".$msg."'";
	$res_cruise=$con->query($sql_cruise);
	$count_cruise=$res_cruise->num_rows;
	if($count_cruise > 0){
		
		$data_cruise=$res_cruise->fetch_assoc();
		$cid=$data_cruise["cid"];
		$json_array["chat"]=array("user"=>$msg,"bot"=>"Welcome to ".$data_cruise['cname']." cruise.Please feel free to ask questions.","cid"=>$cid);	
		echo json_encode($json_array);
	}// cruise count if
	else{
		
		if(!isset($_REQUEST["cid"]) && strtolower($_REQUEST["msg"]) == "hi"){
			//echo "session not set if";
			$msg=$_REQUEST["msg"];
			$sql="select * from faq_master where MATCH (question)AGAINST ('$msg' IN NATURAL LANGUAGE MODE) and cid=0";
			$res=$con->query($sql);
			$count=$res->num_rows;
				if($count > 0){
					//echo "faq count >0 if";
					$data=$res->fetch_assoc();
					$json_array["chat"]=array("user"=>$msg,"bot"=>$data["answer"]);
					echo json_encode($json_array);
					
				}else{
					//echo "faq count >0 else";
					$json_array["chat"]=array("user"=>$msg,"bot"=>"Answer not found in my database. Please try again or email me at info@militarycruisedeals.com");	
					echo json_encode($json_array);
					
				}
		}//session set if
		elseif(isset($_REQUEST["cid"])){
			//echo "session set if";
			$msg=$_REQUEST["msg"];
			$cid=$_REQUEST["cid"];
			if(strtolower($_REQUEST["msg"])=="hi"){
				$sql="select * from faq_master where question='".$msg."' and cid=0";
			}
			else{
				$sql="select * from faq_master where MATCH (question)AGAINST ('$msg' IN NATURAL LANGUAGE MODE) and cid='".$cid."'";
			}
			
			$res=$con->query($sql);
			$count=$res->num_rows;
			if($count > 0){
				//echo "count cid  if";
				$data=$res->fetch_assoc();
				if($data["answer"]== ""){
						$data["answer"]="Answer not found in my database. Please try again or email me at info@militarycruisedeals.com";
					}
				$json_array["chat"]=array("user"=>$msg,"bot"=>$data["answer"]);
				echo json_encode($json_array);
				
			}else{
				$msg=$_REQUEST["msg"];
				if(strtolower($_REQUEST["msg"])=="hi"){
					$sql="select * from faq_master where question='".$msg."' and cid=0 ";
				}else{
					$sql="select * from faq_master where MATCH (question)AGAINST ('$msg' IN NATURAL LANGUAGE MODE) and cid=0 ";
				}
				
				$res=$con->query($sql);
				$count=$res->num_rows;
				if($count > 0){
					//echo "count cid  if";
					$data=$res->fetch_assoc();
					if($data["answer"]== ""){
						$data["answer"]="Answer not found in my database. Please try again or email me at info@militarycruisedeals.com";
					}
					$json_array["chat"]=array("user"=>$msg,"bot"=>$data["answer"]);
					echo json_encode($json_array);
					
				}else{
					//echo "count cid  else";
					$json_array["chat"]=array("user"=>$msg,"bot"=>"Answer not found in my database. Please try again or email me at info@militarycruisedeals.com");	
					echo json_encode($json_array);
					
				}	
				
			}			
		}
		else{
			$msg=$_REQUEST["msg"];
			$json_array["chat"]=array("user"=>$msg,"bot"=>"Answer not found in my database. Please try again or email me at info@militarycruisedeals.com");	
			echo json_encode($json_array);
		
		}// session set else
		
		
	}// cruise count else

	
}// reques msg if
?>