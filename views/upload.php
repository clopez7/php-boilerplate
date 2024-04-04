<!DOCTYPE html>
<html>
<head>
    <style>
        *{
            background-color: antiquewhite;
            color: black;
            font-family: 'Bebas Neue', cursive;
        }
    </style>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>
        Upload
    </title>
</head>
<body>
    <form action="../controller/controller.php" method="post" enctype="multipart/form-data">
        <h1>Sube tu foto de perfil</h1>
        <h3>Select image to upload:</h3>
            <input type="file" name="upload" id="upload">
            <input type="hidden" value="profile" name="control">
            <br>
            <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>