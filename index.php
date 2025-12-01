<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    label
    {
        font-weight: bold;
      font-size: 30px;
    }
    form{
        width: 20%;
        margin-left: 25%;
        background-color: rgb(66, 94, 95,0.5);
        border-radius: 10px;
        padding: 10%;
    }
    input{
        border:2px rgb(24, 24, 133) solid;
        border-radius: 5px;
        width: 100%;
        height: 25px;
    }
    button{
       height: 30px;
       padding: 5px;
       margin-top: 5px;
       margin-left: 3px;
       font-weight: bold;
     
       
    }
    h1{
        color: whitesmoke;
        text-align: center;
       
    }
    .buttons{
  margin-left: 30%;
    }
</style>
<body>
    <form action="login.php" method="post">
        <h1>
            Authentifier
        </h1>
    <label for="">
        Login:
    </label> <br>
    <input type="text" name="login" id=""> <br>
    <label for="">
        Mot de passe:
    </label><br>
    <input type="password" name="pwd" id=""> <br>
    <div class="buttons">
    <button type="submit">Log In</button>

</form>
</body>
</html>