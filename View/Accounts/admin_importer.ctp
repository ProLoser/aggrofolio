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
					<?php echo $this->Html->link('<i class="icon-plus"></i>', array('controller' => 'resume_employers', 'action' => 'add'), array('class' => 'ajax btn', 'escape' => false));?>
				</h3>
			</li>
			<li>
				<h3>
					Projects
					<?php echo $this->Html->link('<i class="icon-plus"></i>', array('controller' => 'projects', 'action' => 'add'), array('class' => 'ajax btn', 'escape' => false));?>
				</h3>
			</li>
			<li>
				<h3>
					Albums
					<?php echo $this->Html->link('<i class="icon-plus"></i>', array('controller' => 'albums', 'action' => 'add'), array('class' => 'ajax btn', 'escape' => false));?>
				</h3>
			</li>
			<li>
				<h3>
					Media
					<?php echo $this->Html->link('<i class="icon-plus"></i>', array('controller' => 'media_items', 'action' => 'add'), array('class' => 'ajax btn', 'escape' => false));?>
				</h3>
			</li>
			<li>
				<h3>
					Posts
					<?php echo $this->Html->link('<i class="icon-plus"></i>', array('controller' => 'posts', 'action' => 'add'), array('class' => 'ajax btn', 'escape' => false));?>
				</h3>
			</li>
		</ul>
	</header>

	<div class="timeline">
		<ul id="experience">

		<?php if (!empty($this->request->data['ResumeSchool'])): ?>
			<?php foreach ($this->request->data['ResumeSchool'] as $i => $school):?>
				<li>
					<?php echo $this->Html->link('', array('controller' => 'resume_schools', 'action' => 'delete', $school['id']), array('class' => 'icon-trash button'), 'Are you sure you want to delete this?');?>
					<?php echo $this->Html->link('', array('controller' => 'resume_schools', 'action' => 'edit', $school['id']), array('class' => 'ajax icon-pencil button'));?>
					<?php echo $this->Form->input("ResumeSchool.$i.id");?>
					<?php echo $this->Form->input("ResumeSchool.$i.name"); ?>
					<?php echo $this->Form->input("ResumeSchool.$i.published"); ?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($schools as $school): ?>
			<li>
				<?php echo $this->Html->link('', array('controller' => 'resume_schools','action' => 'delete', $school['ResumeSchool']['id']), array('class' => 'icon-trash button'), 'Are you sure you want to delete this?');?>
				<?php echo $this->Html->link('', array('controller' => 'resume_schools','action' => 'edit', $school['ResumeSchool']['id']), array('class' => 'ajax icon-pencil button'));?>
				<?php echo $school['ResumeSchool']['name']; ?>
			</li>
		<?php endforeach ?>

		<?php if (!empty($this->request->data['ResumeEmployer'])): ?>
			<?php foreach ($this->request->data['ResumeEmployer'] as $i => $work):?>
				<li>
					<?php echo $this->Html->link('', array('controller' => 'resume_employers', 'action' => 'delete', $work['id']), array('class' => 'icon-trash button'), 'Are you sure you want to delete this?');?>
					<?php echo $this->Html->link('', array('controller' => 'resume_employers', 'action' => 'edit', $work['id']), array('class' => 'ajax icon-pencil button'));?>
					<?php echo $this->Form->input("ResumeEmployer.$i.id");?>
					<?php echo $this->Form->input("ResumeEmployer.$i.name"); ?>
					<?php echo $this->Form->input("ResumeEmployer.$i.published"); ?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($works as $id => $work): ?>
			<li>
				<?php echo $this->Html->link('', array('controller' => 'resume_employers','action' => 'delete', $work['ResumeEmployer']['id']), array('class' => 'icon-trash button'), 'Are you sure you want to delete this?');?>
				<?php echo $this->Html->link('', array('controller' => 'resume_employers','action' => 'edit', $work['ResumeEmployer']['id']), array('class' => 'ajax icon-pencil button'));?>
				<?php echo $work['ResumeEmployer']['name']; ?>
			</li>
		<?php endforeach ?>

		</ul>
		<ul id="projects">

		<?php if (!empty($this->request->data['Project'])): ?>
			<?php foreach ($this->request->data['Project'] as $i => $project):?>
				<li>
					<span class="btn-group">
						<?php echo $this->Html->link('<i class="icon-trash"></i>', array('controller' => 'projects', 'action' => 'delete', $project['id']), array('class' => 'btn btn-mini', 'escape' => false), 'Are you sure you want to delete this?');?>
						<?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'projects', 'action' => 'edit', $project['id']), array('class' => 'ajax btn btn-mini', 'escape' => false));?>
						<?php echo $this->Html->link('<i class="icon-resize-vertical"></i>', array('controller' => 'projects', 'action' => 'move', $project['id']), array('class' => 'btn btn-mini', 'escape' => false)); ?>
					</span>
					<?php echo $this->Form->input("Project.$i.id");?>
					<?php echo $this->Form->input("Project.$i.name"); ?>
					<?php echo $this->Form->input("Project.$i.published"); ?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($projects as $id => $project): ?>
			<li>
				<span class="btn-group">
					<?php echo $this->Html->link('<i class="icon-trash"></i>', array('controller' => 'projects','action' => 'delete', $project['Project']['id']), array('class' => 'btn btn-mini', 'escape' => false), 'Are you sure you want to delete this?');?>
					<?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'projects','action' => 'edit', $project['Project']['id']), array('class' => 'ajax btn btn-mini', 'escape' => false));?>
					<?php echo $this->Html->link('<i class="icon-resize-vertical"></i>', array('controller' => 'projects', 'action' => 'move', $project['Project']['id']), array('class' => 'btn btn-mini', 'escape' => false)); ?>
				</span>
				<?php echo $project['Project']['name'] ?>
			</li>
		<?php endforeach ?>

		</ul>

		<ul id="albums">

		<?php if (!empty($this->request->data['Album'])): ?>
			<?php foreach ($this->request->data['Album'] as $i => $album):?>
				<li>
					<?php echo $this->Html->link('', array('controller' => 'albums', 'action' => 'delete', $album['id']), array('class' => 'icon-trash button'), 'Are you sure you want to delete this?');?>
					<?php echo $this->Html->link('', array('controller' => 'albums', 'action' => 'edit', $album['id']), array('class' => 'ajax icon-pencil button'));?>
					<?php echo $this->Html->link('', array('controller' => 'media_items', 'action' => 'scan', $album['id']), array('class' => 'icon-refresh button')); ?>
					<?php echo $this->Form->input("Album.$i.id");?>
					<?php echo $this->Form->input("Album.$i.name"); ?>
					<?php echo $this->Form->input("Album.$i.published"); ?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($albums as $id => $album): ?>
			<li>
				<?php echo $this->Html->link('', array('controller' => 'albums','action' => 'delete', $album['Album']['id']), array('class' => 'icon-trash button'), 'Are you sure you want to delete this?');?>
				<?php echo $this->Html->link('', array('controller' => 'albums','action' => 'edit', $album['Album']['id']), array('class' => 'ajax icon-pencil button'));?>
				<?php echo $this->Html->link('', array('controller' => 'media_items','action' => 'scan', $album['Album']['id']), array('class' => 'icon-refresh button'));?>
				<?php echo $album['Album']['name']; ?>
			</li>
		<?php endforeach ?>

		</ul>

		<ul id="media">

		<?php if (!empty($this->request->data['MediaItem'])): ?>
			<?php foreach ($this->request->data['MediaItem'] as $i => $item):?>
				<li>
					<?php echo $this->Html->link('', array('controller' => 'media_items', 'action' => 'delete', $item['id']), array('class' => 'icon-trash button'), 'Are you sure you want to delete this?');?>
					<?php echo $this->Html->link('', array('controller' => 'media_items', 'action' => 'edit', $item['id']), array('class' => 'ajax icon-pencil button'));?>
					<?php echo $this->Form->input("MediaItem.$i.id");?>
					<?php echo $this->Form->input("MediaItem.$i.name"); ?>
					<?php echo $this->Form->input("MediaItem.$i.published"); ?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($mediaItems as $id => $item): ?>
			<li>
				<?php echo $this->Html->link('', array('controller' => 'media_items','action' => 'delete', $item['MediaItem']['id']), array('class' => 'icon-trash button'), 'Are you sure you want to delete this?');?>
				<?php echo $this->Html->link('', array('controller' => 'media_items','action' => 'edit', $item['MediaItem']['id']), array('class' => 'ajax icon-pencil button'));?>
				<?php echo $item['MediaItem']['name']; ?>
			</li>
		<?php endforeach ?>

		</ul>

		<ul id="posts">

		<?php if (!empty($this->request->data['Post'])): ?>
			<?php foreach ($this->request->data['Post'] as $i => $post): ?>
				<li>
					<?php echo $this->Html->link('', array('controller' => 'posts', 'action' => 'delete', $post['id']), array('class' => 'icon-trash button'), 'Are you sure you want to delete this?');?>
					<?php echo $this->Form->input("Post.$i.id");?>
					<?php echo $this->Form->input("Post.$i.name"); ?>
					<?php echo $this->Form->input("Post.$i.published"); ?>
				</li>
			<?php endforeach ?>
		<?php endif ?>

		<?php foreach ($posts as $id => $post): ?>
			<li>
				<?php echo $this->Html->link('', array('controller' => 'posts','action' => 'delete', $post['Post']['id']), array('class' => 'icon-trash button'), 'Are you sure you want to delete this?');?>
				<?php echo $this->Html->link('', array('controller' => 'posts','action' => 'edit', $post['Post']['id']), array('class' => 'ajax icon-pencil button'));?>
				<?php echo $post['Post']['subject']; ?>
			</li>
		<?php endforeach ?>

		</ul>
	</div>
<?php echo $this->Form->end(); ?>