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
// variabile per intercettare il valore in get del click pulsante modifica
$id_stanza = intval($_GET['id']);

$sql = "SELECT * FROM stanze WHERE id = $id_stanza";
$result = $conn->query($sql); //se va in errore la query ritorna FALSE
?>
<!-- includo i layout di head e navbar -->
<?php
  include 'layout/head.php';
  include 'layout/navbar.php';
 ?>
<div id="main" class="container">
  <div class="row">
    <div class="col-12">
      <h1>modifica stanza <?php echo $id_stanza  ?></h1>

      <?php
      if($result) {
        if($result->num_rows > 0) {
          while($row = $result -> fetch_assoc()){ ?>
            <form action="edit_manager.php" method="post">
              <input type="hidden" name="id" value="<?php $row['id']; ?>">
              <div class="form-group">
                <label for="room_number">Numero stanza:</label>
                <input type="text" name="room_number" value="<?php echo $row['room_number']; ?>" placeholder="numero">
              </div>
              <div class="form-group">
                <label for="floor">Piano:</label>
                <input type="number" name="floor" value="<?php echo $row['floor']; ?>" placeholder="piano">
              </div>
              <div class="form-group">
                <label for="beds">Numero posti letto:</label>
                <input type="number" name="beds" value="<?php echo $row['beds']; ?>" placeholder="posti letto">
              </div>
              <div class="form-group">
                <input type="submit" name="" value="salva" class="btn btn-success">
              </div>
            </form>
            <?php
          }
        } else {
          echo '0 results';
        }
      } else {
        echo 'query error';
      }
       ?>

    </div>
  </div>
</div>
<?php $conn->close(); ?>
