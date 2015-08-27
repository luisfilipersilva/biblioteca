<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>ajaXray : Interactive Jquery character limit for textarea </title>
<script  language="javascript" src="../jquery-1.3.2/jquery-1.3.2.js"></script>
<script language="javascript">
function limitChars(textid, limit, infodiv)
{
	var text = $('#'+textid).val();	
	var textlength = text.length;
	if(textlength > limit)
	{
		$('#' + infodiv).html('Voce não pode escrever mais do que '+limit+' caracteres!');
		$('#'+textid).val(text.substr(0,limit));
		return false;
	}
	else
	{
		$('#' + infodiv).html('Caracteres restantes: '+ (limit - textlength) + '.');
		return true;
	}
}

$(function(){
 	$('#comment').keyup(function(){
 		limitChars('comment', 20, 'charlimitinfo');
 	})
});

</script>
</head>
<body>

<form name="journal-comment" style="background-color:#eeeeee; border:1px solid #cccccc; width:500px; height:300px; margin:20px auto; padding:0px">
<h2 style="padding:3px; margin:0px; background-color:#666666; color:#eeeeee ">Interactive Jquery character limit for textarea.</h2>
	<div style="padding:10px">
		<label>Write a comment:</label><br />
		<textarea name="comment" id="comment" rows="6" cols="50"></textarea><br />
		<span id="charlimitinfo" style=" float:left; color:#aa3333; font-size:15px; font-family:vardana" >Write your comment within 20 characters.</span> 
	</div>
	<div style="float:right; padding:2px; margin-top:85px "><a href="http://www.ajaxray.com">www.ajaXray.com</a></div>
</form>
</body>
</html>
