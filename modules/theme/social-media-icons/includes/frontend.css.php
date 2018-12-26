<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; ?>

	<?php if ( !empty($settings->items[$i]->socialmedia_color) || !empty($settings->items[$i]->socialmedia_bg_color) ) { ?>
		.fl-node-<?php echo $id; ?> .social-media-icons a.social-meida-icon-<?php echo ($i+1); ?>{ 
			<?php if ( !empty($settings->items[$i]->socialmedia_color) ) { ?>
				color: #<?php echo $settings->items[$i]->socialmedia_color; ?>;
			<?php } ?>
			<?php if ( !empty($settings->items[$i]->socialmedia_bg_color) ) { ?>
				background-color: #<?php echo $settings->items[$i]->socialmedia_bg_color; ?>;
			<?php } ?>
		}
	<?php } ?>

<?php endfor; ?>

<?php if ( isset($settings->socialmedia_icon_size) || isset($settings->socialmedia_border_radius) || isset($settings->socialmedia_padding) ) { ?>
	.fl-node-<?php echo $id; ?> .social-media-icons a{
		<?php if ( isset($settings->socialmedia_icon_size) ) { ?>
			font-size: <?php echo $settings->socialmedia_icon_size; ?>px;
		<?php } ?>
		<?php if ( isset($settings->socialmedia_border_radius) ) { ?>
			border-radius: <?php echo $settings->socialmedia_border_radius; ?>px;
			-webkit-border-radius: <?php echo $settings->socialmedia_border_radius; ?>px;
		<?php } ?>
		<?php if ( isset($settings->socialmedia_padding) ) { ?>
			padding: <?php echo $settings->socialmedia_padding; ?>px;
		<?php } ?>
	}
<?php } ?>

<?php if ( $settings->socialmedia_alignment == 'left' && isset($settings->socialmedia_spacing) ) { ?>
	.fl-node-<?php echo $id; ?> .social-media-icons.left a{
		margin-right: <?php echo $settings->socialmedia_spacing; ?>px;
		margin-bottom: <?php echo $settings->socialmedia_spacing; ?>px;
	}
<?php } ?>
<?php if ( $settings->socialmedia_alignment == 'right' && isset($settings->socialmedia_spacing) ) { ?>
	.fl-node-<?php echo $id; ?> .social-media-icons.right a{
		margin-left: <?php echo $settings->socialmedia_spacing; ?>px;
		margin-bottom: <?php echo $settings->socialmedia_spacing; ?>px;
	}
<?php } ?>
<?php if ( $settings->socialmedia_alignment == 'center' && isset($settings->socialmedia_spacing) ) { ?>
	.fl-node-<?php echo $id; ?> .social-media-icons.center a{
		margin-left: <?php echo $settings->socialmedia_spacing; ?>px;
		margin-right: <?php echo $settings->socialmedia_spacing; ?>px;
		margin-bottom: <?php echo $settings->socialmedia_spacing; ?>px;
	}
<?php } ?>