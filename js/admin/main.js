import { createChart } from './library/chart-dashboard.js';
import { setupCheckboxMain } from './library/checkbox.js';
import { hidePopupDefault, closePopup, openPopup, setFuntionPopup } from './library/popup.js';
import { setFunctionProduct } from './product.js';

$(document).ready(function () {

    function error_page() {
        $('#main-content').load('js/admin/html/crash.html');
    }


    // WINDOW ONLOADDD
    $(window).on('load', function () {

        $('#main-content').load('js/admin/html/loading.html');
        $('#main-content').load('admin/dashboard', function (response, status, xhr) {
            if (status == "error") {
                error_page();
            } else {
                createChart();
            }
        });
    });


    // DASHBOARD
    $('#dashboardBtn').click(function () {
        $('#main-content').load('js/admin/html/loading.html');
        $('#main-content').load('admin/dashboard', function (response, status, xhr) {
            if (status == "error") {
                error_page();
            } else {
                createChart();
            }
        });
    });

    
    // PRODUCT
    $('#productBtn').click(function () {
        $('#main-content').load('js/admin/html/loading.html');
        $('#main-content').load('admin/product', function (response, status, xhr) {
            if (status == "error") {
                error_page();
            } else {
                setupCheckboxMain();
                hidePopupDefault();
                setFuntionPopup();
                setFunctionProduct();
                window.onclick = closePopup;
            }
        });
    });


    // UMKM
    $('#umkmBtn').click(function () {
        $('#main-content').load('js/admin/html/loading.html');
        $('#main-content').load('admin/umkm', function (response, status, xhr) {
            if (status == "error") {
                error_page();
            }
        });
    });


    // UMKM
    $('#manageAdmBtn').click(function () {
        $('#main-content').load('js/admin/html/loading.html');
        $('#main-content').load('admin/superadmin', function (response, status, xhr) {
            if (status == "error") {
                error_page();
            }
        });
    });

});