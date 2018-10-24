<?php 	include ('includehtml/header.php');	include('includehtml/menu_aside_gauche.php');?>	
		

				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						 <?php
											$unControleur->setTable('blog');
											$results = $unControleur->selectAll();
											foreach($results as $result)
						echo '
						<div class="single-blog-post">
							<h3>'.$result['titre'].'</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i>'.$result['nom_uti'].'</li>
									<li><i class="fa fa-clock-o"></i>'.$result['Heure'].'</li>
									<li><i class="fa fa-calendar"></i>'.$result['dat'].'</li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="images/blog/blog-tree.jpg" alt="">
							</a>
							<p>'.$result['text'].'</p>
							<a  class="btn btn-primary" href="blogFrance.php">Read More</a>
						</div>'?>
						
						
						
						<div class="pagination-area">
							<ul class="pagination">
								<li><a href="" class="active">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php include ('includehtml/footer.php'); ?>