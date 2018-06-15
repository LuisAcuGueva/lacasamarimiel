<?php

    function validar_campo($campo){
        $campo = trim($campo);
        $campo = stripcslashes($campo);
        $campo = htmlspecialchars($campo);

        return $campo;
    }

    header("Content-type:application/json");

    if(isset($_POST["name"]) && !empty($_POST["name"]) &&
    isset($_POST["email"]) && !empty($_POST["email"]) &&
    isset($_POST["asunto"]) && !empty($_POST["asunto"]) &&
    isset($_POST["message"]) && !empty($_POST["message"])
    ){
        $nombre = validar_campo($_POST["name"]);
        $email =  validar_campo($_POST["email"]);
        if(isset($_POST["phone"])){
            $phone = validar_campo($_POST["phone"]);
        }
        $asunto =  validar_campo($_POST["asunto"]);
        $message =  validar_campo($_POST["message"]);

        $contenido ="Nombre: ".$nombre. "<br>Telefono: ".$phone;
        $contenido .="<br>E-mail: ".$email;
        $contenido .="<br>Mensaje: <br>".$message;

        $mail="ventas@lacasamarimiel.com";

        $headers =  'MIME-Version: 1.0' . "\r\n"; 
		$headers .= 'From:<'.$email.'>' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; 
        
        mail($mail,$asunto,$contenido,$headers);

        return print(json_encode('ok'));
    }

    return print(json_encode('no'));
