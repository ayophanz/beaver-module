<?php if ( !empty($settings->dots_color) || $settings->dots_size <> '' || $settings->dots_spacing <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .carousel .owl-dots .owl-dot{
	<?php if ( $settings->dots_color <> '' ) { ?>
		background-color: #<?php echo $settings->dots_color; ?>;
	<?php } ?>
	<?php if ( $settings->dots_size <> '' ) { ?>
		width: <?php echo $settings->dots_size; ?>px;
		height: <?php echo $settings->dots_size; ?>px;
	<?php } ?>
	<?php if ( $settings->dots_spacing <> '' ) { ?>
		margin-left: <?php echo $settings->dots_spacing; ?>px;
		margin-right: <?php echo $settings->dots_spacing; ?>px;
	<?php } ?>
	}
<?php } ?>

<?php if ( !empty($settings->title_bg_color) ) { ?>
	.fl-node-<?php echo $id; ?> .carousel .owl-item .carousel-title::before{
		background-color: #<?php echo $settings->title_bg_color; ?>;
	}
<?php } ?>
<?php if ( !empty($settings->title_color) ) { ?>
	.fl-node-<?php echo $id; ?> .carousel .owl-item .carousel-title{
		color: #<?php echo $settings->title_color; ?>;
	}
<?php } ?>

<?php if ( !empty($settings->dots_color_active) ) { ?>
	.fl-node-<?php echo $id; ?> .carousel .owl-dots .owl-dot.active{
		background-color: #<?php echo $settings->dots_color_active; ?>;
	}
<?php } ?>


<?php if ( $settings->item_margin_top <> '' || $settings->item_margin_bottom <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .carousel .owl-item .carousel-item{
	<?php if ( $settings->item_margin_top <> '' ) { ?>
		margin-top: <?php echo $settings->item_margin_top; ?>px;
	<?php } ?>
	<?php if ( $settings->item_margin_bottom <> '' ) { ?>
		margin-bottom: <?php echo $settings->item_margin_bottom; ?>px;
	<?php } ?>
	}
<?php } ?>



<?php if ( !empty($settings->nav_color) || $settings->nav_size <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .carousel .owl-nav *{
	<?php if ( $settings->nav_color <> '' ) { ?>
		border-color: #<?php echo $settings->nav_color; ?>;
	<?php } ?>
	<?php if ( $settings->nav_size <> '' ) { ?>
		width: <?php echo $settings->nav_size; ?>px;
		height: <?php echo $settings->nav_size; ?>px;
	<?php } ?>
	}
<?php } ?>

<?php if ( $settings->nav_thick <> '' || $settings->nav_spacing <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .carousel .owl-nav .owl-prev{
	<?php if ( $settings->nav_thick <> '' ) { ?>
		border-left-width: <?php echo $settings->nav_thick; ?>px;
		border-bottom-width: <?php echo $settings->nav_thick; ?>px;
	<?php } ?>
	<?php if ( $settings->nav_spacing <> '' ) { ?>
		left: <?php echo $settings->nav_spacing; ?>px;
	<?php } ?>
	}
<?php } ?>

<?php if ( $settings->nav_thick <> '' || $settings->nav_spacing <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .carousel .owl-nav .owl-next{
	<?php if ( $settings->nav_thick <> '' ) { ?>
		border-right-width: <?php echo $settings->nav_thick; ?>px;
		border-top-width: <?php echo $settings->nav_thick; ?>px;
	<?php } ?>
	<?php if ( $settings->nav_spacing <> '' ) { ?>
		right: <?php echo $settings->nav_spacing; ?>px;
	<?php } ?>
	}
<?php } ?>