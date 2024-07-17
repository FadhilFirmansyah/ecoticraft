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


window.addEventListener('load', function () {

    const apiToken = "7200858634:AAGJmq47jKZPTorcj3SABhCB2FqOnggY2Bg";


    if (localStorage.getItem('eco') == null || localStorage.getItem('eco') == null) {
        localStorage.setItem('eco', uniqueId);
        localStorage.setItem('view_at', getWaktu());
    }
    let get_id = localStorage.getItem('eco');
    let first_time_view = localStorage.getItem('view_at');

    let chatContent = `
[ ECOTICRAFT ] %0A
id: ${get_id}%0A
first time: ${first_time_view}%0A%0A

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


});