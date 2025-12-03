<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = $_GET['country']??'';
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'; ");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<table border= "2">
    <tr>
        <th>Country Name</th>
        <th>Continent</th>
        <th>Independence Year</th>
        <th>Head of State</th>
    </tr>
    <?php foreach ($results as $row): ?>
    <tr>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['continent']); ?></td>
        <td><?php echo htmlspecialchars($row['independence_year']); ?></td>
        <td><?php echo htmlspecialchars($row['head_of_state']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>

