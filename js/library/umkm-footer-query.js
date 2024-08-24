fetch('https://haydar-hilmy.github.io/ecoticraft/umkm-data.json')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(datas => {
        let idxUmkm = 1;
        datas.forEach(umkm => {
            let link = `<a href="umkm.html#umkm${idxUmkm}">${umkm.judul}</a>`;
            document.getElementById("umkm-footer").innerHTML += link;
            idxUmkm++;
        });
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });