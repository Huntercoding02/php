<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>try</title>
</head>
<body>
    <h1>METHODS</h1>
    <button id="must" a href="you.php">1.Click to table page method ajax</button><br><br>
    <button onclick='window.location.href = "show-table.php"'>
  2.Click method onclick
</button><br><br>
    <a href="show-table.php">3.link href</a>
</body>
</html>
<script>

    
        $('#must').click(function(){
           window.location.href="show-table.php"
        })
   
</script>