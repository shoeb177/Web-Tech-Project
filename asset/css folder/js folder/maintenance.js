const maintenanceRecords = [
  { vehicle: "Toyota Corolla", service: "Oil Change", date: "2024-04-01", status: "Completed" },
  { vehicle: "Honda Civic", service: "Tire Rotation", date: "2024-03-20", status: "Scheduled" },
  { vehicle: "BMW 3 Series", service: "Brake Inspection", date: "2024-03-05", status: "Completed" },
  { vehicle: "Ford Focus", service: "AC Repair", date: "2024-02-28", status: "In Progress" }
];

const maintenanceList = document.getElementById("maintenanceList");

maintenanceRecords.forEach(record => {
  const card = document.createElement("div");
  card.className = "maintenance-card";
  card.innerHTML = `
    <h3>${record.vehicle}</h3>
    <p>Service: ${record.service}</p>
    <p>Date: ${record.date}</p>
    <p>Status: ${record.status}</p>
  `;
  maintenanceList.appendChild(card);
});

function goBack() {
  window.location.href = "car_dashboard.html";
}
