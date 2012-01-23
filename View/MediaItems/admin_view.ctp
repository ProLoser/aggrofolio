<header>
	<hgroup>
		<h1><?php echo __('Media Item');?></h1>
	</hgroup>
	<ul class="actions">
			<li><?php echo $this->Html->link(__('Edit Media Item'), array('action' => 'edit', $mediaItem['MediaItem']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('Delete Media Item'), array('action' => 'delete', $mediaItem['MediaItem']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $mediaItem['MediaItem']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Media Items'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Media Item'), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add'), array('class' => 'add')); ?> </li>
	</ul>
</header>
<article class="mediaItems view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaItem['MediaItem']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaItem['MediaItem']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaItem['MediaItem']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaItem['MediaItem']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Attachment File Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($mediaItem['MediaItem']['attachment_file_name'], '/uploads/media/original-' . $mediaItem['MediaItem']['attachment_file_name']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Attachment File Size'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaItem['MediaItem']['attachment_file_size']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Attachment Meta Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaItem['MediaItem']['attachment_meta_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($mediaItem['MediaItem']['url'], $mediaItem['MediaItem']['url']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Source'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaItem['MediaItem']['source']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Album'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($mediaItem['Album']['name'], array('controller' => 'albums', 'action' => 'view', $mediaItem['Album']['id']), array('class' => 'view')); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaItem['MediaItem']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Published'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaItem['MediaItem']['published']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Uuid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mediaItem['MediaItem']['uuid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Thumbnail'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->image('/uploads/media/thumb-' . $mediaItem['MediaItem']['attachment_file_name']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Fullsize'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->image('/uploads/media/original-' . $mediaItem['MediaItem']['attachment_file_name']); ?>
			&nbsp;
		</dd>
	</dl>
</article>
