// Select necessary elements
const cartTable = document.querySelector(".table-cart");
const subtotalDisplay = document.getElementById("total-harga");
const quantityInputs = cartTable.querySelectorAll('tbody input[type="number"]');
const removeButtons = cartTable.querySelectorAll(".btn-hapus");
const ringkasan = document.getElementById("subtotal");
const totalElement = document.getElementById("total");

// Function to calculate total price for a single product row
function calculateProductTotal(row) {
  const priceCell = row.querySelector("td:nth-child(2)"); // Target price cell (second child)
  const quantityInput = row.querySelector('input[type="number"]');
  const price = parseFloat(priceCell.textContent.slice(2)); // Extract price value (remove "Rp")
  const quantity = parseInt(quantityInput.value, 10);
  return price * quantity;
}

// Function to update subtotal and display it
function updateSubtotal() {
  let total = 0;
  for (const row of cartTable.querySelectorAll("tbody tr")) {
    total += calculateProductTotal(row);
  }
  subtotalDisplay.textContent = `Rp${total.toFixed(3)}`; // Format to three decimal places
  // Mengembalikan total untuk digunakan di bawah
  return total;
}

// Event listeners for quantity changes
quantityInputs.forEach((input) => {
  input.addEventListener("change", function () {
    const row = this.parentElement.parentElement; // Get the parent row
    const productTotal = calculateProductTotal(row);
    row.querySelector("td:nth-child(4)").textContent = `Rp${productTotal.toFixed(3)}`; // Update total price cell (fourth child)
    const totalValue = updateSubtotal(); // Recalculate and display subtotal
    ringkasan.innerHTML = `Rp${totalValue.toFixed(3)}`; // Update subtotal in HTML
    const integerTotal = parseInt(totalValue); // Convert subtotal to integer
    totalElement.innerHTML = integerTotal + 1; // Update total element with adjusted value
  });
});

// Event listeners for remove buttons (optional)
removeButtons.forEach((button) => {
  button.addEventListener("click", function () {
    const row = this.parentElement.parentElement; // Get the parent row
    row.parentNode.removeChild(row); // Remove the row from the table
    const totalValue = updateSubtotal(); // Recalculate and display subtotal
    ringkasan.innerHTML = `Rp${totalValue.toFixed(3)}`; // Update subtotal in HTML
    const integerTotal = parseInt(totalValue); // Convert subtotal to integer
    totalElement.innerHTML = integerTotal + 1000; // Update total element with adjusted value
  });
});
