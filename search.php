<?php get_header(); ?>

<div class="container">
	<main class="row">
		<section class="col-lg-12">
			<h2 class="search-title">Search Results for "<?php echo $s; ?>"</h2>
			<?php
				if(have_posts()){ ?>
					<p>Your term was found in the following post/pages:</p><?php
					while (have_posts()) {
						the_post(); ?>
						<article class="col-lg-12">
							<h3><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php the_excerpt(); ?></p>
						</article>
			<?php }//end while
				}else{?>
					<div class="col-lg-12">
						<?php
						 echo "<p>We're sorry, the term you are looking for was not found in our website. Please try another search.</p>";
						 get_search_form();
						?>
					</div>
			<?php }//end of else ?>
		</section>
	</main>
</div> <!--Container-->

<?php get_footer(); ?>
