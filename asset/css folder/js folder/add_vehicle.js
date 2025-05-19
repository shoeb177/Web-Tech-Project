document.getElementById("vehicleForm").addEventListener("submit", function(e) {
    e.preventDefault();
  
    const make = document.getElementById("make").value;
    const model = document.getElementById("model").value;
    const year = document.getElementById("year").value;
    const license = document.getElementById("license").value;
    const status = document.getElementById("status").value;
  
    const vehicle = { make, model, year, license, status };
    console.log("Vehicle added:", vehicle);
  
    document.getElementById("vehicleForm").reset();
    document.getElementById("successMessage").classList.remove("hidden");
  
    setTimeout(() => {
      document.getElementById("successMessage").classList.add("hidden");
    }, 3000);
  });
  