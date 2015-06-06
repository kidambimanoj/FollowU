<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<!-- saved from url=(0045)http://spotmyphotos.com/dm.php?uid=KyrZ5rFQNJ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>VStalk4U</title>

<meta name="Author" content="httphotos">
<style type="text/css">
	h2 {
		display: block;
		color:  rgb(0, 0, 0);
		font-size: 16px;
		font-weight: bold;
		letter-spacing: 4px;
		text-align: left;
		height: 21px;
		position: relative;
	}
	h3 {
		display: block;
		color:  rgb(84, 84, 84);
		font-size: 25px;
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
</style>
</head>
<body>


<center><h1>VStalk4U</h1>
</center>


<hr width="100%">

<div>

<table class="center">
<?php
//Open images directory

$count=0;
$stalkee=base64_decode($_GET['se_id']);
//echo $user_id;
$dir = "/var/www/html/stalkee_photos/".$stalkee;

$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
    if($filename!="." && $filename!=".." ){
        $image_name = "/stalkee_photos/".$stalkee."/".$filename;
        $count++;?><td>   
        <a href="photo.php?e=<?php echo base64_encode($stalkee);?>&m=<?php echo base64_encode($filename);?>"><img src="<?php echo $image_name?>" width="204" height="136" border ="1" bordercolor="#000000" ></a></td><?php if($count>3) {$count=0;?> </tr><tr><?php 
	 }
					
				}
}
	 
 
      
    
?>
</table>


