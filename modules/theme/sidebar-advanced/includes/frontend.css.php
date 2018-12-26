<?php if ( $settings->column_spacing <> '' ) { ?>
.columns { padding-right: <?php echo $settings->column_spacing; ?>px; margin-left: -<?php echo $settings->column_spacing; ?>px; width: calc(100% + <?php echo $settings->column_spacing; ?>px + <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(100% + <?php echo $settings->column_spacing; ?>px + <?php echo $settings->column_spacing; ?>px); }
.columns > * { margin: 0 0 <?php echo $settings->column_spacing; ?>px <?php echo $settings->column_spacing; ?>px; }
@media only screen and ( min-width: 981px ) { 
	.column-2 > * { width: calc(16% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(16% - <?php echo $settings->column_spacing; ?>px); } 
	.column-2-5 > * {  width: calc(20% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(20% - <?php echo $settings->column_spacing; ?>px); } 
	.column-3 > * { width: calc(25% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(25% - <?php echo $settings->column_spacing; ?>px); }
	.column-4 > * { width: calc(33.33% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(33.33% - <?php echo $settings->column_spacing; ?>px); } 
	.column-6 > * { width: calc(50% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->column_spacing; ?>px); } 
	.column-12 > * { width: calc(100% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->column_spacing; ?>px); } 
}
@media only screen and ( max-width: 980px ) and ( min-width: 767px ) { 
	.column-2 > *,
	.column-2-5 > * { width: calc(25% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(25% - <?php echo $settings->column_spacing; ?>px); } 
	.column-3 > *,
	.column-4 > * { width: calc(50% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->column_spacing; ?>px); } 
	.column-6 > *,
	.column-12 > * { width: calc(100% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->column_spacing; ?>px); } 
}
@media only screen and ( max-width: 767px ) and ( min-width: 580px ) { 
	.column-2 > *,
	.column-2-5 > * { width: calc(33.33% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(33.33% - <?php echo $settings->column_spacing; ?>px); } 
	.column-3 > *,
	.column-4 > * { width: calc(50% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->column_spacing; ?>px); } 
	.column-6 > *,
	.column-12 > * { width: calc(100% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->column_spacing; ?>px); } 
}
@media only screen and ( max-width: 580px ) and ( min-width: 480px ) { 
	.column-2 > *,
	.column-2-5 > *,
	.column-3 > *,
	.column-4 > * { width: calc(50% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->column_spacing; ?>px); } 
	.column-6 > *,
	.column-12 > * { width: calc(100% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->column_spacing; ?>px); } 
}
@media only screen and ( max-width: 480px ) { 
	.column-2 > *,
	.column-2-5 > *,
	.column-3 > *,
	.column-4 > *,
	.column-6 > *,
	.column-12 > * { width: calc(100% - <?php echo $settings->column_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->column_spacing; ?>px); } 
}
<?php } ?>