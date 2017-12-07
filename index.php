<?php echo head(array('bodyid'=>'home')); ?>

<?php if ($homepageText = get_theme_option('Homepage Text')): ?>
<div id="homepage-text">
<?php echo $homepageText; ?>
</div>
<?php else: ?>
<div id="homepage-text">
	<p><em><strong>Take Back the Archive</strong></em> is a public history project created by UVa faculty, students, librarians, and archivists. It is meant to preserve, visualize, and contextualize the history of rape and sexual violence at the University of Virginia, honoring individual stories and documenting systemic issues and trends.</p>

	<p>We will soon be soliciting crowd-sourced material: documents, images, artifacts, ephemera, and survivor stories. We are also collecting material related to the current public outcry at UVa, <a href="https://www.facebook.com/SmallSpecialCollectionsUVa/posts/895295140495593">in partnership</a> with colleagues in Special Collections and UVa's Institute for Public History. <br /><br />Stay tuned for information about how you can contribute. Please tweet using the hashtag <a href="https://twitter.com/search?q=%23takebackthearchive">#TakeBackTheArchive</a> and <a href="mailto:TakeBacktheArchive@virginia.edu">contact us</a> if you have questions about this work. <br /><br />We hope our application of digital humanities tools like&nbsp;<a href="http://omeka.org">Omeka</a> and <a href="http://neatline.org">Neatline</a>&nbsp;to this project can help establish a national model for college and university communities wishing to memorialize, historicize, interpret, confront, <strong>and end</strong> sexual violence on campus.<br />&nbsp;</p>
</div>
<?php endif; ?>

<?php fire_plugin_hook('public_append_to_home', array('view' => $this)); ?>

<?php echo foot(); ?>
