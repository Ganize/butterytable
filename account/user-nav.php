	<div class="user-nav-container" style="border: 1px solid #C18570;">
		<nav>			
			<ul class="navbar-nav user-nav-bar">
				<?php 
					if($_SESSION["user_role"] == "ujiz4_admin")
					{
						$nav_bar = array(
						"MY ACCOUNT" => "account/my-account",
						"MEMBERS LIST" => "account/member-list",
						"UPDATES IMAGES" => "account/update-images");

						foreach ($nav_bar as $name => $url) {
							echo '<li class="nav-item '.(($currentPage === $url) ? 'active" ': '"').'><a  style="display: block" class="nav-link" href="'.(($currentPage === $name) ? $link : $link.$url).'">'.$name.'</a></li>';
						}
					}
					else
					{
						$nav_bar = array(
						"MY ACCOUNT" => "account/my-account",
						"MY WISHLIST" => "account/my-wishlist");

						foreach ($nav_bar as $name => $url) {
							echo '<li class="nav-item '.(($currentPage === $url) ? 'active" ': '"').'><a  style="display: block" class="nav-link" href="'.(($currentPage === $name) ? $link : $link.$url).'">'.$name.'</a></li>';
						}

					}

					
				?>
			</ul>
		</nav> 
	</div>