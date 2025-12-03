<?php
declare(strict_types=1);
$tax_rate = 12; 
$yourproduct = [
    "Chocolate Bar" => ["price" => 50.00, "stock" => 8],
    "Gummy Bears" => ["price" => 30.00, "stock" => 15],
    "Juice" => ["price" => 20.00, "stock" => 5],
    "Candy Pop" => ["price" => 15.00, "stock" => 30],
];
function get_reorder_message(int $stock): string {
    return ($stock < 10) ? "Yes" : "No";
}
function get_total_value(float $price, int $quantity): float {
    return $price * $quantity;
}
function get_tax_due(float $price, int $quantity, int $tax_rate = 0): float {
    return ($price * $quantity) * ($tax_rate / 100);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stock Monitoring - Ericson Store</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="quotedGalang.php">Quote</a>
        <a href="candies.php">Candies</a>
        <a href="addorder.php">Add Order</a>
        <a href="functions.php">Stock Monitoring</a>
        <a href="functionsgalang.php">Function Store</a>
    </nav>
    <h1>The Candy Store</h1>
    <p>Stock Control</p>
    <table>
        <tr>
            <th>Product</th>
            <th>Stock</th>
            <th>Re-order</th>
            <th>Total Value</th>
            <th>Tax Due</th>
        </tr>
        <?php foreach ($yourproduct as $product_name => $data): ?>
            <tr>
                <td><?= htmlspecialchars($product_name) ?></td>
                <td><?= $data["stock"] ?></td>
                <td><?= get_reorder_message($data["stock"]) ?></td>
                <td><?= number_format(get_total_value($data["price"], $data["stock"]), 2) ?></td>
                <td><?= number_format(get_tax_due($data["price"], $data["stock"], $tax_rate), 2) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>