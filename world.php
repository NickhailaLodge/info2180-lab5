<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


function getQuery($conn){

  $country = filter_var(isset($_GET['country']), FILTER_SANITIZE_STRING);
  $city = filter_var(isset($_GET['context']),FILTER_SANITIZE_STRING);

  if($city === "cities"){  
    $stmt = $conn -> query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON country_code = countries.code WHERE countries.name LIKE '%$country%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $theader = "";
    $theader .= "<tr>";
    $theader .= "<th>Name</th>";
    $theader .= "<th>District</th>";
    $theader .= "<th>Population</th>";
    $theader .= "</tr>";

    foreach ($results as $row){
      $tdata = "";
      $tdata .= "<tr>";
      $tdata .= "<td>".$row['name']."</td>";
      $tdata .= "<td>".$row['district']."</td>";
      $tdata .= "<td>".$row['population']."</td>";
      $tdata .= "</tr>";
    }

    echo "<table>";
    echo $theader. " ". $tdata;
    echo "$</table>";


  }else{
    $stmt = $conn -> query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $theader = "";
    $theader .= "<tr>";
    $theader .= "<th>Name</th>";
    $theader .= "<th>Continent</th>";
    $theader .= "<th>Independence Year</th>";
    $theader .= "<th>Head of State</th>";
    $theader .= "</tr>";

    foreach ($results as $row){
      $tdata = "";
      $tdata .= "<tr>";
      $tdata .= "<td>".$row['name']."</td>";
      $tdata .= "<td>".$row['continent']."</td>";
      $tdata .= "<td>".$row['independence_year']."</td>";
      $tdata .= "<td>".$row['head_of_state']."</td>";
      $tdata .= "</tr>";
    }

    echo "<table>";
    echo $theader. " ".$tdata;
    echo "$</table>";
  }
}
getQuery($conn);
?>

