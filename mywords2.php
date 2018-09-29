<!DOCTYPE html>
<html>
<head>
	<title>Dictionary - My Words</title>
</head>
<style type="text/css">
	div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
input[type=submit] {
    width: 30%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

</style>
<body>
<div>
	<?php 

		$db=mysqli_connect("localhost","root","","dictionary");
		$number=mysqli_query($db,"SELECT * FROM `books`");
		$noOfWords=mysqli_num_rows($number);

	?>
	


<select id="animal" name="animal">                      
  <option value="0">--Select Animal--</option>
  <option value="Cat">Cat</option>
  <option value="Dog">Dog</option>
  <option value="Cow">Cow</option>
</select>
<?php 
if($_POST['submit'] && $_POST['submit'] != 0)
{
   $animal=$_POST['animal'];
}
echo $animal;
?>
	<a href="pdf.php" style="float: right;">Print</a>
	<center>
	<a href="dictionaryMain.php"><input type="submit" name="goback" value=" &#8617  Go back ! Add New Words ! "></a>
</center>
	

</div>
<br>
<div>
	<?php 

		$db=mysqli_connect("localhost","root","","dictionary");
		
		$sql=mysqli_query($db,"SELECT * FROM `books` ORDER BY id DESC");
		if($rows=mysqli_num_rows($sql)>0)
		{
			
			while($data=mysqli_fetch_array($sql))
			{
				$bookname=$data['bookname'];
			$word=$data['word'];
			$meaning=$data['meaning'];
			$id=$data['id'];
			

			

		
				?>
				<div>
			<a href="mywords.php?rem=<?php echo $id; ?>">&#10060;</a>
			<b style="font-family: monospace;font-size: 25px"> <?php echo $word; ?></b> - <i style="font-family: monospace;font-size: 20px"></i>
			<?php echo $meaning; ?>

			<b style="font-family: monospace;font-size: 10px;float:right"><?php echo $bookname; ?> </b><br>
			<br></div>

			<?php

			
			}
			
			
		}
		else
		{
			echo "No Words stored till now ! Go and add new words !";
		}
		if(isset($_GET['rem']))
			{

			  $id=$_GET['rem'];
			  mysqli_query($db,"DELETE FROM books WHERE id=$id");
			  
			}


	?>
</div>
</body>
</html>