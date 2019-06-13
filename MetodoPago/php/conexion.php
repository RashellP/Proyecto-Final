<?php
    // Create connection
    $conn = mysqli_connect("localhost", "id9881071_roman", "roman123", "id9881071_cobranza");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>