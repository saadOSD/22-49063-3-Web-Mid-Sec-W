document.addEventListener("DOMContentLoaded", function () {
  const input = document.querySelector("input[type='text']");
  const button = document.querySelector("input[type='submit']");
 
  button.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent page reload
    const name = input.value.trim();
    validateName(name);
  });
});
 
function validateName(name) {
  let message = document.getElementById("message");
  if (!message) {
    message = document.createElement("h3");
    message.id = "message";
    message.style.textAlign = "center";
    document.body.appendChild(message);
  }
 
  if (name === "") {
    message.style.color = "red";
    message.textContent = " Name cannot be empty.";
    return;
  }
 
  const words = name.split(" ").filter(word => word.length > 0);
  if (words.length < 2) {
    message.style.color = "red";
    message.textContent = " Name must contain at least two words.";
    return;
  }
 
  const pattern = /^[A-Za-z][A-Za-z.\- ]*$/;
  if (!pattern.test(name)) {
    message.style.color = "red";
    message.textContent = "Name must start with a letter and can only contain letters, dot (.), dash (-), and spaces.";
    return;
  }
 
  message.style.color = "green";
  message.textContent = " Name is valid: " + name;
}
 
 