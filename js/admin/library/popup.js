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

    document.getElementById('cancel-btn').addEventListener('click', () => {
        cancelPopup();
    });

    document.getElementById('warning-btn').addEventListener('click', () => {
        openPopup(titlePopup, contentPopup);
    });
}

export function openPopup(title = "", content = "") {
    $('#title-popup').html(title);
    $('#content-popup').html(content);

    $('#box-popup').fadeIn(100);
    $('#popup-wrap').fadeIn(100);
}

$(window).on('click', closePopup);