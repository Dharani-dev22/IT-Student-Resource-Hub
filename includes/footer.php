</main>
    <footer class="footer" style="margin-top: auto; padding: 20px; text-align: center;">
        <p>&copy; <?php echo date("Y"); ?> IT Student Resource Hub. All rights reserved.</p>
        <div style="margin-top: 10px;">
            <a href="mailto:pondharani.devendra22@gmail.com" style="margin: 0 10px; text-decoration: none;">Email</a>
            <a href="https://github.com/Dharani-dev22" target="_blank" style="margin: 0 10px; text-decoration: none;">GitHub</a>
            <a href="https://www.linkedin.com/in/pondharani-devendra/" target="_blank" style="margin: 0 10px; text-decoration: none;">LinkedIn</a>
        </div>
    </footer>
   <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        
        let currentTheme = localStorage.getItem('theme') || 'light';
        themeToggleBtn.textContent = currentTheme === 'dark' ? 'Light Mode' : 'Dark Mode';

        themeToggleBtn.addEventListener('click', function() {
            let theme = document.documentElement.getAttribute('data-theme');
            let targetTheme = theme === 'light' ? 'dark' : 'light';
            
            document.documentElement.setAttribute('data-theme', targetTheme);
            localStorage.setItem('theme', targetTheme);
            
            this.textContent = targetTheme === 'dark' ? 'Light Mode' : 'Dark Mode';
        });
    </script>
</body>
</html>
</body>
</html>