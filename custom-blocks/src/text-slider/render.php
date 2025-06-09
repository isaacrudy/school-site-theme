<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<p <?php echo get_block_wrapper_attributes(); ?> data-aos=<?php echo $attributes['direction'] ?>>
	<?php echo $attributes[ 'content' ]; ?>
</p>	
