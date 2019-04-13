<?php

namespace App;

class Hello
{
    public function getTitle()
    {

        //define("DOC_ROOT","/path/to/html");
        $service = "login"; //método login
        $username =' efj46294@zoqqa.com '; //gmail para iniciar sesión
        $password = ' 592248CEF9ADA260FEF28363CCBECF75  ';  //contraseña para iniciar sesión

        
        $cookie_file_path = "cookie.txt";   //obtenemos la cookie de inicio de sesión
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        
        //login form action url
        $service = "get-code";
        $id='21231';    //mediante el id del programa obtenemos sucódigo
        $url="http://descubre.inf.um.es/services/programs.php"; //página de la cual queremos obtener código
        $postinfo = "service=".$service."&id=".$id; //método post con el cual obtenemos el código 

    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
        $result = curl_exec($ch);   //obtener código del programa sin depurar
 

        $decode = json_decode($result); //"depuramos" el código eliminando carácteres que aparecen de la extracción de código

        echo "<pre>";   //los imprimos en pantalla dejándolo todo más claro con saltos de línea
        print_r($decode->code);
        echo "</pre>";

        die;    //fin de la ejecución del programa
    

    }
}
