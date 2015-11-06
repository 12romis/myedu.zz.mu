<?php

class dbase
{
   /* public $instance;

    public function Instance () {
        if(self::$instance == null)
            self::$instance = new dbase;

        return self::$instance;
    }

    private function __construct (){

    }*/

    public function select ($query) {
        $result = mysql_query($query);

        if (!$result)
            die (mysql_error());

        $n  = mysql_num_rows($result);
        $arr = array();

        for ($i=0; $i<$n; $i++){
            $row = mysql_fetch_assoc($result);
            $arr[] = $row;
        }

        return $arr;
    }

    public function delete ($table, $where){
        $query = "DELETE FROM $table WHERE $where";
        $result = mysql_query($query);

        if (!$result)
            die (mysql_error());
        return mysql_affected_rows();
    }

    public function insert ($table, $object) {
        $columns = array();
        $values = array();

        foreach ($object as $key => $value){
            $key = mysql_real_escape_string($key . '');
            $columns [] = $key;

            if ($value === null){
                $values[] = NULL;
            }
            else {
                $value = mysql_real_escape_string($value . '');
                $values [] = "'$value'";
            }

        }
        $columns_s = implode(',', $columns);
        $values_s = implode (',', $values);
        $query = "INSERT INTO $table ($columns_s) VALUES ($values_s)";
        $result = mysql_query($query);

        if (!$result)
            die (mysql_error());

        return mysql_insert_id();
    }

    public function update ($table, $object, $where) {
        $sets = array();

        foreach ($object as $key => $value){
            $key = mysql_real_escape_string($key . '');
            if ($value === null){
                $sets[] = "$key=NULL";
            }
            else {
                $value = mysql_real_escape_string($value . '');
                $sets = "$key = '$value'";
            }
        }
        $sets_s = implode(",", $sets);
        $query = "UPDATE $table SET $sets_s WHERE '$where'";
        $result = mysql_query($query);

        if (!$result)
            die (mysql_error());

        return mysql_affected_rows();
    }

    function startup()
    {
        $hostname = 'localhost';
        $username = 'u544040331_igor';
        $password = 'Romisek1';
        $dbname = 'u544040331_msg';

        setlocale(LC_ALL, 'ru_RU.CP1251');

        mysql_connect($hostname, $username, $password) or die('No connect with data base');
        mysql_query('SET NAMES cp1251');
        mysql_select_db($dbname) or die('No data base');

        session_start();

    }

}