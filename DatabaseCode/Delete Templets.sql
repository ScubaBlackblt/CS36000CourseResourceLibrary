--Delete category (if has subcategories need to aggregate through)
DELETE FROM Category WHERE categoryID = inputID;
DELETE FROM categoryTable WHERE categoryID = inputID;

--Delete module
DELETE FROM Module WHERE moduleID = inputID;
DELETE FROM ModuleTable WHERE moduleID = inputID;