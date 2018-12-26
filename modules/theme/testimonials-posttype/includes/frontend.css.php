<?php if ( $settings->padding_top <> '' || $settings->padding_bottom <> '' || $settings->padding_left <> '' || $settings->padding_right <> '' ||  $settings->testimonial_margin_bottom <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .testimonial-post {
	<?php if ( $settings->padding_top <> '' ) { ?>
		padding-top: <?php echo $settings->padding_top; ?>px;
	<?php } ?>
	<?php if ( $settings->padding_bottom <> '' ) { ?>
		padding-bottom: <?php echo $settings->padding_bottom; ?>px;
	<?php } ?>
	<?php if ( $settings->padding_left <> '' ) { ?>
		padding-left: <?php echo $settings->padding_left; ?>px;
	<?php } ?>
	<?php if ( $settings->padding_right <> '' ) { ?>
		padding-right: <?php echo $settings->padding_right; ?>px;
	<?php } ?>
	<?php if ( $settings->testimonial_margin_bottom <> '' ) { ?>
		margin-bottom: <?php echo $settings->testimonial_margin_bottom; ?>px;
	<?php } ?>
	}
<?php } ?>


<?php if ( !empty($settings->color) ) { ?>
	.fl-node-<?php echo $id; ?> .testimonials *{
		color: #<?php echo $settings->color; ?>;
	}
<?php } ?>

<?php if ( !empty($settings->message_color) || $settings->message_font_size <> '' || $settings->message_line_height <> '' || $settings->message_max_width <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .testimonials .message{
		<?php if ( !empty($settings->message_color) ) { ?>
			color: #<?php echo $settings->message_color; ?>;
		<?php } ?>
		<?php if ( $settings->message_font_size <> '' ) { ?>
			font-size: <?php echo $settings->message_font_size; ?>px;
		<?php } ?>
		<?php if ( $settings->message_line_height <> '' ) { ?>
			line-height: <?php echo $settings->message_line_height; ?>em;
		<?php } ?>
		<?php if ( $settings->message_max_width <> '' ) { ?>
			max-width: <?php echo $settings->message_max_width; ?>px;
		<?php } ?>
	}
<?php } ?>
<?php if ( !empty($settings->author_color) || $settings->author_font_size <> '' || $settings->author_margin_bottom <> '' || $settings->author_font_weight <> '' || $settings->author_font_style <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .testimonials .author{
		<?php if ( !empty($settings->author_color) ) { ?>
			color: #<?php echo $settings->author_color; ?>;
		<?php } ?>
		<?php if ( $settings->author_font_size <> '' ) { ?>
			font-size: <?php echo $settings->author_font_size; ?>px;
		<?php } ?>
		<?php if ( $settings->author_margin_bottom <> '' ) { ?>
			margin-bottom: <?php echo $settings->author_margin_bottom; ?>px;
		<?php } ?>
		<?php if ( $settings->author_font_weight <> '' ) { ?>
			font-weight: <?php echo $settings->author_font_weight; ?>;
		<?php } ?>
		<?php if ( $settings->author_font_style <> '' ) { ?>
			font-style: <?php echo $settings->author_font_style; ?>;
		<?php } ?>
	}
<?php } ?>


<?php if ( $settings->company_show == 'true' && !empty($settings->company_color) || $settings->company_font_size <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .testimonials .company{
		color: #<?php echo $settings->company_color; ?>;
		font-size: <?php echo $settings->company_font_size; ?>px;
	}
<?php } ?>
<?php if ( $settings->date_show == 'true' &&  !empty($settings->date_color) || $settings->date_font_size <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .testimonials .date{
		color: #<?php echo $settings->date_color; ?>;
		font-size: <?php echo $settings->date_font_size; ?>px;
	}
<?php } ?>
<?php if ( $settings->rating_show == 'true' &&  !empty($settings->rating_color) || $settings->rating_font_size <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .testimonials .rating i{
		color: #<?php echo $settings->rating_color; ?>;
		font-size: <?php echo $settings->rating_font_size; ?>px;
	}
<?php } ?>



<?php if ( $settings->show_dots == 'true') { ?>
	<?php if ( $settings->style == " center-sync") { ?>

		<?php if ( !empty($settings->dots_color) || $settings->dots_size <> '' || $settings->dots_spacing <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .testimonials .flickity-page-dots .dot{
			<?php if ( !empty($settings->dots_color) ) { ?>
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
		<?php if ( !empty($settings->dots_active_color) ) { ?>
			.fl-node-<?php echo $id; ?> .testimonials .flickity-page-dots .dot.is-selected{
				background-color: #<?php echo $settings->dots_active_color; ?>;
			}
		<?php } ?>
		<?php if ( $settings->dots_margin_top <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .testimonials .flickity-page-dots{
				margin-top: <?php echo $settings->dots_margin_top; ?>px;
			}
		<?php } ?>

	<?php } else { ?>

		<?php if ( !empty($settings->dots_color) || $settings->dots_size <> '' || $settings->dots_spacing <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .testimonials .owl-dots .owl-dot{
			<?php if ( !empty($settings->dots_color) ) { ?>
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
		<?php if ( !empty($settings->dots_active_color) ) { ?>
			.fl-node-<?php echo $id; ?> .testimonials .owl-dots .owl-dot.active{
				background-color: #<?php echo $settings->dots_active_color; ?>;
			}
		<?php } ?>
		<?php if ( $settings->dots_margin_top <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .testimonials .owl-dots{
				margin-top: <?php echo $settings->dots_margin_top; ?>px;
			}
		<?php } ?>

	<?php } ?>
<?php } ?>


<?php if ( $settings->show_nav == 'true') { ?>
	<?php if ( !empty($settings->nav_bg_color) || $settings->nav_border_thick <> '' || $settings->nav_size <> '' || $settings->nav_radius <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .testimonials .owl-nav *{
		<?php if ( !empty($settings->nav_bg_color) ) { ?>
			background-color: #<?php echo $settings->nav_bg_color; ?>;
		<?php } ?>
		<?php if ( $settings->nav_border_thick <> '' ) { ?>
			border-width: <?php echo $settings->nav_border_thick; ?>px;
		<?php } ?>
		<?php if ( $settings->nav_size <> '' ) { ?>
			width: <?php echo $settings->nav_size; ?>px;
			height: <?php echo $settings->nav_size; ?>px;
		<?php } ?>
		<?php if ( $settings->nav_radius <> '' ) { ?>
			border-radius: <?php echo $settings->nav_radius; ?>px;
		<?php } ?>
		}
	<?php } ?>

	<?php if ( !empty($settings->nav_border_color) ) { ?>
		.fl-node-<?php echo $id; ?> .testimonials .owl-nav *:not(:hover){
			border-color: #<?php echo $settings->nav_border_color; ?>;
		}
	<?php } ?>
	<?php if ( !empty($settings->nav_bg_color_hover) || !empty($settings->nav_border_color_hover) ) { ?>
		.fl-node-<?php echo $id; ?> .testimonials .owl-nav *:hover{
			<?php if ( !empty($settings->nav_bg_color_hover) ) { ?>
				background-color: #<?php echo $settings->nav_bg_color_hover; ?>;
			<?php } ?>
			<?php if ( !empty($settings->nav_border_color_hover) ) { ?>
				border-color: #<?php echo $settings->nav_border_color_hover; ?>;
			<?php } ?>
		}
	<?php } ?>
	<?php if ( !empty($settings->nav_color_hover) ) { ?>
		.fl-node-<?php echo $id; ?> .testimonials .owl-nav *:hover::before,
		.fl-node-<?php echo $id; ?> .testimonials .owl-nav *:hover::after{
			background-color: #<?php echo $settings->nav_color_hover; ?>;
		}
	<?php } ?>

	<?php if ( $settings->nav_spacing <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .testimonials .owl-nav .owl-prev{
			left: <?php echo $settings->nav_spacing; ?>px;
		}
		.fl-node-<?php echo $id; ?> .testimonials .owl-nav .owl-next{
			right: <?php echo $settings->nav_spacing; ?>px;
		}
	<?php } ?>

	<?php if ( !empty($settings->nav_color) || $settings->nav_thick <> '' || $settings->nav_arrow_radius <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .testimonials .owl-nav *::before,
		.fl-node-<?php echo $id; ?> .testimonials .owl-nav *::after{
		<?php if ( !empty($settings->nav_color) ) { ?>
			background-color: #<?php echo $settings->nav_color; ?>;
		<?php } ?>
		<?php if ( $settings->nav_thick <> '' ) { ?>
			width: <?php echo $settings->nav_thick; ?>px;
		<?php } ?>
		<?php if ( $settings->nav_arrow_radius <> '' ) { ?>
			border-raduis: <?php echo $settings->nav_arrow_radius; ?>px;
		<?php } ?>
		}
	<?php } ?>
	<?php if ( $settings->nav_margin_top <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .testimonials .owl-nav{
			margin-top: <?php echo $settings->nav_margin_top; ?>px;
		}
	<?php } ?>
<?php } ?>