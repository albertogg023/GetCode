<?php

namespace App;

class Hello
{
    public function getTitle()
    {








        //define("DOC_ROOT","/path/to/html");
        //username and password of account
        $service = "login";
        $username ='efj46294@zoqqa.com';
        $password = '592248CEF9ADA260FEF28363CCBECF75';

        //login form action url
        $url="http://descubre.inf.um.es/services/users.php"; 
        $postinfo = "service=".$service."&username=".$username."&password=".$password;
        
        $cookie_file_path = "cookie.txt";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path); //saved cookies
        //set the cookie the site has for certain features, this is optional
        curl_setopt($ch, CURLOPT_COOKIE, "cookiename=0");
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
        $result = curl_exec($ch);


        preg_match('/^Set-Cookie:\s*([^;]*)/mi', $result, $m);
        parse_str($m[1], $cookies);

        //print_r($cookies['PHPSESSID']);        
        //die;



        //login form action url
        $service = "get-code";
        $id='21231<';
        $url="http://descubre.inf.um.es/services/programs.php"; 
        $postinfo = "service=".$service."&id=".$id;

        $cookie_file_path = $cookies['PHPSESSID'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_NOBODY, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);


        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path); //saved cookies
        //set the cookie the site has for certain features, this is optional
        curl_setopt($ch, CURLOPT_COOKIE, "cookiename=0");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
        $result = curl_exec($ch);



        $decode = json_decode($result);

        echo "<pre>";
        print_r($decode->code);
        echo "</pre>";

        die;





        return 'Hello World!';

    }
}