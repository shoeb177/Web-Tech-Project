const damages = [
  { vehicle: "Toyota Corolla", area: "Front Bumper", status: "Reported", date: "2024-04-01" },
  { vehicle: "Honda Civic", area: "Rear Door", status: "Inspected", date: "2024-03-15" },
  { vehicle: "Ford Focus", area: "Windshield", status: "Pending", date: "2024-03-28" },
  { vehicle: "BMW 3 Series", area: "Left Mirror", status: "Repaired", date: "2024-02-10" }
];

const damageList = document.getElementById("damageList");

damages.forEach(report => {
  const card = document.createElement("div");
  card.className = "damage-card";
  card.innerHTML = `
    <h3>${report.vehicle}</h3>
    <p>Damage Area: ${report.area}</p>
    <p>Status: ${report.status}</p>
    <p>Date: ${report.date}</p>
  `;
  damageList.appendChild(card);
});

function goBack() {
  window.location.href = "car_dashboard.html";
}
