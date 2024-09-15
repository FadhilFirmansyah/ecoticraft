// Seleksi elemen
let dropArea, fileElem, preview, chooseImg;

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

let addVarBtn, variantInp, remVarBtn;

export function setFunctionVarianInput() {
  addVarBtn = document.querySelectorAll('.add-var');
  variantInp = document.getElementById('variant-input');

  addVarBtn.forEach((btn) => {

    btn.addEventListener('click', addEventVariant);

    function addEventVariant(){
      variantInp.insertAdjacentHTML('beforeend', `
        <div class="variant">
                    <input type="text" name="harga[]" placeholder="Harga">
                    <input type="text" name="variasi[]" placeholder="Nama Variasi">
                    <button type="button" class="variant-btn add-var">+</button>
                </div>
        `);

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
      
      setFunctionVarianInput();
      remVarBtn = document.querySelectorAll('.rem-var');
    }
  });


  if(remVarBtn != null){
    remVarBtn.forEach((btn, index) => {
      btn.addEventListener('click', () => {
        btn.closest('.variant').remove();
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

// Preview file
function previewFile(file) {
  let reader = new FileReader();

  reader.readAsDataURL(file);
  reader.onloadend = function () {
    let img = document.createElement('img');
    img.src = reader.result;
    preview.appendChild(img);
  };
}


// TOMBOL MINUS NYA BELUM BISA (DI POSISI YANG TERBARU)