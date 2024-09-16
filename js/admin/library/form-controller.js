import { error_page } from './error_page.js';
import { setFunctionDragndrop, setFunctionVarianInput } from './input-custom.js';
import { cancelPopup, hidePopupDefault, openPopup } from './popup.js';

export function setBtnForm() {
    document.querySelectorAll('.open-form').forEach((btn) => {

        btn.addEventListener('click', (event) => {
            let getForm = event.target.getAttribute('openform');
            let formGetPost = event.target.getAttribute('formGetPost');

            openForm(getForm, formGetPost);
        });

    });
}

export function openForm(getContent = null, isGetPost) {
    $('#main-content').load('js/admin/html/loading.html');
    if (getContent != null) {
        $('#main-content').load(`admin/form/${getContent}`, function (response, status, xhr) {
            if (status == "error") {
                error_page();
            } else {
                setFunctionDragndrop();
                setFunctionVarianInput();
                setForm(isGetPost, false);
                hidePopupDefault();
            }
        });
    } else {
        $('#main-content').load('js/admin/html/crash.html');
    }
}

// DANGERFORM: khusus untuk permintaan menghapus data
export function setForm(isGetPost = 'GET', dangerForm = false) {

    $('#form-ajax').on('submit', function (e) {
        e.preventDefault();
        if (!dangerForm) {
            cancelPopup();
        }

        // let formData = $(this).serialize();
        let formData = new FormData(this);

        let throwto = $('#form-ajax').attr('throwto') != null ? $('#form-ajax').attr('throwto') : "";

        // RETURN JSON
        $.ajax({
            url: window.location + throwto,
            type: isGetPost,
            data: formData,
            processData: false, // Jangan proses data
            contentType: false, // Jangan set konten tipe
            success: function (response) {
                if (!dangerForm) {
                    openPopup(response.status, response.message, true, true);
                } else {
                    openPopup(response.status, response.message, true, true);
                }
            },
            error: function (xhr, status, error) {
                // $('#response').html('An error occurred: ' + error);
                console.log("Error: ", error);
            }
        });
    })

}