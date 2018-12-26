skillbar_bg_color<?php if ( isset($settings->skillbar_style_radius) ) : ?>
	.fl-node-<?php echo $id; ?> .skills-bar * {
		border-radius: <?php echo $settings->skillbar_style_radius; ?>px;
		-webkit-border-radius: <?php echo $settings->skillbar_style_radius; ?>px;
	}
<?php endif; ?>
<?php if (!empty($settings->skillbar_bg_color)) : ?>
	.fl-node-<?php echo $id; ?> .skills-bar .skillbar-bar-wrapper {
		background-color: #<?php echo $settings->skillbar_bg_color; ?>;
	}
<?php endif; ?>
<?php if (!empty($settings->skillbar_percentage_color)) : ?>
	.fl-node-<?php echo $id; ?> .skills-bar .skill-bar-percent {
		color: #<?php echo $settings->skillbar_percentage_color; ?>;
	}
<?php endif; ?>
<?php if (!empty($settings->skillbar_delay)) : ?>
	.fl-node-<?php echo $id; ?> .skills-bar .skillbar-bar {
		transition: all <?php echo $settings->skillbar_delay; ?>s ease-in-out 0s; -webkit-transition: all <?php echo $settings->skillbar_delay; ?>s ease-in-out;
	}
<?php endif; ?>
<?php if (!empty($settings->skillbar_height)) : ?>
	.fl-node-<?php echo $id; ?> .skills-bar .skillbar-title,
	.fl-node-<?php echo $id; ?> .skills-bar .skillbar-bar-wrapper,
	.fl-node-<?php echo $id; ?> .skills-bar .skillbar-bar{
		height: <?php echo $settings->skillbar_height; ?>px;
	}
	.fl-node-<?php echo $id; ?> .skills-bar .skillbar-title{
		line-height: <?php echo $settings->skillbar_height; ?>px;
	}
<?php endif; ?>

<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; ?>
	.fl-node-<?php echo $id; ?> .skills-bar .skillbar-item-<?php echo $i; ?>.animate .skillbar-bar {
		width: <?php echo $settings->items[$i]->skillbar_percentage; ?>%;
	}
	.fl-node-<?php echo $id; ?> .skills-bar .skillbar-item-<?php echo $i; ?> .skillbar-bar {
		background-color: #<?php echo $settings->items[$i]->skillbar_color; ?>;
	}
	<?php if (!empty($settings->items[$i]->skillbar_text_color)) : ?>
		.fl-node-<?php echo $id; ?> .skills-bar .skillbar-item-<?php echo $i; ?> .skillbar-title {
			color: #<?php echo $settings->items[$i]->skillbar_text_color; ?>;
		}
	<?php endif; ?>
<?php endfor; ?>