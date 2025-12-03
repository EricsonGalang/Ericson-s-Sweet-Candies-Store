<?php include 'header.php'; ?>
<?php include 'quotedGalang.php'; ?>
<?php include 'candies.php'; ?>
    <h1>Welcome to Ericson Store</h1>
    <p>Explore our products and monitor stock levels.</p>

<p><em><?= $quote ?></em></p>

<h2>Available Candies in the Shop</h2>
<form method="POST" action="addorder.php">
    <?php foreach ($candies as $name => $price): ?>
        <label>
            <?= $name ?> (₱<?= $price ?>): 
            <input type="number" name="order[<?= $name ?>]" min="0" value="0">
        </label><br>
    <?php endforeach; ?>
    <br>
    <input type="submit" value="Place Order here">
</form>
</body>
</html>