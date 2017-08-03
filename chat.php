<html>
<head>
<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
@import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
@import url(https://fonts.googleapis.com/css?family=Open+Sans);	
body {
 font-family: 'Open Sans', sans-serif;
  
}
#chatborder {
      
    background-color: #243456;
    border-width: 3px;
    
    width: 316px;
    height: 470px;
}
.chatlog {
   font: 15px arial, sans-serif;
   height: 400px;
   width: 316px;
   
}
#msg {
     font: 17px arial, sans-serif;
    height: 38px;
    width: 100%;
    margin-top: 10px;
    border-radius: 10px;
    text-align: center;
}
.user
{
	background-color: white;
	float: right;
	border-radius: 5px;
    	padding: 13px;
    	color: black;
	border: 5px solid transparent;
     	right: auto;
    	left: -10px;
    	border-right-color: #3588eb;
    	border-left-color: transparent;
	font-family: 'Open Sans', sans-serif;
	margin-left: 42%;
}
.bot
{
    background-color: #2e799b;
    float: left;
    border-radius: 5px;
    padding: 13px;
    opacity: 0.9;
    color:white;
    top: 10px;
    right: -10px;
    border: 5px solid transparent;
    border-left-color: #3588eb;
    font-family: 'Open Sans', sans-serif;
}
#chat{
	overflow-y: auto;
}
#chat::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

#chat::-webkit-scrollbar
{
	width: 5px;
	background-color: #F5F5F5;
}

#chat::-webkit-scrollbar-thumb
{
	background-color: #3588eb;
	border: 1px solid #555555;
	border-radius: 100px;
}
	ul{  
                background-color:#eee;  
                cursor:pointer;  
           }  
           li{  
                padding:7px;  
           }
	
.su::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

.su::-webkit-scrollbar
{
	width: 7px;
	background-color: #F5F5F5;
}

.su::-webkit-scrollbar-thumb
{
	background-color: #3588eb;
	border: 1px solid #555555;
	border-radius:100px;
	
}
.su{
	height: 23%;
	overflow-y: auto;
}
a
{
	color:white;	
}
a:visited { 
    color: white;
}
</style>
<script type="text/javascript">
 $(function () {
	 $("#msg").focus();
	 var initialmsg="<p class='chat-content bot'>Welcome to Millitary cruise deals. Greetings with 'Hi' to know available cruise options.</p>";
 	 $("div#chat").append(initialmsg);
        $('form').bind('submit', function (event) {

		event.preventDefault();// using this page stop being refreshing 
		var msg = $("#msg").val();
          if(msg == "reset"){
          	$("#cid").val("");
          	$("#msg").val("");
          	
		  }
		else if(msg == "" || msg == " "){
		  	$("#msg").val("");
		  }
		else{

          $.ajax({
            type: 'POST',
            url: './findans.php',
            data: $('form').serialize(),
            success: function (response) {
              //alert('form was submitted'+response);
		     $("#msg").val("");
		    $('#chtmsg').fadeOut();
			  var obj = jQuery.parseJSON(response);

			 //var txtval= obj.chat.user +"\n"+ obj.chat.bot +"\n";
		     var txtval="<p class='user'>"+ obj.chat.user +"</p><p class='bot'>"+ obj.chat.bot +"</p>";
			 //alert( obj.chat.user +"\n"+obj.chat.bot+"\n");
			 if(typeof obj.chat.cid != "undefined"){
			 	$("#cid").val(obj.chat.cid);
			 }
			 // $("textarea#chat").append(txtval).html();
		    $("div#chat").append(txtval);
		    $(".msg_container_base").stop().animate({ scrollTop: $(".msg_container_base")[0].scrollHeight}, 1000);
		    $("div#chtmsg").html("");
		     
            }
          });
	}

        });
      });


</script>
</head>
<body>
<form name="chatform">
<div id='chatborder'>
<div class="chatlog msg_container_base" id="chat">
<!--<textarea name="chat" id="chat" cols="60" rows="20"></textarea>-->

</div>
<div class="uinput">
<input name="msg" id="msg" placeholder="Enter message here.." size="50" autocomplete="off" />
<div id="chtmsg" class="su"></div>
</div>	
</div>
<!--<input type="submit" name="submit" value="send"/>-->
<input type="hidden" name="cid" id="cid" />
</form>
</body>
</html>
<script>  
 $(document).ready(function(){  
      $('#msg').keyup(function(){  
           var query = $(this).val(); 
	   var cid = $("#cid").val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search.php",  
                     method:"POST",  
                     data:{query:query,cid:cid},  
                     success:function(data)  
                     {  
                          $('#chtmsg').fadeIn();  
                          $('#chtmsg').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#msg').val($(this).text());  
           $('#chtmsg').fadeOut(); 
	   $("#msg").focus(); 
      });  
 });  
 </script>
