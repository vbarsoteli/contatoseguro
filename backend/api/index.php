<?php 

    //
    if (!strstr($_REQUEST['url'], 'usuario') and !strstr($_REQUEST['url'], 'empresa')) 
        echo '{ "erro": "Informe o endpoint! ex.: /usuario ou /empresa" }';
    else {

        //
        $headers = apache_request_headers();
        $token = 'eyJ0eXAiOib929s69208siOiJIUzI1NiJ9';   
        $metodo = $_SERVER["REQUEST_METHOD"];
        
        //
        if (!$headers['Authorization'])
            echo '{ "erro": "Informe o token!" }';
        elseif ($token != preg_replace('/^(?:\s+)?Bearer\s/', '', $headers['Authorization']))
            echo '{ "erro": "O token informado não confere, verifique!" }';
        else {

            //
            $v = explode('/', $_REQUEST['url']);
            $pagina = $v[0];
            $id = $v[1];

            //
            if (in_array($metodo, array('DELETE', 'PUT')) and !$id)
                echo '{ "erro": "Informe um ID!" }';
            else {

                //
                if (file_exists($pagina.'.php'))
                    include($pagina.'.php');

            }

        }

    }
