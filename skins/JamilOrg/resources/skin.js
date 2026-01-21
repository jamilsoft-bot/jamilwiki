(function () {
    function onReady(callback) {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', callback);
        } else {
            callback();
        }
    }

    onReady(function () {
        var sidebar = document.querySelector('.jamilorg-sidebar');
        var sidebarToggle = document.querySelector('.jamilorg-sidebar-toggle');
        var sidebarClose = document.querySelector('.jamilorg-sidebar-close');
        var userToggle = document.querySelector('.jamilorg-user-toggle');
        var userMenu = document.querySelector('.jamilorg-user-menu');

        function closeSidebar() {
            if (sidebar) {
                sidebar.classList.remove('open');
            }
        }

        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', function () {
                sidebar.classList.toggle('open');
            });
        }

        if (sidebarClose) {
            sidebarClose.addEventListener('click', closeSidebar);
        }

        if (userToggle && userMenu) {
            userToggle.addEventListener('click', function () {
                var isOpen = userMenu.classList.toggle('open');
                userToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            });

            document.addEventListener('click', function (event) {
                if (!userMenu.contains(event.target) && !userToggle.contains(event.target)) {
                    userMenu.classList.remove('open');
                    userToggle.setAttribute('aria-expanded', 'false');
                }
            });
        }
    });
}());
