<?php
require ("Entity.php");

//Contains database related code for the produs page.
class ObjectModel {

    //Get all produs numes from the database and return them in an array.
    function GetObjectTypes() {
        require ('Credentials.php');
        //Open connection and Select database.   
        mysql_connect($host, $user, $passwd) or die(mysql_error());
        mysql_select_db($database);
        $result = mysql_query("SELECT DISTINCT nume FROM produs") or die(mysql_error());
        $nume = array();

        //Get data from database.
        while ($row = mysql_fetch_array($result)) {
            array_push($nume, $row[0]);
        }

        //Close connection and return result.
        mysql_close();
        return $nume;
    }

    //Get Entity objects from the database and return them in an array.
    function GetObjectByType($nume) {
        require ('Credentials.php');
        //Open connection and Select database.     
        mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);

        $query = "SELECT * FROM produs WHERE nume LIKE '$nume'";
        $result = mysql_query($query) or die(mysql_error());
        $objectArray = array();

        //Get data from database.
        while ($row = mysql_fetch_array($result)) {
            $nume = $row[0];
            $pret = $row[1];
            $poza = $row[2];
            $descriere = $row[3];


            //Create produs objects and store them in an array.
            $produs = new Entity($nume, $pret, $poza, $descriere);
            array_push($objectArray, $produs);
        }
        //Close connection and return result
        mysql_close();
        return $objectArray;
    }

    function GetObjectById($nume) {
        require ('Credentials.php');
        //Open connection and Select database.     
        mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);

        $query = "SELECT * FROM produs WHERE nume = $nume";
        $result = mysql_query($query) or die(mysql_error());

        //Get data from database.
        while ($row = mysql_fetch_array($result)) {
            $nume = $row[0];
            $pret = $row[1];
            $poza = $row[2];
            $descriere = $row[3];


            //Create produs objects and store them in an array.
            $produs = new Entity($nume, $pret, $poza, $descriere);
        }
        //Close connection and return result
        mysql_close();
        return $produs;
    }

    function InsertObject(Entity $produs) {
        $query = sprintf("INSERT INTO produs
                          (nume, pret, poza,descriere)
                          VALUES
                          ('%s','%d','%s','%s')",
                mysql_real_escape_string($produs->nume),
                mysql_real_escape_string($produs->pret),
                mysql_real_escape_string("images/" . $produs->poza),
                mysql_real_escape_string($produs->descriere));

        $this->PerformQuery($query);
    }

    function UpdateObject($nume, Entity $produs) {
        $query = sprintf("UPDATE produs
                            SET nume = '%s', pret = '%d', poza = '%s', descriere = '%s'
                          WHERE nume = $nume",
			    mysql_real_escape_string($produs->nume),
                mysql_real_escape_string($produs->pret),
                mysql_real_escape_string("images/" . $produs->poza),
                mysql_real_escape_string($produs->descriere));
                          
        $this->PerformQuery($query);
    }

    function DeleteObject($nume) {
        $query = "DELETE FROM produs WHERE nume = $nume";
        $this->PerformQuery($query);
    }

    function PerformQuery($query) {
        require ('Credentials.php');
        mysql_connect($host, $user, $passwd) or die(mysql_error());
        mysql_select_db($database);

        //Execute query and close connection
        mysql_query($query) or die(mysql_error());
        mysql_close();
    }
}
?>