<h1>
	Sections
	<?php echo $this->Html->link('<i class="icon-refresh icon-white"></i> Import', array('action' => 'index'), array('id' => 'import', 'class' => 'ajax btn btn-primary', 'escape' => false)); ?>
</h1>
<?php echo $this->Form->create('Account'); ?>
	<header class="timeline">

		<?php if (!empty($this->request->data)): ?>
			 Imported <?php echo $this->Form->value('Account.type');?> - <?php echo $this->Form->value('Account.username');?>
			<?php echo $this->Form->submit('Save Changes', array('div' => false));?>
		<?php endif ?>

		<?php if (!empty($this->request->data)): ?>
			<?php echo $this->Form->input('Account.id'); ?>
			<?php echo $this->Form->input('Account.published', array('label' => 'Auto-Publish New Content')); ?>
			<?php if (!empty($this->request->data['Resume'])):?>
				<h3>Save the new Resume details</h3>
				<?php echo $this->Form->input('Resume.id')?>
				<?php echo $this->Form->input('Resume.published')?>
				<?php echo $this->Form->input('Resume.purpose')?>
			<?php endif; ?>
		<?php endif ?>

		<ul>
			<li>
				<h3>
					Experience
					<?php echo $this->Html->link('<i class="icon-plus"></i>', array('controller' => 'resume_employers', 'action' => 'add'), array('title' => 'Add', 'class' => 'ajax btn', 'escape' => false));?>
				</h3>
			</li>
			<li>
				<h3>
					Projects
					<?php echo $this->Html->link('<i class="icon-plus"></i>', array('controller' => 'projects', 'action' => 'add'), array('title' => 'Add', 'class' => 'ajax btn', 'escape' => false));?>
				</h3>
			</li>
			<li>
				<h3>
					Albums
					<?php echo $this->Html->link('<i class="icon-plus"></i>', array('controller' => 'albums', 'action' => 'add'), array('title' => 'Add', 'class' => 'ajax btn', 'escape' => false));?>
				</h3>
			</li>
			<li>
				<h3>
					Media
					<?php echo $this->Html->link('<i class="icon-plus"></i>', array('controller' => 'media_items', 'action' => 'add'), array('title' => 'Add', 'class' => 'ajax btn', 'escape' => false));?>
				</h3>
			</li>
			<li>
				<h3>
					Posts
					<?php echo $this->Html->link('<i class="icon-plus"></i>', array('controller' => 'posts', 'action' => 'add'), array('title' => 'Add', 'class' => 'ajax btn', 'escape' => false));?>
				</h3>
			</li>
		</ul>
	</header>

	<div class="timeline">
		<ul id="experience">
		<?php if (!empty($this->request->data['ResumeSchool'])): ?>
			<?php foreach ($this->request->data['ResumeSchool'] as $i => $school):?>
				<li>
					<?php echo $this->Timeline->buttons($school, 'ResumeSchool', true); ?>
					<?php echo $this->Form->input("ResumeSchool.$i.id");?>
					<?php echo $this->Form->input("ResumeSchool.$i.name"); ?>
					<?php echo $this->Form->input("ResumeSchool.$i.published"); ?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($schools as $school): ?>
			<li>
				<?php echo $this->Timeline->buttons($school, 'ResumeSchool'); ?>
				<?php echo $school['ResumeSchool']['name']; ?>
			</li>
		<?php endforeach ?>

		<?php if (!empty($this->request->data['ResumeEmployer'])): ?>
			<?php foreach ($this->request->data['ResumeEmployer'] as $i => $work):?>
				<li>
					<?php echo $this->Timeline->buttons($work, 'ResumeEmployer', true); ?>
					<?php echo $this->Form->input("ResumeEmployer.$i.id");?>
					<?php echo $this->Form->input("ResumeEmployer.$i.name"); ?>
					<?php echo $this->Form->input("ResumeEmployer.$i.published"); ?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($works as $id => $work): ?>
			<li>
				<?php echo $this->Timeline->buttons($work, 'ResumeEmployer'); ?>
				<?php echo $work['ResumeEmployer']['name']; ?>
			</li>
		<?php endforeach ?>

		</ul>
		<ul id="projects">

		<?php if (!empty($this->request->data['Project'])): ?>
			<?php foreach ($this->request->data['Project'] as $i => $project):?>
				<li>
					<?php echo $this->Timeline->buttons($project, 'Project', true); ?>
					<?php echo $this->Form->input("Project.$i.id");?>
					<?php echo $this->Form->input("Project.$i.name"); ?>
					<?php echo $this->Form->input("Project.$i.published"); ?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($projects as $id => $project): ?>
			<li>
				<?php echo $this->Timeline->buttons($project, 'Project'); ?>
				<?php echo $project['Project']['name'] ?>
			</li>
		<?php endforeach ?>

		</ul>

		<ul id="albums">

		<?php if (!empty($this->request->data['Album'])): ?>
			<?php foreach ($this->request->data['Album'] as $i => $album):?>
				<li>
					<?php echo $this->Timeline->buttons($album, 'Album', true); ?>
					<?php echo $this->Form->input("Album.$i.id");?>
					<?php echo $this->Form->input("Album.$i.name"); ?>
					<?php echo $this->Form->input("Album.$i.published"); ?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($albums as $id => $album): ?>
			<li>
				<?php echo $this->Timeline->buttons($album, 'Album'); ?>
				<?php echo $album['Album']['name']; ?>
			</li>
		<?php endforeach ?>

		</ul>

		<ul id="media">

		<?php if (!empty($this->request->data['MediaItem'])): ?>
			<?php foreach ($this->request->data['MediaItem'] as $i => $item):?>
				<li>
					<?php echo $this->Timeline->buttons($item, 'MediaItem', true); ?>
					<?php echo $this->Form->input("MediaItem.$i.id");?>
					<?php echo $this->Form->input("MediaItem.$i.name"); ?>
					<?php echo $this->Form->input("MediaItem.$i.published"); ?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($mediaItems as $id => $item): ?>
			<li>
				<?php echo $this->Timeline->buttons($item, 'MediaItem'); ?>
				<?php echo $item['MediaItem']['name']; ?>
			</li>
		<?php endforeach ?>

		</ul>

		<ul id="posts">

		<?php if (!empty($this->request->data['Post'])): ?>
			<?php foreach ($this->request->data['Post'] as $i => $post): ?>
				<li>
					<?php echo $this->Timeline->buttons($post, 'Post', true); ?>
					<?php echo $this->Form->input("Post.$i.id");?>
					<?php echo $this->Form->input("Post.$i.name"); ?>
					<?php echo $this->Form->input("Post.$i.published"); ?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($posts as $id => $post): ?>
			<li>
				<?php echo $this->Timeline->buttons($post, 'Post'); ?>
				<?php echo $post['Post']['subject']; ?>
			</li>
		<?php endforeach ?>

		</ul>
	</div>
<?php echo $this->Form->end(); ?>