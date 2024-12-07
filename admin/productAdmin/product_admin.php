<?php

    session_start();

    include '..\assets\connect.php';
   
 
    
    function jsoncrud($TABLE,$ID,$NAME,$PRICE,$IMAGEURL,$AVAILABILITY,$jsonFilePath){ 
        
        
        // This function use to insert a value in json file
     /*   if (file_exists($jsonFilePath)) {


            // Read the existing JSON data
            $jsonData = file_get_contents($jsonFilePath);
            $productList = json_decode($jsonData, true);  // Decode JSON into associative array
    
            // Flag to check if the product was updated
            $updated = false;
    
            // Loop through the existing products and update the matching ID
            foreach ($productList as &$product) {
                    $product['TABLE'] = $TABLE; 
                    $product['ID'] = $ID; 
                    $product['NAME'] = $NAME;
                    $product['PRICE'] = $PRICE;
                    $product['IMAGEURL'] = $IMAGEURL;
                    $product['AVAILABILITY'] = $AVAILABILITY;
                    $updated = true;
                    break;
                
            }
    
            // If the product was not found, add a new one
            if (!$updated) {
                $productList[] = [
                    'TABLE' => $TABLE,
                    'ID' => $ID,
                    'NAME' => $NAME,
                    'PRICE' => $PRICE,
                    'IMAGEURL' => $IMAGEURL,
                    'AVAILABILITY' => $IMAGEURL
                ];
            }
    
            // Save the updated product list back to the JSON file
            $updatedJsonData = json_encode($productList, JSON_PRETTY_PRINT);
            file_put_contents($jsonFilePath, $updatedJsonData);

            

        }*/

        $productList = [
            'TABLE' => $TABLE,
            'ID' => $ID,
            'NAME' => $NAME,
            'PRICE' => $PRICE,
            'IMAGEURL' => $IMAGEURL,
            'AVAILABILITY' => $AVAILABILITY
        ];
      
           
            foreach ($productList as $key => $value) {
                echo "<script>console.log('" . $value. "');</script>";
            }

            $_SESSION['productList'] = $productList;  // Save content in session
        

     
       
        

        
    }

    if ( $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['availability'])) {

        
        $TABLE_AVAILABILITY= $_POST['TABLE_AVAILABILITY'];
        $ID_AVAILABILITY = $_POST['ID_AVAILABILITY'];
        $NAME_AVAILABILITY = $_POST['NAME_AVAILABILITY'];
        $PRICE_AVAILABILITY = $_POST['PRICE_AVAILABILITY'];
        $IMAGEURL_AVAILABILITY = $_POST['IMAGEURL_AVAILABILITY'];
        $is_it_available = $_POST['availability_availability'];
        $jsonFilePath_availability = '../assets/availability.json';

        if($is_it_available === "Available"){
            $is_it_available_txt = "Sold Out";
            
        }
        else if ($is_it_available === "Sold Out"){
            $is_it_available_txt = "Available";
        }
        $query = "UPDATE choice$TABLE_AVAILABILITY SET availability = '$is_it_available_txt' WHERE id=$ID_AVAILABILITY"; 
        $add_product = mysqli_query($conn,$query);  

        echo "<script>alert('The availability has been successfully updated.')</script>";

    }
   
    if(isset($_POST["submit"])){
        $productname = $_POST["product_name"];
        $productprice = $_POST["product_price"];
        $select = $_POST["select"];

        $fileName = $_FILES["img"]["name"];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        $tempName = $_FILES["img"]["tmp_name"];
        $targetPath = "../assets/uploaded_img/".$fileName;

        echo '<script> console.log("'.$productname.', '. $productprice.', '. $select .', '. $targetPath.'")</script>';

        if(in_array($ext, $allowedTypes)){
            if(move_uploaded_file($tempName, $targetPath)){
                $query = "INSERT INTO $select (name, price,img,availability) VALUES ('$productname', '$productprice', '$fileName','Available')"; 
                $add_product = mysqli_query($conn,$query);

                if(!$add_product){
                    echo "Something went wrong". mysqli_error($conn);
                  }
      
                  else{
                    echo "<script type='text/javascript'>
                    alert('Product Added');
                    window.location.href = '" . $_SERVER['PHP_SELF'] . "';
                    </script>";
                    exit;
                  }

          
            }
        }
    }

          // Read the contents of the JSON file
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
         
          
          if ( $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
              // Declare global variables inside this block to use them
              // Retrieve form data from POST request
              $TABLE= $_POST['TABLE'];
              $ID = $_POST['ID'];
              $NAME = $_POST['NAME'];
              $PRICE = $_POST['PRICE'];
              $IMAGEURL = $_POST['IMAGEURL'];
              $AVAILABILITY = $_POST['AVAILABILITY'];
              // Now you can process the data, for example:
            //  echo "<script>console.log('Table: $TABLE')</script>";
            //  echo "<script>console.log('ID: $ID')</script>";
            //  echo "<script>console.log('Name: $NAME')</script>";
            //  echo "<script>console.log('Price: $PRICE')</script>";
            //  echo "<script>console.log('Image URL: $IMAGEURL')</script>";
            

              $jsonFilePath_edit = '../assets/edit_list.json';

              jsoncrud( $TABLE,
                        $ID,
                        $NAME,
                        $PRICE,
                        $IMAGEURL,
                        $AVAILABILITY,
                        $jsonFilePath_edit );  
                  // header("Location: product_admin_edit.php?");
                        echo "<script>window.location.href='product_admin_edit.php'</script>";
                        exit();
                     
          }
          
              if(isset($_POST["delete"])){

                 
  
                  $id = $_POST["id"];
                  $urlImg = $_POST["ImageUrl"];
  
                  for ($i=1; $i <= 10 ; $i++) { 
                      $delete_id = "DELETE  FROM choice$i WHERE id = $id" ;
                      $result = mysqli_query($conn, $delete_id);
               
                    
                  }

                  echo "<script>
                  alert('Deleted Successfully'); </script>";

                
  
               //   if (file_exists($urlImg)) {
               //       // Delete the file
               //       unlink($urlImg);
               //   }
                 
                 
               }
       


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin product</title>
    <link rel="stylesheet" href="product_admin.css">
    <script src="../assets/links.js"></script>
    <script src="product_admin.js" defer></script>

   
</head>


<body onload="table();">



    <nav >

        <div class="logo_wrapper">
            <img src="..\assets\logo_processed.png" alt="AoLogo">
        </div>


        <div class="customer_acc_wrapper" onclick="redirect(this)">
         <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="100%" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
         </svg>
            <h1>Accounts</h1>
        </div>

        <div class="product_wrapper" onclick="redirect(this)">
         <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="100%" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
          <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
        </svg>
            <h1>Product</h1>
        </div>

        <div class="staffs_wrapper" onclick="redirect(this)">

        <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="100%" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
          <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
         <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z"/>
        </svg>
            <h1>Staffs</h1>
        </div>

        <div class="transaction_wrapper" onclick="redirect(this)">
         <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="100%" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
           <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
           <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
           <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
           <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
        </svg>
            <h1>Transactions</h1>
        </div>

        <div class="settings_wrapper" onclick="redirect(this)">

        <svg xmlns="http://www.w3.org/2000/svg"  width="50%" height="100%" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
         <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
        </svg>
            <h1>Settings</h1>
        </div>

        <div class="signout_wrapper">
           <button>
           <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
             <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
             <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
            </svg> 
              Sign Out
           </button>
        </div>

    </nav>

    <main id="main">
        
<div class="page_title">
            <h1>Products</h1>

        </div>

        <div class="content_wrapper">


            <form action="" method="post" enctype="multipart/form-data">

                <div class="productname_wrapper">
                    <label for="product_name">Product Name:</label>
                    <input type="text" name="product_name" placeholder="Enter product name" required>
                </div>

                <div class="price_wrapper">
                    <label for="product_price">Price:</label>
                    <input type="number" min="1" name="product_price" placeholder="Enter product price"  required>
                </div> 

                <div class="file_wrapper">
                    <label for="img">Insert file:</label>
                    <input type="file" accept=".jpg, .jpeg, .png" value="" name="img" required>

                </div>

                <div class="option_wrapper">
                    <label for="select">Select:</label>
                    <select name="select" id="" required>
                        <option value="choice1">Must Try</option>
                        <option value="choice2">Starters</option>
                        <option value="choice3">Japanese</option>
                        <option value="choice4">Korean</option>
                        <option value="choice5">Ramen</option>
                        <option value="choice6">Chinese/Filipino</option>
                        <option value="choice7">Rice</option>
                        <option value="choice8">Soup</option>
                        <option value="choice9">Desserts</option>
                        <option value="choice10">Drinks</option>
                    </select>

                </div>

                <div class="submit_wrapper">

                
                    <input type="submit" value="Add Product" name="submit" >

                </div>
            </form>

            <br>

            <div class="choice">
             
            <select id="choices"  oninput="displayChoice(this)">
                        <option value="choice1" selected>Must Try</option>
                        <option value="choice2" >Starters</option>
                        <option value="choice3">Japanese</option>
                        <option value="choice4">Korean</option>
                        <option value="choice5">Ramen</option>
                        <option value="choice6">Chinese/Filipino</option>
                        <option value="choice7">Rice</option>
                        <option value="choice8">Soup</option>
                        <option value="choice9">Desserts</option>
                        <option value="choice10">Drinks</option>
              </select>
        </div>

        <br>
        <div class='table_wrapper'  >

   

            <?php

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

            for ($i=1; $i <=10 ; $i++) { 
                     
                echo "<table border='0' class='choice_content' id='table_wrapper'>
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

               echo  "</table> <br>";
               

            }
            ?>

       
        </div>
  
    </main>




  
</body>
</html>

<?php



?>