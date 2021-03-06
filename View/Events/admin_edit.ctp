<?php echo $this->element('admin_menu');?>
<div class="groups form">
<?php echo $this->Html->link(__('<< 戻る'), array('action' => 'index'))?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php echo ($this->action == 'admin_edit') ? __('編集') :  __('新規イベント'); ?>
		</div>
		<div class="panel-body">
			<?php echo $this->Form->create('Event', Configure::read('form_defaults')); ?>
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('title',	array('label' => __('イベント名')));
				echo $this->Form->input('started', array(
					'type' => 'date',
					'dateFormat' => 'YMD',
					'monthNames' => false,
					'separator' => ' / ',
					'label'=> '開始日',
					'style' => 'width:initial; display: inline;'
				));
				echo $this->Form->input('ended', array(
					'type' => 'date',
					'dateFormat' => 'YMD',
					'monthNames' => false,
					'separator' => ' / ',
					'label'=> '終了日',
					'style' => 'width:initial; display: inline;'
				));
				echo $this->Form->input('opened', array(
					'type' => 'date',
					'dateFormat' => 'YMD',
					'monthNames' => false,
					'separator' => ' / ',
					'label'=> '受付開始日',
					'style' => 'width:initial; display: inline;'
				));
				echo $this->Form->input('closed', array(
					'type' => 'date',
					'dateFormat' => 'YMD',
					'monthNames' => false,
					'separator' => ' / ',
					'label'=> '受付終了日',
					'style' => 'width:initial; display: inline;'
				));
				echo $this->Form->input('content',	array('label' => __('詳細内容')));
				echo $this->Form->input('comment',	array('label' => __('備考')));
			?>
			<div class="form-group">
				<div class="col col-md-9 col-md-offset-3">
					<?php echo $this->Form->submit('保存', Configure::read('form_submit_defaults')); ?>
				</div>
			</div>
		</div>
	</div>
</div>