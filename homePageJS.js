 ////class form js
  function openForm() {
           document.getElementById("classForm").style.display = "block"
          }  
  function closeForm(){
              document.getElementById("classForm").style.display = "none"
             }

  let cNameForm = document.getElementById("classNameForm");
  
  cNameForm.addEventListener("submit", (e)=> {
     e.preventDefault()          
      let cName = document.getElementById("cName");
          if(cName.value == ""){
               alert("Please ensure the field is filled")
           }
           else{
               alert("Class Name Updated, page may need reloded for update")
            }
                 ///document.getElementById("classNameFrom").style.display="none";
                  //document.getElementById("cName").innerHTML = cName;
  
            });


//side navigation js
  function openNav() {
     document.getElementById("mySidenav").style.width = "250px";
    }
         
    function closeNav() {
     document.getElementById("mySidenav").style.width = "0";
    }

    //catagory popup js
    function openCatPopup(){
      document.getElementById("catPopup").style.display="block";
  
    }
    function closeCatPopup(){
      document.getElementById("catPopup").style.display="none";
  
    }
  //catagory list js
  const container = document.getElementById("buttons-container");

  // Loop through the buttons data and generate HTML code for each button
  for (const button of buttons) {
    const name = button.name;
    const categoryID = button.category_id;
    const buttonElement = document.createElement("button");
    buttonElement.textContent = name;
    
    // Add an event listener to the button that reloads the page with the content of the corresponding category
    buttonElement.addEventListener("click", () => {
      window.location.href = `getPageData.php?category_id=${categoryID}`;
    });
    
    // Add the button to the container element
    container.appendChild(buttonElement);
  }
    


  //    function showCatagory(catagory_id){
  //     var retriv = new XMLHttpRequest();
  //     xhr.open("GET", "getPageData.php?id=" + id, true);
  //      retriv.onload = function() {
  //   if (retriv.status === 200) {
  //     // Update content area with retrieved content
  //     var contentArea = document.getElementById("content-area");
  //     contentArea.innerHTML = retriv.responseText;
  //   }
  // };
  // retriv.send();
  //    }
  //    var catagory_list = document.getElementById("item-list");
  //    catagory_list.addEventListener("click", function(e) {
  //      if (e.target && e.target.nodeName === "LI") {
  //        // Get selected item and show content
  //        var id = e.target.id;
  //        showItem(id);
  //      }
  //    });
                 
         