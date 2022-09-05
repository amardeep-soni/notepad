// update
function updateFunction(elem) {
    let parentElem = elem.parentElement.parentElement.parentElement;
    let title = parentElem.getElementsByTagName("h5")[0].innerText;
    let description = parentElem.getElementsByTagName("p")[0].innerText;

    let updateTitleElem = document.getElementById('updateInputTitle')
    let updateInputDescriptionElem = document.getElementById('updateInputDescription')
    let snoUpdateElem = document.getElementById('updateSno')

    updateTitleElem.value = title;
    updateInputDescriptionElem.value = description;
    snoUpdateElem.value = elem.id;
}

// delete
function deleteFunc(e) {
    let snoDeleteElem = document.getElementById('deleteSno');
    snoDeleteElem.value = e;
}