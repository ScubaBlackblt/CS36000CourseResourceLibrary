<!-- <form action="" method="post" id="request1">
    <label>Temp Username</label>
    <input name="accept/decline" type="radio" value="accept">Accept</input>
    <input name="accept/decline" type="radio" value="decline">Decline</input>
    <input type="submit" />
    <input name="userID" value="1" style="visibility: hidden">
</form> -->
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
        <button type = "button" id = "backToHome" style="position: absolute; top: 2%; left: 1%; padding: 10px;"><</button>
        <div id="pageName" style="font-size: 2.5em;">Add Students to Course</div>
        <script>
        let backButton = document.getElementById("backToHome");
        backButton.addEventListener('click', () => {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const courseID = urlParams.get('courseID');
            const userID = urlParams.get('userID');
            document.location.assign("http://localhost:3000/CS36000CourseResourceLibrary-main/homepage.php?pageID=homepage&courseID="+courseID+"&userID="+userID);

        })
</script>
    </div>



    <!-------------------------------------------------------->






    <!-------------------------add components-------------------------------------------->
</body>
<div id="requests" style="margin:auto; text-align: center;">

</div>
<script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const courseID = urlParams.get('courseID');
    fetch("DatabaseCode/getJoinRequestData.php?courseID="+courseID)
        .then((response) => {
            if(!response.ok){ 
                console.log("fail");
            }
            console.log("pass");
            return response.json(); // Parse the JSON data.
        })
        .then((data) => {
            // This is where you handle what to do with the response.
            console.log(data);
            //put page load code here like calling loadPage(data); and putting above declarations at start of function
            for (var i = 0; i < data.length; i++){
                addJoinRequestToPage(data[i].username, data[i].userID)
            }
        })
        .catch((error) => {
             // This is where you handle errors.
    });
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