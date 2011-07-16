<header>
	<hgroup><h1><?php __('Resume Skills');?></h1></hgroup>
	<ul class="actions">
		<li><?php echo $this->Html->link(__('New Resume Skill', true), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Accounts', true), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Account', true), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Resumes', true), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Resume', true), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
	</ul>
</header>
<article class="resumeSkills index">
	<header>
		<h3>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Record %start% to %end% of %count% total', true)
		));
		?></h3>
		<p class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</p>
	</header>
	<?php echo $this->Batch->create('ResumeSkill')?>	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('uuid');?></th>
			<th><?php echo $this->Paginator->sort('account_id');?></th>
			<th><?php echo $this->Paginator->sort('years');?></th>
			<th><?php echo $this->Paginator->sort('proficiency');?></th>
			<th class="actions"><?php __('Actions');?><?php echo $this->Batch->all()?></th>
	</tr>
	<?php
		echo $this->Batch->filter(array(
			'id',
			null,
			'name',
			'uuid',
			'account_id' => array('empty' => '-- None --'),
			'years',
			'proficiency'
		));
	$i = 0;
	foreach ($resumeSkills as $resumeSkill):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $resumeSkill['ResumeSkill']['id']; ?>&nbsp;</td>
		<td><?php echo $resumeSkill['ResumeSkill']['created']; ?>&nbsp;</td>
		<td><?php echo $resumeSkill['ResumeSkill']['name']; ?>&nbsp;</td>
		<td><?php echo $resumeSkill['ResumeSkill']['uuid']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resumeSkill['Account']['type'], array('controller' => 'accounts', 'action' => 'view', $resumeSkill['Account']['id'])); ?>
		</td>
		<td><?php echo $resumeSkill['ResumeSkill']['years']; ?>&nbsp;</td>
		<td><?php echo $resumeSkill['ResumeSkill']['proficiency']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $resumeSkill['ResumeSkill']['id']), array('class' => 'view')); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $resumeSkill['ResumeSkill']['id']), array('class' => 'edit')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $resumeSkill['ResumeSkill']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $resumeSkill['ResumeSkill']['id'])); ?>
			<?php echo $this->Batch->checkbox($resumeSkill['ResumeSkill']['id']); ?>
		</td>
	</tr>
	<?php endforeach;
		echo $this->Batch->batch(array(
			'id',
			null,
			'name',
			'uuid',
			'account_id' => array('empty' => '-- None --'),
			'years',
			'proficiency'
		));?> 
	</table>
	<?php echo $this->Batch->end()?> 
	<footer>
		<p class="paging">
			<?php echo $this->Paginator->prev();?>
			<?php echo $this->Paginator->numbers(array('separator' => ''));?>
			<?php echo $this->Paginator->next();?>
		</p>
	</footer>
</article>