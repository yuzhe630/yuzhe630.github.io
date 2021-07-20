<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta name="generator" content="jemdoc, see http://jemdoc.jaboc.net/" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="jemdoc.css" type="text/css" />
<link rel="shortcut icon" href="img/icon-ieee.png" />
<link rel="stylesheet" href="css/jemdoc.css" type="text/css" />
<link rel="stylesheet" href="css/myExtra.css" type="text/css" />
<title>TC-CPS</title>
</head>

<style>
.error {color: #FF0000;}
</style>

<?php

$nameErr = "";
$name = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "";
   } else {
     $name = test_input($_POST["name"]);
   }
   
}


error_reporting(0);
if(!empty($_POST) )
{
	if(!empty($_POST["Email"]))

	{

		$file_path = './regist/data.txt';

		if(file_exists($file_path))

		{

			$str = file_get_contents($file_path);

			$ssss = strstr($str,$_POST['Email']);

			echo "<script>alert(ssss);</script>";

			if(strstr($str,$_POST['Email']) == false)

			{

				if(!empty($_POST["First-name"]) && !empty($_POST["Last-name"])  && !empty($_POST["University"]) && !empty($_POST["Email"]) && !empty($_POST["Country"]))
				{
					//open file
					$file = fopen('./regist/data.txt', 'a+');

					//write
					if($file)
					{
						$str = '' . $_POST['First-name'] . "    ";
						$str .= '   ' . $_POST['Last-name'] . "    ";
						$str .= '   ' . $_POST['institute to Organization'] . "    ";
						$str .= '   ' .  $_POST['Email'] . "    ";
						$str .= '   ' .  $_POST['Country'] . "   ";
						$str .= '   ' .  $_POST['Homepage'] . "   ";
						$length = fwrite($file, $str."\r\n");
						if($length > 10)
						{
                            echo "<script>alert('Success! TC will review your application and the TC membership page will be updated in one month.');</script>";
						}
						else
						{
							echo "<script>alert('Save failed.');</script>";
						}
						fclose($file);
					}
					else
					{
						echo "<script>alert('Open File failed.');</script>";
					}
				}
			}
			else echo "<script>alert('Email already exist.');</script>";
		}
	}
}
?>

<!--
<html>

<head>

    <title>Creat TypeForm</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

-->
<body>
<div id="layout-content">
<h1>Complete TC members </h1>
<form name='info' action='' method='post'>
    <p>First-name:
	<input type="text" name = 'First-name' required="required"><span class="error">* <?php echo $nameErr;?></span></input>
    </p>
    <p>Last-name:
	<input type="text" name = 'Last-name' required="required"><span class="error">* <?php echo $nameErr;?></span></input>
    </p>
    <p>University or Institute:
	<input type="text" name = 'University' required="required"><span class="error">* <?php echo $nameErr;?></span></input>
    </p>
    <p>Email:
	<input type="text" name = 'Email' required="required"><span class="error">* <?php echo $nameErr;?></span></input>
    </p>
    <p>Country:
	<input type="text" name = 'Country' required="required"><span class="error">* <?php echo $nameErr;?></span></input>
    </p>
    <p>Homepage or linkedin page:
	<input type="text" name = 'Homepage'><span class="error"> <?php echo $nameErr;?></span></input>
	<p></p>
    <input type = 'submit' name = 'submit' value = 'Submit' onClick()=/>
</form>
</div>
</body>
</html>
