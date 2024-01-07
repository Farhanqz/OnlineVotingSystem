<?php
function openConn()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "voting";
    try 
    {
        $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    }
    catch(PDOException $e)
    {
        echo "MySql Connection Error: " . $e->getMessage() ;
    }
    return $conn;
}
function execQuery($typ, $str)
{
	try
    {
        $conn = openConn();
        $stmt = $conn->prepare($str);
        if($typ == "oth")
        {
            $result = $stmt->execute();
            
        }
        else if($typ == "sel")
        {
            $stmt->execute();
            $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
        }
        
    }
    catch(PDOException $e)
    {
        echo "MySql statement Error: " . $e->getMessage() . "<br/>SQL: " . $str ;
	}
    $conn = null;
	return $result;
}
function setBlank($pStr)
{
    $rslt = (empty($pStr)) ? 'NULL' : $pStr;
	$rslt = str_replace("'", "\'", $rslt);
    return $rslt;
}
?>