	<div role="navigation" class="mdl-layout--fixed-header">
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
				<div>
					<a href="<?php echo HOST_URL ?>"><img class="logo" src="<?php echo $logo ?>" alt="logo" width="60"></a>
				</div>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation">
					<div class="mdl-navigation dropdown">
						<button class="cursor" style="border:none;background:none;border-radius:100%">
							<i class="dropbtn material-icons" onclick="dropBtn()">account_circle</i>
						</button>
						<div id="dropdown" class="dropdown-content">
							<div class="profile">
								<p><?php echo $user->User() ?></p>
							</div>
							<div class="dropdown-row">
								<a href="<?php echo HOST_URL ?>"><i class="drop-icon material-icons">home</i>Home</a>
								<a href="<?php echo HOST_URL . '/members' ?>"><i class="drop-icon material-icons">people</i>Members</a>
								<a href="<?php echo HOST_URL . '/libs/logout.php' ?>"><i class="drop-icon material-icons">exit_to_app</i>Sign out</a>
							</div>							
						</div>
					</div>
				</nav>
			</div>
		</header>
	</div>