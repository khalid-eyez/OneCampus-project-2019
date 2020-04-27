<?php
function dbconnect()
{
$server="localhost";
$username="root";
$pass="";

$conn=mysqli_connect($server,$username,$pass);
mysqli_select_db($conn,"onecampusdb");

return $conn;
}
function closedb($conn)
{
    mysqli_close($conn);
}
?>