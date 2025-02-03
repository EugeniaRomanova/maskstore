<?php 
require_once('helpers.php');
print_r($_POST);

function searchInTitles($term, $table1, $table2, $table3, $table4) {
  $pdo = getPDO();
  $term = trim(strip_tags(stripcslashes(htmlspecialchars($term))));
  $query = "SELECT $table1.id, $table2.path, $table3.title, $table4.price 
    FROM $table1
    LEFT JOIN $table2 ON $table1.photo = $table2.id
    LEFT JOIN $table3 ON $table1.title_number = $table3.id
    LEFT JOIN $table4 ON $table1.price_number = $table4.id
    WHERE $table3.title LIKE '%$term%'";
  $stmt = $pdo->prepare($query);
  try {
    $stmt->execute();
  } catch (\Exception $e) {
    die($e->getMessage());
  }
  return $stmt->fetchAll();
}

?>