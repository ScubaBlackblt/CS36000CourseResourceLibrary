function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
  
  
  const modal = document.querySelector(".modal");
  const trigger = document.querySelector(".trigger");
  const closeButton = document.querySelector(".close-button");
  const textButton = document.querySelector(".add-text");
  const inputText = document.getElementById("text-input");
  const submitText = document.querySelector(".submit-text");
  
  function toggleModal() {
  modal.classList.toggle("show-modal");
  inputText.style.display="display:none";
  submitText.style.display="display:none";
  }
  
  function windowOnClick(event) {
  if(event.target === modal) {
  toggleModal();
  }
  }
  
  function textAdd(event) {
  inputText.style.display = "block";
  submitText.style.display="block";
  
  }
  
  trigger.addEventListener("click",toggleModal);
  closeButton.addEventListener("click", toggleModal);
  window.addEventListener("click", windowOnClick);
  textButton.addEventListener("click", textAdd);
  
  