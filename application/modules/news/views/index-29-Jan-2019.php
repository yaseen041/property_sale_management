<!DOCTYPE html>
<html lang="en"> 
<?php $this->load->view('common/head'); ?>
<body class="header-1 page-header-1">
	<!-- ====== BEGIN HEADER ====== -->
	<?php $this->load->view('common/header'); ?>


	<!-- ====== BLOG ARCHIVE PAGE HEADER ====== -->
	<section class="page-header">
		<div class="container">
			<h1 class="page-header-title">News</h1>
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="active">News</li>
			</ul>
		</div>
	</section>

	<!-- ====== POST LIST ====== -->

	<section class="page-section blog-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<!-- Content -->
					<div id="content">
						<?php if (empty($topics)) {?>
							<div class="property-list archive-flex archive-with-footer">
								<div class="row">
									<div class="col-md-12">
										<div class="property-item">
											<div class="property-content post">
												<h4 style="padding-bottom:0px !important;">No News Found!</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						<div class="property-list archive-flex archive-with-footer">
							<div class="row">
								<?php if (!empty($topics[0]['articles'])) { ?>
									<div class="col-lg-12 col-md-12 col-sm-12">
										<!-- Property Item -->
										<div class="property-item">
											<div class="property-heading">
												<a style="font-size: 20px; padding: 8px;" href="javascript:void(0)" class="item-detail btn">Latest Property News</a>
											</div>
											<div class="img-box">
												<a href="<?php echo base_url(); ?>news/<?php echo $latest_article['slug']; ?>" class="img-box__image"><img src="<?php echo base_url(); ?>uploads/banners/<?php echo $latest_article['banner']; ?>" alt="<?php echo $latest_article['title']; ?>" class="img-responsive"></a>
											</div>
											<div class="property-content post">
												<ul class="post-meta">
													<li class="post-author"><a href="<?php echo base_url(); ?>news/<?php echo $latest_article['slug']; ?>"> <?php echo date('M d, Y', strtotime($latest_article['date_added'])); ?></a></li>
													<li class="post-category"><a href="<?php echo base_url(); ?>news/category/<?php echo $latest_article['topic']; ?>"><?php echo $latest_article['topic']; ?></a></li>
												</ul>
												<h3><a href="<?php echo base_url(); ?>news/<?php echo $latest_article['slug']; ?>"><?php echo $latest_article['title']; ?></a></h3>
												<p><?php echo custom_substr(strip_tags($latest_article['description']), 300); ?></p>
											</div>
										</div>
									</div>
								<?php } ?>

								<?php if (!empty($topics)) {
									foreach ($topics as $topic) { ?>
										<div class="col-lg-6 col-md-6 col-sm-6">
											<!-- Property Item -->
											<div class="property-item">
												<div class="property-heading">
													<a href="javascript:void(0)" class="item-detail btn"><?php echo $topic['topic']; ?></a>
												</div>
												<?php if (!empty($topic['articles'])) { ?>
													<h4><a href="<?php echo base_url(); ?>news/<?php echo $topic['articles'][0]['slug']; ?>"><?php echo $topic['articles'][0]['title']; ?></a></h4>
													<div class="img-box" style="background: url('<?php echo base_url(); ?>uploads/banners/<?php echo $topic['articles'][0]['banner']; ?>');background-size: cover;height: 240px;background-position: center;">
														<a href="<?php echo base_url(); ?>news/<?php echo $topic['articles'][0]['slug']; ?>" class="img-box__image">
															<!-- <img src="<?php echo base_url(); ?>uploads/banners/<?php echo $topic['articles'][0]['banner']; ?>" alt="<?php echo $topic['articles'][0]['title']; ?>" class="img-responsive"> -->
														</a>
													</div>
													<div class="property-content" style="padding-bottom: 0px !important">
														<p><?php echo custom_substr(strip_tags($topic['articles'][0]['description']), 200); ?></p>
													</div>
												<?php }else{ ?>
													<h4>No Article Found!</h4>
												<?php }
												if (!empty($topic['articles'])) { ?>
													<div class="property-content">
													<div class="widget widget_popular_post">
														<div class="panel-box blog-panel">
															<div class="panel-body no-padding">
																<ul class="post-listb">
																	<?php foreach ($topic['articles'] as $key => $article) {
																		if ($key == 0) {
																			continue;
																		} ?>
																		<hr>
																		<li>
																			<div class="post-image"><a href="#"><img src="<?php echo base_url(); ?>uploads/banners/<?php echo $article['banner']; ?>" alt="<?php echo $article['title']; ?>"></a></div>
																			<div class="post-content">
																				<span class="post-date"><?php echo date('M d, Y', strtotime($article['date_added'])); ?></span>
																				<a href="<?php echo base_url(); ?>news/<?php echo $article['slug']; ?>"><?php echo $article['title']; ?></a>
																			</div>
																		</li>
																	<?php } ?>
																</ul>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<hr>
															<a href="<?php echo base_url(); ?>news/category/<?php echo $topic['topic']; ?>" style="width:100%;">
																<p class="pull-left"><strong>View all</strong></p>
																<p class="pull-right">
																	<i style="font-size:18px;" class="fi flaticon-detail"></i>
																</p>
															</a>
														</div>

													</div>
												</div>
												 <?php } ?>
											</div>
										</div>
									<?php }
								} ?>
							</div>
						</div>


						<!-- <div id="comments" class="comments-area compact">
							<div class="entry-comments">
								<div class="comment-header">
									<h3 class="widget-title comment-title">Connect with us</h3>
								</div>
								<div class="widget">
									<div class="share-box">
										<h4>Share:</h4>
										<ul class="share-box-list">
											<li>
												<a href="https://www.facebook.com/sharer/sharer.php?u=<?php //echo base_url().'news'; ?>" class="facebook" target="_blank">
													<i class="fa fa-facebook"></i>
													<i class="fa fa-facebook"></i>
												</a>
											</li>
											<li>
												<a href="https://twitter.com/intent/tweet?url=<?php //echo base_url().'news'; ?>" class="twitter" target="_blank">
													<i class="fa fa-twitter"></i>
													<i class="fa fa-twitter"></i>
												</a>
											</li>
											<li>
												<a href="mailto:?subject=Checkout This Page&body=<?php //echo base_url().'news/'; ?>" class="envelope" title="Share By Email" target="_blank">
													<i class="fa fa-envelope"></i>
													<i class="fa fa-envelope"></i>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
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