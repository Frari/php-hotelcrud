<?php
$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'db_hotel';

// Connect
$conn = new mysqli ($servername, $username, $password, $dbname);

// Check connecion
if($conn && $conn->connect_error){
  echo ('connection failed:' .$conn->connect_error);
  exit();
}

$sql = 'SELECT room_number, floor FROM stanze';
$result = $conn->query($sql); //se va in errore la query ritorna FALSE

if($result) {
  if($result->num_rows > 0) {
    while($row = $result -> fetch_assoc()){
      echo 'id '.$row['id'].'Stanza n.'.$row['room_number'].' piano:'.$row['floor'].'posti letto: '.$row['beds'];
      echo '<br.>';
    }
  } else {
    echo '0 results';
  }
} else {
  echo 'query error';
}


/*if($result && $result->num_rows > 0){
  // output data of each row
  while($row = $result->fetch_assoc()){
    echo 'Stanza n.'.$row['room_number'].'piano:'.$row['floor'];
    echo '<br>';
  }
}elseif($result){
  '0 results';
}else{
  echo 'query error';
}*/
$conn->close();

 ?>
