<?php  if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<p><i class="material-icons" style="font-size:1.04em;line-height: normal;vertical-align:middle">error</i><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>