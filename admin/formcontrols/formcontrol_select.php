<?php if ( !defined( 'HABARI_PATH' ) ) { die('No direct access'); } ?>
<div<?php
		echo $control->parameter_map(
			array(
				'class', 'id' => 'name'
			)
		); ?>>
	<label <?php
		echo $control->parameter_map(
			array(
				'title' => array( 'label_title', 'title' ),
				'for' => 'field',
			)
		); ?>><?php echo $this->caption; ?></label>
	<select <?php
		echo $control->parameter_map(
			array(
				'tabindex', 'disabled', 'readonly', 'multiple',
				'id' => 'field',
				'name' => 'field',
			),
			array(
				'value' => Utils::htmlspecialchars( $value ),
				'size' => ( $control->multiple ) ? $size : '',
			)
		);
		?>>
	<?php foreach( $options as $opts_key => $opts_val ) : ?>
		<?php if ( is_array( $opts_val ) ) : ?>
			<optgroup label="<?php echo $opts_key; ?>">
			<?php foreach( $opts_val as $opt_key => $opt_val ) : ?>
				<option value="<?php echo $opt_key; ?>"<?php echo ( in_array( $opt_key, (array) $value ) ? ' selected' : '' ); ?>><?php echo Utils::htmlspecialchars( $opt_val ); ?></option>
			<?php endforeach; ?>
			</optgroup>
		<?php else : ?>
			<option value="<?php echo $opts_key; ?>"<?php echo ( in_array( $opts_key, (array) $value ) ? ' selected' : '' ); ?>><?php echo Utils::htmlspecialchars( $opts_val ); ?></option>
		<?php endif; ?>
	<?php endforeach; ?>
	</select>
	<?php 

		if ( isset( $helptext ) && !empty( $helptext ) ) {
			?>
				<span class="helptext"><?php echo $helptext; ?></span>
			<?php
		}

		?>
	<?php $control->errors_out( '<li>%s</li>', '<ul class="error">%s</ul>' ); ?>
</div>