<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header" style="color:#fff;"> MAIN MENU <i class="fa fa-level-down"></i></li>
			<li class="
						{{ Request::segment(1) === null ? 'active' : null }}
						{{ Request::segment(1) === 'home' ? 'active' : null }}
					  ">
				<a href="{{ route('home') }}" title="Dashboard"><i class="fa fa-dashboard"></i> <span>
						Dashboard</span></a>
			</li>
			@if (Auth::user()->can('root-dev', ''))
			<li class="{{ Request::segment(1) === 'vaksin' ? 'active' : null }}">
				<a href="{{ route('vaksin') }}" title="Dashboard"><i class="fa fa-pencil"></i> <span>
						Data Vaksin</span></a>
			</li>
			<li class="{{ Request::segment(1) === 'pasien' ? 'active' : null }}">
				<a href="{{ route('pasien.index') }}" title="Dashboard"><i class="fa fa-pencil"></i> <span>
						Data peserta</span></a>
			</li>
			<li class="{{ Request::segment(1) === 'laporan' ? 'active' : null }}">
				<a href="{{ route('pasien.index') }}" title="Dashboard"><i class="fa fa-pencil"></i> <span>
						Laporan Data Peserta Vaksin</span></a>
			</li>
			@endif
			@if(Request::segment(1) === 'profile')

			<li class="{{ Request::segment(1) === 'profile' ? 'active' : null }}">
				<a href="{{ route('profile') }}" title="Profile"><i class="fa fa-user"></i> <span> PROFILE</span></a>
			</li>

			@endif
			<li class="treeview
				{{ Request::segment(1) === 'config' ? 'active menu-open' : null }}
				{{ Request::segment(1) === 'user' ? 'active menu-open' : null }}
				{{ Request::segment(1) === 'role' ? 'active menu-open' : null }}
			">

			</li>
			<li class="treeview 
				{{ Request::segment(1) === 'config' ? 'active menu-open' : null }}
				{{ Request::segment(1) === 'user' ? 'active menu-open' : null }}
				{{ Request::segment(1) === 'role' ? 'active menu-open' : null }}
				">
				<a href="#">
					<i class="fa fa-gear"></i>
					<span>SETTINGS</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					@if (Auth::user()->can('root-dev', ''))
					<li
						class="{{ Request::segment(1) === 'website' && Request::segment(2) === null ? 'active' : null }}">
						<a href="{{ route('website') }}" title="Konfigurasi">
							<i class="fa fa-gear"></i> <span> Settings App</span>
						</a>
					</li>
					@endif

				</ul>
			</li>
		</ul>
	</section>
</aside>