<?php
    $host = 'mysql.metropolia.fi';
    $dbname = ''; // your username
    $user = ''; // your username
    $pass = ''; // your database password
	
   // TODO: get the data from the form by using $_POST
   $data = array();
   $data['name'] = $_POST['name'];
   $data['description'] = $_POST['desc'];
   $data['email'] = $_POST['email'];
   $data['phone'] = $_POST['cell'];
   $date = $_POST['date'];
   $time = $_POST['time'];
   // this is how you convert the date from the form to SQL formatted date:
   // date ("Y-m-d H:i:s", strtotime(dataFromDateField.' '.dataFromTimeField));
   $data['sqlDate'] = date ("Y-m-d H:i:s", strtotime($date.' '.$time));;
   
   
// this part was in dbConnect.php in last period:
try {

	$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$DBH->query("SET NAMES 'UTF8';");

}catch(PDOException $e) {

	echo "Could not connect to database.";
	file_put_contents('log.txt', $e->getMessage(), FILE_APPEND);
}

    
try {
	// TODO: insert the data from the form to database table 'calendar'
	$STH = $DBH->prepare("INSERT INTO calendar (eName, eDescription, pEmail, pPhone, eDate) VALUES
	(:name, :description, :email, :phone, :sqlDate);");
	$STH->execute($data);

} catch (PDOException $e) {
	echo 'Something went wrong';
	file_put_contents('log.txt', $e->getMessage()."\n\r", FILE_APPEND); // remember to set the permissions so that log.txt can be created
}
?>