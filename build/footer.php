<?php
 ?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer row">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'writer' ) ); ?>"><?php
 printf( esc_html__( 'Proudly powered by %s', 'writer' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php
 printf( esc_html__( 'Theme: %1$s by %2$s.', 'writer' ), 'writer', '<a href="http://underscores.me/">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
