const vehicles = [
    { name: "Toyota Corolla", model: "2021", status: "Available" },
    { name: "Honda Civic", model: "2020", status: "Rented" },
    { name: "Ford Focus", model: "2019", status: "Available" },
    { name: "Chevrolet Malibu", model: "2022", status: "Maintenance" },
    { name: "Nissan Altima", model: "2021", status: "Available" },
    { name: "BMW 3 Series", model: "2023", status: "Available" },
    { name: "Kia Forte", model: "2022", status: "Rented" },
    { name: "Hyundai Elantra", model: "2020", status: "Available" },
    { name: "Volkswagen Jetta", model: "2021", status: "Rented" },
    { name: "Tesla Model 3", model: "2023", status: "Available" },
    { name: "Audi A4", model: "2021", status: "Maintenance" },
    { name: "Mercedes-Benz C-Class", model: "2022", status: "Available" }
  ];
  
  const vehicleList = document.getElementById("vehicleList");
  
  vehicles.forEach(vehicle => {
    const card = document.createElement("div");
    card.className = "vehicle-card";
    card.innerHTML = `
      <h3>${vehicle.name}</h3>
      <p>Model: ${vehicle.model}</p>
      <p>Status: ${vehicle.status}</p>
    `;
    vehicleList.appendChild(card);
  });
  
  function goBack() {
    window.location.href = "car_dashboard.html";
  }
  