
function connect(){
    var mysql = require('mysql');
    return mysql.createConnection({
        host: "localhost",
        user: "sqluser",
        password: "password",
        database: "courseresourcelibrary"
    });
}


function addContent(contentType, content, con){
    con.query("SELECT LAST_INSERT_ID(moduleID) AS ID FROM module ORDER BY LAST_INSERT_ID(moduleID) DESC LIMIT 1", function (err, result, fields) {
        if (moduleType = "text"){
            con.query("INSERT INTO content (moduleID, contentType, textEntered) VALUES (?);",[result[0].ID, contentType, content] , function (err, result, fields) {
                
            });
        }
        else {
            con.query("INSERT INTO content (moduleID, contentType) VALUES (?);",[result[0].ID, contentType] , function (err, result, fields) {
                
            });
        }

        if (moduleType = "submission"){
            con.query("SELECT LAST_INSERT_ID(contentID) AS ID FROM module ORDER BY LAST_INSERT_ID(contentID) DESC LIMIT 1", function (err, result, fields) {
                con.query("INSERT INTO submissions (contentID, submitterID, submittedFile) VALUES (?);",[result[0].ID, content[0], content[1] ] , function (err, result, fields) {
                    
                });
            });
        }
      }
    );
}


function addModule(contenttype, content, categoryID){
    var con = connect();
    con.query("INSERT INTO module (categoryID) VALUES (?);",[categoryID] , function (err, result, fields) {
        addContent(contenttype, content, con);
    });
    
}


function addCategory(parentID, name, canHaveSubcategories, type, con){
    switch(type){
        case "category":
            con.query("INSERT INTO category (categoryName, canHaveSubcategories, parentID) VALUES (?);",[name, canHaveSubcategories, parentID] , function (err, result, fields) {
                
              }
            );
            break;
        
        case "homepage":
            con.query("INSERT INTO category (categoryName, canHaveSubcategories, courseID) VALUES (?);",[name, canHaveSubcategories, parentID] , function (err, result, fields) {
                
              }
            );
            break;
    }
}


function addCourse(teacherID){
    var con = connect();
    con.query("INSERT INTO course (teacherID) VALUES (?);",[teacherID] , function (err, result, fields) {
        con.query("SELECT LAST_INSERT_ID(moduleID) AS ID FROM module ORDER BY LAST_INSERT_ID(moduleID) DESC LIMIT 1", function (err, result, fields) {
            addCategory(result[0].ID, "Homepage", 1, "homepage", con);
        });
      }
    );
    
}

