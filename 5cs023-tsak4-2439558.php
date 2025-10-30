<?php
// Database connection details
$servername = "localhost";  
$username = "2439558";  
$password = "!n#ufF(Yyx83_hU2";  
$dbname = "db2439558";  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  error_log("Connection failed: " . $conn->connect_error); // Log error for debugging
  die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from the 'movies' table
$sql = "SELECT Movie_id, Movie_name, Genre, Price, Date_of_release FROM movies";
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

// Start HTML table
echo "<table border='1'>
        <tr>
            <th>Movie ID</th>
            <th>Movie Name</th>
            <th>Genre</th>
            <th>Price</th>
            <th>Date of Release</th>
        </tr>";

// Check if there are results
if ($result->num_rows > 0) {
  // Loop through the result and display each row in the table
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["Movie_id"] . "</td>
            <td>" . htmlspecialchars($row["Movie_name"]) . "</td>
            <td>" . htmlspecialchars($row["Genre"]) . "</td>
            <td>£" . number_format($row["Price"], 2) . "</td>
            <td>" . $row["Date_of_release"] . "</td>
          </tr>";
  }
  // Close the table
  echo "</table>";
} else {
  // Message if there are no records
  echo "0 results";
}

// Close the database connection
$conn->close();
?>