</div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleBtn');
    const closeBtn = document.getElementById('closeSidebar');
    const overlay = document.getElementById('overlay');
    const mainContent = document.querySelector('.main-content');

    function isMobile() {
        return window.innerWidth <= 991;
    }

    toggleBtn.addEventListener('click', function () {
        if (isMobile()) {
            // Mobile: slide
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        } else {
            // Desktop: collapse
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('full');
        }
    });

    // Close button (mobile)
    closeBtn.addEventListener('click', function () {
        sidebar.classList.remove('show');
        overlay.classList.remove('show');
    });

    // Overlay click
    overlay.addEventListener('click', function () {
        sidebar.classList.remove('show');
        overlay.classList.remove('show');
    });

});
</script>



</body>
</html>
