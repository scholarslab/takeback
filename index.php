<?php echo head(array('bodyid'=>'home')); ?>

<p>On November 19, 2014, the University of Virginia community was shocked by revelations in a <em>Rolling Stone</em> magazine article about sexual assault at UVa: <a href="http://www.rollingstone.com/culture/features/a-rape-on-campus-20141119">“A Rape on Campus.”</a> Should we have been shocked?</p>

<p>“Take Back the Archive” is a public history project created by UVa faculty (historians, anthropologists, American Studies scholars, and more), and by UVa students, librarians, and archivists. We have created the project in response to the many “we didn’t realize” and “we just didn’t know” statements we heard in the aftermath of the <em>Rolling Stone</em> publication. It is meant to preserve, visualize, and contextualize the history of rape and sexual violence at the University of Virginia.</p>

<p>We will soon be soliciting crowd-sourced material: documents, images, artifacts, ephemera, and survivor stories. We are also collecting material related to the current public outcry at UVa. Stay tuned for information about how you can contribute. Please tweet about the project using the hashtag <a href="https://twitter.com/search?q=%23takebackthearchive">#TakeBackTheArchive</a> and <a href="mailto:scholarslab@virginia.edu">contact us</a> if you have questions about this work. We hope our use of <a href="http://omeka.org">Omeka</a> and <a href="http://neatline.org">Neatline</a> can help establish a national model for college and university communities wishing to memorialize, historicize, confront, and end sexual violence on campus.</p>

<?php fire_plugin_hook('public_append_to_home', array('view' => $this)); ?>

<?php echo foot(); ?>
