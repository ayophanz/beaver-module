<?php if(!empty($settings->bg_color_scroll)) { ?>
	@media only screen and ( min-width: 767px ) {
		.fl-node-<?php echo $id; ?> .header-sticky.sticky {
			background-color: #<?php echo $settings->bg_color_scroll; ?>;
			background-color: rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->bg_color_scroll)) ?>, <?php echo $settings->bg_color_scroll_opacity/100; ?>);
		}
	}
<?php } ?>



<?php if(!empty($settings->text_color)) { ?>
	.fl-node-<?php echo $id; ?> .header-sticky .primary-nav > ul > li > a,
	.fl-node-<?php echo $id; ?> .header-sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li > a {
		color: #<?php echo $settings->text_color; ?> !important;
	}
<?php } ?>
<?php if(!empty($settings->text_color_hover)) { ?>
	.fl-node-<?php echo $id; ?> .header-sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li.mega-current-menu-ancestor > a, 
	.fl-node-<?php echo $id; ?> .header-sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li > a:hover, 
	.fl-node-<?php echo $id; ?> .header-sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li > a:focus {
		color: #<?php echo $settings->text_color_hover; ?> !important;
	}
<?php } ?>
<?php if(!empty($settings->text_color_scroll)) { ?>
	.fl-node-<?php echo $id; ?> .header-sticky.sticky .primary-nav > ul > li > a,
	.fl-node-<?php echo $id; ?> .header-sticky.sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li > a {
		color: #<?php echo $settings->text_color_scroll; ?> !important;
	}
<?php } ?>
<?php if(!empty($settings->text_color_scroll_hover)) { ?>
	.fl-node-<?php echo $id; ?> .header-sticky.sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li.mega-current-menu-ancestor > a, 
	.fl-node-<?php echo $id; ?> .header-sticky.sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li > a:hover, 
	.fl-node-<?php echo $id; ?> .header-sticky.sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li > a:focus {
		color: #<?php echo $settings->text_color_scroll_hover; ?> !important;
	}
<?php } ?>




<?php if(!empty($settings->dropdown_color)) { ?>
	.fl-node-<?php echo $id; ?> .header-sticky .primary-nav > ul > li li,
	.fl-node-<?php echo $id; ?> .header-sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu,
	.fl-node-<?php echo $id; ?> .header-sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu .mega-block-title {
		color: #<?php echo $settings->dropdown_color; ?> !important;
	}
<?php } ?>
<?php if(!empty($settings->dropdown_link_color)) { ?>
	.fl-node-<?php echo $id; ?> .header-sticky .primary-nav > ul > li li > a,
	.fl-node-<?php echo $id; ?> .header-sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li li > a {
		color: #<?php echo $settings->dropdown_link_color; ?> !important;
	}
<?php } ?>
<?php if(!empty($settings->dropdown_link_color_hover)) { ?>
	.fl-node-<?php echo $id; ?> .header-sticky .primary-nav > ul > li li > a:hover,
	.fl-node-<?php echo $id; ?> .header-sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li li > a:hover {
		color: #<?php echo $settings->dropdown_link_color_hover; ?> !important;
	}
<?php } ?>
<?php if(!empty($settings->dropdown_background)) { ?>
	.fl-node-<?php echo $id; ?> .header-sticky .primary-nav > ul > li > ul,
	.fl-node-<?php echo $id; ?> .header-sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li ul.mega-sub-menu,
	.fl-node-<?php echo $id; ?> .header-sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li ul.mega-sub-menu a.mega-menu-link {
		background-color: #<?php echo $settings->dropdown_background; ?> !important;
	}
<?php } ?>
<?php if(!empty($settings->dropdown_link_color) || !empty($settings->dropdown_link_color_hover) || !empty($settings->dropdown_background)) { ?>
	@media only screen and ( max-width: 980px ) {
		.fl-node-<?php echo $id; ?> .header-sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li > a {
			color: #<?php echo $settings->dropdown_link_color; ?> !important;
		}
		.fl-node-<?php echo $id; ?> .header-sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu > li > a:hover {
			color: #<?php echo $settings->dropdown_link_color_hover; ?> !important;
		}
		.fl-node-<?php echo $id; ?> .header-sticky #sticky-main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu {
			background-color: #<?php echo $settings->dropdown_background; ?> !important;
		}
	}
<?php } ?>