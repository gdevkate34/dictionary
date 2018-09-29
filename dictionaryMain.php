<?php 

$db=mysqli_connect("localhost","root","","dictionary");

if(isset($_POST['store']))
{

  // $bookname=$_POST['bookname'];
  
  $word=$_POST['word'];
 
  $meaning=$_POST['meaning'];
  

  
 $check=mysqli_query($db,"SELECT * FROM `books` WHERE `word`='$word'");
  if(mysqli_num_rows($check)>0)
  {
  	while($data=mysqli_fetch_array($check))
  	{
  		$word1=$data['word'];
  		$meaning1=$data['meaning'];
  		?>
  		<center><i style="color: blue;">Already Present As: </i><b> <?php echo " ".$word1." - ".$meaning1;
  	?></b></center>
  	<?php
  	}
  	
  }
  else
  {
  	$sql="INSERT INTO `books` (`bookname`, `word`, `meaning`) VALUES ('The best laid plans', '$word', '$meaning')";
  mysqli_query($db,$sql);

  }
  
  
  }
  if(isset($_POST['search']))
  {
  	$input=$_POST['searchword'];
  	$query=mysqli_query($db,"SELECT * FROM `books` WHERE `word`='$input' ");
  	// if($query)
  	// {
  	// 	echo '<script>alert("done");</script>';
  	// }
  	// else
  	// {
  	// 	echo '<script>alert(" not done");</script>';
  	// }
  	if(mysqli_num_rows($query)>0)
  	{
  		while($data=mysqli_fetch_array($query))
  		{
  			$searchedword=$data['word'];
  			$searchedmeaning=$data['meaning'];
  			?>
  			<center>
  				<div>
  					<b style="color: blue;font-size: 20px"><?php echo $searchedword." - "; ?> </b>
  					<i style="font-size: 20px"><?php echo $searchedmeaning; ?></i>
  				</div>
  			</center>
  			<?php
  		}
  	}
  	else
  	{
  		header("Location: https://www.google.co.in/search?hl=en-IN&rlz=1C1CHBD_enIN776IN776&q=Dictionary#dobs=".$input);
  	}
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dictionary</title>
</head>
<style type="text/css">
	input[type=text], select {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 20%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

div {
	width:50%;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}


input[type=submit]:hover {
    background-color: #5A8CEE;
}

</style>
<body>

	<center>
		<div style="font-family: Times New Roman">
		<h1>My Dictionary</h1>
		<form method="post">
			<input type="text" name="searchword" placeholder="Search Words">
			<input type="submit" name="search" value="SEARCH">
		</form>
		<br>
		<form method="post">
			
			<input type="text" name="bookname" placeholder="Book Name" value="The best laid plans" disabled>
			<br><br>
		
			<input type="text" name="word" placeholder="Word" >
			<br><br>
			
			<input type="text" name="meaning" placeholder="Meaning">			
			<br><br>
			<input type="submit" name="store" value="Store">
			

		</form>
		<a href="mywords.php"><input  type="submit" name="MyWords" value="My Words"></a>

	</div>

	</center>
	

<?php 
// mysqli_connect("")
?>
</body>
</html>