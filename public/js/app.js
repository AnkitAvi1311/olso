window.onload = function() {
    //  for the search bar
    const form = document.getElementById('search-products');
    const button = document.getElementById('submit');
    if(button) {
        button.onclick = ()=> {
            form.submit();
        }
    }

}