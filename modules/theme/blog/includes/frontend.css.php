<?php if ( !empty($settings->bg_color) || !empty($settings->color) || !empty($settings->border_color) || $settings->padding <> '' || $settings->custom_width <> '' && $settings->column == 'custom-width' ) { ?>
.fl-node-<?php echo $id; ?> .blog-post{
	<?php if (!empty($settings->bg_color)) { ?>background-color: #<?php echo $settings->bg_color ?>;<?php } ?>
	<?php if (!empty($settings->border_color)) { ?>border: 1px solid #<?php echo $settings->border_color ?>;<?php } ?>
	<?php if (!empty($settings->color)) { ?>color: #<?php echo $settings->color ?>;<?php } ?>
	<?php if ($settings->padding <> '') { ?>padding: <?php echo $settings->padding ?>px;<?php } ?>
	<?php if ($settings->custom_width <> '' && $settings->column == 'custom-width' ) { ?> max-width: <?php echo $settings->custom_width ?>px;<?php } ?>
}
<?php } ?>
<?php if ( $settings->image_ratio <> '' ) { ?>
.fl-node-<?php echo $id; ?> .blog-thumb{
	<?php if ( $settings->image_ratio <> '' ) { ?>padding-top: <?php echo $settings->image_ratio ?>%; <?php } ?>
}
<?php } ?>
<?php if ( !empty($settings->color_title) || !empty($settings->title_size) || !empty($settings->font_weight) ) { ?>
.fl-node-<?php echo $id; ?> .blog-post .blog-post-title{
	<?php if (!empty($settings->color_title)) { ?>color: #<?php echo $settings->color_title ?>;<?php } ?>
	<?php if (!empty($settings->title_size)) { ?>font-size: <?php echo $settings->title_size ?>px;<?php } ?>
	<?php if (!empty($settings->font_weight)) { ?>font-weight: <?php echo $settings->font_weight ?>;<?php } ?>
}
<?php } ?>
<?php if ( !empty($settings->color_link) ) { ?>
.fl-node-<?php echo $id; ?> .blog-post .blog-post-meta a,
.fl-node-<?php echo $id; ?> .blog-post .blog-post-readmore{
	<?php if (!empty($settings->color_link)) { ?>color: #<?php echo $settings->color_link ?>;<?php } ?>
}
<?php } ?>
<?php if ( !empty($settings->color_link_hover) ) { ?>
.fl-node-<?php echo $id; ?> .blog-post .blog-post-meta a:hover,
.fl-node-<?php echo $id; ?> .blog-post .blog-post-readmore:hover{
	<?php if (!empty($settings->color_link_hover)) { ?>color: #<?php echo $settings->color_link_hover ?>;<?php } ?>
}
<?php } ?>

<?php if ( $settings->padding_inside_top_bottom <> '' || $settings->padding_inside_left_right <> '' ) { ?>
.fl-node-<?php echo $id; ?> .blog-post .blog-info{
	<?php if ( $settings->padding_inside_top_bottom <> '' ) { ?>padding-top: <?php echo $settings->padding_inside_top_bottom ?>px;<?php } ?>
	<?php if ( $settings->padding_inside_top_bottom <> '' ) { ?>padding-bottom: <?php echo $settings->padding_inside_top_bottom ?>px;<?php } ?>
	<?php if ( $settings->padding_inside_left_right <> '' ) { ?>padding-left: <?php echo $settings->padding_inside_left_right ?>px;<?php } ?>
	<?php if ( $settings->padding_inside_left_right <> '' ) { ?>padding-right: <?php echo $settings->padding_inside_left_right ?>px;<?php } ?>
}
<?php } ?>
<?php if ( $settings->style == 'hovered' && !empty($settings->bg_color) ) { ?>
	.fl-node-<?php echo $id; ?> .blog-post .blog-info::before{
		<?php if (!empty($settings->bg_color)) { ?>background-color: #<?php echo $settings->bg_color ?>;<?php } ?>
	}
<?php } ?>

<?php if ( $settings->column_spacing <> '' ) { ?>
.blog-wrapper { padding-right: <?php echo $settings->column_spacing; ?>px; margin-left: -<?php echo $settings->column_spacing; ?>px; width: calc(100% + <?php echo $settings->column_spacing; ?>px + <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(100% + <?php echo $settings->column_spacing; ?>px + <?php echo $settings->column_spacing; ?>px); }
.blog-post { margin: 0 0 <?php echo $settings->column_spacing; ?>px <?php echo $settings->column_spacing; ?>px; }
@media only screen and ( max-width: 1663px ) { 
	.fl-row-content.fl-row-full-width .column-5 .blog-post,
	.fl-row-content.fl-row-full-width .column-6 .blog-post { width: calc(25% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(25% - <?php echo $settings->column_spacing; ?>px); }
}
@media only screen and ( max-width: 1170px ) {
	.blog-wrapper { margin: 0 !important; width: 100% !important; }
}
@media only screen and ( max-width: 1024px ) {
	.fl-row-content.fl-row-full-width .column-5 .blog-post,
	.fl-row-content.fl-row-full-width .column-6 .blog-post { width: calc(33% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(33% - <?php echo $settings->column_spacing; ?>px); }
}
@media only screen and ( min-width: 992px ) { 
	.column-1 .blog-post { width: calc(100% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->column_spacing; ?>px); }
	.column-2 .blog-post { width: calc(50% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->column_spacing; ?>px); }
	.column-3 .blog-post { width: calc(33.33% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(33.33% - <?php echo $settings->column_spacing; ?>px); }
	.column-4 .blog-post { width: calc(25% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(25% - <?php echo $settings->column_spacing; ?>px); }
	.column-5 .blog-post {  width: calc(20% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(20% - <?php echo $settings->column_spacing; ?>px); }
	.column-6 .blog-post { width: calc(16.666% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(16.666% - <?php echo $settings->column_spacing; ?>px); }
}
@media only screen and ( max-width: 991px ) { 
	.column-1 .blog-post,
	.column-2 .blog-post { width: calc(100% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->column_spacing; ?>px); } 
	.column-3 .blog-post,
	.column-4 .blog-post { width: calc(50% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->column_spacing; ?>px); } 
	.column-5 .blog-post,
	.column-6 .blog-post { width: calc(25% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(25% - <?php echo $settings->column_spacing; ?>px); } 
	.fl-row-content.fl-row-full-width .column-5 .blog-post,
	.fl-row-content.fl-row-full-width .column-6 .blog-post { width: calc(50% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->column_spacing; ?>px); } 
}
@media only screen and ( max-width: 767px ) { 
	.column-1 .blog-post,
	.column-2 .blog-post { width: calc(100% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->column_spacing; ?>px); } 
	.column-3 .blog-post,
	.column-4 .blog-post { width: calc(50% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->column_spacing; ?>px); } 
	.column-5 .blog-post,
	.column-6 .blog-post { width: calc(33.33% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(33.33% - <?php echo $settings->column_spacing; ?>px); } 
}
@media only screen and ( max-width: 667px ) { 
	.column-1 .blog-post,
	.column-2 .blog-post { width: calc(100% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->column_spacing; ?>px); } 
	.column-3 .blog-post,
	.column-4 .blog-post,
	.column-5 .blog-post,
	.column-6 .blog-post { width: calc(50% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->column_spacing; ?>px); } 
	.fl-row-content.fl-row-full-width .column-5 .blog-post,
	.fl-row-content.fl-row-full-width .column-6 .blog-post { width: calc(100% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->column_spacing; ?>px); } 
}
@media only screen and ( max-width: 567px ) { 
	.column-1 .blog-post,
	.column-2 .blog-post,
	.column-3 .blog-post,
	.column-4 .blog-post,
	.column-5 .blog-post,
	.column-6 .blog-post { width: calc(100% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->column_spacing; ?>px); } 
}
<?php } ?>