const inputFile = document.getElementById('gambar');
        const fileText = document.querySelector('.form-file-text');

        inputFile.addEventListener('change', function() {
            fileText.textContent = inputFile.files[0].name;
        });