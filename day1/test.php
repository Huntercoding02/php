<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  "TEST PHP"?></title>
    
        <link rel="stylesheet" href="css/style.css" />
    
</head>
<body>
    <?php
    echo "999"
    ?>
    <h1>html</h1>
   <div id="div_1" class="txt_color css_border css_back"
   onclick="clickx(this)">
    Div1
   </div >
   <br>
   <div id="div_2" class="css_back css_border" onclick="clickx(this)">
    Div2
   </div>
   <br>
   <br style="clear: both" >
   <br>
   <br>
   <span id="div_3" class="css_back css_border" onclick="clickx(this)">
    span1 
   </span>
   <span id="div_4" class="css_back css_border" onclick="clickx(this)">span2
   </span>
   <script>
    function clickx(elm_id){
        console.log(elm_id)
    elm_id.innerHTML 
        = "New Tech"

    }
    
   </script>
</body>
</html>

<?php
function loop($y){
   for($x=1;$x<=$y;$x++){     
        for($i=1;$i<=$x;$i++){
            echo '*';
        }
        echo '<br>';
   }
}

loop(5);

?>