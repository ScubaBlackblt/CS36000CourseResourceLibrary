var mysql = require('mysql');
var currentCourse = null;
var currentPage = null;
var modules = null;
var con = null;
var submissions = null;

function test(){
  alert("running code");
}


async function getCourse(courseID){
        return new Promise(data =>
        con.query("SELECT * FROM course WHERE courseID = ?",[courseID] , function (err, result, fields) {
            //console.log(result[0]);
            //ret = result[0];
            data(result[0]);
        })); 
}


async function getCategory(categoryID){
  return new Promise(data =>
    con.query("SELECT * FROM category WHERE parentID = ?",[categoryID] , function (err, result, fields) {
        //console.log(result[0]);
        //ret = result[0];
        data(result[0]);
      }
    )
  );
}

async function getHomepage(courseID){
  return new Promise(data =>
    con.query("SELECT * FROM category WHERE courseID = ?",[courseID] , function (err, result, fields) {
        //console.log(result[0]);
        //ret = result[0];
        data(result[0]);
      }
    )
  );
}


async function getModules(categoryID){
  return new Promise(data =>
    con.query("SELECT module.* FROM category INNER JOIN module ON module.categoryID = category.categoryID WHERE module.categoryID = ? ORDER BY module.moduleID",[categoryID] , function (err, result, fields) {
        //console.log(result);
        //ret = result[0];
        data(result);
      }
    )
  );
}


async function getContent(module){
  return new Promise(data =>
    con.query("SELECT content.* FROM content INNER JOIN module ON module.moduleID = content.moduleID WHERE module.moduleID = ? ORDER BY content.contentID",[module.moduleID] , function (err, result, fields) {
        console.log(result[0]);
        //ret = result[0];
        data(result[0]);
      }
    )
  );
}

async function getSubmissions(contentID){
  return new Promise(data =>
    // Get submissions for the given table
    con.query("SELECT submissions.* FROM submissions INNER JOIN content ON submissions.contentID = content.contentID WHERE content.contentID = ? ORDER BY submissions.submissionID",[contentID] , function (err, result, fields) {
        //console.log(result);
        //ret = result[0];
        data(result);
      }
    )
  );
}

async function loadContent(modules){
  var tempContent
  for (const module of modules){
    tempContent = await getContent(module);
    switch (tempContent.contentType){
      case "submission": 
        var submissions = await getSubmissions(tempContent.submissionTableID);
        //add submission to page
        break;
      
      case "image":
        //add image to page
        break;

      case "text":
        //add text to page
        break;

      case "file":
        //add file to page
        break;
    }
  }
}

async function getCatgories(parentID){
  return new Promise(data =>
    // Get submissions for the given table
    con.query("SELECT * FROM category WHERE parentID = ? ORDER BY categoryID",[parentID] , function (err, result, fields) {
        //console.log(result);
        //ret = result[0];
        data(result);
      }
    )
  );
}

function addCategoryToPage(category){
  
}

async function loadCategories(categories){
  for (const i = 0; i < categories.length; i++){
    var category = categories[i];
    
    
    
  }
}


async function loadPage(pageToLoad){
  //Connect to database
  //Change to local values for database
  con = mysql.createConnection({
    host: "localhost",
    user: "sqluser",
    password: "password",
    database: "courseresourcelibrary"
  });

  //Check to see if connected
  con.connect(function(err) {
    if (err) callback(err, null);
    console.log("Connected!");
  });
  
  //Get course data
  currentCourse = await getCourse(1);
  console.log(currentCourse);

  //Get page data
  if (pageToLoad = "homepage"){
    currentPage = await getHomepage(currentCourse.courseID);
  }
  else{
    currentPage = await getCategory(pageToLoad);
  }
  console.log(currentPage);

  //Get page module data
  modules = await getModules(currentPage.categoryID);
  console.log(modules);

  //Load module content onto webpage
  await loadContent(modules);

  //Get pages's categories
  currentCategories = await getCatgories(currentPage.categoryID);

  console.log(currentCategories);

  //Finish loading homepage and close connection
  con.end();
}
alert("running code");
loadPage("homepage");