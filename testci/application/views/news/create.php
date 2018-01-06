<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/create'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="text" size="400">Text</label>
    <textarea name="text" rows="30" cols="80"></textarea><br />

    <input type="submit" name="submit" value="Create news item" /><br>
	
					
</form>
