const customers = [
    { name: "Atik", email: "atik@gmail.com", phone: "123-456-7890", license: "A123456" },
    { name: "sadik", email: "sadik@gmail.com", phone: "987-654-3210", license: "B987654" },
    { name: "Ali Khan", email: "ali@gmail.com", phone: "555-222-1111", license: "C333222" },
    { name: "Sara Ali", email: "sara@gmail.com", phone: "444-333-2222", license: "D999888" },
    { name: "sopnil", email: "sopnil@gmail.com", phone: "666-555-4444", license: "E777666" },
    { name: "tanjim", email: "tanji@gmail.com", phone: "111-222-3333", license: "F111000" }
  ];
  
  const customerList = document.getElementById("customerList");
  
  customers.forEach(customer => {
    const card = document.createElement("div");
    card.className = "customer-card";
    card.innerHTML = `
      <h3>${customer.name}</h3>
      <p>Email: ${customer.email}</p>
      <p>Phone: ${customer.phone}</p>
      <p>License: ${customer.license}</p>
    `;
    customerList.appendChild(card);
  });
  
  function goBack() {
    window.location.href = "car_dashboard.html";
  }
  