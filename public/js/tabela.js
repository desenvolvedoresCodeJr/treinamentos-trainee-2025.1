const sidebar = document.querySelector('.sidebar-admin');

sidebar.addEventListener('mouseenter', () => {
    sidebar.classList.remove('sidebar-closed');
})

sidebar.addEventListener('mouseleave', () => {
    sidebar.classList.add('sidebar-closed');
})