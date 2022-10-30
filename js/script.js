const input = document.getElementsByClassName('header-search-bar')[0];
const search_btn = document.getElementsByClassName('search__btn')[0];
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
search_btn.addEventListener('click', Search)
function Search() {
    if (input.value != "")
    {

        sessionStorage.setItem("keyword", input.value);
        print(11213131414134141);
        window.location = "http://localhost/we-are-critic/create_search_results.php?keyword=" + input.value;
    }
}

function ToggleUserMenu() {
    var userMenu = document.getElementsByClassName('user-menu')[0];
    if (userMenu.style.visibility != 'visible')
        userMenu.style.visibility = 'visible';
    else
        userMenu.style.visibility = 'hidden';
}

function DeleteFilm(link, key) {
    if (confirm('Do you really want to delete film from database?'))
        window.location = "http://localhost/we-are-critic/" + link + "&keyword=" + key;
}

