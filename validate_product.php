<?php

$name = $product['title'];
$description = $product['description'];
$price = $product['price'];
$imagePath = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if (!$name) {
        $errors[] = "Product name is required!";
    }
    if (!$price) {
        $errors[] = "Product price is required!";
    }

    if (!is_dir(__DIR__ . '/public/images')) {
        mkdir(__DIR__ . '/public/images');
    }

    if (empty($errors)) {
        // save the image
        $image = $_FILES['image'] ?? null;
        $imagePath = $product['image'];

        if ($image && $image['tmp_name']) {
            if ($product['image']) {
                unlink(__DIR__ . '/public/' . $product['image']);
            }
            $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
            mkdir(dirname(__DIR__ . '/public/' . $imagePath));
            move_uploaded_file($image['tmp_name'], __DIR__ . '/public/' . $imagePath);
        }
    }
}