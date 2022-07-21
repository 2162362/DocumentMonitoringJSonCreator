<?php
   if(isset($_FILES['json_file'])){
      $errors= array();
      $file_name = $_FILES['json_file']['name'];
      $file_size = $_FILES['json_file']['size'];
      $file_tmp = $_FILES['json_file']['tmp_name'];
      $file_type = $_FILES['json_file']['type'];
      $file_ext=pathinfo($_FILES['json_file']['name'], PATHINFO_EXTENSION);
      //pathinfo($file_name, PATHINFO_EXTENSION)
      
      $extensions= array("json");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JSON file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be exactly 2 MB';
      }
      
      if(empty($errors)==true) {
         //move_uploaded_file($file_tmp,"files/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }

   function print_recursive($arr){

      foreach ($arr as $key => $val) {
        if (is_array($val)) {
          print_recursive($val);
    
        } else {
           echo("$key = $val <br/>");
        }
      }
      return;
   }
?>
<html>
   <body>
      
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "json_file" />
         <input type = "submit"/>
		<?php
            if(isset($_FILES['json_file'])){
            
               echo'    <ul>
                    <li>Sent file: '. $_FILES['json_file']['name'] .'
                    <li>File size: '. $_FILES['json_file']['size'] .'
                    <li>File type: '. $_FILES['json_file']['type'] .'
                    </ul>';
                  $json = file_get_contents($_FILES['json_file']['tmp_name']);  
                  $data = json_decode($json, true);
                  
                  print_recursive($data);
                  //echo "<pre>".$data."<pre/>";
            }
        ?>
			
      </form>
   </body>
</html>