--To find last id created
SELECT LAST_INSERT_ID(ID_colume_name) FROM table_name ORDER BY LAST_INSERT_ID(ID_colume_name) DESC LIMIT 1;

--Find modules and content for current page
SELECT module.moduleID, module.contentID FROM moduletable INNER JOIN module ON module.moduleID = moduletable.moduleID WHERE moduleTableID = 1
ORDER BY module.moduleID