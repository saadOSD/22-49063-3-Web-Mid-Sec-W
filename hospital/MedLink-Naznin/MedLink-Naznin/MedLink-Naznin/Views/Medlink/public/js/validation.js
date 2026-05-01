function validateForm() {
    let name = document.querySelector("[name=patient]").value;
    if (name.length < 3) {
        alert("Name too short");
        return false;
    }
    return true;
}
function validateBooking() {

    let fields = ["patient", "blood", "gender", "phone", "reason"];

    for (let f of fields) {
        let value = document.querySelector("[name="+f+"]").value;
        if (value.trim() === "") {
            alert("Please fill all fields");
            return false;
        }
    }
    return true;
}
function limitPhone(input) {
    // Remove extra digits if more than 11
    if (input.value.length > 11) {
        input.value = input.value.slice(0, 11);
    }
}

function validateBooking() {

    let patient = document.querySelector("[name=patient]").value;
    let blood = document.querySelector("[name=blood]").value;
    let gender = document.querySelector("[name=gender]").value;
    let phone = document.querySelector("[name=phone]").value;
    let reason = document.querySelector("[name=reason]").value;

    if (
        patient.trim() === "" ||
        blood === "" ||
        gender === "" ||
        reason.trim() === ""
    ) {
        alert("Please fill all fields");
        return false;
    }

    // Phone number must be numeric and exactly 11 digits
    if (phone === "" || isNaN(phone)) {
        alert("Phone number must contain only numbers");
        return false;
    }

    if (phone.length !== 11) {
        alert("Phone number must be exactly 11 digits");
        return false;
    }

    return true;
}
