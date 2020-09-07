
<div class="page-sidebar-wrapper">	
	<div class="page-sidebar navbar-collapse collapse">		
		<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
			<li class="sidebar-toggler-wrapper hide">
				<div class="sidebar-toggler">
					<span></span>
				</div>
			</li>
			<li class="nav-item <?=($this->uri->segment(2)=='')?'active open':''?>">
				<a href="<?php echo base_url();?>admin" class="nav-link nav-toggle">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					<span class="selected"></span>
				</a>
			</li>
			<li class="nav-item <?=($this->uri->segment(2)=='users')?'active open':''?>">
				<a href="<?php echo base_url();?>admin/users" class="nav-link nav-toggle">
					<i class="icon-users"></i>
					<span class="title">Users</span>
					<span class="selected"></span>
				</a>
			</li>
			<li class="nav-item <?=($this->uri->segment(2)=='listing')?'active open':''?>">
				<a href="javascript:void(0)" class="nav-link nav-toggle">
					<i class="icon-layers"></i>
					<span class="title">Listings</span>
					<span class="selected"></span>
				</a>
				<ul class="sub-menu">		
					<li class="nav-item <?=($this->uri->segment(3)=='' && $this->uri->segment(2)=='listing')?'active open':''?>">
						<a href="<?php echo base_url() ?>admin/listing" class="nav-link ">
							<span class="title">Active Listings</span>	
						</a>
					</li>
					<li class="nav-item <?=($this->uri->segment(3)=='inactive' && $this->uri->segment(2)=='listing')?'active open':''?>">
						<a href="<?php echo base_url() ?>admin/listing/inactive" class="nav-link ">
							<span class="title">In-Active Listings</span>	
						</a>
					</li>	
					<li class="nav-item <?=($this->uri->segment(2)=='listing' && $this->uri->segment(3)=='pending')?'active open':''?>">					
						<a href="<?php echo base_url() ?>admin/listing/pending" class="nav-link ">
							<span class="title">Pending For Approval</span>					
						</a>				
					</li>			
				</ul>
			</li>
			<!-- <li class="nav-item <?=($this->uri->segment(2)=='manage_admin')?'active open':''?>">			
				<a href="javascript:void(0);" class="nav-link nav-toggle">	
					<i class="icon-layers"></i>				
					<span class="title">Admin Management</span>			
					<span class="arrow"></span>			
				</a>			
				<ul class="sub-menu">		
					<li class="nav-item <?=($this->uri->segment(3)=='add' && $this->uri->segment(2)=='manage_admin')?'active open':''?>">
						<a href="<?php echo base_url() ?>admin/manage_admin/add" class="nav-link ">
							<span class="title">Add Admin</span>	
						</a>
					</li>		
					<li class="nav-item <?=($this->uri->segment(2)=='manage_admin' && $this->uri->segment(3)=='')?'active open':''?>">					
						<a href="<?php echo base_url() ?>admin/manage_admin" class="nav-link ">
							<span class="title">Manage Admin</span>					
						</a>				
					</li>			
				</ul>	
			</li>	
			<li class="nav-item <?=($this->uri->segment(2)=='manage_user')?'active open':''?>">			
				<a href="javascript:void(0);" class="nav-link nav-toggle">	
					<i class="icon-layers"></i>				
					<span class="title">User Management</span>			
					<span class="arrow"></span>			
				</a>			
				<ul class="sub-menu">		
					<li class="nav-item <?=($this->uri->segment(3)=='seller' && $this->uri->segment(2)=='manage_user')?'active open':''?>">
						<a href="<?php echo base_url() ?>admin/manage_user/seller" class="nav-link ">
							<span class="title">Sellers</span>	
						</a>
					</li>		
					<li class="nav-item <?=($this->uri->segment(3)=='buyer' && $this->uri->segment(2)=='manage_user')?'active open':''?>">					
						<a href="<?php echo base_url() ?>admin/manage_user/buyer" class="nav-link ">
							<span class="title">Buyers</span>					
						</a>				
					</li>			
				</ul>	
			</li>
			<li class="nav-item <?=($this->uri->segment(2)=='buyer')?'active open':''?>">				
				<a href="javascript:void(0);" class="nav-link nav-toggle">					
					<i class="icon-layers"></i>					
					<span class="title">Buyer Management</span>			
					<span class="arrow"></span>				
				</a>	
				<ul class="sub-menu">		
					<li class="nav-item <?=($this->uri->segment(3)=='applications' && $this->uri->segment(2)=='buyer')?'active open':''?>">
						<a href="<?php echo base_url() ?>admin/buyer/applications" class="nav-link ">
							<span class="title">Buyer Applications</span>	
						</a>
					</li>
					<li class="nav-item <?=($this->uri->segment(3)=='notapprovedapplications' && $this->uri->segment(2)=='buyer')?'active open':''?>">
						<a href="<?php echo base_url() ?>admin/buyer/notapprovedapplications" class="nav-link ">
							<span class="title">Not Approved Applications</span>	
						</a>
					</li>				
				</ul>
			</li>
			<li class="nav-item <?=($this->uri->segment(2)=='listing')?'active open':''?>">				
				<a href="<?php echo base_url() ?>admin/listing" class="nav-link nav-toggle">					
					<i class="icon-layers"></i>					
					<span class="title">Property Management</span>					
					<span class="selected"></span>			
				</a>				
			</li>
			<li class="nav-item <?=($this->uri->segment(2)=='reporting')?'active open':''?>">				
				<a href="<?php echo base_url() ?>admin/reporting" class="nav-link nav-toggle">					
					<i class="icon-layers"></i>					
					<span class="title">Reporting</span>					
					<span class="selected"></span>			
				</a>				
			</li> -->
		</ul>	
		<!-- END SIDEBAR MENU -->	
		<!-- END SIDEBAR MENU -->	
	</div>
	<!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->