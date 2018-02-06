<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<meta charset="utf-8">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 Latest compiled and minified JavaScript -->

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title"> Instant Data Fetcher</span>
      <!-- Add spacer, to align navigation to the right -->


    </div>
  </header>
</div>
<!-- Wide card with share menu button -->
<style>
.select{
  text-align: center;
}
.select1{
  padding-left: 17em;
  padding-top: 4em;
}
.demo-card-wide.mdl-card {
  width: 612px;
  height: 400px;

}
 .mdl-card__title {
  color: #00000;


}
.he{
  text-align: center;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
.pages{
  padding-right: 10em;
}
.card1{
  height: 400px;

  padding-top: 10em;
  padding-left: 30em;
  padding-bottom: 2em;

}
.lables{
  padding-right: 20em;
}
</style>

<div class="card1">
<div class= "  demo-card-wide mdl-card mdl-shadow--6dp">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text"></h2>
  </div>

  <div class=" he mdl-card__supporting-text">
    select file
  </div>
  <?php
  include("connection.php");
  mysql_select_db("nlp",$con);
  $result=mysql_query("select distinct fileName from filerecord",$con);
  if($result === FALSE) {

      die(mysql_error()); // TODO: better error handling
  }
  ?>

  <!-- Simple Select with arrow -->
  <!-- Select with floating label -->



  <div id="select">
  <div class="select">
    <!-- Select with fixed height -->
    <!-- Simple Select -->
  <select>



    <?php
    $i=0;
    while($data=mysql_fetch_row($result))
    {

    $array=array();
    $array=explode(" ",$data[0]);

      //array_push($array,$i);
    //echo count($array)." ";
    //echo $array[0]." ";
//$i++;
echo $array[0];
    //echo $array[0];

  echo'  <option id="select"   value='.$array[0].'> '. $array[0].'</option>';

}
?>

</select>
</div>

  </DIV>
  <div class="select1">
    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
  <input  name="type"type="radio" id="option-1" class="mdl-radio__button" name="options" value="people" checked>
  <span class="mdl-radio__label">people</span>
</label><br>
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
  <input name="type" type="radio" id="option-2" class="mdl-radio__button" name="options" value="date">
  <span class="mdl-radio__label">date</span>
</label><br>
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3">
  <input name="type" type="radio" id="option-3" class="mdl-radio__button" name="options" value="rupees">
  <span class="mdl-radio__label">Rupees</span>
</label><br>
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-4">
  <input  name="type"type="radio" id="option-4" class="mdl-radio__button" name="options" value="organisation">
  <span class="mdl-radio__label">organisation</span>
</label>
  </div>

     <!-- Accent-colored raised button -->

     <div class="select1">
<button id="btn-submit"class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
  submit
</button>
</div>


    </div>
  </div>
</div>
</div>
<div id="page">

</div>
<script>
$(document).ready(function(){
console.log("document start")
  $("#btn-submit").click(function(){
    var selectedFile =$("div#select select").val()
    var selectedTypes;
    $('input[name="type"]:checked').each(function(){
      selectedTypes=this.value
    })
console.log(selectedTypes)
  console.log(selectedFile)

             $.ajax({
                 url: 'display.php',
                 type: 'post',
                 data: { file:selectedFile,
                 type:selectedTypes },
                 success:function(data){
 $("#page").html(data);
 console.log(data)
                 }
             });
  })
}
)
</script>
