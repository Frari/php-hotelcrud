<?php
include 'db-config.php';

// Connect
$conn = new mysqli ($servername, $username, $password, $dbname);

// Check connecion
if($conn && $conn->connect_error){
  echo ('connection failed:' .$conn->connect_error);
  exit();
}
// variabile per intercettare il valore in get del click pulsante dettegli
$id_stanza = intval($_GET['id']);

$sql = "SELECT * FROM stanze WHERE id = $id_stanza";
$result = $conn->query($sql); //se va in errore la query ritorna FALSE
 ?>
 <!-- includo il file con la parti di html per potrli riutilizzare nelle altre pagine-->
<?php
  include 'layout/head.php';
  include 'layout/navbar.php';
 ?>
<div id="main" class="container">
  <div class="row">
    <div class="col-4">
      <h1>Stanza id: <?php echo $id_stanza ?></h1>
      <?php
      if($result) {
        if($result->num_rows > 0) {
          while($row = $result -> fetch_assoc()){ ?>
            <!-- creo la card con Bootestrap -->
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Stanza numero: <?php echo $row['room_number']; ?></h5>
                <p class="card-text">
                  <ul>
                    <li><strong>Piano: </strong><?php echo $row['floor']; ?></li>
                    <li><strong>Posti letto: </strong><?php echo $row['beds']; ?></li>
                    <li><strong>Inserimento: </strong><?php echo $row['created_at']; ?></li>
                    <li><strong>Iggiornamento: </strong><?php echo $row['updated_at']; ?></li>
                  </ul>
                </p>
                <a href="index.php" class="btn btn-primary">Torna alla Home</a>
              </div>
            </div>
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
