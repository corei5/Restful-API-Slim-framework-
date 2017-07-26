<?php

//dispaly all records

$app->get('/api/books',function(){


	
	require_once('dbconnect.php');

	$query = "select * from catalog_category_product order by product_id";


    //if($query>200){

	$result = $mysqli->query($query);

	while($row = $result->fetch_assoc()){
		$data[] = $row;
	}

	if(isset($data)){
	 header('Content-Type: application/json');
	 echo json_encode($data);
		
	//}
   }

});

//dispaly a single row 

$app->get('/api/books/{id}',function($request){
	
  require_once('dbconnect.php');
  $id = $request->getAttribute('id');

  //echo "The id is ".$id;

  $query = "select * from catalog_category_product order by product_id=$id";
  $result = $mysqli->query($query);


  /*while($row = $result->fetch_assoc()){
		$data[] = $row;
	}

	if(isset($data)){
	 header('Content-Type: application/json');
	 echo json_encode($data);
		
	}
*/
   $data[]=$result->fetch_assoc();

   if(isset($data)){
   header('Content-Type: application/json');
	 echo json_encode($data);
	}

});

