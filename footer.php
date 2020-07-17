<!-- footer
================================================== -->
<footer class="footer">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6">
            <?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
                <div class="footer-section-one">
                    <?php dynamic_sidebar( 'footer-left' ); ?>
                </div>
            <?php endif; ?>
            </div><!-- /.col-md -->
            <div class="col-md-6">
            <?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
                <div class="footer-section-two">
                    <?php dynamic_sidebar( 'footer-right' ); ?>
                </div>
            <?php endif; ?>
            </div><!-- /.col-md -->
        </div>
    </div><!-- /.container -->
</footer>

<!-- java script
================================================== -->
<?php wp_footer() ?>

</body>
</html>