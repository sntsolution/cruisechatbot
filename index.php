<html>
<head>
<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
#chatborder {
      
    background-image: url('img/bkground.jpg');
    border-width: 3px;
    margin-top: 20px;
    margin-bottom: 20px;
    margin-left: 20px;
    margin-right: 20px;
    padding-top: 10px;
    padding-right: 20px;
    padding-left: 15px;
    border-radius: 15px;
    width: 298px;
    height: 470px;
    
}
.chatlog{
		height: 400px;
   		width: 268px;
   		padding-top:400px;
}
.button {
    display: block;
   text-decoration: none;
    background: #4E9CAF;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}


/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<script>
$(document).ready(function() {
    //set initial state.
   

    $('#chatswitch').change(function() { 
           
            var returnVal = confirm("Are you sure?");
           
            if (returnVal == true && this.checked) {
			     $(this).toggle();
			     if(this.checked){
				 	 $("#chatframe").prop('src','https://testgreeting.herokuapp.com/chat.php');
				 }else{
				 	$("#chatframe").prop('src','');
				 }
			     
			} 
			else if(returnVal == true && !this.checked){
				$(this).toggle();
			     if(this.checked){
				 	 $("#chatframe").prop('src','https://testgreeting.herokuapp.com/chat.php');
				 }else{
				 	$("#chatframe").prop('src','');
				 }
				
			}
			else{
				
				if(this.checked){
					$(this).prop('checked','true');
				}
				else{
					$(this).prop('checked','false');
				}
			}    
        
                
    });
});
</script>
</head>
<body>
<iframe id="chatframe" src="https://testgreeting.herokuapp.com/chat.php" width="24%" height="85%" frameborder="0" scrolling="no" style="margin:10px"></iframe>
<div style="height: 400px;">
<label class="switch">
  <input type="checkbox" id="chatswitch" checked="true">
  <span class="slider round"></span>
</label>
</div>
</body>
</html>
