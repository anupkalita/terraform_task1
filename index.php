<html>
 	<head>
  		<title>PHP test</title>
 	</head>
 	<body>
<?php
			$conn = new mysqli(dbhost, mysql_user, mysql_password, 'mydb');
			if($conn -> connect_error){
				echo "\nError: Unable to connect: " .$conn -> connect_error;
			}
			echo "Connected to the database successfully";

$sql1 = "CREATE TABLE IF NOT EXISTS person( id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50), age INT);";
if ($conn->query($sql1) === TRUE) {
          echo "\nTable MyGuests created successfully";
} else {
          echo "Error creating table: " . $conn->error;
}

            if($_REQUEST['name']){
                $name =  $_REQUEST['name'];
                $age = $_REQUEST['age']; 
                // Performing insert query execution
                $sql = "INSERT INTO person(name,age)  VALUES ('$name', '$age')";
                if(mysqli_query($conn, $sql)){
                    echo "<h3>data stored in a database successfully.";
                } else{
                    echo "ERROR: Hush! Sorry $sql. " 
                        . mysqli_error($conn);
                }
    			$conn->close();
            }
    		
		?>
		<form method = "post" action = "index.php">
         	<table>
            		<tr>
               			<td>Name:</td> 
               			<td><input type = "text" name = "name"></td>
            		</tr>
            		<tr>
               			<td>Age</td>
               			<td><input type = "text" name = "age"></td>
           		 </tr>
            		<tr>
               			<td>
                  		<input type = "submit" name = "submit" value = "Submit"> 
               			</td>
            		</tr>
         	</table>
      		</form>
 	</body>
</html>