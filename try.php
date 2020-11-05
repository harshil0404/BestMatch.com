<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script type="text/javascript" language="JavaScript" src="main.js?v=<?php echo time(); ?>"></script> -->
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<script>
    $(document).ready(function(){
  $("form").submit(function(e){
      $.ajax({
          type: "POST",
          url: "likes.php",
          data: $('.ajax').serialize(),
      })

      document.querySelector('p').innerText = parseInt(document.querySelector('p').innerText) + 1;
      e.preventDefault();
  });
});
</script>
<body>
    <!-- <a>hide</a> -->
    <!-- <div > -->
        <form class="ajax">
            <!-- <input type="text" name="name"> -->
            <input type="number" name="age">
            <input type="submit"  value="edit" >
        </form> 
        <!-- <p>harshil soni</p> -->
        <p>0</p>
    <!-- </div> -->
</body>
</html>
<?php
// echo "hello";
?>