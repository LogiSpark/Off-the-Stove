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

function listAllDesc($tableName){
    $query = 'select * from '.$tableName." order by id desc";
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

function insertRecipe($row){
    $con = dbConnect();
    $stmt = $con->prepare("insert into recipe(name,cuisine,prep,cook,ready,ingredient,direction,
                                category1,category2,photo,price,calories) values (?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param('ssiiisssssii', $row['name'],$row['cuisine'],$row['prep'],$row['cook'],
        $row['ready'],$row['ingredient'],$row['direction'],$row['category1'],$row['category2'],$row['photo'],$row['price'],
        $row['calories']);
    if($stmt->execute()){
        return 1;
    }
    else{
        return 0;
    }
}

function updateRecipe($row,$id){
    $con = dbConnect();
    $stmt = $con->prepare("update recipe set name = ?,cuisine = ?,prep = ?,cook = ?,ready = ?,
  ingredient = ?,direction = ?,category1 = ?,category2 = ?,photo = ?,price = ?,calories = ?, where id = ?");

    $stmt->bind_param('ssiiisssssiii', $row['name'],$row['cuisine'],$row['prep'],$row['cook'],
        $row['ready'],$row['ingredient'],$row['direction'],$row['category1'],$row['category2'],$row['photo'],$row['price'],
        $row['calories'],$id);
    if($stmt->execute()){
        return 1;
    }
    else{
        return 0;
    }
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

?>