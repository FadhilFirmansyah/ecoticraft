export function setupCheckboxMain() {
    let checkboxMain = document.getElementById('checkbox-input-main');
    let checkboxChild = document.querySelectorAll('.checkbox-input');
    let warning_btn = document.getElementById('warning-btn');

    checkboxMain.addEventListener('click', function() {
        checkboxChild.forEach(function(checkbox) {
            checkbox.checked = checkboxMain.checked;
        });

    });
    function updateButtonState() {
        let isAnyChecked = Array.from(checkboxChild).some(checkbox => checkbox.checked);
        let isAllChecked = Array.from(checkboxChild).every(checkbox => checkbox.checked);

        warning_btn.disabled = !isAnyChecked;
        checkboxMain.checked = isAllChecked;
    }
    checkboxMain.addEventListener('input', updateButtonState);
    checkboxChild.forEach(function(checkbox) {
        checkbox.addEventListener('input', updateButtonState);
    });
    updateButtonState();
}
