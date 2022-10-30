let reg = document.getElementById('register-link');
let log = document.getElementById('register-link');
input.addEventListener('input', changeSearchBtnAvailability)
function changeSearchBtnAvailability() {
    if (input.value == "")
    {
        console.log(search_btn.style.cursor);
        search_btn.style.cursor = "not-allowed";
    }
    else
    {
        search_btn.style.cursor = "pointer";
    }
    
}