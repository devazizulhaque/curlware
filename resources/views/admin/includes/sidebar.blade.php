<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<div class="main-profile">
					<div class="image-bx">
						<img src="{{ asset('/') }}admin/assets/images/avatar/3.jpg" alt="">
						<a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
					</div>
					<h5 class="name"><span class="font-w400">Hello,</span> {{ auth()->user()->name }}</h5>
				</div>
				<ul class="metismenu" id="menu">
					<li class="nav-label first">Main Menu</li>
                    @role('admin')
                    <li>
                        <a href="{{ route('dashboard') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-144-layout"></i>
							<span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('hostels.index') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-144-layout"></i>
							<span class="nav-text">Hostel List</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('room-type.index') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-144-layout"></i>
							<span class="nav-text">Room Type</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('bookings.index') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-144-layout"></i>
							<span class="nav-text">Book List</span>
                        </a>
                    </li>
                    @endrole
                </ul>
				<div class="copyright">
					<p><strong>Azizul Admin Dashboard</strong> © 2023 All Rights Reserved</p>
					<p class="fs-12">Made with <span class="heart"></span> by Azizul</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->