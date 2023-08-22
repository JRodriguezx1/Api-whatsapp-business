<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api ws php</title>
    <link rel="stylesheet" href="build/normalize.css"> <!-- http://necolas.github.io/normalize.css/ -->
    <link rel="preload" href="build/style.css" type="style"> 
    <link  href="build/style.css" rel="stylesheet">   
</head>
<body>
    <header>
        <img class="ws" src="/build/icons-whatsapp-96.png" alt="">
        <h1 class="titulo">Api de Whatsapp Business</h1>
    </header>
    <main class="contenedor">
        <h4 class="subtitulo">Enviar Mensaje por whatsapp usando la Api de Whatsapp business</h3>
        <form class="formulario" action="/ws_cloud_api.php" method="POST">
            <input class="inputtext" type="number" min="3000000000" max="3270000000" placeholder="Telefono Whatsapp" name="ws">
            <input class="inputtext" type="text" placeholder="Mensaje" name="mensaje">
            <input type="submit" value="Enviar">
        </form>
    </main>
    
</body>
</html>