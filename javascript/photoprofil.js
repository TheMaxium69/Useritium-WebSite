function previewImage(event) {
    var PPchange = document.getElementById("PPchange");
    var PPnoChange = document.getElementById("PPnoChange");
    var output = document.getElementById('previewImg');

    var reader = new FileReader();
    reader.onload = function () {
        output.style.backgroundImage = 'url(' + reader.result + ')';

        PPchange.style.display = "block";
        PPnoChange.style.display = "none";

    };
    reader.readAsDataURL(event.target.files[0]);
}

function hoverPP(){
    var uploadIcone = document.getElementById("uploadIcone")
    uploadIcone.style.display = "block";
}

function nohoverPP() {
    var uploadIcone = document.getElementById("uploadIcone")
    uploadIcone.style.display = "none";
}