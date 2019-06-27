<!-- includo la connessione al server -->
<?php
include 'db-config.php';

// Connect
$conn = new mysqli ($servername, $username, $password, $dbname);

// Check connecion
if($conn && $conn->connect_error){
  echo ('connection failed:' .$conn->connect_error);
  exit();
}
// controllo se post è vuota
if(!empty($_POST)){
  echo "Si è verificato un errore";
  exit();
}
// recupero i dati provenienti dal posti
$id = intval($_POST['id']);
$room_number = intval($_POST['room_number']);
$floor = intval($_POST['floor']);
$beds = intval($_POST['beds']);

// query per la modifica dei dati
$sql = "UPDATE stanze SET room_number = $room_number, floor = $floor, beds = $beds, updated_at = NOW()
WHERE id = $id";
}

$result = $coon->query($sql);
?>
<!-- includo i layout di head e navbar -->
<?php
  include 'layout/head.php';
  include 'layout/navbar.php';
 ?>
 <div id="main" class="container">
   <div class="row">
     <div class="col-12">

     </div>
   </div>
 </div>
<?php $conn->close(); ?>
