<?php

/** @var $pdo \PDO */
require_once "../../database.php";
require_once "../../functions.php";

$errors = [];
$name = '';
$description = '';
$price = '';
$product = [
    'image' => ""

];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("../../validate_product.php");

    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO products (title, description, image, price, create_date) VALUES (:name, :description, :image, :price, :date)");
        $statement->bindValue(':name', $name);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', date("Y-m-d H:i:s"));
        $statement->execute();
        header('Location: index.php');
    }
}

?>

<?php include_once "../../views/partials/header.php"; ?>
<p>
    <a href="index.php" class="btn btn-secondary">Return to Products</a>
</p>
<h1>Add new product</h1>
<?php include_once("../../views/products/form.php"); ?>

</body>

</html>