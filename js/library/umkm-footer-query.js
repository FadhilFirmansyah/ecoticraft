fetch('https://haydar-hilmy.github.io/ecoticraft/umkm-data.json')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(datas => {
        datas.forEach(umkm => {
            let link = `<a href="umkm.html#umkm${umkm.id}">${umkm.judul}</a>`;
            document.getElementById("umkm-footer").innerHTML += link;
        });
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });