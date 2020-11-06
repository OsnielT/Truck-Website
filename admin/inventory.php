<?php 
require_once "include/header.php";

require_once "../include/db.php";
$sth = $dbh->prepare("SELECT id, image, truck_name, price, towing_capacity, miles, mpg_city, mpg_highway, color, int_color, engine, drive_type, fuel, transmission FROM inventory");
$sth->execute();


?>


<p class="h3"> Vehicle Listings </p>


<table class="table table-hover ">
    <tbody>
          <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Price</th>
            <th>Edit/Remove</th>
        </tr>
<?php
// $row = $sth->fetch(PDO::FETCH_ASSOC)
while($row = $sth->fetch(PDO::FETCH_ASSOC)){

    $searchString = ',';
    $whatIWant = $row['image'];
    if( strpos($whatIWant, $searchString) !== false ) {
        $whatIWant = substr($row['image'], strpos($row['image'], ",") + 1);
    }else{
        $whatIWant = $row['image'];
    }

    echo '
    <tr class="click" onClick="productlink('.$row['id'].')">
        <th  >';
    
        $img = '<img width="125x" height="auto" src="pictures/';
        if( strpos($whatIWant, $searchString) !== false ) {
            $carimgs=explode(",",$whatIWant);
            $img .= ''. $carimgs[array_rand($carimgs)] . '" alt="Card image cap">';
        }else{

            $img .= ''.$whatIWant. '" ';
        }
        $img .= 'alt="Card image cap">';

        echo $img;

        echo '
        </th>
        <th>
            <p >'.$row['truck_name'].'</p>
        </th>
        <th>
            <p>$'.number_format($row['price']).'</p>
        </th>
        <th>
            <a style="font-size:21px; margin-right:15px;" href="productedit/?id='.$row['id'].'" ><i class="fas fa-edit"></i></a>
            <i style="color:red; font-size:21px; cursor:pointer;" onClick="deleteme('.$row['id'].')" class="fas fa-trash-alt"></i>
        </th>
    </tr>'; 
}


 ?>

</tbody>
</table>

<?php require_once "include/footer.php"; ?>