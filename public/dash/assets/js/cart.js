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

    $('tbody tr').each(function () {
        const price = parseFloat($(this).find('td[data-price]').data('price'));
        const qty = parseInt($(this).find('.qty-input').val());

        if (!isNaN(price) && !isNaN(qty)) {
            const subtotal = price * qty;
            $(this).find('.item-subtotal').text(`$${Math.round(subtotal)}`);
            total += subtotal;
        }
    });

    const shipping = 0;

    $('#cart-subtotal').text(Math.round(total));
    $('#shipping-fee').text(Math.round(shipping));
    $('#cart-total').text(Math.round(total + shipping));

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