// Check form inputs before submit
const myForm = document.getElementById("checkForm");
if (myForm) {
    myForm.addEventListener("submit", function(event) {
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        
        if (email == "" || password == "") {
            event.preventDefault(); // Stop form submit
            alert("Please fill all fields!");
        }
    });
}

// Interactive Feature: Show/Hide description helper
function toggleDesc(id) {
    const desc = document.getElementById("desc-" + id);
    if (desc.style.display === "none") {
        desc.style.display = "block";
    } else {
        desc.style.display = "none";
    }
}
