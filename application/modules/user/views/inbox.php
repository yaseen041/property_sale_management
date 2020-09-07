
<?php $this->load->view('common/header'); ?>
<!-- Edit Profile -->

<section class="panel-bg">
	<div class="container">
		<div class="row">

			<?php $this->load->view('common/dashboard_sidebar'); ?>

			<div class="col-md-9">
				<div class="single-agent profile-box usr-profile urs-inbox">
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-12 no-padd-right">
							<div class="people-list" id="people-list">
								<div class="search">
									<input type="text" placeholder="search" />
									<i class="fa fa-search"></i>
								</div>
								<ul class="list scrollbar" id="style-4">
									<li class="clearfix">
										<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01.jpg" alt="avatar" />
										<div class="about">
											<div class="name">Vincent Porter</div>
											<div class="status">
												<i class="fa fa-circle online"></i> online
											</div>
										</div>
									</li>

									<li class="clearfix">
										<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_02.jpg" alt="avatar" />
										<div class="about">
											<div class="name">Aiden Chavez</div>
											<div class="status">
												<i class="fa fa-circle offline"></i> left 7 mins ago
											</div>
										</div>
									</li>

									<li class="clearfix">
										<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_03.jpg" alt="avatar" />
										<div class="about">
											<div class="name">Mike Thomas</div>
											<div class="status">
												<i class="fa fa-circle online"></i> online
											</div>
										</div>
									</li>

									<li class="clearfix">
										<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_04.jpg" alt="avatar" />
										<div class="about">
											<div class="name">Erica Hughes</div>
											<div class="status">
												<i class="fa fa-circle online"></i> online
											</div>
										</div>
									</li>

								</ul>
							</div>
						</div>


						<div class="col-md-8 col-sm-8 col-xs-12 no-padd-left">
							<div class="chat">
								<div class="chat-header clearfix">
									<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg" alt="avatar" />

									<div class="chat-about">
										<div class="chat-with">Chat with Vincent Porter</div>
										<div class="chat-num-messages">already 1 902 messages</div>
									</div>
									<i class="fa fa-star"></i>
								</div> <!-- end chat-header -->

								<div class="chat-history">
									<ul>
										<li class="clearfix">
											<div class="message-data align-right">
												<span class="message-data-time" >10:10 AM, Today</span> &nbsp; &nbsp;
												<span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>

											</div>
											<div class="message other-message float-right">
												Hi Vincent, how are you?
											</div>
										</li>

										<li>
											<div class="message-data">
												<span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
												<span class="message-data-time">10:12 AM, Today</span>
											</div>
											<div class="message my-message">
												Are we meeting today? Project has been already finished and I have results to show you.
											</div>
										</li>

										<li class="clearfix">
											<div class="message-data align-right">
												<span class="message-data-time" >10:14 AM, Today</span> &nbsp; &nbsp;
												<span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>

											</div>
											<div class="message other-message float-right">
												Well I am not sure. The rest of the team is not here yet. 
											</div>
										</li>

										<li>
											<div class="message-data">
												<span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
												<span class="message-data-time">10:20 AM, Today</span>
											</div>
											<div class="message my-message">
												Actually everything was fine. I'm very excited to show this to our team.
											</div>
										</li>

										<li>
											<div class="message-data">
												<span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
												<span class="message-data-time">10:31 AM, Today</span>
											</div>
											<i class="fa fa-circle online"></i>
											<i class="fa fa-circle online" style="color: #AED2A6"></i>
											<i class="fa fa-circle online" style="color:#DAE9DA"></i>
										</li>

									</ul>

								</div> <!-- end chat-history -->

								<div class="chat-message clearfix">
									<textarea name="message-to-send" id="message-to-send" placeholder ="Type your message" rows="3"></textarea>
<!-- 
									<i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
									<i class="fa fa-file-image-o"></i> -->

									<button>Send</button>

								</div> <!-- end chat-message -->

							</div>
						</div>
					</div>
					<!-- end chat -->



					<script id="message-template" type="text/x-handlebars-template">
						<li class="clearfix">
							<div class="message-data align-right">
								<span class="message-data-time" >{{time}}, Today</span> &nbsp; &nbsp;
								<span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>
							</div>
							<div class="message other-message float-right">
								{{messageOutput}}
							</div>
						</li>
					</script>

					<script id="message-response-template" type="text/x-handlebars-template">
						<li>
							<div class="message-data">
								<span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
								<span class="message-data-time">{{time}}, Today</span>
							</div>
							<div class="message my-message">
								{{response}}
							</div>
						</li>
					</script>

				</div>
			</div>	


		</div>
	</div>		
</section>

<?php $this->load->view('common/footer'); ?>