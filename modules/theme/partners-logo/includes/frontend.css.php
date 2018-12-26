<?php if ( $settings->logos_column_spacing <> '' ) { ?>
.branding-wrapper { padding-right: <?php echo $settings->logos_column_spacing; ?>px; margin-left: -<?php echo $settings->logos_column_spacing; ?>px; width: calc(100% + <?php echo $settings->logos_column_spacing; ?>px + <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(100% + <?php echo $settings->logos_column_spacing; ?>px + <?php echo $settings->logos_column_spacing; ?>px); }
.branding-logo { margin: 0 0 <?php echo $settings->logos_column_spacing; ?>px <?php echo $settings->logos_column_spacing; ?>px; }
@media only screen and ( min-width: 981px ) { 
	.column-1 .branding-logo { width: calc(100% - <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->logos_column_spacing; ?>px); }
	.column-2 .branding-logo { width: calc(50% - <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->logos_column_spacing; ?>px); }
	.column-3 .branding-logo { width: calc(33.33% - <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(33.33% - <?php echo $settings->logos_column_spacing; ?>px); }
	.column-4 .branding-logo { width: calc(25% - <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(25% - <?php echo $settings->logos_column_spacing; ?>px); }
	.column-5 .branding-logo {  width: calc(20% - <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(20% - <?php echo $settings->logos_column_spacing; ?>px); }
	.column-6 .branding-logo { width: calc(16.666% - <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(16.666% - <?php echo $settings->logos_column_spacing; ?>px); }
}
@media only screen and ( max-width: 980px ) { 
	.column-1 .branding-logo,
	.column-2 .branding-logo { width: calc(100% - <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->logos_column_spacing; ?>px); } 
	.column-3 .branding-logo,
	.column-4 .branding-logo { width: calc(50% - <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->logos_column_spacing; ?>px); } 
	.column-5 .branding-logo,
	.column-6 .branding-logo { width: calc(25% - <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(25% - <?php echo $settings->logos_column_spacing; ?>px); } 
}
@media only screen and ( max-width: 767px ) { 
	.column-1 .branding-logo,
	.column-2 .branding-logo { width: calc(100% - <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->logos_column_spacing; ?>px); } 
	.column-3 .branding-logo,
	.column-4 .branding-logo { width: calc(50% - <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->logos_column_spacing; ?>px); } 
	.column-5 .branding-logo,
	.column-6 .branding-logo { width: calc(33.33% - <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(33.33% - <?php echo $settings->logos_column_spacing; ?>px); } 
}
@media only screen and ( max-width: 580px ) { 
	.column-1 .branding-logo,
	.column-2 .branding-logo { width: calc(100% - <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->logos_column_spacing; ?>px); } 
	.column-3 .branding-logo,
	.column-4 .branding-logo,
	.column-5 .branding-logo,
	.column-6 .branding-logo { width: calc(50% - <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->logos_column_spacing; ?>px); } 
}
@media only screen and ( max-width: 480px ) { 
	.column-1 .branding-logo,
	.column-2 .branding-logo,
	.column-3 .branding-logo,
	.column-4 .branding-logo,
	.column-5 .branding-logo,
	.column-6 .branding-logo { width: calc(100% - <?php echo $settings->logos_column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->logos_column_spacing; ?>px); } 
}
<?php } ?>