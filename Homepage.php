<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="UTF-8">
            <title>Course Reasouce Library</title>
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
        <form getCatagories = "catagoriesForm" action="addCategoryToDatabase.php" method="post">
          <input type="text" id= catagoryName name= "name" placeholder="Enter catagory name">
           <br>
          <input type="radio" id=subCatagoryToggle name="canHaveSubcategories" value="1">
          <label for="subCatagoryToggle">Has a subcatagory</label>
           <button type = "submit">confirm </button>
           <button type = "button" id = "catagoryCancel" onclick="closeCatPopup()">Cancel</button>
      </form>

       </div> 
       <a class = "addStudent" ahref = "" >  Add Student</a>


      </div>
      <!--this is the button position, size-->
      <span style="float:right;font-size:30px;cursor:pointer" onclick="openNav()">&#9776;
      </span>

      <div class ="main" id="contentSection"> 
        <button type = "button" id = "backToHome"><</button>           



      </div>
    
      


     
      
    <!-------------------------add components-------------------------------------------->

     </body>
     <script src="homePageJS.js"></script>
     <script>
      
        
      const triggerDiv = document.createElement('div');
      triggerDiv.className = "trigger-div"; 
      document.body.appendChild(triggerDiv);
      
      const triggerButton = document.createElement('button');
      triggerButton.innerText = '+';
      triggerButton.className = "trigger";
      triggerDiv.appendChild(triggerButton);
      
      const listDiv = document.createElement('div');
      listDiv.className = "list-div";
      document.body.appendChild(listDiv);

      const modal = document.createElement('div');
      modal.className = "modal";
      document.body.appendChild(modal);

      const modalContents = document.createElement('div');
      modalContents.className= "modal-contents";
      modal.appendChild(modalContents);

      const imageButton = document.createElement('button');
      imageButton.innerText = 'Image';
      imageButton.className = "add-image";
      modalContents.appendChild(imageButton);

      const fileButton = document.createElement('button');
      fileButton.innerText = 'File';
      fileButton.className = "add-file";
      modalContents.appendChild(fileButton);

      const textButton = document.createElement('button');
      textButton.innerText = 'Text';
      textButton.className = "add-text";
      modalContents.appendChild(textButton);

      const submissionButton = document.createElement('button');
      submissionButton.innerText = 'Submission';
      submissionButton.className = "add-submission";
      modalContents.appendChild(submissionButton);

      var userText = document.createElement("INPUT");
      userText.setAttribute("type", "text");
      userText.className = "text-input";
      modalContents.appendChild(userText);

      var selectedFile = document.createElement("INPUT");
      selectedFile.setAttribute("type", "file");
      selectedFile.className = "selected-file";
      modalContents.appendChild(selectedFile);

      const fileSubmitButton = document.createElement('button');
      fileSubmitButton.innerText = 'Submit';
      fileSubmitButton.className = "submit-file";
      modalContents.appendChild(fileSubmitButton);

      const textSubmitButton = document.createElement('button');
      textSubmitButton.innerText = 'Submit';
      textSubmitButton.className = "submit-text";
      modalContents.appendChild(textSubmitButton);

      const closeButton = document.createElement('span');
      closeButton.innerText = 'x';
      closeButton.className = "close-button";
      modalContents.appendChild(closeButton);


      triggerButton.addEventListener('click', () => {
          modal.classList.toggle("show-modal");
          selectedFile.style.visibility = 'hidden';
          userText.value = userText.defaultValue;
      })

      window.addEventListener('click', () => {
          if(event.target === modal) {
              modal.classList.toggle("show-modal");
          }
      })

      imageButton.addEventListener('click', () => {
          selectedFile.style.visibility = 'visible';
          userText.style.visibility = 'hidden';
          textSubmitButton.style.visibility = 'hidden';

          let pickedImg = selectedFile.src;
      })

      fileButton.addEventListener('click', () => {
          selectedFile.style.visibility = 'visible';
          fileSubmitButton.style.visibility = 'visible';
          userText.style.visibility = 'hidden';
          textSubmitButton.style.visibility = 'hidden';
      })

      fileSubmitButton.addEventListener('click', () => {
          var file = selectedFile.files[0].name;
          let fileNameInput = document.createTextNode(file);

          modal.classList.toggle("show-modal");
          addToList(fileNameInput);
      })

      textButton.addEventListener('click', () => {
          selectedFile.style.visibility = 'hidden';
          fileSubmitButton.style.visibility = 'hidden';
          userText.style.visibility = 'visible';
          textSubmitButton.style.visibility = 'visible';

      })

      textSubmitButton.addEventListener('click', () => {
          userInput = userText.value;
          let insertTextInput = document.createTextNode(userInput);

          modal.classList.toggle("show-modal");
          addToList(insertTextInput);
      })

      function addToList(child) {
          const list = document.createElement("li");
          list.style.listStyle = "none"
          list.appendChild(child);
          if(listDiv.hasChildNodes()) {
              listDiv.insertBefore(list, listDiv.firstChild);
          }
          else {
              listDiv.appendChild(list);
          }
      }
    </script>
</html>