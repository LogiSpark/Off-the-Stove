<?php

include("constants.php");

function dbConnect(){
	$con = mysqli_connect(HOST,USER,PASS,DBNAME)or die("Error connecting to database".mysqli_connect_error());
	return $con;
}

function execute($sql)	{
	$con = dbConnect();
	  $result  =   mysqli_query($con,$sql) or die(mysqli_error($con));
	  if($result)
	  {
	  	mysqli_close($con);
		return $result;  
	  }else{
	  	mysqli_close($con);
		return NULL;  
	  }

}

function total_rows($rs){
	return mysqli_num_rows($rs);	
}

function fetch_array($rs){
	return mysqli_fetch_array($rs);	
}

function listWhere($tableName,$conditions){
	$query = 'select * from '.$tableName;
	foreach($conditions as $k=>$v){
	    $whereConditions[]=  "`$k`='$v'";	
	}
	
	if(count($whereConditions)>0) {
	 $query .= " WHERE  ". implode(" AND ", $whereConditions); }
	  else{
		echo "Wrong Query ";
		exit;
	  }
	return execute($query);
}

function listAll($tableName){
	$query = 'select * from '.$tableName;
	return execute($query);
}

function listAllDescID($tableName){
	$query = 'select * from '.$tableName." order by id desc";
	return execute($query);
}
function listAlphabetical($tableName){
    $query = 'select * from '.$tableName." order by name";
    return execute($query);
}

function insert($data, $tableName)	{ // $data should be array and table name should be passed
    $query =  "insert into `$tableName` (`";	
	foreach($data as $key=>$val){
		// $data will be array
	   	$keys[]= $key;
		$values[] = $val;
	}
	
	if(count($keys)>0)
	  { 
	  	$query .= implode("`,`",$keys);
	  	$query.="`) VALUES ('";
		$query.= implode("','",$values);
		$query.="');";
	  	 }
	  else{
		echo "Wrong Query";
		exit;
	  }

	  return execute($query);
}

function listThreeDesc($tableName){
    $query = 'select * from '.$tableName." order by id desc limit 3";
    return execute($query);
}

function getPackagePrice($id){
    $result=listWhere("package_detail",array("package_id"=>$id));
    $totalprice=0;
    while ($row=fetch_array($result)){
        $result1=listWhere('recipe',array('id'=>$row['recipe_id']));
        while ($row1=fetch_array($result1)){
            $totalprice+=$row1['price'];
        }
    }
    $result=listWhere("package",array('id'=>$id));
    while ($row=fetch_array($result)){
        $totalprice-=$row['discount'];
    }
    return $totalprice;
}

function update($data,$conditions, $tableName)	{ // $data should be array and table name should be passed
    $query =  "update `$tableName` set ";	
	foreach($data as $key=>$val){
		$updateArray[]="`$key`='$val'"; 
	}
	
	
	if(count($updateArray)>0) {
	 $query .= implode(" , ", $updateArray);
	  }
	  else{
		echo "Wrong Query";
		exit;
	  }
	  
	  foreach($conditions as $k=>$v){
	    $whereConditions[]=  "`$k`='$v'";	
	}
	
	if(count($whereConditions)>0) {
	 $query .= " WHERE  ". implode(" AND ", $whereConditions); }
	  else{
		echo "Wrong Query ";
		exit;
	  }

	  return execute($query);
	}

function delete($tableName,$conditions)	{ // $data should be array and table name should be passed
    $query =  "delete from `$tableName` ";	
	foreach($conditions as $k=>$v){
	    $whereConditions[]=  "`$k`='$v'";	
	}
	if(count($whereConditions)>0) {
	 $query .= " WHERE  ". implode(" AND ", $whereConditions); }
	  else{
		echo "Wrong Query ";
		exit;
	  }

	  return execute($query);
	}


   function redirect($url)
   {
	if(headers_sent())
	{
	echo "<script>window.location.href='$url'</script>";
	exit;
	}else
	{ session_write_close();
	  header("Location:$url");
	  exit;
	}
   }
   
   function checkLogin(){
   	if(isset($_SESSION['loggedInUser'])&&!empty($_SESSION['loggedInUser'])){
   		$loggedInUser = $_SESSION['loggedInUser'];
   		echo "<script>console.log='Logged In User: $loggedInUser'</script>";
   		return true;
   	}
   	else{
   		return false;
   		
   	}
   }
function insert_online($name, $phoneNo, $Address, $order_date, $delivery_date, $delivery_status){
    $conn = dbConnect();
//    $stmt = $conn->prepare("insert into online1 (name, phoneNo, Address, order_date, delivery_date, deliveryStatus) values (?, ?, ?, ?, ?, ?)");
    $stmt = $conn->prepare("insert into online1 (name, phoneNo, Address, order_date, delivery_date, deliverStatus) values (?, ?, ?, ?,?,?)");
    $stmt->bind_param('sisssi',$name, $phoneNo, $Address, $order_date, $delivery_date, $delivery_status );
//    $stmt->bind_param('s', $name);
    if ($stmt->execute()) {
        $id = mysqli_insert_id($conn);
        return $id;
    }

    return 0;
}
function insertOrder($customer_id){
    $conn = dbConnect();
//    $stmt = $conn->prepare("insert into online1 (name, phoneNo, Address, order_date, delivery_date, deliveryStatus) values (?, ?, ?, ?, ?, ?)");
    $stmt = $conn->prepare("insert into order_detail (customer_id) values (?)");
    $stmt->bind_param('i',$customer_id );
//    $stmt->bind_param('s', $name);
    if ($stmt->execute()) {
        $id = mysqli_insert_id($conn);
        return $id;
    }

    return 0;
}

//function insert_items($oid){
//    echo $oid;
//}

function insert_items($pid, $qty, $oid){
    $conn = dbConnect();
    $stmt = $conn->prepare("insert into items(pid, quantity, oid) values (?, ?, ?)");
    $stmt->bind_param('iii', $pid, $qty, $oid);

    if ($stmt->execute()) {
        return 1;
    }

    else{
        return 0;
    }
}

function insert_allitems($pid, $oid, $code, $price, $selling_price, $color_size, $qty){
    $conn = dbConnect();
    $stmt = $conn->prepare("insert into allitems(pid, oid, code, price, selling_price, did, quantity) values (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('iiiiiii', $pid, $oid, $code, $price, $selling_price, $color_size, $qty);

    if ($stmt->execute()) {
        return 1;
    }

    else{
        return 0;
    }
}


function reduceQty($did, $qty){
    $conn = dbConnect();
    $stmt = $conn->prepare("update description set quantity = quantity - ? where did = ?");
    $stmt->bind_param("ii", $qty, $did);
    if($stmt->execute()){
        return 1;
    }
    else{
        return 0;
    }
}

//function listCart($tableName,$cid){
//    $query = "select id from $tableName where customer_id = $cid order by id desc limit 1;";
//    return execute($query);
//}

function listOrder($tableName){
    $query = "select id from ".$tableName." order by id desc limit 1;";
    return execute($query);
}

function listAllActive($cid){
    $query = "SELECT cart_detail.cart_id, cart_detail.category, cart_detail.serving FROM cart INNER JOIN cart_detail ON cart.id = cart_detail.cart_id where customer_id = $cid and active = 1;";
    return execute($query);
}
?>