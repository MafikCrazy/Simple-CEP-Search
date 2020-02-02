<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple CEP Search</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="stylesheet" href="style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body>


    <form class="hero-body box has-text-centered" action="" method="post">
        <p class="has-text-centered">Simple <strong>CEP Search</strong></p>

            <input class="input has-text-centered" type="number" name="cep" maxlength="20" required>
            <input class="button is-primary box" type="submit" name="enviar" value="Search">
        
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
