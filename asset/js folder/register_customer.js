window.onload = function () {
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.get("success") === "1") {
    const successMessage = document.getElementById("successMessage");
    if (successMessage) {
      successMessage.style.display = "block";
    }
  }
};
