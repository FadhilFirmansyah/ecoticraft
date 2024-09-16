export function setupCheckboxMain() {
    let checkboxMain = document.getElementById('checkbox-input-main');
    let checkboxChild = document.querySelectorAll('.checkbox-input');
    let warning_btn = document.getElementById('warning-btn');
    let edit_btn = document.getElementById('edit-btn');

    checkboxMain.addEventListener('click', function() {
        checkboxChild.forEach(function(checkbox) {
            checkbox.checked = checkboxMain.checked;
        });
    });

    function updateButtonState() {
        let isAnyChecked = Array.from(checkboxChild).some(checkbox => checkbox.checked);
        let isAllChecked = Array.from(checkboxChild).every(checkbox => checkbox.checked);
        let checkedCount = Array.from(checkboxChild).filter(checkbox => checkbox.checked).length;

        warning_btn.disabled = !isAnyChecked;
        checkboxMain.checked = isAllChecked;

        edit_btn.disabled = checkedCount !== 1;
    }


    checkboxMain.addEventListener('input', updateButtonState);
    checkboxChild.forEach(function(checkbox) {
        checkbox.addEventListener('input', updateButtonState);
    });
    updateButtonState();
}
