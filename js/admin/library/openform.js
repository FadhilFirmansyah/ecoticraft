import { error_page } from './error_page.js';
import { setFunctionDragndrop, setFunctionVarianInput } from './input-custom.js';

 
export function openForm(getContent = null) {
    $('#main-content').load('js/admin/html/loading.html');
    if (getContent != null) {
        $('#main-content').load(`admin/form/${getContent}`, function (response, status, xhr) {
            if (status == "error") {
                error_page();
            } else {
                setFunctionDragndrop();
                setFunctionVarianInput();
            }
        });
    } else {
        $('#main-content').load('js/admin/html/crash.html');
    }
}