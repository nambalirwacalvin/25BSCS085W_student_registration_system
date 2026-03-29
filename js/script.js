function validateForm() {
    let name = document.getElementById("name").value;
    let phone = document.getElementById("phone").value;
    let course = document.getElementById("course").value;

    if (name === "" || phone === "" || course === "") {
        alert("All fields are required!");
        return false;
    }

    if (phone.length < 10) {
        alert("Phone number must be at least 10 digits");
        return false;
    }

    return true;
}