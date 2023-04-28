<!-- The following document comprises the home page
Components done by Megan Hacha
page creation/categories done by Halie Andrews -->
<!-- Inputs pageId, userId, courseId  -->
<!DOCTYPE html>
<html lang="en">
                      <!-- The head of the document is where basic information about the page is stored, such as the title, the character set, and the viewport.
                        The viewport is the user's visible area of a web page. It varies with the device, and will be smaller on a mobile phone than on a computer screen.  -->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Course Reasource Library</title>
    <link rel="stylesheet" href="homePageCSS.css">
    <link rel="stylesheet" href="Components/componentCSS.css">
</head>
<body>
    <!-----------------------Page Name Block------------------------------------------------------------------------------------------>
    <div class="top">
    <button type="button" id="backToHome" style="position: absolute; top: 2%; left: 1%; padding: 10px"><</button>
        <div id="pageName">
        </div>
    </div>
    
    <!--side navigation---------------------------------------------------------------------------------------------------------------->
    <div id="pageSidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="container" id="buttons-container">
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="catagoriesPopup" id="catPopup">
<!---------------------------Form for user catagory creation, sumbits to databse---------------------------------------------------------->
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
    <!--this is the open button position & size for side navigation-->
    <span style="float:right;font-size:30px;cursor:pointer" onclick="openNav()">&#9776;
    </span>

<!------------------------------------main div of page, where conent is displayed from database and added to-------------------------------------->    
    <div class="main" id="contentSection">
<!----------component submisison stored in vertical list------------------------------------------------------------------------------------------>        
            <ul class="list">
                </ul>
    </div>

<!--------------------------------compontents forms, hidden by js counter parts until trigger clicked on--------------------------------------------------->    
    <br><br>
    <button class="trigger" id="addModule">
        +
    </button>
    <div class="trigger-div"></div>
    </div>
    <div class="show-added">
    </div>
<!-------------------------------modal, which holds buttons that allow a user to specify what type of upload they are doing------------------------------->
    <div class="modal">
        <div class="modal-contents">
            <button class="add-image">Image
            </button>
            <button class="add-file">File
            </button>
            <button class="add-text">Text</button>
            <button class="add-submission">Submission
            </button>
<!----------------------------a form that takes the user's text input and pushes it to the database------------------------------------------------------->
            <form method="post" id="text-form">
                <input type="text" id="text-input" name="content">
                <input type="submit" name="text-submit" />
                <input name="contentType" value="text" style="visibility: hidden">
            </form>
<!---------------------------a form that takes the name of a file the user selects, and sends that info to the database (along with upload type)----------->
            <form method="post" id="file-form">
                <input type="file" id="selected-file" name="content"> </input>
                <input type="submit" name="file-submit" />
                <input name="contentType" value="file" style="visibility: hidden">
            </form>
<!--------------------------a form that takes the name of an image file the user selects, then sends name and upload type to database----------------------->
            <form method="post" id="photo-form">
                <input type="file" id="selected-photo" name="content"></input>
                <input type="submit" name="submit-photo" />
                <input name="contentType" value="image" style="visibility: hidden">
            </form>
<!--------------------------a form that can be used to upload a file to a submission database----------------------------------------------------------------->
<!--Because we were unable to do file uploading, this form is mainly used for the purpose of the page knowing when to insert a file chooser-->
            <form method="post" id="submission-form">
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