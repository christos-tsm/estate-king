window.onload = () => {
    if (document.querySelector('input[name="avatar_url"]')) {
        const _file_input = document.querySelector('input[name="avatar_url"]');

        _file_input.addEventListener("change", (e) => {
            previewFile();
        });
    }
};

// Helper functions
const previewFile = () => {
    let file = document.querySelector('input[name="avatar_url"]').files[0];
    let preview = document.querySelector("#avatar_placeholder");
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    }
};
