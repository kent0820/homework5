<?php

//Bug Report
ini_set('display_errors', 'On');
error_reporting(E_ALL);

//Set Connection
$dsn = 'mysql:dbname=zc88;host=sql2.njit.edu';
$user = 'zc88';
$password = 'JlsWkMNE3';
try {
    $dbConn = new PDO($dsn, $user, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connected successfully<br>';
} catch (PDOException $e) {

    echo 'Connection failed: ' . $e->getMessage() . '<br>';
}
try {

    $stmt = $dbConn->prepare("SELECT * FROM accounts where id<6");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();

}

$number = print_r(count($result));
echo ' results found! <br>';


//Table output
echo '<table border="1">';
echo '<tr>
              <th>id</th>
              <th>email</th>
              <th>fname</th>
              <th>lname</th>
              <th>phone</th>
              <th>birthday</th>
              <th>gender</th>
              <th>password</th>
         </tr>';
foreach ($result as $key) {
    echo '<tr>';

    echo '<td>'.$key['id'].'</td>';
    echo '<td>'.$key['email'].'</td>';
    echo '<td>'.$key['fname'].'</td>';
    echo '<td>'.$key['lname'].'</td>';
    echo '<td>'.$key['phone'].'</td>';
    echo '<td>'.$key['birthday'].'</td>';
    echo '<td>'.$key['gender'].'</td>';
    echo '<td>'.$key['password'].'</td>';

    echo '</tr>';
}
echo '</table>';
?>