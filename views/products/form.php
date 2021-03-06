<?php if (!empty($errors)) : ?>
<div class="alert alert-danger">
    <?php foreach ($errors as $error) : ?>
    <div><?php echo $error; ?></div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<form action="" method="post" enctype="multipart/form-data">
    <?php if ($product['image']) : ?>
    <img src="../<?= $product['image'] ?>" class="update-image" alt="">
    <?php endif; ?>
    <div class="form-group">
        <label>Product Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Product Description</label>
        <textarea class="form-control" name="description"><?php echo $description; ?></textarea>
    </div>
    <div class="form-group">
        <label>Product Price</label>
        <input type="number" step=".01" name="price" value="<?= $price; ?>" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>