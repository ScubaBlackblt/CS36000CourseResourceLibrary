<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="UTF-8">
            <title>Course Reasource Library</title>
            <link rel="stylesheet" href="homePageCSS.css">
         </head>
          <body>
<!-----------------------Class Name Block----------------------------------------------------------->
<!----------------datbase will need to be linked in link below upon completion for full testing----------------------->
     <div class="top"> 
     <!--  <h1> <//?php echo $courseName; ?> </h1>-->      
      <button class="editCourseName" onclick="openForm()">+</button>
            <div class ="form-popup" id="classForm">
               <form className="classNameForm" action="/insert" method="post">
                <input type = "text" id="cName" class = "form-conrtol" name = "courseName" placeholder = "Enter Class Name">
                <button type ="submit">Submit</button>
                <a href="javascript:void(0)" class="closebtn" onclick="closeForm()">&times;</a>
                
                </form>    
            </div>
      </div>
      
      
   
<!-------------------------------------------------------->
          
      <!--side navigation-->
      <div id="mySidenav" class="sidenav">
      <!--links button to javaSprit-->
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <!--the list that displays all cataries in side bar, js add each new list item and pulls both the course id and---------------
        -------------and the catagory name from database for creation ------------------------------------------------->
        <div class = "container" id="buttons-container">
        </div>
        <br>
        <br>
        <br>
        <br>
       <button type ="button" id="addCatagories" onclick="openCatPopup()">+</button>
       <div class= "catagoriesPopup" id = "catPopup"> 
        <form getCatagories = "catagoriesForm" action="addCategoryToDatabase.php" method="post" id="categoryForm">
          <input type="text" id= catagoryName name= "name" placeholder="Enter catagory name">
           <br>
           <select name="canHaveSubcategories">
				<option value="1">Can have subcategories</option>
				<option value="0">Can't have subcategories</option>
			</select>
          <label for="subCatagoryToggle">Has a subcatagory</label>
           <button type = "submit">confirm </button>
           <button type = "button" id = "catagoryCancel" onclick="closeCatPopup()">Cancel</button>
      </form>
       </div> 
       <button type= "button" id = "addStudent" onclick="changePage()" >  Add Student</a>
      </div>
      <!--this is the button position, size-->
      <span style="float:right;font-size:30px;cursor:pointer" onclick="openNav()">&#9776;
      </span>
      <div class ="main" id="contentSection"> 
        <button type = "button" id = "backToHome"><</button>           
      </div>
    
      
      <div class="trigger-div"></div>
    <button class="trigger">
        +
    </button>
    </div>
    <div class="list-div">
        <ul class="list">
        </ul>
    </div>
    <div class="show-added">
    </div>
    <div class="modal">
        <div class="modal-contents">
            <button class="add-image">Image
            </button>
            <button class="add-file">File
            </button>
            <button class="add-text">Text</button>
            <button class="add-submission">Submission
            </button>
            <form action="addModuleToDatabase.php" method="post" id="text-form">
                <input type="text" id="text-input" name="content">
                <input type="submit" name="text-submit" />
                <input name="contentType" value="text" style="visibility: hidden">
            </form>
            <form action="addModuleToDatabase.php" method="post" id="file-form">
                <input type="file" id="selected-file" name="content"> </input>
                <input type="submit" name="file-submit" />
                <input name="contentType" value="file" style="visibility: hidden">
            </form>
            <form action="addModuleToDatabase.php" method="post" id="photo-form">
                <input type="file" id="selected-photo" name="content"></input>
                <input type="submit" name="submit-photo" />
                <input name="contentType" value="image" style="visibility: hidden">
            </form>
            <form action="addModuleToDatabase.php" method="post" id="submission-form">
                <input type="file" id="selected-submission" name="content"></input>
                <input type="submit" name="submit-submission"></input>
                <input name="contentType" value="submission" style="visibility: hidden">
            </form>
            <span class="close-button">x</span>
        </div>
    </div>
     
     
      
    <!-------------------------add components-------------------------------------------->
   
     </body>
     <script src="homePageJS.js"></script>
     
</html>
