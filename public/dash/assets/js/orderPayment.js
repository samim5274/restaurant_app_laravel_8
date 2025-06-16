function calculateAmount() {
    const num1 = parseFloat(document.getElementById('num1').value) || 0; // Total
    const num2 = parseFloat(document.getElementById('num2').value) || 0; // Pay
    const num3 = parseFloat(document.getElementById('num3').value) || 0; // Discount
    const result = document.getElementById('result');
    const btnSave = document.getElementById('btnSave');
    const range = 10000000;

    // Reset save button
    btnSave.disabled = true;

    // Basic validation
    if (num1 <= 0) {
        result.textContent = "Invalid total amount.";
        return;
    }
    if (num2 < 0 || num3 < 0) {
        result.textContent = "Negative values are not allowed.";
        return;
    }
    if (num2 >= range || num3 > num1) {
        result.textContent = "Error! Amount out of range. Please make sure your amount. Thank you!";
        return;
    }

    const sum = Math.round(num1 - num2 - num3);
    btnSave.disabled = false;

    if (num3 === num1) {
        result.textContent = "Full Discount! : " + sum + "/-";
    } else if (num2 > num1) {
        result.textContent = "Return: " + Math.abs(sum) + "/-";
    } else if (num2 === 0) {
        result.textContent = "Full Due! : " + sum + "/-";
    } else if (sum < 0) {
        result.textContent = "Return: " + Math.abs(sum) + "/-";
    } else if (sum === 0) {
        result.textContent = "Full Paid: " + sum + "/-";
    } else {
        result.textContent = "Due: " + sum + "/-";
    }
}