<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="cep" required>
        <input type="submit" name="enviar" value="Procurar">
        <?php  
            if(isset($_POST['enviar'])){
                $opts = [
                    "http" => [
                        "method" => "GET",
                        "header" => "Accept: text/plain\r\n"
                    ]
                ];
                
                $context = stream_context_create($opts);
                
                $cep = $_POST['cep'];
                
                $file = file_get_contents('http://cep.la/'. $cep, false, $context);
                echo "<br><br>";
                echo htmlspecialchars("Local: " . $file, ENT_QUOTES); 
            }
        ?>
    </form>
</body>
</html>