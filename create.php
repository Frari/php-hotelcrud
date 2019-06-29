<?php
  include 'layout/head.php';
  include 'layout/navbar.php';
 ?>

 <div id="main" class="container">
   <div class="row">
     <div class="col-12">
       <h1>creazione stanza</h1>

       <form action="create_manager.php" method="post">
         <div class="form-group">
           <label for="room_number">Numero stanza:</label>
           <input type="text" name="room_number" placeholder="inserisci numero stanza">
         </div>
         <div class="form-group">
           <label for="floor">Piano:</label>
           <input type="number" name="floor" placeholder="inserisci piano stanza">
         </div>
         <div class="form-group">
           <label for="beds">Numero posti letto:</label>
           <input type="number" name="beds" placeholder="insrisci posti letto stanza">
         </div>
         <div class="form-group">
           <input type="submit" value="Crea" class="btn btn-success">
         </div>
       </form>

     </div>
   </div>
 </div>
 <?php $conn->close(); ?>
