import { setupCheckboxMain } from "./library/checkbox.js";

let loadMorebtn,
product_list, 
limitNow = 10,
offset;

export function setFunctionProduct() {
    loadMorebtn = document.getElementById('load-more-btn');
    limitNow = loadMorebtn.getAttribute('loadDataLimit') != null ? loadMorebtn.getAttribute('loadDataLimit') : 10;
    offset = limitNow;
    product_list = $('#product-list');
    loadMorebtn.addEventListener('click', () => {
        loadMore(limitNow);
    });
}


export function loadMore(getTotalData) {
    $.ajax({
        url: window.location + `/api/getallproduct/${getTotalData}/${offset}`,
        method: 'GET',
        success: function (data) {
            if(data.trim() !== '' || data.trim() != ''){
                product_list.append(data);
            } else {
                loadMorebtn.disabled = !loadMorebtn.disabled;
                loadMorebtn.innerHTML = 'You\'ve reached the end of the data :)';
            }
            setupCheckboxMain();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error fetching data:', textStatus, errorThrown);
        }
    });
    offset = parseFloat(offset) + parseFloat(getTotalData);
}