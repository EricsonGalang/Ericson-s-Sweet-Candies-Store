<?php include 'header.php'; ?>
<?php include 'candies.php'; ?>

<h2>Here's your Order</h2>

<?php
$order = $_POST['order'] ?? [];
$total = 0;
$vatRate = 0.11;

foreach ($order as $candy => $qty) {
    if ($qty > 0 && isset($candies[$candy])) {
        $subtotal = $candies[$candy] * $qty;
        echo "<p>$qty x $candy = ₱$subtotal</p>";
        $total += $subtotal;
    }
}

$vat = $total * $vatRate;
$grandTotal = $total + $vat;

echo "<p><strong>Total: ₱$total</strong></p>";
echo "<p>VAT (12%): ₱$vat</p>";
echo "<p><strong>Grand Total: ₱$grandTotal</strong></p>";

if ($grandTotal > 10000) {
    echo "<p>🎉 Big spender! You get a free Mint Candy!</p>";
} elseif ($grandTotal > 0) {
    echo "<p>😊 Thanks for your sweet order!</p>";
} else {
    echo "<p>😅 No candies selected. Try again!</p>";
}
?>
</body>
</html>