<?php
//Denying access to the script
http_response_code(403);
//Conection script containing database connection parameters

require("conn.php");

//Variable to store the ID being the primary key
$id = $_GET['id'];

//SQL query to delete the record
$delete_query = "DELETE FROM courses WHERE id = $id";

//Return an error or success message if the record deleted or not
if(mysqli_query($conn, $delete_query)){
    header("Location: ../courseReport.php?operationDel=success");
}
else{
    header("Location: ../courseReport.php?operationDel=error");

}

//Closing the connection
mysqli_close($conn);

?>