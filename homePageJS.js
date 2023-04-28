//  The following document comprises the home page javascript functions
// Components done by Megan Hacha
// Catagories/page creation done by Halie Andrews
//database integration/insertaion and deletion aid by Alec Goodrich
 



//opens side navigation
function openNav() {
    document.getElementById("pageSidenav").style.width = "250px";
}
//closes side navigation
function closeNav() {
    document.getElementById("pageSidenav").style.width = "0";
}


//opens the form to add a catagory
function openCatPopup() {
    document.getElementById("catPopup").style.display = "block";
    document.getElementById("addCatagories").style.display = "none";
}
//closes the form to add a catagory
function closeCatPopup() {
    document.getElementById("catPopup").style.display = "none";
    document.getElementById("addCatagories").style.display = "block";

}
//contaner for storing catagories created, as its a dynamically created element a container is needed to store them
const container = document.getElementById("buttons-container");



//creates the catagory buttons
//inputs: catagoryName, userId
//outputs: catagory button with the name of the catagory

function addCategoriesToPage(categories, isTeacher) {
    for (category of categories) {
        console.log(category);
        var pageID = category.categoryID;
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const courseID = urlParams.get('courseID');
        const userID = urlParams.get('userID');
        var div = document.createElement("div");
        div.innerHTML = '<div><label style = " display: block; margin: auto; margin-top: 20px; width: 50%;height: 50px; background-color: #eceef0; color: rgb(186, 184, 184); font-size: 20px; border: none; border-radius: 5px; text-align: center; cursor: pointer;" >' + category.categoryName + '</label></div>';
        console.log("teacherVal: " + isTeacher);
        if (isTeacher == true){
        addCategoryDeleteListener(div, pageID);
        }
        addGoToCategoryListener(div, pageID);
        var requests = document.getElementById("buttons-container");
        requests.appendChild(div);
    }
}



//creates a file submision form
function addSubmissionArea(moduleID, isTeacher){
    var div = document.createElement("div");
        console.log(div);
        div.innerHTML = '<form method="post" id="submission-form" onsubmit ="return submitForm()"><input type="file" id="selected-submission" name="content"></input><input type="submit" name="submit-submission" onclick="return confirm('+"Are you sure you want to submit this file?"+')"></form>';
        if (isTeacher){
        addModuleDeleteListener(div, moduleID);
        }
        console.log("test running");
        const contentSection = document.getElementById("contentSection");
        contentSection.appendChild(div);
        console.log("test running2");
}

//searching and saving url parameters
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const pageID = urlParams.get('pageID');
const courseID = urlParams.get('courseID');
const userID = urlParams.get('userID');
var categoryForm = document.getElementById("categoryForm");
//submiting component fields to database
var t = document.getElementById("text-form");
t.action = "addModuleToDatabase.php?courseID=" + courseID + "&userID=" + userID + "&pageID=" + pageID;
var f = document.getElementById("file-form");
f.action = "addModuleToDatabase.php?courseID=" + courseID + "&userID=" + userID + "&pageID=" + pageID;
var p = document.getElementById("photo-form");
p.action = "addModuleToDatabase.php?courseID=" + courseID + "&userID=" + userID + "&pageID=" + pageID;
var s = document.getElementById("submission-form");
s.action = "addModuleToDatabase.php?courseID=" + courseID + "&userID=" + userID + "&pageID=" + pageID;
//inserts catagory names into the database
categoryForm.action = "addCategoryToDatabase.php?courseID=" + courseID + "&userID=" + userID + "&pageID=" + pageID;
addBackButtonListener();
addAddStudentButtonListener();


//hides the back navigation button when user is on the home page
if (pageID=="homepage"){
    document.getElementById("backToHome").style.visibility = 'hidden';
}

//getting the page data from the database
fetch("getPageData.php?pageID=" + pageID +"&courseID="+courseID)
    .then((response) => {
        if (!response.ok) {
            console.log("fail");
        }
        console.log("pass");
        return response.json(); // Parse the JSON data.
    })
    .then((data) => {
        // This is where you handle what to do with the response. ie storing it in a variable 
        //the database respose is sent as an array that holds arrays each field 
        console.log(data);
        var pageData = data;
        var courseData = data[0];
        var pageData = data[1];
        var subcategories = data[2];
        var contents = data[3];
        var submissions = data[4];


        //Searching and saving URL parameters
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const courseID = urlParams.get('courseID');
        const userID = urlParams.get('userID');
        const pageID = urlParams.get('pageID');
        var isTeacher = false;
        //hides the teacher buttons if the user is not a teacher
        if (courseData.teacherID != userID) {
            hideTeacherButtons();
        }
        else{
            console.log("isTeacher");
            isTeacher = true;
            addBackButtonListener();
            addAddStudentButtonListener();
        }

        if (pageData.canHaveSubcategories != 1){
            document.getElementById("addCatagories").style.visibility = 'hidden';
        }
//when redirected to a catagory page, replace course name display with catagory name display at the top of the page
        document.getElementById("pageName").innerHTML = pageData.categoryName;

       
        
        var contentID = "none";
        var moduleID = "none";
        var contentType = "none";
        var textEntered = "none";
        const list = document.querySelector("list");
        const modal = document.querySelector(".modal");
        const modalContents = document.querySelector(".modal-contents");
        const triggerDiv = document.querySelector(".trigger-div");
        const trigger = document.querySelector(".trigger");
        const closeButton = document.querySelector(".close-button");
        const listDiv = document.querySelector(".list-div");
        const textButton = document.querySelector(".add-text");
        const imageButton = document.querySelector(".add-image");
        const fileButton = document.querySelector(".add-file");
        const submissionButton = document.querySelector(".add-submission");
        const userText = document.getElementById("text-input");
        const selectedFile = document.getElementById("selected-file");
        const selectedPhoto = document.getElementById("selected-photo");
        const selectedSubmission = document.getElementById("selected-submission");
        var textSubmitForm = document.getElementById("text-form");
        var fileSubmitForm = document.getElementById("file-form");
        var photoSubmitForm = document.getElementById("photo-form");
        var submissionSubmitForm = document.getElementById("submission-form");
        const showAdd = document.querySelector(".show-added");
        trigger.addEventListener('click', () => {
            modal.classList.toggle("show-modal");
            textSubmitForm.style.visibility = 'hidden';
            fileSubmitForm.style.visibility = 'hidden';
            photoSubmitForm.style.visibility = 'hidden';
            submissionSubmitForm.style.visibility = 'hidden';
        })
        closeButton.addEventListener('click', () => {
            modal.classList.toggle("show-modal");
            textSubmitForm.style.visibility = 'hidden';
            fileSubmitForm.style.visibility = 'hidden';
            photoSubmitForm.style.visibility = 'hidden';
            submissionSubmitForm.style.visibility = 'hidden';
        })
        //Clicking the trigger toggles the modal, but this allows clicking anything other than the modal to toggle it as well.
        window.addEventListener('click', () => {
            if (event.target === modal) {
                modal.classList.toggle("show-modal");
                textSubmitForm.style.visibility = 'hidden';
                fileSubmitForm.style.visibility = 'hidden';
                photoSubmitForm.style.visibility = 'hidden';
                submissionSubmitForm.style.visibility = 'hidden';
            }
        })
        imageButton.addEventListener('click', () => {
            textSubmitForm.style.visibility = 'hidden';
            fileSubmitForm.style.visibility = 'hidden';
            photoSubmitForm.style.visibility = 'visible';
            submissionSubmitForm.style.visibility = 'hidden';
            currentlySelected = "image";
        })

        /*Because we didn't get file uploading done, this method works to get the file NAME from the database, and then
        upload it locally from the user computer via the given image file name */
        function submitPhoto(nameOfPhoto, moduleID, isTeacher) {
            var imgURL = nameOfPhoto;
            let generatedImg = document.createElement("img");
            generatedImg.src = imgURL;
            addToList(generatedImg, moduleID, isTeacher);
        }

        fileButton.addEventListener('click', () => {
            textSubmitForm.style.visibility = 'hidden';
            fileSubmitForm.style.visibility = 'visible';
            photoSubmitForm.style.visibility = 'hidden';
            submissionSubmitForm.style.visibility = 'hidden';
            currentlySelected = "file";
        })
        textButton.addEventListener('click', () => {
            textSubmitForm.style.visibility = 'visible';
            fileSubmitForm.style.visibility = 'hidden';
            photoSubmitForm.style.visibility = 'hidden';
            submissionSubmitForm.style.visibility = 'hidden';
            currentlySelected = "text";
        })
        submissionButton.addEventListener('click', () => {
            textSubmitForm.style.visibility = 'hidden';
            fileSubmitForm.style.visibility = 'hidden';
            photoSubmitForm.style.visibility = 'hidden';
            submissionSubmitForm.style.visibility = 'visible';
            currentlySelected = "submission";
        })

        //Adds the module obtained from database to the list of items to be viewed on the page.
        function addToList(child, moduleID, isTeacher) {
            console.log("got here");
            const list = document.createElement("li");
            list.style.listStyle = "none"
            console.log("moduleID: "+moduleID+" child: "+child);
            if (isTeacher){
            addModuleDeleteListener(list, moduleID);
            }
            list.appendChild(child);
            const contentSection = document.getElementById("contentSection");
            contentSection.appendChild(list);
        }

        for (var i = 0; i < contents.length; i++) {
            //Go through entire list of contents to show all modules on the page
            //Data order: contentID, moduleID, contentType, textEntered
            var contentID = contents[i].contentID;
            var moduleID = contents[i].moduleID;
            var contentType = contents[i].contentType;
            var textEntered = contents[i].textEntered;
            console.log("teachval1" + isTeacher);
            switch (contentType) {
                case "text":
                    let insertTextInput = document.createTextNode(textEntered);
                    addToList(insertTextInput,moduleID, isTeacher);
                    break;
                case "textbox":
                    let insertTextBox = document.createTextNode(textEntered);
                    addToList(insertTextBox,moduleID, isTeacher);
                    break;
                case "image":
                    submitPhoto(textEntered, moduleID, isTeacher);
                    break;
                case "file":
                    let testfile = document.createTextNode(textEntered);
                    addToList(testfile,moduleID, isTeacher);
                    break;
                case "submission":
                    console.log("testsub");
                    let submissionFile = document.createTextNode(textEntered);
                    //addSubmission(submissionFile,moduleID);
                    addSubmissionArea(moduleID, isTeacher);
                    break;
                default:
                    break;
            }
        }
        addCategoriesToPage(subcategories, isTeacher);
    })
    .catch((error) => {
        console.error('fetch could not be completed:', error);
    });

    //deletes module from page and database
function addModuleDeleteListener(module, moduleID) {
    module.addEventListener('contextmenu', function (ev) {
        ev.preventDefault();
        var answer = confirm("Delete Module?")
        if (answer) {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const courseID = urlParams.get('courseID');
            const userID = urlParams.get('userID');
            const pageID = urlParams.get('pageID');
            document.location.assign("http://localhost:3000/CS36000CourseResourceLibrary-main/DatabaseCode/deleteModuleFromDatabase.php?pageID=" + pageID + "&courseID=" + courseID + "&userID=" + userID + "&moduleID=" + moduleID);

        }
        else {
           
        }
        return false;
    }, false);
}
//deletes category from page and database
function addCategoryDeleteListener(category, categoryID) {
    category.addEventListener('contextmenu', function (ev) {
        ev.preventDefault();
        var answer = confirm("Delete Category?");
        if (answer) {
            
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const courseID = urlParams.get('courseID');
            const userID = urlParams.get('userID');
            const pageID = urlParams.get('pageID');
            document.location.assign("http://localhost:3000/CS36000CourseResourceLibrary-main/DatabaseCode/deleteCategoryFromDatabase.php?pageID=" + pageID + "&courseID=" + courseID + "&userID=" + userID + "&categoryID=" + categoryID);

        }
        else {
            
        }
        return false;
    }, false);
}
//redirects to category page
//inputs: category button, category ID
//outputs: catagoryId, courseID, userID
function addGoToCategoryListener(category, categoryID) {
    category.addEventListener('click', function (ev) {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const courseID = urlParams.get('courseID');
        const userID = urlParams.get('userID');
        const pageID = urlParams.get('pageID');
        document.location.assign("http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?pageID=" + categoryID + "&courseID=" + courseID + "&userID=" + userID + "&categoryID=" + categoryID);
    }, false);
}
//redirects to parent page from subpages, either from catagory page to homepage or subcategory page to parent catagory page 
function addBackButtonListener() {
    let backButton = document.getElementById("backToHome");
    backButton.addEventListener('click', () => {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const courseID = urlParams.get('courseID');
        const userID = urlParams.get('userID');
        document.location.assign("http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?pageID=homepage&courseID=" + courseID + "&userID=" + userID);

    })

}
//redirects to student admission request page
function addAddStudentButtonListener() {
    let addStudentButton = document.getElementById("addStudent");
    addStudentButton.addEventListener('click', () => {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const courseID = urlParams.get('courseID');
        const userID = urlParams.get('userID');
        document.location.assign("http://localhost:3000/CS36000CourseResourceLibrary-main/userRequestsPage.php?courseID=" + courseID + "&userID=" + userID);

    })
}
//hides teacher buttons from student view
function hideTeacherButtons() {
    let addStudentButton = document.getElementById("addStudent");
    let addModuleButton = document.getElementById("addModule");
    let addCategoryButton = document.getElementById("addCatagories");
    addStudentButton.style.visibility = 'hidden';
    addModuleButton.style.visibility = 'hidden';
    addCategoryButton.style.visibility = 'hidden';
}
