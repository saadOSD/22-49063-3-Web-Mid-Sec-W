const input = document.querySelector("input[type='email']");
const button = document.querySelector("input[type='submit']");
 
button.addEventListener("click", function (event) {
  event.preventDefault(); // Prevent page reload
  const email = input.value.trim();
  validateEmail(email);
});
 
function validateEmail(email) {
  
  let message = document.getElementById("message");
  if (!message) {
    message = document.createElement("h3");
    message.id = "message";
    message.style.textAlign = "center";
    document.body.appendChild(message);
  }
 
  // i. Cannot be empty
  if (email === "") {
    message.style.color = "red";
    message.textContent = "Email cannot be empty.";
    return;
  }
 
  // ii. Must be a valid email
  const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!pattern.test(email)) {
    message.style.color = "red";
    message.textContent = "Please enter a valid email address (example@example.com).";
    return;
  }
 
  // ✅ Passed validation
  message.style.color = "green";
  message.textContent = "Email is valid: " + email;
}
 
 