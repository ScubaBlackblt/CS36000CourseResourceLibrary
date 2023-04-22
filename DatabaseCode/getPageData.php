<?php 
        include 'connect.php';

        $sql = "SELECT * FROM course WHERE courseID = 1";
        $course = $con->query($sql)->fetch_assoc();

        //$pageID = $_GET['pageID'];
        $pageID = "homepage";

        if ($pageID == "homepage"){
          $sql = "SELECT * FROM category WHERE courseID = ".$course['courseID'].";";
          $page = $con->query($sql)->fetch_assoc();
        }
        else{
          $sql = "SELECT * FROM category WHERE categoryID = ".$pageID.";";
          $page = $con->query($sql)->fetch_assoc();
        }
        $subcategoriesArray = array();
        if ($page['canHaveSubcategories'] == 1){
            $sql = "SELECT * FROM category WHERE parentID = ".$page['categoryID'].";";
            $subcategories = $con->query($sql);
            if ($subcategories->num_rows > 0) {
                while($subcategory = $subcategories->fetch_assoc()) {
                    array_push($subcategoriesArray, $subcategory);
                }
            }
        }

        $sql = "SELECT content.* FROM content INNER JOIN module ON module.moduleID = content.moduleID INNER JOIN category ON category.categoryID = module.categoryID WHERE category.categoryID = ".$page['categoryID']." ORDER BY content.contentID";
        $contents = $con->query($sql);
        $contentArray = array();
        $submissions = array();
        if ($contents->num_rows > 0) {
            while($content = $contents->fetch_assoc()) {
                array_push($contentArray, $content);
                if ($content['contentType'] == "submssion"){
                    $sql = "SELECT * FROM submissions WHERE contentID = ".$content['contentID'].";";
                    $submission = $con->query($sql)->fetch_assoc();
                    echo "test";
                    array_push($submissions, $submission);
                }  
            }
        }

        $output = array($course, $page, $subcategoriesArray, $contentArray, $submissions);

        echo json_encode($output);
        $con->close();
        ?>