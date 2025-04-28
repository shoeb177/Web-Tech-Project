function showSection(sectionId) {
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => section.style.display = 'none');
    document.getElementById(sectionId).style.display = 'block';
  }
  
  // Vehicle Inventory - Filter Cars
  function filterInventory() {
    const input = document.getElementById('filterInput').value.toLowerCase();
    const cars = document.querySelectorAll('.car-item');
    cars.forEach(car => {
      const text = car.textContent.toLowerCase();
      car.style.display = text.includes(input) ? 'block' : 'none';
    });
  }
  
  // Customer Profiles - Save Preferences (Dummy)
  function savePreferences() {
    alert('Preferences saved successfully!');
  }
  
  // Damage Reports - Canvas Marking
  const canvas = document.getElementById('damageCanvas');
  if (canvas) {
    const ctx = canvas.getContext('2d');
    canvas.addEventListener('click', function(e) {
      const rect = canvas.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      ctx.fillStyle = "red";
      ctx.beginPath();
      ctx.arc(x, y, 5, 0, 2 * Math.PI);
      ctx.fill();
    });
  }
  
  // Fuel Tracking - Record Fuel Level
  function recordFuel() {
    const fuelLevel = document.getElementById('fuelLevel').value;
    if (fuelLevel) {
      alert(`Fuel level recorded: ${fuelLevel}%`);
    } else {
      alert('Please enter a fuel level!');
    }
  }
  
  // Maintenance Records - Add Maintenance (Dummy)
  function addMaintenance() {
    const maintenanceHistory = document.getElementById('maintenanceHistory');
    const newItem = document.createElement('li');
    newItem.textContent = "New Service - " + new Date().toLocaleDateString();
    maintenanceHistory.appendChild(newItem);
  }
  