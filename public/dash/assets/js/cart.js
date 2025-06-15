document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-minus').forEach(button => {
        button.addEventListener('click', function () {
            const input = this.closest('.input-group').querySelector('.qty-input');
            let value = parseInt(input.value);
            if (value > 1) input.value = value - 1;
        });
    });

    document.querySelectorAll('.btn-plus').forEach(button => {
        button.addEventListener('click', function () {
            const input = this.closest('.input-group').querySelector('.qty-input');
            let value = parseInt(input.value);
            input.value = value + 1;
        });
    });
});