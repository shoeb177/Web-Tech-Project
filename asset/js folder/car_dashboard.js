function openProfile() {
  alert("Redirecting to profile page...");
  // Optional: window.location.href = "profile.html";
}

function logout() {
  alert("Logging out...");
  // Optional: Add session/logout logic here
}

function viewDetails(section) {
  alert("Navigating to " + section + " section.");
}

function AddFuel() {
  alert("Fuel entry form will open.");
}

function addMaintenance() {
  alert("Maintenance entry form will open.");
}

function showTab(tabId) {
  const tabs = document.querySelectorAll('.tab-content');
  tabs.forEach(tab => tab.style.display = 'none');
  document.getElementById(tabId).style.display = 'block';
}

function bookCar(carName, inputId) {
  const time = document.getElementById(inputId).value;
  if (time) {
    alert(`Car booked: ${carName} at ${time}`);
  } else {
    alert("Please select a date and time.");
  }
}

function rentCar() {
  const carName = document.getElementById("rentCarName").value;
  const time = document.getElementById("rentTime").value;
  if (time) {
    alert(`Car rented: ${carName} at ${time}`);
  } else {
    alert("Please select a date and time.");
  }
}

function returnCar() {
  const carName = document.getElementById("returnCarName").value;
  const time = document.getElementById("returnTime").value;
  if (time) {
    alert(`Car returned: ${carName} at ${time}`);
  } else {
    alert("Please select a date and time.");
  }
}
