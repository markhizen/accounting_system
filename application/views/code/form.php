<div class="container">
	<div class="row">
		<div class="col s12">
			<h1>Add Accounting Code</h1>
			
			<?php echo form_open('','','class="form"'); ?>
				<?php $label_attr = array('class'=>'control-label') ?>

				<div class="form-group <?php echo ((form_error('name') != '') ? 'has-error':''); ?>">
					<?php echo form_label('Name', 'name',$label_attr); ?>
					<?php echo form_input('name', set_value('name'),'class="form-control"'); ?>
					<?php echo form_error('name'); ?>
				</div>

				<div class="form-group <?php echo ((form_error('code') != '') ? 'has-error':''); ?>">
					<?php echo form_label('Code', 'code', $label_attr); ?>
					<?php echo form_input('code', set_value('code'), 'class="form-control"'); ?>	
					<?php echo form_error('code'); ?>
				</div>

				<div class="form-group <?php echo ((form_error('default_post_type') != '') ? 'has-error':''); ?>">
					<?php echo form_label('Defaul Post Type', 'default_post_type', $label_attr); ?>
					<?php echo form_dropdown('default_post_type', array('cr'=>'Credit', 'dr'=>'Debit'), '', 'class="form-control"' ); ?>	
					<?php echo form_error('default_post_type'); ?>
				</div>
	
				<?php echo form_submit('submit', 'Submit', 'class="btn btn-primary"'); ?>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>