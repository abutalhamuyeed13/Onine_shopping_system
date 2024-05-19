<?php
require '../models/Product.php';
if (isset($_GET['id'])){
$result = deleteProduct($_GET['id']);
                        if ($result) {
                            header('Location: ../views/products.php?delete=true');
                        } else {
                            header('Location: ../views/products.php?delete=false');
                        }
}