<div class="affix-top header-hp-1">
	<div id="js-navbar-fixed" class="menu-desktop">
		<div class="container-fluid">
			<div class="wrapper-logo-area">
				<!-- Logo -->
				<?php
				echo '<div class="menu-mobile-effect hamburger hamburger--spin"><div class="hamburger-box">
							<span class="hamburger-inner"></span> 
						</div></div>';
				do_action( 'uray_logo' );
				?>
			</div>
			<div class="menu-desktop-inner">
				<!-- Header Right -->
				<?php if ( is_active_sidebar( 'menu_left' ) ) {
					echo '<div class="header-left">';
					dynamic_sidebar( 'menu_left' );
					echo '</div>';
				}
				?>
				<!-- Main Menu -->
				<nav class="main-menu">
					<?php
					get_template_part( 'inc/header/main-menu' );
					?>
				</nav>
				<!-- Header Right -->
				<?php if ( is_active_sidebar( 'menu_right' ) || is_active_sidebar( 'canvas_right' ) ) {
					echo '<div class="header-right">';
					dynamic_sidebar( 'menu_right' );

					if ( is_active_sidebar( 'canvas_right' ) ) {
						echo '<div class="canvas-right canvas-btn-wrap">
								<span id="canvas-btn"><span></span></span>';
						echo '<div class="canvas-right-content"><span class="closeicon"></span><div class="canvas-content">';
						dynamic_sidebar( 'canvas_right' );
						echo '</div></div><div class="background-overlay"></div></div>';
					}
					echo '</div>';
				}
				?>
			</div>
		</div>
	</div>
</div>