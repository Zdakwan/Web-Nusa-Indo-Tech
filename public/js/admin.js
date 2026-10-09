document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const dashboardLink = document.getElementById('linkDashboard');
    const dropdownButtons = document.querySelectorAll('[data-dropdown-toggle]');

    // Nyalakan / matikan warna aktif pada sebuah elemen sidebar
    function setActive(element, isActive) {
        if (element) {
            element.classList.toggle('is-active', isActive);
        }
    }

    // Tombol hamburger: tampil/sembunyikan sidebar (desktop & mobile)
    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function () {
            if (window.innerWidth >= 768) {
                sidebar.classList.toggle('sidebar-collapsed');
            } else {
                sidebar.classList.toggle('sidebar-open');
            }
        });
    }

    // Dropdown:
    // - dibuka  : tombol yang diklik menyala (putih), Dashboard jadi biru
    // - ditutup : tombol kembali biru, Dashboard TETAP biru (tidak menyala lagi)
    dropdownButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const menu = document.getElementById(button.dataset.dropdownToggle);
            const chevron = button.querySelector('.chevron');
            const willOpen = menu.classList.contains('hidden');

            // Matikan semua tombol dropdown
            dropdownButtons.forEach(function (b) {
                setActive(b, false);
            });

            menu.classList.toggle('hidden');
            chevron.classList.toggle('rotate-180', willOpen);

            if (willOpen) {
                setActive(button, true);
                setActive(dashboardLink, false);
            }
        });
    });
});
