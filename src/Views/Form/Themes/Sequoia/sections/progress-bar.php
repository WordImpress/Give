<?php if ( $form->has_goal() ) : ?>
	<?php
	$color      = give_get_meta( $form_id, '_give_goal_color', true );
	$goal_stats = give_goal_progress_stats( $form_id );

	$style = "width:{$goal_stats['progress']}%;";
	if ( ! empty( $color ) ) {
		$style .= ";background: linear-gradient(180deg, {$color} 0%, {$color} 100%), linear-gradient(180deg, #fff 0%, #ccc 100%); background-blend-mode: multiply;";
	}
	?>
	<div class="give-section progress-bar">
		<div class="give-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?php echo $goal_stats['progress']; ?>">
			<span style="<?php echo $style; ?>"></span>
		</div><!-- /.give-progress-bar -->
	</div>
<?php endif; ?>
