function backToHomepage(courseID){
    document.location.assign("http://localhost:3000/CS36000CourseResourceLibrary-main/userRequestsPage.php?pageID=homepage&courseID=" + (courseID));
}

function changePage(courseID,pageID){
    document.location.assign("http://localhost:3000/CS36000CourseResourceLibrary-main/userRequestsPage.php?pageID="+pageID+"&courseID=" + (courseID));
}