<h1><?php  __('Resume Recommendation');?></h1>
<ul class="actions">
		<li><?php echo $this->Html->link(__('Edit Resume Recommendation', true), array('action' => 'edit', $resumeRecommendation['ResumeRecommendation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Resume Recommendation', true), array('action' => 'delete', $resumeRecommendation['ResumeRecommendation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumeRecommendation['ResumeRecommendation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resume Recommendations', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume Recommendation', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add'), array('class' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes', true), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume', true), array('controller' => 'resumes', 'action' => 'add'), array('class' => 'add')); ?> </li>
</ul>
<div class="resumeRecommendations view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeRecommendation['ResumeRecommendation']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeRecommendation['ResumeRecommendation']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeRecommendation['ResumeRecommendation']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Uuid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeRecommendation['ResumeRecommendation']['uuid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Account'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($resumeRecommendation['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $resumeRecommendation['Account']['id']), array('class' => 'view')); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Text'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeRecommendation['ResumeRecommendation']['text']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('First Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeRecommendation['ResumeRecommendation']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeRecommendation['ResumeRecommendation']['last_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Recommendor Uuid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeRecommendation['ResumeRecommendation']['recommendor_uuid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Published'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeRecommendation['ResumeRecommendation']['published']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deleted'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumeRecommendation['ResumeRecommendation']['deleted']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<div class="header">
		<h1><?php __('Related Resumes');?></h1>
		<ul>
			<li><?php echo $this->Html->link(__('New Resume', true), array('controller' => 'resumes', 'action' => 'add'), array('class' => 'add'));?> </li>
		</ul>
	</div>
	<?php if (!empty($resumeRecommendation['Resume'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Purpose'); ?></th>
		<th><?php __('Attachment File Name'); ?></th>
		<th><?php __('Attachment File Size'); ?></th>
		<th><?php __('Attachment Meta Type'); ?></th>
		<th><?php __('Content'); ?></th>
		<th><?php __('Visible'); ?></th>
		<th><?php __('Objective'); ?></th>
		<th><?php __('Summary'); ?></th>
		<th><?php __('Specialties'); ?></th>
		<th><?php __('Associations'); ?></th>
		<th><?php __('Honors'); ?></th>
		<th><?php __('Interests'); ?></th>
		<th><?php __('First Name'); ?></th>
		<th><?php __('Last Name'); ?></th>
		<th><?php __('Account Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($resumeRecommendation['Resume'] as $resume):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $resume['id'];?></td>
			<td><?php echo $resume['created'];?></td>
			<td><?php echo $resume['modified'];?></td>
			<td><?php echo $resume['purpose'];?></td>
			<td><?php echo $resume['attachment_file_name'];?></td>
			<td><?php echo $resume['attachment_file_size'];?></td>
			<td><?php echo $resume['attachment_meta_type'];?></td>
			<td><?php echo $resume['content'];?></td>
			<td><?php echo $resume['visible'];?></td>
			<td><?php echo $resume['objective'];?></td>
			<td><?php echo $resume['summary'];?></td>
			<td><?php echo $resume['specialties'];?></td>
			<td><?php echo $resume['associations'];?></td>
			<td><?php echo $resume['honors'];?></td>
			<td><?php echo $resume['interests'];?></td>
			<td><?php echo $resume['first_name'];?></td>
			<td><?php echo $resume['last_name'];?></td>
			<td><?php echo $resume['account_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'resumes', 'action' => 'view', $resume['id']), array('class' => 'view')); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'resumes', 'action' => 'edit', $resume['id']), array('class' => 'edit')); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'resumes', 'action' => 'delete', $resume['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $resume['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
