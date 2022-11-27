
    <script src="<?= assetsUrl("js/bootstrapFront.js") ?>" type="module"></script>
    
    <?php if (checkAuth([1])): ?>
        <script src="<?= assetsUrl("js/bootstrapBack.js") ?>" type="module"></script>
    <?php endif; ?>
        
    <?= $this->insert('partials/mobileNav') ?>

</body>
</html>