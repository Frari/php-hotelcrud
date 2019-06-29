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
if(empty($_POST)){
  echo "Si è verificato un errore";
  exit();
}
// recupero i dati provenienti dal post
$room_number = intval($_POST['room_number']);
$floor = intval($_POST['floor']);
$beds = intval($_POST['beds']);

$sql = "INSERT INTO stanze (room_number, floor, beds, created_at, updated_at) VALUES ($room_number, $floor, $beds, NOW(), NOW())";

$result = $conn->query($sql);
 ?>
<!-- includo i layout di head e navbar -->
<?php
 include 'layout/head.php';
 include 'layout/navbar.php';
?>
<div id="main" class="container">
  <div class="row">
    <div class="col-12">
      <!-- condizioni per il successo o no della modifica -->
      <?php if($result) { ?>
       <h1>Nuova stanza creata con successo!</h1>
     <?php } else { ?>
       <h1>Si è verificato un errore. Riprova o contatta l'amministratore.</h1>
     <?php } ?>
     <a href="index.php" class="btn btn-primary">Torna alla home</a>
    </div>
  </div>
</div>
<?php $conn->close(); ?>
