import { error_page } from './error_page.js';
import { setFunctionDragndrop, setFunctionVarianInput, setMultiFunctionDragndrop } from './input-custom.js';
import { cancelPopup, hidePopupDefault, openPopup, setFunctionPopup } from './popup.js';

export function setBtnForm() {
    document.querySelectorAll('.open-form').forEach((btn) => {

        btn.addEventListener('click', (event) => {
            let getForm = event.target.getAttribute('openform');

            openForm(getForm);
        });

    });
}

export function openForm(getContent = null) {

    let checkboxs = document.querySelectorAll('.checkbox-input'),
    getId = null,
    loadUrl;

    if(checkboxs != null){
        checkboxs.forEach(function(cb) {
            if(cb.checked){
                getId = cb.value;
                return; // keluar loop jika ada cb yang tercheck
            }
        });
    }

    if(getId != null){    
        loadUrl = `admin/form/${getContent}/${getId}`;
    } else {
        loadUrl = `admin/form/${getContent}`;
    }

    $('#main-content').load('js/admin/html/loading.html');
    if (getContent != null) {
        $('#main-content').load(loadUrl, function (response, status, xhr) {
            if (status == "error") {
                error_page();
            } else {
                setFunctionDragndrop();
                setMultiFunctionDragndrop();
                setFunctionVarianInput();
                setForm();
                hidePopupDefault();
            }
        });
    } else {
        $('#main-content').load('js/admin/html/crash.html');
    }
}

export function setForm() {
    
    setFunctionPopup();
    
    let throwto = $('#form-ajax').attr('action') != null ? $('#form-ajax').attr('action') : "";
    let method = $('#form-ajax').attr('method') != null ? $('#form-ajax').attr('method') : "";
    let isDanger = $('#form-ajax').attr('isDanger') != null ? $('#form-ajax').attr('isDanger') : false;
    let loadTo = $('#form-ajax').attr('loadTo') != null ? $('#form-ajax').attr('loadTo') : null;

    $('#form-ajax').on('submit', function (e) {
        e.preventDefault();
        if (!isDanger) {
            cancelPopup();
        }

        let formData;
        let fileInput = $(this).find('input[type="file"]');

        // let formHasFile = fileInput.length > 0 || fileInput.get(0).files.length > 0;
        let formHasFile = fileInput.length > 0;

        if (formHasFile) {
            formData = new FormData(this);
        } else {
            formData = $(this).serialize();
        }

        
        let getFieldforResponseData = $(this).find('#show-result').length > 0 ? true : false;

        // RETURN JSON
        $.ajax({
            url: window.location + throwto,
            type: method,
            data: formData,
            processData: formHasFile ? false : true, // Jangan proses data
            contentType: formHasFile ? false : 'application/x-www-form-urlencoded', // Jangan set konten tipe
            success: function (response) {
                if (!isDanger) {
                    openPopup(response.status, response.message, true, loadTo);
                } else {
                    openPopup(response.status, response.message, true, loadTo);
                }
                
                if(response.data != null){
                    if(getFieldforResponseData){
                        $('#show-result').html('<pre>' + JSON.stringify(response.data, null, 2) + '</pre>');
                    }
                }
            },
            error: function (xhr, status, error) {
                // $('#response').html('An error occurred: ' + error);
                openPopup("Error", error, true, loadTo);
                console.log("Error: ", error);
                console.log("XHR: ", xhr.responseText);
                if(getFieldforResponseData){
                    $('#show-result').html(`Error: ${error}`);
                }
            }
        });
    })

}