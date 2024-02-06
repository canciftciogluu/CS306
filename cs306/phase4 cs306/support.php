<?php
include "userconfig.php";

$sql_statement = "SELECT * FROM support";

$result = mysqli_query($db, $sql_statement);

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<table class="table table-striped table-bordered ">
  <thead class="thead-dark">
    <tr>
      <th style="width:100px;">#</th>
      <th style="width:300px;" >Sender</th>
      <th >Message</th>
      <th style="width:300px;">Date</th>
    </tr>

  </thead>
  <tbody>
    <?php 
      include "userconfig.php";

      $ref_table = "support";
      $result = $db->query("SELECT * FROM support");

      if($result)
      {
        $id = 1;
        foreach($result as $key=>$row)
        {
          ?>
            <tr>
              
              <td><?=$id?></td>
              <?php
              if($row["author"]==0){
                $row["author"]="client";
	            }
              else if($row["author"]==1){
                $row["author"]="admin";
	            }
              ?>

              <td><?=$row["author"]?></td>
              <td><?=$row["text"]?></td>
              <td><?=$row["date"]?></td>
            </tr>
          <?php
          $id++;
        }
      }
      
    ?>


<center>
<h2 style="text-align:center;font-family:Arial;color:#301934;">What's the problem</h2>
<form action="adminsupportinsert.php" method="POST">

<input type="text" id="id" name="text" placeholder="Type here" ></textarea><br>

<button class="submit">Insert</button>