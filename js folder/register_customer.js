document.getElementById("form").addEventListener("submit", function(event) {
    event.preventDefault();
  
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var license = document.getElementById("license").value;
    var address = document.getElementById("address").value;
  
    document.getElementById("message").textContent = "Customer registered successfully!";
  
    document.getElementById("form").reset();
  });
  