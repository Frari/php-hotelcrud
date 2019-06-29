<?php
include 'db-config.php';

// Connect
$conn = new mysqli ($servername, $username, $password, $dbname);

// Check connecion
if($conn && $conn->connect_error){
  echo ('connection failed:' .$conn->connect_error);
  exit();
}
// variabile per intercettare il valore in get del click pulsante cancella
$id_stanza = intval($_GET['id']);

$sql = "DELETE FROM stanza WHERE id = $id_stanza";

$result = $conn->query($sql);

?>
<?php
 include 'layout/head.php';
 include 'layout/navbar.php';
?>
<div id="main"class="container">
  <div class="row">
    <div class="col-12">
      <?php if($result){?>
        <h1>Stanza cancellata</h1>
      <?php } else{ ?>
        <h1>Si è verificato un errore. Riprova o contatta l'amministratore.</h1>
      <?php } ?>
      <a href="index.php" class="btn btn-primary">Torna alla home</a>
    </div>
  </div>
</div>


<?php $conn->close(); ?>
