	<div class="user-nav-container">
		<nav>			
			<ul class="navbar-nav user-nav-bar">
				<?php 
					$nav_bar = array(
					"MY ACCOUNT" => "account/my-account",
					"MY WISHLIST" => "account/my-wishlist");

					foreach ($nav_bar as $name => $url) {
						echo '<li class="nav-item '.(($currentPage === $url) ? 'active" ': '"').'><a  style="display: block" class="nav-link" href="'.(($currentPage === $name) ? $link : $link.$url).'">'.$name.'</a></li>';
					}
				?>
			</ul>
		</nav> 
	</div>