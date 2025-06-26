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



function printreport() {
    var header = `
        <h1 style="text-align:center;">Restaurant Management System</h1>
        <p style="text-align:center;">House # 02, Road # 11, Sector # 6, Uttara, Dhaka-1230</p>
        <h3 style="text-align:center;">Kitchen Invoice Copy</h3>
        <hr>
    `;
    var style = `
        <style>
            body { font-family: DejaVu Sans, sans-serif; }
            table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
            th { background-color: #f4f4f4; }
            h2 { margin-bottom: 0; }
            p { margin-top: 2px; margin-bottom: 5px; }
        </style>
    `;

    var printContent = document.getElementById('printableTable').outerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = header + style + printContent;
    window.print();
    setTimeout(function () {
        location.reload();
    }, 100);
    document.body.innerHTML = originalContents;
}