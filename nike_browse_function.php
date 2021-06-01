<?php include_once "file_exist.php" ?>

<?php

function read_all_products() {
  $file_name = 'products.csv';
  $fp = fopen($file_name, 'r');
  $first = fgetcsv($fp);
  $products = [];
  while ($row = fgetcsv($fp)) {
    $i = 0;
    $product = [];
    foreach ($first as $col_name) {
      $product[$col_name] =  $row[$i];
      $i++;
    }
    $products[] = $product;
  }
  return $products;
}

function my_sort($a, $b) {
    return strtotime($a['created_time']) - strtotime($b['created_time']);
}




function lastest($id) {
    $stores = read_all_products();

    $store_choose = [];
    for($i = 0; $i < count($stores); $i++)
    {
      if($stores[$i]['store_id'] == $id)
      {
        array_push($store_choose, $stores[$i]);
      }
    }
    usort($store_choose, "my_sort");

    return $store_choose;
}