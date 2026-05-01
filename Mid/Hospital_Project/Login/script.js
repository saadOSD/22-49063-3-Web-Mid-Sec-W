// Login Selection
const loginForm = document.getElementById('login-form');
if (loginForm) {
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        // Using your specific info
        if (email === "khushmohammadsaad489@gmail.com" && password === "123456") {
            alert("Login Successful!");
            window.location.href = "dashboard.html";
        } else {
            alert("Wrong Email or Password!");
        }
    });
}

// Patient Table Logic
const patientForm = document.getElementById('patient-form');
if (patientForm) {
    patientForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const name = document.getElementById('p-name').value;
        const age = document.getElementById('p-age').value;
        const time = document.getElementById('p-time').value;
        const list = document.getElementById('p-list');
        list.innerHTML += `<tr><td>${name}</td><td>${age}</td><td>${time}</td><td><button onclick="this.parentElement.parentElement.remove()" style="background:red; width:auto; padding:5px 10px;">Remove</button></td></tr>`;
        patientForm.reset();
    });
}

// Logout Logic
function logout() {
    if (confirm("Logout now?")) {
        window.location.href = "index.html";
    }
}