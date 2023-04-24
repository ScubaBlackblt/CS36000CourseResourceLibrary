
           ////class form js
  function openForm() {
    document.getElementById("classForm").style.display = "block"
   }  
function closeForm(){
       document.getElementById("classForm").style.display = "none"
      }

let cNameForm = document.getElementById("classNameForm");

cNameForm.addEventListener("submit", (e)=> {
e.preventDefault()          
let cName = document.getElementById("cName");
   if(cName.value == ""){
        alert("Please ensure the field is filled")
    }
    else{
        alert("Class Name Updated, page may need reloded for update")
     }
          ///document.getElementById("classNameFrom").style.display="none";
           //document.getElementById("cName").innerHTML = cName;

     });


//side navigation js
function openNav() {
document.getElementById("mySidenav").style.width = "250px";
}
  
function closeNav() {
document.getElementById("mySidenav").style.width = "0";
}

//catagory popup js
function openCatPopup(){
document.getElementById("catPopup").style.display="block";

}
function closeCatPopup(){
document.getElementById("catPopup").style.display="none";

}
//catagory list js
const container = document.getElementById("buttons-container");

// Loop through the buttons data and generate HTML code for each button
for (const button of buttons) {
const name = button.name;
const categoryID = button.category_id;
const buttonElement = document.createElement("button");
buttonElement.textContent = name;

// Add an event listener to the button that reloads the page with the content of the corresponding category
buttonElement.addEventListener("click", () => {
window.location.href = `getPageData.php?category_id=${categoryID}`;
});

// Add the button to the container element
container.appendChild(buttonElement);
}



function changePage(courseID,pageID){
document.location.assign("http://localhost:3000/CS36000CourseResourceLibrary-main/userRequestsPage.php?pageID="+pageID+"&courseID=" + (courseID));
}
function backToHomepage(courseID){
document.location.assign("http://localhost:3000/CS36000CourseResourceLibrary-main/userRequestsPage.php?pageID=homepage&courseID=" + (courseID));
}
fetch("getPageData.php")
        .then((response) => {
            if (!response.ok) {
                console.log("fail");
            }
            console.log("pass");
            return response.json(); // Parse the JSON data.
        })
        .then((data) => {          
            // This is where you handle what to do with the response.
            console.log(data);
            var pageData = data;
            var courseData = data[0];
            var pageData = data[1];
            var subcategories = data[2];
            var contents = data[3];
            var submissions = data[4];

           // put page load code here like calling loadPage(data); and putting above declarations at start of function
            var imageCounter = 0;
            var fileCounter = 0;
            var textBoxCounter = 0;
            var submissionCounter = 0;
            var currentlySelected = "none";
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
            function submitPhoto() {
                if (verifyImage(selectedPhoto.files[0]) == 1) {
                    modal.classList.toggle("show-modal");
                    var img = selectedPhoto.files[0];
                    var imgReader = new FileReader();
                    imgReader.onload = function(e) {
                        var showImage = document.createElement("img");
                        showImage.src = e.target.result;
                        contentType = "image";
                        textEntered = "none";
                        addToList(showImage);
                    }
                    imgReader.readAsDataURL(img);
                }
            }
            fileButton.addEventListener('click', () => {
                textSubmitForm.style.visibility = 'hidden';
                fileSubmitForm.style.visibility = 'visible';
                photoSubmitForm.style.visibility = 'hidden';
                submissionSubmitForm.style.visibility = 'hidden';
                currentlySelected = "file";
            })
            function submitFile() {
                var file = selectedFile.files[0].name;
                let fileNameInput = document.createTextNode(file);
                modal.classList.toggle("show-modal");
                fileCounter++;
                contentID = fileCounter;
                moduleID = "file";
                contentType = "file";
                textEntered = "none";
                addToList(fileNameInput);
            }
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
            function submitSubmissionFile() {
                var chosenFile = selectedFile.files[0].name;
                const response = confirm("Is this the file you would like to submit?");
                if (response) {
                    //This is where it will be sent to the database.
                    submissionCounter++;
                    contentID = submissionCounter;
                    moduleID = "sub";
                    contentType = "submission";
                    textEntered = "none";
                    alert("Your assignment was submitted!");
                    modal.classList.toggle("show-modal");
                }
            }
            function addToList(child) {
                const list = document.createElement("li");
                list.style.listStyle = "none"
                list.appendChild(child);
                listDiv.appendChild(list);
            }
            for (var i = 0; i < contents.length; i++) {
                //Data order: contentID, moduleID, contentType, textEntered;
                var contentID = contents[i].contentID;
                var moduleID = contents[i].moduleID;
                var contentType = contents[i].contentType;
                var textEntered = contents[i].textEntered;
                    let insertTextInput = document.createTextNode(textEntered);
                    addToList(insertTextInput);
            }
            function verifyImage(file) {
                let filename = file.name;
                const fileExt = filename.split('.').pop();
                if (fileExt == "jpg" || fileExt == "png") {
                    return 1;
                } else {
                    alert("Please select a valid photo type (.jpg or .png)");
                    return -1;
                }
            }
        })
        .catch((error) => {
            // This is where you handle errors.
        });



  //    function showCatagory(catagory_id){
  //     var retriv = new XMLHttpRequest();
  //     xhr.open("GET", "getPageData.php?id=" + id, true);
  //      retriv.onload = function() {
  //   if (retriv.status === 200) {
  //     // Update content area with retrieved content
  //     var contentArea = document.getElementById("content-area");
  //     contentArea.innerHTML = retriv.responseText;
  //   }
  // };
  // retriv.send();
  //    }
  //    var catagory_list = document.getElementById("item-list");
  //    catagory_list.addEventListener("click", function(e) {
  //      if (e.target && e.target.nodeName === "LI") {
  //        // Get selected item and show content
  //        var id = e.target.id;
  //        showItem(id);
  //      }
  //    });
                 
         