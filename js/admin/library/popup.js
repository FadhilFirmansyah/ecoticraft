import { openForm, setForm, setBtnForm } from './form-controller.js';
import { reloadContent } from './reload-ajax.js';


export function setFunctionPopup() {

    window.onclick = closePopup;
    hidePopupDefault();

    let warningBtn = document.getElementById('warning-btn');

    let contentPopup = warningBtn ? warningBtn.getAttribute('contentPopup') : null,
        titlePopup = warningBtn ? warningBtn.getAttribute('titlePopup') : null;

    if (warningBtn) {
        document.getElementById('warning-btn').addEventListener('click', () => {
            openPopup(titlePopup, contentPopup, false, true);
        });
    }

    setBtnForm();

    document.getElementById('cancel-btn').addEventListener('click', () => {

        if (document.getElementById('cancel-btn').getAttribute('reloadTo') != null) {
            let load = document.getElementById('cancel-btn').getAttribute('reloadTo');
            reloadContent(load);
        } else {
            reloadContent("#dashboardBtn");
        }

        cancelPopup();
    });

}


// DEFAULT
export function cancelPopup() {
    $('#box-popup').fadeOut(100);
    $('#popup-wrap').fadeOut(100);
}

// KETIKA BAGIAN LUAR BOX POPUP DIKLIK
export function closePopup(event) {
    if ($(event.target).is('#popup-wrap')) {
        $('#box-popup').fadeOut(100);
        $('#popup-wrap').fadeOut(100);
    }
}

// JUSTCONFIRM: TRUE (hanya ada button oke)/ FALSE (ada button ya dan tidak)
// ISRELOAD: TRUE (button navbar diklik -> otomatis memuat ulang)
export function openPopup(title = "", content = "", justConfirm = false, loadTo = null) {
    $('#title-popup').html(title);
    $('#content-popup').html(content);

    if (justConfirm == true) {
        $('#option-popup').html(`
            <button class="primary" id="cancel-btn" type="button" reloadTo="${loadTo}">Oke</button>
            `);
        setFunctionPopup();
    } else {
        $('#option-popup').html(`
            <button class="warning" id="cancel-btn" type="button">Tidak</button>
            <button class="normal" type="submit">Ya</button>
            `);
        setFunctionPopup();
    }

    $('#box-popup').fadeIn(100);
    $('#popup-wrap').fadeIn(100);
}

export function hidePopupDefault() {
    $('#popup-wrap').hide();
}

$(window).on('click', closePopup);