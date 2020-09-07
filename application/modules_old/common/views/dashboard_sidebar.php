<?php  $url = $_SERVER['REQUEST_URI']; ?>

<div class="col-md-3">
	<div class="list-group user-dashboard">
		<a href="<?php echo base_url(); ?>user/dashboard" class="list-group-item <?php echo (preg_match("/dashboard/i", $url ))?"active":""; ?>">
			<i  class="fa fa-tachometer"></i>Dashboard
		</a>
		<a href="<?php echo base_url() ?>user/edit_profile" class="list-group-item <?php echo (preg_match("/edit_profile/i", $url ))?"active":""; ?>"><i class="fa fa-user"></i>Profile</a>
		<a href="<?php echo base_url() ?>listing/step1" class="list-group-item <?php echo (preg_match("/step1/i", $url ))?"active":""; ?>"><i class="fa fa-plus"></i>Add New Listing</a>
		<a href="<?php echo base_url() ?>user/listings" class="list-group-item <?php echo (preg_match("/listings/i", $url ))?"active":""; ?>"><i class="fa fa-list"></i>Listings</a>
		<a href="<?php echo base_url() ?>user/favourites" class="list-group-item <?php echo (preg_match("/favourites/i", $url ))?"active":""; ?>"><i class="fa fa-heart"></i>My Favourite Properties</a>
		<a href="<?php echo base_url() ?>user/settings" class="list-group-item <?php echo (preg_match("/settings/i", $url ))?"active":""; ?>"><i class="fa fa-wrench"></i>Settings</a>
	</div>
</div>