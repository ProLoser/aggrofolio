<article class="view">
	<h2>Welcome to the Admin Section</h2>
	<p>Want to mess with your Stylesheets or JavaScript? Click on <?php echo $this->Html->link('settings', array('controller' => 'settings', 'action' => 'index'))?>.</p>
	<p>Want to see if anything new is in the timeline manager? Click on <?php echo $this->Html->link('importer', array('controller' => 'accounts', 'action' => 'importer'))?>.</p>
	<h1>Best way to get started</h1>
	<p>If your Unfol.io is kind of bare, try hitting up the <?php echo $this->Html->link('Timeline Importer', array('controller' => 'accounts', 'action' => 'importer'))?> and start importing data from different websites you're already signed up with! Simply hit the <strong>Import</strong> button at the top of the page and select the website.</p>
	<p><strong>NOTE:</strong> most websites are still under development, so if you see an error, go back and try a different website. If however you really would like to see support completed for a specific service just let Dean know!</p>
</article>