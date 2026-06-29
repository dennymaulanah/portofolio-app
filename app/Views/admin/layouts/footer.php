<!-- Admin Footer -->
<footer class="ml-0 md:ml-64 border-t border-white/5 py-4 md:py-6 px-4 md:px-8 mt-auto">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-2 text-on-surface-variant text-xs opacity-50">
        <p>© <?= date('Y') ?> Azeria | Portfolio App</p>
        <p>v1.0.0</p>
    </div>
</footer>

<script>
    // Micro-interaction for cards
    document.querySelectorAll('.glass-card').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        });
    });

    // Search Bar Focus Effect
    const searchInput = document.querySelector('input[type="text"]');
    if (searchInput) {
        searchInput.addEventListener('focus', () => {
            searchInput.parentElement.classList.add('scale-105');
        });
        searchInput.addEventListener('blur', () => {
            searchInput.parentElement.classList.remove('scale-105');
        });
    }
</script>
</body>

</html>