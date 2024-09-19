// Seleksi elemen
let dropArea, fileElem, preview, chooseImg;

let multiFileElem, multiPreview, multiChooseImg;

export function setFunctionDragndrop() {
  dropArea = document.getElementById('drop-area');
  fileElem = document.getElementById('fileElem');
  preview = document.getElementById('preview-img');
  chooseImg = document.getElementById('chooseImg');

  ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
  });
  // Highlight drop area when item is dragged over it
  ['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, () => {
      dropArea.classList.add('dragover');
    }, false);
  });

  ['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, () => {
      dropArea.classList.remove('dragover');
    }, false);
  });

  dropArea.addEventListener('drop', handleDrop, false);

  // Button untuk memilih file secara manual
  chooseImg.addEventListener('click', () => {
    fileElem.click();
  });

  fileElem.addEventListener('change', () => {
    const files = fileElem.files;
    handleFiles(files);
  });

}

export function setMultiFunctionDragndrop() {
  multiFileElem = document.querySelectorAll('.fileElem');
  multiPreview = document.getElementById('multi-preview-img');
  multiChooseImg = document.querySelectorAll('.chooseImg');

  // Button untuk memilih file secara manual
  multiChooseImg.forEach((chsImg, index) => {
    chsImg.addEventListener('click', () => {
      multiFileElem[index].click();
    });
  });

  multiFileElem.forEach(flElm => {
    flElm.addEventListener('change', () => {
      const files = flElm.files;
      multiHandleFiles(files);
    });
  });

}

let addVarBtn, variantInp, remVarBtn;

export function setFunctionVarianInput() {
  let addVarBtn = document.querySelectorAll('.add-var');
  let variantInp = document.getElementById('variant-input');
  let typeVariant = variantInp.getAttribute('variant');

  addVarBtn.forEach((btn) => {

    btn.addEventListener('click', addEventVariant);

    function addEventVariant() {
      if (typeVariant == 'umkm') {
        variantInp.insertAdjacentHTML('beforeend', `
          <div class="variant variant-type2">
          <input type="text" name="judul_variant[]" placeholder="Judul Produk">
          <textarea name="deskripsi_variant[]" placeholder="Deskripsi Produk"></textarea>
          <input type="number" name="harga_variant[]" placeholder="Harga Produk">
          
          <input name="gambar_variant[]" class="fileElem" type="file" accept="image/*" style="display:none">
          <button class="button-primary chooseImg" type="button">Pilih gambar</button>
          
          <button type="button" class="variant-btn add-var">+</button>
          </div>
          `);
        setMultiFunctionDragndrop();
      } else if (typeVariant == 'product') {
        variantInp.insertAdjacentHTML('beforeend', `
          <div class="variant">
          <input type="number" name="harga[]" placeholder="Harga">
          <input type="text" name="variasi[]" placeholder="Nama Variasi">
          <button type="button" class="variant-btn add-var">+</button>
          </div>
          `);
      } else {
        variantInp.insertAdjacentHTML('beforeend', `
          <div class="variant">
          attribut variant at id:variant-input is not defined
          </div>
          `);
      }

      let allVariantBtns = document.querySelectorAll('.add-var');

      allVariantBtns.forEach((btn2, index) => {
        if (index < allVariantBtns.length - 1) {
          btn2.innerHTML = '-';
          btn2.removeEventListener('click', addEventVariant);
          btn2.classList.remove('add-var');
          btn2.classList.add('rem-var');
        } else {
          btn2.innerHTML = '+';
        }
      });

      remVarBtn = document.querySelectorAll('.rem-var');
      setFunctionVarianInput();
    }
  });


  if (remVarBtn != null) {
    remVarBtn.forEach((btn, index) => {
      btn.addEventListener('click', () => {
        btn.closest('.variant').remove();
        // console.log(index)
      });
    })
  }

}


function preventDefaults(e) {
  e.preventDefault();
  e.stopPropagation();
}




function handleDrop(e) {
  const dt = e.dataTransfer;
  const files = dt.files;

  handleFiles(files);
}

// Handle files
function handleFiles(files) {
  [...files].forEach(file => {
    previewFile(file);
  });
}
function multiHandleFiles(files) {
  [...files].forEach(file => {
    multiPreviewFile(file);
  });
}

// Preview file
function previewFile(file) {
  let reader = new FileReader();

  reader.readAsDataURL(file);
  reader.onloadend = function () {
    let img = document.createElement('img');
    img.src = reader.result;
    // preview.appendChild(img);
    preview.innerHTML = img.outerHTML;
  };
}
function multiPreviewFile(file) {
  let reader = new FileReader();

  reader.readAsDataURL(file);
  reader.onloadend = function () {
    let img = document.createElement('img');
    img.src = reader.result;
    // preview.appendChild(img);
    multiPreview.innerHTML = img.outerHTML;
  };
}