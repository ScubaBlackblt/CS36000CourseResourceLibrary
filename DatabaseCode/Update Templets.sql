--Update Category (add categoryTable)
UPDATE Category
SET categoryTableID = setupID
WHERE categoryID = intputID;

--Update Category (change Name)
UPDATE Category
SET categoryName = inputName
WHERE categoryID = intputID;



--Update Class (add categoryTable)
UPDATE Class
SET categoryTableID = setupID
WHERE classID = inputID;

--Update Class (add joinRequestsTable)
UPDATE Class
SET joinRequestsTableID = setupID
WHERE classID = inputID;

--Update Class (add studentsJoinedTable)
UPDATE Class
SET studentsJoinedTableID = setupID
WHERE classID = inputID;



--Update textbox content
UPDATE Content
SET textEntered = newText
WHERE contentID = inputID;