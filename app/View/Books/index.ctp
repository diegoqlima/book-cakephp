<?php
if(count($books) == 1){
  echo json_encode($books['Book']);
}else if(count($books) == 0){
  echo json_encode(array("No results were found"));
}else{
  foreach ($books as $book) {
    echo json_encode($book['Book']);
  }
}
?>
