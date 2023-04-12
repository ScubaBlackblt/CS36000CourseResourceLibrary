
function connect(){
    var mysql = require('mysql');
    return mysql.createConnection({
        host: "localhost",
        user: "sqluser",
        password: "password",
        database: "courseresourcelibrary"
    });
}

function deleteContentWithModule(moduleID, con){
    con.query("DELETE FROM content WHERE moduleID = ?",[moduleID] , function (err, result, fields) {
        
    });
}

function deleteSubmissionsWithModule(moduleID, con){
    con.query("SELECT content.* FROM content INNER JOIN module ON module.moduleID = content.moduleID WHERE module.moduleID = ? ORDER BY content.contentID",[moduleID] , function (err, result, fields) {
        for (const content of result){
            con.query("DELETE FROM submissions WHERE contentID = ?",[content.contentID] , function (err, result, fields) {
        
            });
        }
      }
    )
}

function deleteModule(moduleID){
    var con = connect();
    con.query("DELETE FROM module WHERE moduleID = ?",[moduleID] , function (err, result, fields) {
        deleteContentWithModule(moduleID, con);
        deleteContentWithModule(moduleID, con);
    });
}