
// MUST USE # to get ID
export function reloadContent(btnPage = null){
    if(btnPage != null){
        $(`${btnPage}`).click();
    }
}