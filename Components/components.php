<html>

<head>
    <link rel="stylesheet" href="componentCSS.css">
</head>

<body>

    <div class="trigger-div"></div>
    <button class="trigger">
        +
    </button>
    </div>

    <div class="list-div">
    </div>

    <div class="submission-list">
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

</body>

<script>
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
            //put page load code here like calling loadPage(data); and putting above declarations at start of function
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
            const submissionList = document.querySelector("submission-list");

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

            fileButton.addEventListener('click', () => {
                textSubmitForm.style.visibility = 'hidden';
                fileSubmitForm.style.visibility = 'visible';
                photoSubmitForm.style.visibility = 'hidden';
                submissionSubmitForm.style.visibility = 'hidden';
                currentlySelected = "file";
            })

            function submitFile(databaseFile) {
                var file = dataBaseFile
                let fileNameInput = document.createTextNode(file);
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

            function showSubmittedFiles(dataBaseSubmission) {
                var fileSubmitted = databaseSubmission;
                var showSubmitted = document.createTextNode(databaseSubmission);
                addtoList(showSubmitted);
            }


            function addToList(child) {
                const list = document.createElement("li");
                list.style.listStyle = "none"
                list.appendChild(child);
                listDiv.appendChild(list);
            }

            function addSubmission(child) {
                const sList = document.createElement("li");
                sList.style.listStyle = "none";
                submissionList.appendChild(child);

            }

            for (var i = 0; i < contents.length; i++) {
                //Data order: contentID, moduleID, contentType, textEntered;
                var contentID = contents[i].contentID;
                var moduleID = contents[i].moduleID;
                var contentType = contents[i].contentType;
                var textEntered = contents[i].textEntered;

                switch (contentType) {
                    case "text":
                        let insertTextInput = document.createTextNode(textEntered);
                        addToList(insertTextInput);
                        break;
                    case "textbox":
                        let insertTextBox = document.createTextNode(textEntered);
                        addToList(insertTextBox);
                        break;
                    case "image":
                        submitPhoto(textEntered);
                        break;
                    case "file":
                        let testfile = document.createTextNode(textEntered);
                        addToList(testfile);
                        break;
                    case "submission":
                        let submissionFile = document.createTextNode(textEntered);
                        addSubmission(submissionFile);
                        break;
                    default:
                        break;
                }


            }

            function submitPhoto(nameOfPhoto) {
                    var imgURL = nameOfPhoto;
                    let generatedImg = document.createElement("img");

                    generatedImg.src = imgURL;
                    addToList(generatedImg);
                }
        })
        .catch((error) => {
            // This is where you handle errors.
        });
</script>

</html>