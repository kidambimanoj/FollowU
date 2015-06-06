<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="Author" content="httphotos">

<title>VStalk4U</title>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<style type="text/css">
	h2 {
		display: block;
		color:  rgb(0, 0, 0);
		font-size: 32px;
		font-weight: bold;
		letter-spacing: 4px;
		text-align: left;
		height: 21px;
		position: relative;
	}
	h3 {
		display: block;
		color:  rgb(84, 84, 84);
		font-size: 20px;
		font-weight: bold;
		
		
	}
	h1{
		color:  rgb(0, 0, 0);
		font-size: 30px;
	}
	
	
	a, a:link,a:visited,a:active { 
		color:  rgb(0, 0, 0);
		text-decoration: none; 
	} 
	a:hover {
		color: rgb(0, 0, 0);
		text-decoration: none;
	}
	body {
		font-family: Trebuchet MS, sans-serif; font-size: larger;
		margin-bottom: 20px;
		margin-top: 0px;
		color: rgb(102, 0, 0);
		background-image: url("background.jpg"); background-repeat: repeat;
	}
	td {
		 
	}
	
	table.center {margin-left:auto; margin-right:auto;}
	#httphotos {
		position: absolute;
		right: 0px;
		bottom: 20px;
		margin: 0px;
		padding: 0px;
	}

	#httphotos img {
		border: 0px;
	}
	
	b{
		color: rgb(0, 0, 0);
	}

	.icons {
		font-size: 0;
	}

	.icons .fa {
		cursor: pointer;
	}

	.icons .fa, .icons .text {
		display: inline-block;
		vertical-align: top;
		font-size: 40px;
		line-height: 100%;
		margin-right: 15px;
	}

	.icons .text {
		font-size: 20px;
		line-height: 40px;
		margin-right: 10px;
	}
</style>
</head>
<body>

<center><h1>VStalk4U</h1>
</center>


<hr width="100%">

<div>

<table class="center">

</table>
<?php
$count=0;
$stalkee = base64_decode($_REQUEST['e']);
$image_name = base64_decode($_REQUEST['m']);	
$file_name = "/stalkee_photos/".$stalkee."/".$image_name;
//echo $user_id;

     ?> 
    <center>
    	<img src="<?php echo $file_name; ?>" alt="" class="deco"  width="600" height="400" border="1" bordercolor="#000000">
    	<div class="icons">
    		
                <a class="fa fa-download" onclick="startDownload();"></a>
    	</div>
        
	</center>
		<br/><br/>
        <center><h1><a href="gallery.php?se_id=<?php echo $_REQUEST['e'] ?>"> <u>BACK TO GALLERY!</u>! </a></h1></center><br />
         
      
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.js"></script>
<script type="text/javascript">
		
                
                
                function startDownload()
{
   
var url="<?php echo $file_name;?>"; 
//window.open(url,'Download');
window.location=url;
}


function display()
{
    var text='POSTING TO INSTAGRAM';
    var bold_text=underline(text);
   window.alert(text+'\n\n\
Step 1: Download photo to phone\n\
Step 2: Open Instagram App\n\
Step 3: Browse to photo and post\n\
');
}

function underline(s) {
    var arr = s.split('');
    s = arr.join('\u0332');
    if (s) s = s + '\u0332';
    return s;
}
</script>


<br />

</div></body></html>


