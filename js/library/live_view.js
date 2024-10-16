const uniqueId = 'id_' + Math.floor(Math.random() * 1000);

function getWaktu() {
    // dapatkan waktu sekarang
    const time = new Date();

    // dapatkan tanggal
    const day = time.getDate();
    const month = time.getMonth() + 1;
    const year = time.getFullYear();
    // dapatkan jam
    const hour = time.getHours();
    const minute = time.getMinutes();
    const second = time.getSeconds();

    let fullTime = `${day}/${month}/${year} | ${hour}:${minute}:${second}`;
    return fullTime;
}

function getDeviceType() {
    const userAgent = navigator.userAgent.toLowerCase();

    if (userAgent.match(/mobile|android|iphone|ipad|ipod|blackberry|iemobile|opera mini/i)) {
        return 'Mobile Device';
    } else if (userAgent.match(/ipad/i)) {
        return 'iPad';
    } else if (userAgent.match(/tablet/i)) {
        return 'Tablet';
    } else {
        return 'Desktop';
    }
}


function setCookie(name, value, waktu) {
    let expires = "";
    if (waktu) {
        let date = new Date();
        date.setTime(date.getTime() + (1 * waktu * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
    let nameEQ = name + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

async function getIpAddress() {
    try {
        let response = await fetch('https://api.ipify.org/?format=json');
        let data = await response.json();
        return data.ip;
    } catch (error) {
        return error;
    }
}

async function insertViewPage() {
    try {
        let pathName = window.location.pathname;
        let segmentsPathname = pathName.split('/').filter(Boolean);
        let lastPartPathName = segmentsPathname.pop() || 'home';
        let resultPathName = (lastPartPathName === 'product') ? 'product' : 'home';
        await fetch(`${this.window.location.href}/viewpage/${resultPathName}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    } catch (error) {
        return error;
    }
}


window.addEventListener('load', async function () {

    const apiToken = "7200858634:AAGJmq47jKZPTorcj3SABhCB2FqOnggY2Bg";

    let get_id, first_time_view;

    if (localStorage.getItem('eco') == null || localStorage.getItem('eco') == null) {

        await insertViewPage();

        localStorage.setItem('eco', uniqueId);
        localStorage.setItem('view_at', getWaktu());

        get_id = localStorage.getItem('eco');
        first_time_view = localStorage.getItem('view_at');


        let chatContent = `
        [ NEW ECOTICRAFT ] %0A
id: [ ${get_id} ]%0A
first time: [ ${first_time_view} ]%0A
open: [ ${window.location.pathname} ]%0A%0A
ip: [${await getIpAddress()}] %0A
time: [ ${getWaktu()} ]%0A
screen: [ ${screen.width}x${screen.height} ]%0A
device: [ ${getDeviceType()} ]%0A
properties: [ ${navigator.userAgent.toLowerCase()} ]%0A
platform : [ ${navigator.platform} ]%0A
        `;

        const apiURL = `https://api.telegram.org/bot${apiToken}/sendMessage?chat_id=1394633260&text=${chatContent}`;
        fetch(`${apiURL}`)
            .then(response => response.json())
            .catch(error => console.error(error));
    } else {
        get_id = localStorage.getItem('eco');

        if (getCookie('ecoticraft') == null || getCookie('ecoticraft') == "") {

            await insertViewPage();

            setCookie('ecoticraft', get_id, 1);

            let chatContent = `
        [ VIEW ] %0A
id: ${get_id}%0A
open: [ ${window.location.pathname} ]%0A
time: [ ${getWaktu()} ]%0A
device: [ ${getDeviceType()} ]%0A
ip: [${await getIpAddress()}]%0A
        `;

            const apiURL = `https://api.telegram.org/bot${apiToken}/sendMessage?chat_id=1394633260&text=${chatContent}`;
            fetch(`${apiURL}`)
                .then(response => response.json())
                .catch(error => console.error(error));
        }

    }



});