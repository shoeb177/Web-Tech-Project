const fuelLogs = [
  { vehicle: "Toyota Corolla", fuelLevel: "75%", date: "2024-04-01", receipt: "Uploaded" },
  { vehicle: "Honda Civic", fuelLevel: "60%", date: "2024-03-30", receipt: "Uploaded" },
  { vehicle: "Ford Focus", fuelLevel: "50%", date: "2024-03-25", receipt: "Missing" },
  { vehicle: "Tesla Model 3", fuelLevel: "100%", date: "2024-03-22", receipt: "N/A - Electric" }
];

const fuelList = document.getElementById("fuelList");

fuelLogs.forEach(log => {
  const card = document.createElement("div");
  card.className = "fuel-card";
  card.innerHTML = `
    <h3>${log.vehicle}</h3>
    <p>Fuel Level: ${log.fuelLevel}</p>
    <p>Date: ${log.date}</p>
    <p>Receipt: ${log.receipt}</p>
  `;
  fuelList.appendChild(card);
});

function goBack() {
  window.location.href = "car_dashboard.html";
}
