function enableEditing() {
  document.getElementById("username").disabled = false;
  document.getElementById("password").disabled = false;
  document.getElementById("edit-button").classList.add("hidden");
  document.getElementById("cancel-button").classList.remove("hidden");
  document.getElementById("submit-button").classList.remove("hidden");
}

function cancelEditing() {
  document.getElementById("username").disabled = true;
  document.getElementById("password").disabled = true;
  document.getElementById("edit-button").classList.remove("hidden");
  document.getElementById("cancel-button").classList.add("hidden");
  document.getElementById("submit-button").classList.add("hidden");
}
