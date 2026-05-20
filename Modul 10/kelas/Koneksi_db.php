<?php

class Koneksi_db
{
    private $db_host = "localhost";  
    private $db_user = "root";       
    private $db_pass = "";           
    private $db_name = "db_dpw";    

    private $con   = false;
    private $hasil = array();

    public function connect()
    {
        if (!$this->con) {
            $myconn = @mysqli_connect(
                $this->db_host,
                $this->db_user,
                $this->db_pass
            );
            if ($myconn) {
                mysqli_set_charset('utf8', $myconn);
                $seldb = @mysqli_select_db($this->db_dpw, $myconn);
                if ($seldb) {
                    $this->con = true;
                    return true;
                } else {
                    array_push($this->hasil, mysqli_error($myconn));
                    return false;
                }
            } else {
                array_push($this->hasil, mysqli_connect_error());
                return false;
            }
        } else {
            return true;
        }
    }

    public function getErrors()
    {
        return $this->hasil;
    }
}