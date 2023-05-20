import './bootstrap';


import 'materialize-css/dist/js/materialize';


$(function () {
    M.Dropdown.init(
        document.querySelectorAll('.dropdown-trigger'),
        {
            coverTrigger: false,
            alignment: 'right',
            constrainWidth: false
        }
    );
    M.Collapsible.init(
        document.querySelectorAll('.collapsible'),
        {
        }
    );
    M.Tabs.init(
        document.querySelectorAll('.tabs'),
        {
        }
    );
    M.Sidenav.init(
        document.getElementById('nav-mobile'),
        {
        }
    );
});
