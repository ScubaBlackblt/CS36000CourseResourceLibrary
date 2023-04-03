
function validatePassword() {
	
	let password = document.getElementById("password");
	let confirm_password = document.getElementById("confirm_password");
	console.log(password, confirm_password)
	let message = document.getElementByID("message");
	
	if (password != confirm_password) {
		message.textContent = "Passwords don't match";
	}
}
