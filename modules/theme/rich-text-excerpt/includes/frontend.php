<div class="fl-rich-text-excerpts">
	<div class="fl-rich-text-excerpt">
		<p>
		<?php
			$content = $settings->text;
			$limit = $settings->limit <> '' ? $settings->limit : '200';
			$pos=strpos($content, ' ', $limit);
			echo substr($content,0,$pos ).'...';
			echo ' <a class="fl-rich-text-readmore" href="#readmore" title="'.$settings->readmore.'">'.$settings->readmore.'</a>';
		?>
		</p>
	</div>
	<div class="fl-rich-text-content">
		<?php
			global $wp_embed;
			echo wpautop( $wp_embed->autoembed( $settings->text ) );
			echo ' <a class="fl-rich-text-readless" href="#readless" title="'.$settings->readless.'">'.$settings->readless.'</a>';
		?>
	</div>
</div>