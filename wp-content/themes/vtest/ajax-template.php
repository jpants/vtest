<?php /* Template Name: Ajax Template */ ?>

<?php
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container">
      <div class="row">
        <div class="col s12 m10 offset-m1 table-wrap">
        
        </div>
      </div>
		</main><!-- #main -->
	</div><!-- #primary -->

  <script>
    <?php $nonce = wp_create_nonce("my_hs_user_nonce"); ?>
    var nonce = '<?php echo $nonce; ?>';

    jQuery(document).ready(function($) {
      hs_ajax( nonce );
    });
  </script>

<?php
get_footer();
