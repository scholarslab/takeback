<?php echo head(array('bodyid'=>'home')); ?>

<p>Take Back The Archive is a collection of documents, images, artifacts, and ephemeral data related to the history of sexual violence at the University of Virginia. It was created as a response to the "we didn't realize" and "we just didn't know" statements made in the aftermath of the Rolling Stone article published on DATE HERE about rape at UVa. The goal of this crowd-sourced archive is to visualize documentation and preserve survivors stories related to sexual assault at UVa.</p>

<?php fire_plugin_hook('public_append_to_home', array('view' => $this)); ?>

<?php echo foot(); ?>
