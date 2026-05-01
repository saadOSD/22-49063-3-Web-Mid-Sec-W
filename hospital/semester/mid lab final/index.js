/**
 * Performs validation checks on the form fields.
 * @returns {boolean} - True if validation passes, false otherwise.
 */
function validateForm() {
    const fullName = document.getElementById('fullName').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    // --- 1. Required Fields Validation ---
    if (!fullName || !email || !password || !confirmPassword) {
        alert("Validation Failed: Please fill in all required fields (Full Name, Email, Password, Confirm Password).");
        return false;
    }

    // --- 2. Email Format Validation ---
    // This pattern checks for non-space characters, followed by '@', 
    // followed by more non-space characters, followed by '.', followed by more characters.
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    
    if (!emailPattern.test(email)) {
        // We can make this alert more specific for professional output
        if (!email.includes('@')) {
            alert("Validation Failed: The email address is missing the required '@' symbol.");
        } else {
            alert("Validation Failed: Please enter a valid email address (e.g., name@example.com).");
        }
        return false;
    }

    // --- 3. Password Length Validation ---
    if (password.length < 8) {
        alert("Validation Failed: Password must be at least 8 characters long.");
        return false;
    }

    // --- 4. Password Match Validation ---
    if (password !== confirmPassword) {
        alert("Validation Failed: Password and Confirm Password must match.");
        return false;
    }

    // All validation checks passed
    return true;
}