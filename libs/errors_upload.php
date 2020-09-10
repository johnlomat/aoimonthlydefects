<?php  if (count($errors_upload) > 0) : ?>
	<div class="error">
		<?php foreach ($errors_upload as $error) : ?>
			<p><i class="material-icons" style="font-size:1.04em;line-height: normal;vertical-align:middle">error</i><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>