<!-- The userRequestsPage displays the currrent requests to join a course to a teacher. Clicking accept or reject then submit will 
allow the student who's username is listed next to the selected submit button will be accepted to/rejected from accessing the course. 
Clicking the back button will bring the user back the the courses homepage.
Inputs: n/a
Outputs: n/a
By: Alec Goodrich
Date Last Modified: 4/28/2023
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Course Reasouce Library</title>
    <link rel="stylesheet" href="homePageCSS.css">


</head>

<body>
    <!-- To top bar of the page -->
    <div class="top">
        <button type = "button" id = "backToHome" style="position: absolute; top: 2%; left: 1%; padding: 10px;"><</button>
        <div id="pageName" style="font-size: 2.5em;">Add Students to Course</div>
        <script>
        // Adds listner to back button that when clicked goes back to homepage
        // Inputs: n/a
        // Outputs: n/a
        let backButton = document.getElementById("backToHome");
        backButton.addEventListener('click', () => {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const courseID = urlParams.get('courseID');
            const userID = urlParams.get('userID');
            // Go back to homepage
            document.location.assign("http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?pageID=homepage&courseID="+courseID+"&userID="+userID);

        })
</script>
    </div>
</body>
<div id="requests" style="margin:auto; text-align: center;">

</div>
<script>
    // Add the user requests to the page by getting values from the URL and then accesing the database to get request data
    // Inputs: n/a
    // Outputs: n/a

    //Get URL values
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const courseID = urlParams.get('courseID');

    // Get request data from database
    fetch("DatabaseCode/getJoinRequestData.php?courseID="+courseID)
        .then((response) => {
            // Return data in a useable format
            return response.json(); // Parse the JSON data.
        })
        .then((data) => {
            for (var i = 0; i < data.length; i++){
                addJoinRequestToPage(data[i].username, data[i].userID)
            }
        })
        .catch((error) => {
             // This is where you handle errors.
    });


    // Add the join requests to the page
    // Inputs: username, userID
    // Output: n/a
    function addJoinRequestToPage(username, userID) {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const courseID = urlParams.get('courseID');
        var div = document.createElement("div");
        div.innerHTML = '<form action="DatabaseCode/acceptRequest.php?courseID='+courseID+'&userID='+userID+'" method="post" ><label>' + username + '</label><input name="accept/decline" type="radio" value="accept">Accept</input><input name="accept/decline" type="radio" value="decline">Decline</input><input type="submit" /><input name="userID" value=' + userID + ' style="visibility: hidden"></form>';
        var requests = document.getElementById("requests");
        requests.appendChild(div);
    }
</script>

</html>