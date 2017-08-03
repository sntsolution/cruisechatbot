 <?php  
 include "connection.php"; 
 if(isset($_REQUEST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM `cruise_master` WHERE cname LIKE '%".$_REQUEST['query']."%' GROUP BY cname";
      if(!$_REQUEST['cid'])
      {
	  	$query1 = "SELECT * FROM `faq_master` WHERE question LIKE '%".$_REQUEST['query']."%' AND cid = 0 GROUP BY question";
	  }else{
	  	$query1 = "SELECT * FROM `faq_master` WHERE question LIKE '%".$_REQUEST['query']."%' AND (cid = ".$_REQUEST['cid']." || cid = 0 ) GROUP BY question";	
	  }  
      $result = mysqli_query($con, $query);
      $result1 = mysqli_query($con, $query1);    
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["cname"].'</li>';  
           }  
      }
      else{
      if(mysqli_num_rows($result1) > 0) 
      {  
           while($row = mysqli_fetch_array($result1))  
           {  
                $output .= '<li>'.$row["question"].'</li>';  
           } 
      }  
      else{
			$output .= '<li>Suggestion Not Found</li>';	  	
	  }
      }
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  