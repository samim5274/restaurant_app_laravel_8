document.addEventListener('DOMContentLoaded', function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    });

    $(document).on('click', '.btn-plus, .btn-minus', function () {
        var id = $(this).data('id');
        var input = $('input[data-id="' + id + '"]');
        var currentQty = parseInt(input.val());
        var newQty = currentQty;

        if ($(this).hasClass('btn-plus')) {
            newQty = currentQty + 1;
        } else if ($(this).hasClass('btn-minus') && currentQty > 1) {
            newQty = currentQty - 1;
        }

        $.ajax({
            url: '/cart/update-quantity',
            method: 'POST',
            data: {
                id: id,
                quantity: newQty
            },
            success: function (response) {
                if (response.status === 'success') {
                    input.val(response.quantity);
                    updateSubtotalAndTotal();  
                    console.log('Quantity updated:', response); 
                } else if (response.status === 'error') {
                    alert(response.message);     
                }
            },
            error: function (xhr) {
                console.error('Update failed:', xhr.responseText);
            }
        });
    });
});



function updateSubtotalAndTotal() {
    let total = 0;

    $('.card-body').each(function () {
        const price = parseFloat($(this).find('[data-price]').data('price'));
        const qty = parseInt($(this).find('.qty-input').val());

        if (!isNaN(price) && !isNaN(qty)) {
            const subtotal = price * qty;
            $(this).find('.item-subtotal').text(`৳${subtotal.toFixed(2)}`);

            total += subtotal;
        }
    });

    const shipping = 0;

    $('#cart-subtotal').text(total.toFixed(2));
    $('#shipping-fee').text(shipping.toFixed(2));
    $('#cart-total').text(total.toFixed(2));

    $('#cart-total-input').val(Math.round(total));
}


// order confrim button enable and disable

document.addEventListener('DOMContentLoaded', function () {
    const selectBox = document.getElementById('exampleSelect');
    const totalValue = document.getElementById('cart-total-input');
    const confirmBtn = document.getElementById('confirmBtn');

    function checkConfirmEligibility() {
        const isTableSelected = !!selectBox.value;
        const total = parseInt(totalValue.value) || 0;

        if (isTableSelected && total > 0) {
            confirmBtn.disabled = false;
        } else {
            confirmBtn.disabled = true;
        }
    }

    selectBox.addEventListener('change', checkConfirmEligibility);

    checkConfirmEligibility();
});

// remove from cart get data in link 
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.remove-item-link').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            let id = this.dataset.id;
            let input = document.querySelector('input[data-id="' + id + '"]');
            let quantity = input ? input.value : 0;

            // Dynamically set and redirect
            window.location.href = `/remove-to-cart/${id}?txtStock=${quantity}`;
        });
    });
});


function printreport() {
    var header = `
        <h1 style="text-align:center;">Restaurant Management System</h1>
        <p style="text-align:center;">House # 02, Road # 11, Sector # 6, Uttara, Dhaka-1230</p>
        <h3 style="text-align:center;">Kitchen Invoice Copy</h3>
        <hr>
    `;
    var style = `
        <style>
            @font-face {
            font-family: 'BanglaFont';
            src: url('{{ public_path("fonts/NotoSansBengali-Regular.ttf") }}') format('truetype');}
            body { 
                font-family: 'BanglaFont', DejaVu Sans, sans-serif; 
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #f4f4f4;
            }

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