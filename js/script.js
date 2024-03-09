function preview(){
    const inputFoto = document.querySelector("#img_input");
    const preview = document.querySelector("#previewImg"); 
    const labelFoto = document.querySelector(".label-foto");

    labelFoto.textContent = inputFoto.files[0].name;

    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(inputFoto.files[0]);

    fileFoto.onload = function(e){
        preview.src = e.target.result;
    }
}