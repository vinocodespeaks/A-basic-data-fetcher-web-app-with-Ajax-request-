<?php
if(isset($_POST['file'])&&isset($_POST['type']))
{
  include("connection.php");

  $string[]=" ";
 $result=mysql_query('select value from filerecord where fileName="'.$_POST['file'].'" and type="'.$_POST['type'].'"',$con) or die(  "data doesnt exist in this file  ");
 while($row=mysql_fetch_assoc($result)){
   $str=$row['value'];
//echo $str;
   //echo nl2br($row['value']."\n");

   array_push($string,str_replace(" "," <br ><br> ",$str));

   //print_r( $string);
   ?>
   <?php
 }
//print_r($string);


?>


   <center>
   <table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th><?php echo $_POST['type'];?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php

      foreach ($string as $item) {


      echo '<center><th scope="row">'. $item.'<br><br>'.'</th>
      <th> </th>
      <td></td>
    </tr>
  </tbody>
</table>
</center>';
}
}

// echo join('<br> ', $string);

//array_walk($string, create_function('$a', 'echo $a;'));
?>
