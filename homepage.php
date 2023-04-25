<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Course Reasource Library</title>
    <link rel="stylesheet" href="homePageCSS.css">
    <link rel="stylesheet" href="Components/componentCSS.css">
</head>

<body>
    <!-----------------------Class Name Block----------------------------------------------------------->
    <!----------------datbase will need to be linked in link below upon completion for full testing----------------------->
    <div class="top">
    <button type="button" id="backToHome" style="position: absolute; top: 2%; left: 1%; padding: 10px"><</button>
        <!--  <h1> <//?php echo $courseName; ?> </h1>-->
        <!-- <button class="editCourseName" onclick="openForm()">+</button>
            <div class ="form-popup" id="classForm">
               <form className="classNameForm" action="/insert" method="post">
                <input type = "text" id="cName" class = "form-conrtol" name = "courseName" placeholder = "Enter Class Name">
                <button type ="submit">Submit</button>
                <a href="javascript:void(0)" class="closebtn" onclick="closeForm()">&times;</a>
                
                </form>    
            </div> -->
        <div id="pageName">

        </div>

    </div>



    <!-------------------------------------------------------->

    <!--side navigation-->
    <div id="mySidenav" class="sidenav">
        <!--links button to javaSprit-->
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <!--the list that displays all cataries in side bar, js add each new list item and pulls both the course id and---------------
        -------------and the catagory name from database for creation ------------------------------------------------->
        <div class="container" id="buttons-container">
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="catagoriesPopup" id="catPopup">
            <form getCatagories="catagoriesForm" action="addCategoryToDatabase.php" method="post" id="categoryForm">
                <input type="text" id=catagoryName name="name" placeholder="Enter catagory name">
                <br>
                <br>
                <select name="canHaveSubcategories">
                    <option value="1">Can have subcategories</option>
                    <option value="0">Can't have subcategories</option>
                </select>

                <br>
                <br>
                <button type="submit">confirm </button>
                <button type="button" id="catagoryCancel" onclick="closeCatPopup()">Cancel</button>
            </form>
        </div>
        <button type="button" id="addCatagories" onclick="openCatPopup()">+</button>

        <button type="button" id="addStudent" onclick="changePage()"> Add Student</a>
    </div>
    <!--this is the button position, size-->
    <span style="float:right;font-size:30px;cursor:pointer" onclick="openNav()">&#9776;
    </span>
    <div class="main" id="contentSection">
        
            <ul class="list">
                </ul>


    </div>
    <br><br>
    <button class="trigger" id="addModule">
        +
    </button>


    <div class="trigger-div"></div>

    </div>
    <!-- <div class="list-div">
        
    </div> -->
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
            <form method="post" id="text-form">
                <input type="text" id="text-input" name="content">
                <input type="submit" name="text-submit" />
                <input name="contentType" value="text" style="visibility: hidden">
            </form>
            <form method="post" id="file-form">
                <input type="file" id="selected-file" name="content"> </input>
                <input type="submit" name="file-submit" />
                <input name="contentType" value="file" style="visibility: hidden">
            </form>
            <form method="post" id="photo-form">
                <input type="file" id="selected-photo" name="content"></input>
                <input type="submit" name="submit-photo" />
                <input name="contentType" value="image" style="visibility: hidden">
            </form>
            <form method="post" id="submission-form">
                <input type="file" id="selected-submission" name="content"></input>
                <input type="submit" name="submit-submission"></input>
                <input name="contentType" value="submission" style="visibility: hidden">
            </form>
            <span class="close-button">x</span>
        </div>
    </div>



    <!-------------------------add components-------------------------------------------->

</body>
<div id="IDtoDelete" style="visibility: hidden">

</div>
<script src="homePageJS.js"></script>

</html>