import { openForm } from './openform.js';

export function hidePopupDefault() {
    // $('#popup-wrap').hide();
    document.getElementById('popup-wrap').style.display = 'none'
}


export function closePopup(event) {
    if ($(event.target).is('#popup-wrap')) {
        $('#box-popup').fadeOut(100);
        $('#popup-wrap').fadeOut(100);
    }
}

export function cancelPopup() {
    $('#box-popup').fadeOut(100);
    $('#popup-wrap').fadeOut(100);
}

export function setFuntionPopup() {
    let contentPopup = document.getElementById('warning-btn').getAttribute('contentPopup'),
        titlePopup = document.getElementById('warning-btn').getAttribute('titlePopup');

    document.getElementById('warning-btn').addEventListener('click', () => {
        openPopup(titlePopup, contentPopup);
    });

    document.getElementById('open-form').addEventListener('click', (event) => {
        let getForm = event.target.getAttribute('openform');

        openForm(getForm);
    });

    document.getElementById('cancel-btn').addEventListener('click', () => {

        if(document.getElementById('cancel-btn').getAttribute('isReload') != null && document.getElementById('cancel-btn').getAttribute('isReload') != 'false' || document.getElementById('cancel-btn').getAttribute('isReload') == 'true'){
            $("#productBtn").click();
        }

        cancelPopup();
    });

    $('#form-ajax').on('submit', function (e) {
        e.preventDefault();
        cancelPopup();

        let formData = $(this).serialize();

        let throwto = $('#form-ajax').attr('throwto') != null ? $('#form-ajax').attr('throwto') : "";

        $.ajax({
            url: window.location + throwto,
            type: 'GET',
            data: formData,
            success: function (response) {
                // $('#response').html(response);
                openPopup(response.status, response.message, true, 'true');
            },
            error: function (xhr, status, error) {
                // $('#response').html('An error occurred: ' + error);
                console.log("Error: ", error);
            }
        });
    })
}

export function openPopup(title = "", content = "", justConfirm = false, isReload = 'false') {
    $('#title-popup').html(title);
    $('#content-popup').html(content);

    if(justConfirm == true){
        $('#option-popup').html(`
            <button class="primary" id="cancel-btn" type="button" isReload="${isReload}">Oke</button>
            `);
            setFuntionPopup();
    } else {
        $('#option-popup').html(`
            <button class="warning" id="cancel-btn" type="button">Tidak</button>
            <button class="normal" id="confirm-form" type="submit">Ya</button>
            `);
            setFuntionPopup();
    }

    $('#box-popup').fadeIn(100);
    $('#popup-wrap').fadeIn(100);
}

$(window).on('click', closePopup);