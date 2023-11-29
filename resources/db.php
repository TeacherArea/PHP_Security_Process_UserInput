<?php
    require 'db.inc.settings.php'; 
    
    function DB_OpenCon()
    {
        $attributes = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // Kastar undantag (try/catch) vid fel
        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,         // Använder vid true den buffrade version av mysqls api
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   // Innehållet i databasen blir till en array  
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8;    
                                         SET time_zone = '" . DB_TIMEZON . "';
                                         SET sql_safe_updates = 1, sql_select_limit = 1000, sql_max_join_size = 1000000;
                                         SET SESSION sql_mode = STRICT_ALL_TABLES, NO_ZERO_DATE, NO_ZERO_IN_DATE;" 
                                                            // MYSQL_ATTR_INIT_COMMAND har lite olika kommandon för att
                                                            // till exempel ställa in tidszon, hur mycket uppdateringar som 
                                                            // tillåts för databasen på samma gång (1), hur mycket data som ges
                                                            // tillåtelse att hämta i en förfrågan, etc
        );
        
        try
        {
            $con = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME, DB_USER, DB_PASS, $attributes);     
            return $con;
        }
        
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function DB_CloseCon($con)
    {
        $con = null;
    }

    function RegisterNewUser($fname, $lname, $password, $email, $msg, $subscribe)
    {
        $con = DB_OpenCon();
  
        $sql = "INSERT INTO users(user_fname, user_lname, user_password, user_email, user_message, user_subscribe) VALUE(?, ?, ?, ?, ?, ?)";
        $stmt = $con -> prepare($sql);
        $stmt->bindParam(1, $fname);
        $stmt->bindParam(2, $lname);
        $stmt->bindParam(3, $password);
        $stmt->bindParam(4, $email);
        $stmt->bindParam(5, $msg);
        $stmt->bindParam(6, $subscribe);
        $stmt -> execute();
        DB_CloseCon($con);
    }