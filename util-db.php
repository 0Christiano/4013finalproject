<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli('159.89.47.44', 'christi9_4013finalprojectuser', 'B?Yu~2BivfSZ', 'christi9_4013finalproject');
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>
