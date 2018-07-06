<body class="hold-transition skin-blue sidebar-mini">
	<div class="black-screen"></div>
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="index2.html" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>Cheapdy</b></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Cheapdy</b>Admin</span>
			</a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
			</nav>
		</header>

	</div>

	<aside class="main-sidebar">
		<section class="sidebar">
			<div class="user-panel">
				<div class="pull-left image">
					<img class="img-circle">
				</div>
				<div class="pull-left info">
					<p><?=$admin['NAME']?></p>
				</div>
			</div>
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">MENU</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-industry"></i>
						<span>ร้านค้า/บริการ</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="providers">
								<i class="fa fa-coffee"></i> ร้านค้า/บริการ
							</a>
						</li>
						<li>
							<a href="categories">
								<i class="fa fa-tag"></i> หมวด
							</a></li>
						</ul>
					</li>
					<li>
						<a href="promotions">
							<i class="fa fa-calendar"></i>
							<span>สร้างโปรโมชั่น</span>
						</a>
					</li>
					<li>
						<a href="coupons">
							<i class="fa fa-ticket"></i>
							<span>คูปอง</span>
						</a>
					</li>
					<li>
						<a href="members">
							<i class="fa fa-users"></i>
							<span>สมาชิก</span>
						</a>
					</li>
					<li>
						<a href="#" id="logout">
							<i class="fa fa-sign-out"></i>
							<span>ออกจากระบบ</span>
						</a>
					</li>
				</ul>
			</ul>
		</aside>
	</section>

	<div class="content-wrapper" style="overflow-y: scroll;max-height: 500px">
