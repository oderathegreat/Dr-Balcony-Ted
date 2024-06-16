<?php

// Database configuration
$host = 'mysql'; // Replace with your database host
$dbname = 'DrBalcony'; // Replace with your database name
$username = 'ted'; // Replace with your database username
$password = 'super-secret'; // Replace with your database password

try {
    // Connect to database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL query
    $sql = "SELECT
                u.username AS User_Name,
                u.registration_time AS Registration_Time,
                COUNT(o.id) AS Number_of_Orders,
                MAX(o.order_date) AS Last_Order_Date,
                CASE
                    WHEN COUNT(o.id) >= 5 THEN 'active'
                    ELSE 'inactive'
                END AS Status
            FROM
                users u
            LEFT JOIN
                orders o ON u.id = o.user_id
            GROUP BY
                u.id
            ORDER BY
                Number_of_Orders DESC";

    // Execute query
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error executing query: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Order Statistics</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .active {
            color: green;
        }
        .inactive {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>User Order Statistics</h1>
        <table>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Registration Time</th>
                    <th>Number of Orders</th>
                    <th>Last Order Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['User_Name']) ?></td>
                        <td><?= htmlspecialchars($user['Registration_Time']) ?></td>
                        <td><?= htmlspecialchars($user['Number_of_Orders']) ?></td>
                        <td><?= htmlspecialchars($user['Last_Order_Date']) ?></td>
                        <td class="<?= $user['Status'] == 'active' ? 'active' : 'inactive' ?>">
                            <?= htmlspecialchars(ucfirst($user['Status'])) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
