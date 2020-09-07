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
			<h1 class="page-header-title">Article</h1>
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="active">Article</li>
			</ul>
		</div>
	</section>

	<!-- ====== SINGLE POST / BLOG CONTENT ====== -->
	<section class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<!-- Content -->
					<div id="content">
						<!-- Post Entries-->
						<article class="post">
							<h2 class="post-title"><a href="javascript:void(0)" style="color:#ed193f;"><?php echo $article['title']; ?></a></h2>
							<figure class="post-image"><a href="javascript:void(0)"><img style="width: 100% !important;" src="<?php echo base_url(); ?>uploads/banners/<?php echo $article['banner']; ?>" alt="<?php echo $article['title']; ?>"></a></figure>
							<ul class="post-meta">
								<li class="post-author"><a href="javascript:void(0)"><?php echo date('M d, Y', strtotime($article['date_added'])); ?></a></li>
								<li class="post-category"><a href="<?php echo base_url() ?>news/category/<?php echo $article['topic']; ?>"><?php echo $article['topic']; ?></a></li>
							</ul>
							<div class="post-entries">
								<p><?php echo $article['description']; ?></p>
								<div class="widget">
									<div class="share-box">
										<h4>Share:</h4>
										<ul class="share-box-list">
											<li>
												<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url().'news/'.$article['slug']; ?>" class="facebook" target="_blank">
													<i class="fa fa-facebook"></i>
													<i class="fa fa-facebook"></i>
												</a>
											</li>
											<li>
												<a href="https://twitter.com/intent/tweet?url=<?php echo base_url().'news/'.$article['slug']; ?>" class="twitter" target="_blank">
													<i class="fa fa-twitter"></i>
													<i class="fa fa-twitter"></i>
												</a>
											</li>
											<!-- <li>
												<a href="#" class="pinterest">
													<i class="fa fa-pinterest"></i>
													<i class="fa fa-pinterest"></i>
												</a>
											</li>
											<li>
												<a href="#" class="google">
													<i class="fa fa-google"></i>
													<i class="fa fa-google"></i>
												</a>
											</li>
											<li>
												<a href="#" class="rss">
													<i class="fa fa-rss"></i>
													<i class="fa fa-rss"></i>
												</a>
											</li> -->
											<li>
												<a href="mailto:?subject=Checkout This Page&body=<?php echo base_url().'news/'; ?>" class="envelope" title="Share By Email" target="_blank">
													<i class="fa fa-envelope"></i>
													<i class="fa fa-envelope"></i>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</article>

						<!-- Post Author -->


						<nav class="navigation post-navigation" role="navigation">
							<h2 class="screen-reader-text">Post navigation</h2>
							<div class="nav-links">
								<div class="nav-previous">
									<?php if (!empty($previous_article)) { ?>
										<a href="<?php echo base_url(); ?>news/<?php echo $previous_article['slug']; ?>" rel="prev"><span class="nav-post-title">Previous Post</span><span class="nav-post-name"><?php echo $previous_article['title']; ?></span></a>
									<?php } ?>
								</div>
								<div class="nav-next">
									<?php if (!empty($next_article)) { ?>
										<a href="<?php echo base_url(); ?>news/<?php echo $next_article['slug']; ?>" rel="prev"><span class="nav-post-title">Next Post</span><span class="nav-post-name"><?php echo $next_article['title']; ?></span></a>
									<?php } ?>
								</div>
							</div>
						</nav>

					</div>
				</div>
				<div class="col-md-4">
					<!-- Sidebar -->
					<div id="sidebar">
						<!-- widget section Search -->
						<?php $this->load->view('news/search_form'); ?>

						<!-- Emc2HomeANDListingPagesV2.0 -->
						<ins class="adsbygoogle"
						style="display:block"
						data-ad-client="ca-pub-5699644453556247"
						data-ad-slot="4355563664"
						data-ad-format="auto"
						data-full-width-responsive="true"></ins>
						<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
						<br>

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
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>

						<!-- Emc2HomeANDListingPagesV2.0 -->
						<ins class="adsbygoogle"
						style="display:block"
						data-ad-client="ca-pub-5699644453556247"
						data-ad-slot="4355563664"
						data-ad-format="auto"
						data-full-width-responsive="true"></ins>
						<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
						<br>

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
										} ?>
									</ul>
								</div>
							</div>
						</div>

						<!-- Emc2HomeANDListingPagesV2.0 -->
						<ins class="adsbygoogle"
						style="display:block"
						data-ad-client="ca-pub-5699644453556247"
						data-ad-slot="4355563664"
						data-ad-format="auto"
						data-full-width-responsive="true"></ins>
						<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
						<br>


					</div>
				</div>
			</div>
		</div>
	</section>


	<?php $this->load->view('common/footer'); ?>
	<?php $this->load->view('common/scripts'); ?>
</body>
</html>