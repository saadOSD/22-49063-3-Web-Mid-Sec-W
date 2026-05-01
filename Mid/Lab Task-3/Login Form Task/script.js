console.log("connected");
let wrongcount = 0;

function collect_data() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    let message = "";

   
    if (email === "") {
        message += "Please enter email <br>";
    }
    if (password === "") {
        message += "Please enter password <br>";
    }

   
    if (email !== "" && !email.includes("@")) {
        message += "Email must contain @ <br>";
    }
    
    if (password !== "" && password.length < 6) {
        message += "Password must be at least 6 characters <br>";
    }
    
    if (password !== "" && !password.includes("#")) {
        message += "Password must contain # <br>";
    }

   
    if (message !== "") {
        wrongcount++; 
        document.getElementById("error").innerHTML = message;
        document.getElementById("count").innerHTML = wrongcount;
        return false; 
    }

    // If valid
    document.getElementById("error").innerHTML = ""; 
    alert("Form submitted successfully!");
    return true; 
}