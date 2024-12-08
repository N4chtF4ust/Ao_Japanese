<?php
include("../Ao_connect.php");


$select_img = "SELECT * FROM choice3"; //." WHERE availability = 'Available' ";
$result = mysqli_query($conn, $select_img);

if ($result->num_rows>0) {
    while($row = mysqli_fetch_array($result)){
        
        $id = $row["id"];
        $name = $row["name"];
        $price = $row["price"];
        $fileName = $row["img"];
        $availability = $row["availability"];
        $imageUrl = "/Ao_Japanese/admin/assets/uploaded_img/$fileName";

        $IsItAvailable = ($availability === "Available")?True:False;

        echo "
             <div class='review_box' >
        <div class='review_content'>

            <div class='img_wrapper'>
                 <img src='$imageUrl' alt='$name '>";

      if(!$IsItAvailable){
          echo "<svg xmlns='http://www.w3.org/2000/svg' width='80%' height='80%' fill='currentColor' class='bi bi-ban' viewBox='0 0 16 16'>
          <path d='M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0'/>
          </svg>";
          
      }

           echo" </div>

            <div class='quantity_wrapper' >
                <p> $name</p>
                <p>Php <span>$price</span></p>
            </div>";

            if($IsItAvailable){
                echo  "<button class=' $availability' onclick='testing($id,\"$name\",$price,\"$fileName\",\"choice3\");'>
                         Add to Cart
                       </button>";   
            }

            else{
                echo  "<button class=' $availability'>
                       Not Available
                      </button>";   

            }

             
        echo "</div>
    </div>";
      
      
      }
  }

  



?>