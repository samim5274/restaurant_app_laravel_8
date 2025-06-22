function toggleDiv() {
    $('#toggleDiv').slideToggle(300);

    const btn = document.getElementById('toggleBtn');
    if ($('#toggleDiv').is(':visible')) {
        btn.innerHTML = '<i class="mdi mdi-close"></i> Close';
    } else {
        btn.innerHTML = '<i class="mdi mdi-library-plus"></i> Add New';
    }
}

    
    
    const uploadArea = document.getElementById('uploadArea');
    const imageInput = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');

    // Accept only image file types
    function isImageFile(file) {
        return file && file['type'].startsWith('image/');
    }

    function showImagePreview(file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            previewImage.src = e.target.result;
            previewImage.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }

    uploadArea.addEventListener('click', () => imageInput.click());

    imageInput.addEventListener('change', function () {
        const file = this.files[0];
        if (isImageFile(file)) {
            showImagePreview(file);
        } else {
            alert('Please upload a valid image file (JPG, PNG, etc.)');
            imageInput.value = ''; // Reset file input
            previewImage.style.display = 'none';
        }
    });

    uploadArea.addEventListener('dragover', function (e) {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', function () {
        uploadArea.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', function (e) {
        e.preventDefault();
        uploadArea.classList.remove('dragover');

        const file = e.dataTransfer.files[0];
        if (isImageFile(file)) {
            imageInput.files = e.dataTransfer.files;
            imageInput.dispatchEvent(new Event('change'));
        } else {
            alert('Only image files are allowed!');
        }
    });



