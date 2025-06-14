function toggleDiv() {
    $('#toggleDiv').slideToggle(300);

    const btn = document.getElementById('toggleBtn');
    if ($('#toggleDiv').is(':visible')) {
        btn.innerHTML = '<i class="mdi mdi-close"></i> Close';
    } else {
        btn.innerHTML = '<i class="mdi mdi-library-plus"></i> Add New';
    }
}
