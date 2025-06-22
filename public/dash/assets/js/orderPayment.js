function calculateAmount(id) {
    const num1 = parseFloat(document.getElementById('num1' + id).value) || 0;
    const num2Input = document.getElementById('num2' + id);
    const num2 = num2Input.value === "" ? 0 : parseFloat(num2Input.value);
    const num3 = parseFloat(document.getElementById('num3' + id).value) || 0;
    const result = document.getElementById('result' + id);
    const btnSave = document.getElementById('btnSave' + id);
    const range = 10000000;

    btnSave.disabled = true;

    if (num1 <= 0) {
        result.textContent = "Invalid total amount.";
        return;
    }
    if (num2 < 0 || num3 < 0) {
        result.textContent = "Negative values are not allowed.";
        return;
    }
    if (num2 >= range || num3 > num1) {
        result.textContent = "Error! Amount out of range.";
        return;
    }

    const sum = Math.round(num1 - num2 - num3);

    // ✅ Enable button since inputs are valid
    btnSave.disabled = false;

    // Display status
    if (num3 === num1) {
        result.textContent = "Full Discount! : " + sum + "/-";
    } else if (num2 > num1) {
        result.textContent = "Return: " + Math.abs(sum) + "/-";
    } else if (num2 === 0 && num3 === 0) {
        result.textContent = "Full Due! : " + sum + "/-";
    } else if (sum < 0) {
        result.textContent = "Return: " + Math.abs(sum) + "/-";
    } else if (sum === 0) {
        result.textContent = "Full Paid: " + sum + "/-";
    } else {
        result.textContent = "Due: " + sum + "/-";
    }
}
