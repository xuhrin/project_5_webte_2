import './bootstrap';


import 'materialize-css/dist/js/materialize';


$(function () {
    M.Dropdown.init(
        document.getElementById('language-trigger'),
        {
            coverTrigger: false,
            alignment: 'right'
        }
    );
    M.Collapsible.init(
        document.querySelectorAll('.collapsible'),
        {
        }
    );
    M.Sidenav.init(
        document.getElementById('nav-mobile'),
        {
        }
    );
});
