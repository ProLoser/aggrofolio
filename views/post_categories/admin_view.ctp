<h1><?php  __('Post Category');?></h1>
<ul class="actions">
		<li><?php echo $this->Html->link(__('Edit Post Category', true), array('action' => 'edit', $postCategory['PostCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Post Category', true), array('action' => 'delete', $postCategory['PostCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $postCategory['PostCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Post Categories', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post Category', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts', true), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post', true), array('controller' => 'posts', 'action' => 'add'), array('class' => 'add')); ?> </li>
</ul>
<div class="postCategories view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $postCategory['PostCategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $postCategory['PostCategory']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $postCategory['PostCategory']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $postCategory['PostCategory']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $postCategory['PostCategory']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $postCategory['PostCategory']['parent_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lft'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $postCategory['PostCategory']['lft']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rght'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $postCategory['PostCategory']['rght']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<div class="header">
		<h1><?php __('Related Posts');?></h1>
		<ul>
			<li><?php echo $this->Html->link(__('New Post', true), array('controller' => 'posts', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</div>
	<?php if (!empty($postCategory['Post'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Subject'); ?></th>
		<th><?php __('Body'); ?></th>
		<th><?php __('Url'); ?></th>
		<th><?php __('Slug'); ?></th>
		<th><?php __('Post Category Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($postCategory['Post'] as $post):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $post['id'];?></td>
			<td><?php echo $post['created'];?></td>
			<td><?php echo $post['modified'];?></td>
			<td><?php echo $post['subject'];?></td>
			<td><?php echo $post['body'];?></td>
			<td><?php echo $post['url'];?></td>
			<td><?php echo $post['slug'];?></td>
			<td><?php echo $post['post_category_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'posts', 'action' => 'view', $post['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'posts', 'action' => 'edit', $post['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'posts', 'action' => 'delete', $post['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
