<?php

/** @var $pdo \PDO */
require_once "../../database.php";


$search = $_GET['search'] ?? "";
if ($search) {
    $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :name ORDER BY create_date ASC;');
    $statement->bindValue(':name', "%$search%");
} else {
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date ASC;');
}

$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC); // each ellement will be fetched as an associative array


?>
<?php include_once "../../views/partials/header.php"; ?>

<h1>Crud Application</h1>
<p>
    <a href="add.php" class="btn btn-success">Add Product</a>
</p>
<form action="">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for products:" name="search" value="<?= $search ?>">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Create Date</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $i => $product) : ?>
        <tr>
            <th scope="row"><?php echo $i + 1; ?></th>
            <td>
                <img src="../<?php echo $product['image']; ?>" class="thumb-image" alt="">
            </td>
            <td><?php echo $product['title']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['create_date']; ?></td>
            <td>
                <a href="update.php?id=<?= $product['id'] ?>" class="btn btn-sm btn-primary">Update</a>
                <form style="display:inline-block" method="post" action="delete.php">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>



</body>

</html>