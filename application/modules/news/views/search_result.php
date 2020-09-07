<!DOCTYPE html>
<html lang="en"> 
<?php $this->load->view('common/head'); ?>
<body class="header-1 page-header-1">
	<!-- ====== BEGIN HEADER ====== -->
	<?php $this->load->view('common/header'); ?>
	<!-- ====== END HEADER ====== -->

	<!-- ====== BLOG ARCHIVE PAGE HEADER ====== -->
	<section class="page-header">
		<div class="container">
			<h1 class="page-header-title">Search Result</h1>
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Search Result</li>
			</ul>
		</div>
	</section>

	<!-- ====== POST LIST ====== -->

	<section class="page-section blog-section details-blog">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<!-- Content -->
					<div id="content">
						<?php if (empty($articles)) {?>
							<div class="property-list archive-flex archive-with-footer">
								<div class="row">
									<div class="col-md-12">
										<div class="property-item">
											<div class="property-content post">
												<h4 style="padding-bottom: 30px !important;">No Articles Found!</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						<?php foreach ($articles as $key => $article) { 
							if ($key == 0) { ?>
								<div class="property-list archive-flex archive-with-footer">
									<div class="row">

										<div class="col-lg-12 col-md-12 col-sm-12">
											<!-- Property Item -->
											<div class="property-item">
												<div class="property-heading">
													<a style="font-size: 20px; padding: 8px;" href="javascript:void(0)" class="item-detail btn">Search Results - <?php echo $search_result; ?></a>
												</div>
												<div class="img-box">
													<a href="<?php echo base_url(); ?>news/<?php echo $article['slug']; ?>" class="img-box__image"><img src="<?php echo base_url(); ?>uploads/banners/<?php echo $article['banner']; ?>" alt="<?php echo $article['title']; ?>" class="img-responsive"></a>
												</div>
												<div class="property-content post">
													<ul class="post-meta">
														<li class="post-author"><a href="javascript:void(0)"><i class"fa fa-search"></i> <?php echo date('M d, Y', strtotime($article['date_added'])); ?></a></li>
														<li class="post-category"><a href="<?php echo base_url(); ?>news/category/<?php echo $article['topic']; ?>"><?php echo $article['topic']; ?></a></li>
													</ul>
													<h3><a href="<?php echo base_url(); ?>news/<?php echo $article['slug']; ?>"><?php echo $article['title']; ?></a></h3>
													<p><?php echo custom_substr(strip_tags($article['description']), 300); ?></p>
													<div class="row">
														<div class="col-md-12">
															<hr>
															<a href="<?php echo base_url(); ?>news/<?php echo $article['slug']; ?>" style="width:100%;">
																<p class="pull-left">Read more</p>
																<p class="pull-right">
																	<i style="font-size:18px;" class="fi flaticon-detail"></i>
																</p>
															</a>

														</div>

													</div>
												</div>


											</div>
										</div>

									</div>
								</div>
							<?php }
						} ?>
						<div class="property-list archive-flex archive-with-footer">

							<div class="row">
								<?php foreach ($articles as $key => $article) { 
									if ($key == 0) { 
										continue;
									}?>
									<div class="col-md-12">
										<div class="property-item booking-item property-archive col-lg-12 col-md-12 col-md-6 col-sm-12">
											<div class="row">
												<div class="col-lg-5 col-sm-5 no-padding">
													<a href="<?php echo base_url(); ?>news/<?php echo $article['slug']; ?>">
														<img src="<?php echo base_url(); ?>uploads/banners/<?php echo $article['banner']; ?>" alt="<?php echo $article['title']; ?>">
													</a>
												</div>
												<div class="col-lg-7 col-sm-7 property-padding">
													<div class="property-content listing-content">
														<div class="row">
															<div class="col-md-12 col-sm-12 col-xs-9">
																<h3 class="property-title"><a href="<?php echo base_url(); ?>news/<?php echo $article['slug']; ?>">
																	<?php echo $article['title']; ?></a></h3>
																</div>

															</div>

															<p class="property-description"><?php echo custom_substr(strip_tags($article['description']), 400); ?></p>

															<div class="row">
																<div class="col-md-12">
																	<hr>
																	<a href="<?php echo base_url(); ?>news/<?php echo $article['slug']; ?>" style="width:100%;">
																		<p class="pull-left">Read more</p>
																		<p class="pull-right">
																			<i style="font-size:18px;" class="fi flaticon-detail"></i>
																		</p>
																	</a>

																</div>

															</div>	

														</div>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>



						<!-- <div class="pagination">
							<a href="#" class="prev"></a>
							<span class="current">1</span>
							<a href="#" class="page">2</a>
							<a href="#" class="page">3</a>
							<a href="#" class="page">4</a>
							<a href="#" class="page">5</a>
							<a href="#" class="next"></a>
						</div> -->
						<!-- Post List Paginatino-->

					</div>
				</div>

				<!-- Sidebar -->
				<div class="col-md-4">
					<div id="sidebar">
						<!-- widget section Search -->
						<?php $this->load->view('news/search_form'); ?>

						<!-- widget section Recent Post -->
						<div class="widget widget_recent_entries">
							<div class="panel-box">
								<div class="panel-header">
									<h3 class="panel-title">Latest Posts</h3>
								</div>
								<div class="panel-body">
									<ul>
										<?php 
										if(!empty($recent_articles)){
											foreach ($recent_articles as $rArticles) { ?>
												<li>
													<a href="<?php echo base_url(); ?>news/<?php echo $rArticles['slug']; ?>"><?php echo $rArticles['title'] ?></a>
													<span class="post-date"><?php echo date('M d, Y', strtotime($rArticles['date_added'])); ?></span>
												</li>
											<?php } 
										}else{ ?>
											No Post Found!
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>

						<!-- widget section Categories -->
						<div class="widget widget_categories">
							<!-- Panel Box -->
							<div class="panel-box">
								<!-- Panel Header / Title -->
								<div class="panel-header">
									<h3 class="panel-title">Categories</h3>
								</div>
								<!-- Panel Body -->
								<div class="panel-body">
									<ul>
										<?php foreach ($topics as $topic) { ?>
											<li><a href="<?php echo base_url(); ?>news/category/<?php echo $topic['slug']; ?>"><?php echo $topic['topic']; ?></a></li>
										<?php }
										if (empty($topics)) {
										 	echo "No Categories Found!";
										 } ?>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>


	<?php $this->load->view('common/footer'); ?>
	<?php $this->load->view('common/scripts'); ?>
</body>
</html>