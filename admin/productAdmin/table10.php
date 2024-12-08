<?php
  session_start();
$i=10;
include '..\assets\connect.php';

$json_data = file_get_contents('../assets/product.json');

// Decode the JSON data
$product_json = json_decode($json_data, true); // Use 'true' to return an associative array\\


$availability_list_array=[];

$jsonFilePath = '../assets/availability.json';

if (file_exists($jsonFilePath)) {
    // Read the existing JSON data
    $jsonData = file_get_contents($jsonFilePath);
    $productList = json_decode($jsonData, true);  // Decode JSON into associative array
    $decodeproductList = json_encode($productList);

 //   echo "<script>console.log($decodeproductList)</script>";
    foreach ($productList as $key) {
        foreach ($key as $val ){
            $y = json_encode($val);
            $modifiedString = substr($y, 1, -1);
            $availability_list_array[] = $modifiedString;
            
            //echo "<script>console.log($y)</script>";
          }
       
      }
}

echo "
  <tr>
  <th colspan='7'>";
    echo $product_json['choice' . $i];
echo"</th>
</tr>
<tr>
  <th>
      Id
  </th>
  <th>
      Name
  </th>
  <th>
      Price
  </th>
  <th>
      Image
  </th>

  <th>
      Edit
  </th>


  <th>
      Remove
  </th>

   <th>
      Available
  </th>
</tr>";

$select_img = "SELECT * FROM choice$i";
$result = mysqli_query($conn, $select_img);

if ($result->num_rows>0) {
  while($row = mysqli_fetch_array($result)){
      
      $id = $row["id"];
      $name = $row["name"];
      $price = $row["price"];
      $fileName = $row["img"];
      $availability = $row["availability"];
      $imageUrl = "../assets/uploaded_img/".$fileName;

      $array_imgname = $imageUrl;
      //echo "<script>console.log('$i ')</script>";


      echo "<tr id='products$id'>
          <td id='product_id'> $id</td>
          <td id='product_name'> $name</td>
          <td id='product_price'> $price</td>
          <td id='product_img'><img src='$imageUrl' alt='AoLogo'></td>

          <td>   
              <form id='editForm' method='POST' class='button' action=''>
                  <input type='hidden' name='TABLE' value='$i'>
                  <input type='hidden' name='ID' value='$id'>
                  <input type='hidden' name='NAME' value='$name'>
                  <input type='hidden' name='PRICE' value='$price'>
                  <input type='hidden' name='IMAGEURL' value='$fileName'>
                  <input type='hidden' name='AVAILABILITY' value='$availability'>
                 
                 
              <button type='submit' name='edit'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='50%' height='50%' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                      <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                      <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                  </svg>
              </button>

              </form>
          </td>
          <td>
              <form  method='POST' class='button' >
                  <input type='hidden' name='ImageUrl' value='$imageUrl'>
                  <input type='hidden' name='id' value='$id'>
                  <button name='delete' value ='$id'>
                     <svg xmlns='http://www.w3.org/2000/svg' width='50%' height='50%' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                     <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
                     </svg>
                  </button>
              </form>
          </td>

          <td>
              <form  method='POST' class='button'>
                  <input type='hidden' name='TABLE_AVAILABILITY' value='$i'>
                  <input type='hidden' name='ID_AVAILABILITY' value='$id'>
                  <input type='hidden' name='NAME_AVAILABILITY' value='$name'>
                  <input type='hidden' name='PRICE_AVAILABILITY' value='$price'>
                  <input type='hidden' name='IMAGEURL_AVAILABILITY' value='$fileName'>
                  <input type='hidden' name='availability_availability' value='$availability'>
                  
                  <button name='availability'>$availability</button>
              </form>
          </td>
      </tr>";
    
  }
}




?>
