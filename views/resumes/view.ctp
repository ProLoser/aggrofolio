<div class="resumes view">
<h2><?php  __('Resume');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Purpose'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['purpose']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Attachment File Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['attachment_file_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Attachment File Size'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['attachment_file_size']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Attachment Meta Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['attachment_meta_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Content'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['content']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Visible'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['visible']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Objective'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resume['Resume']['objective']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Resume', true), array('action' => 'edit', $resume['Resume']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Resume', true), array('action' => 'delete', $resume['Resume']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resume['Resume']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Recommendations', true), array('controller' => 'resume_recommendations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Recommendation', true), array('controller' => 'resume_recommendations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Resume Recommendations');?></h3>
	<?php if (!empty($resume['ResumeRecommendation'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Uui'); ?></th>
		<th><?php __('Account Id'); ?></th>
		<th><?php __('Text'); ?></th>
		<th><?php __('First Name'); ?></th>
		<th><?php __('Last Name'); ?></th>
		<th><?php __('Recommendor Id'); ?></th>
		<th><?php __('Published'); ?></th>
		<th><?php __('Deleted'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($resume['ResumeRecommendation'] as $resumeRecommendation):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $resumeRecommendation['id'];?></td>
			<td><?php echo $resumeRecommendation['created'];?></td>
			<td><?php echo $resumeRecommendation['type'];?></td>
			<td><?php echo $resumeRecommendation['uui'];?></td>
			<td><?php echo $resumeRecommendation['account_id'];?></td>
			<td><?php echo $resumeRecommendation['text'];?></td>
			<td><?php echo $resumeRecommendation['first_name'];?></td>
			<td><?php echo $resumeRecommendation['last_name'];?></td>
			<td><?php echo $resumeRecommendation['recommendor_id'];?></td>
			<td><?php echo $resumeRecommendation['published'];?></td>
			<td><?php echo $resumeRecommendation['deleted'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'resume_recommendations', 'action' => 'view', $resumeRecommendation['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'resume_recommendations', 'action' => 'edit', $resumeRecommendation['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'resume_recommendations', 'action' => 'delete', $resumeRecommendation['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumeRecommendation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Resume Recommendation', true), array('controller' => 'resume_recommendations', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
