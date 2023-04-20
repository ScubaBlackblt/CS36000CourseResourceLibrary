<?php 
        include 'connect.php';

        $sql = "SELECT * FROM course WHERE courseID = 1";
        $course = $con->query($sql);

        if ($pageID = "homepage"){
          $sql = "SELECT * FROM category WHERE courseID = 1";
          $page = $con->query($sql);
        }
        else{
          $sql = "SELECT * FROM category WHERE categoryID = 1";
          $page = $con->query($sql);
        }

        $sql = "SELECT content.* FROM content INNER JOIN module ON module.moduleID = content.moduleID INNER JOIN category ON category.categoryID = module.categoryID WHERE category.categoryID = 1 ORDER BY content.contentID";
        $content = $con->query($sql);
          
          if ($content->num_rows > 0) {
            // output data of each row
            while($row = $content->fetch_assoc()) {
              echo "id: " . $row["contentID"]. "<br>";
            }
          } else {
            echo "0 results";
          }
        
        $con->close();
        // echo 'welcome to php';
        ?>