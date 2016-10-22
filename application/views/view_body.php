	<div class="container" width="100%">
      	<table class="striped" id="item_table" style="padding: 10px; margin: 20px;">
	        <thead>
	          	<tr>
	              	<th data-field="id">Date</th>
	              	<th data-field="name">Cash</th>
	              	<th data-field="price">Capital</th>
	              	<th>Actions</th>
	          	</tr>
	        </thead>

	        <tbody>
	          	<tr>
	          	<?php 
	          		foreach ($info as $info):
	          	?>	
	            	<td><?php echo $info['date']; ?></td>
	            	<td align="right"><?php echo number_format($info['cash'],2); ?></td>
	            	<td align="right"><?php echo number_format($info['capital'],2); ?></td>
	            	<td><a href="<?php echo site_url('Welcome/view_income_statement/'.$info['id'].'') ?>">Income Statement</a> | <a href="<?php echo site_url('Welcome/view_trial_balance/'.$info['id'].'')?>">Balance Sheet</a> | <a href="<?php echo site_url('Welcome/view_trial_balance/'.$info['id'].'') ?>">Posting</a> | <a class="waves-effect waves-light btn modal-trigger" href="#trial_balance">Trial Balance</a></td>
	          	</tr>
	          	<?php
	          		endforeach;
	          	?>

	        </tbody> 
      	</table>
	</div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
	<div class="modal-content" style="padding:none;">
  		<h5>Journal</h5>
		    <form id="journal_form" class="row col s12">
			  <div class="row">
		        <div class="input-field col s4">
		          <h6>ACCOUNT TITLE</h6>
		        </div>
		        <div class="input-field col s4">
		          <h6>DEBIT</h6>
		        </div>
		        <div class="input-field col s4">
		          <h6>CREDIT</h6>
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s4">
		          <h6>Cash</h6>
		        </div>
		        <div class="input-field col s4">
		          <input placeholder="enter amount" id="cash" name="cash" type="text" class="datepicker validate">
		        </div>
		        <div class="input-field col s4">
		          
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s4">
		          <h6>Capital</h6>
		        </div>
		        <div class="input-field col s4">
		          
		        </div>
		        <div class="input-field col s4">
		          <input placeholder="enter amount" id="capital" name="capital" type="text" class="datepicker validate">
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s4">
		          <h6>Note Payable</h6>
		        </div>
		        <div class="input-field col s4">
		          
		        </div>
		        <div class="input-field col s4">
		          <input placeholder="enter amount" id="note_payable" name="note_payable" type="text" class="datepicker validate">
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s4">
		          <h6>Account Receivable</h6>
		        </div>
		        <div class="input-field col s4">
		          <input placeholder="enter amount" id="account_receivable" name="account_receivable" type="text" class="datepicker validate">
		        </div>
		        <div class="input-field col s4">
		          
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s4">
		          <h6>Supplies</h6>
		        </div>
		        <div class="input-field col s4">
		         
		        </div>
		        <div class="input-field col s4">
		          <input placeholder="enter amount" id="supplies" name="supplies" type="text" class="datepicker validate">
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s4">
		          <h6>Equipment</h6>
		        </div>
		        <div class="input-field col s4">
		          <input placeholder="enter amount" id="equipment" name="equipment" type="text" class="datepicker validate">
		        </div>
		        <div class="input-field col s4">
		          
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s4">
		          <h6>Salary Expense</h6>
		        </div>
		        <div class="input-field col s4">
		          
		        </div>
		        <div class="input-field col s4">
		          <input placeholder="enter amount" id="salary_expense" name="salary_expense" type="text" class="datepicker validate">
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s4">
		          <h6>Utility Expense</h6>
		        </div>
		        <div class="input-field col s4">
		          
		        </div>
		        <div class="input-field col s4">
		          <input placeholder="enter amount" id="utility_expense" name="utility_expense" type="text" class="datepicker validate">
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s4">
		          <h6>Rental Expense</h6>
		        </div>
		        <div class="input-field col s4">
		          
		        </div>
		        <div class="input-field col s4">
		          <input placeholder="enter amount" id="rental_expense" name="rental_expense" type="text" class="datepicker validate">
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s4">
		          <h6>Advertisement Expense</h6>
		        </div>
		        <div class="input-field col s4">
		          
		        </div>
		        <div class="input-field col s4">
		          <input placeholder="enter amount" id="advertisement_expense" name="advertisement_expense" type="text" class="datepicker validate">
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s4">
		          <h6>Miscellaneous Expense</h6>
		        </div>
		        <div class="input-field col s4">
		          
		        </div>
		        <div class="input-field col s4">
		          <input placeholder="enter amount" id="miscellaneous_expense" name="miscellaneous_expense" type="text" class="datepicker validate">
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s4">
		          <h6>Furniture</h6>
		        </div>
		        <div class="input-field col s4">
		          <input placeholder="enter amount" id="furniture" name="furniture" type="text" class="datepicker validate">
		        </div>
		        <div class="input-field col s4">
		          
		        </div>
		      </div>

		    </form>
	</div>

	<div class="modal-footer">
		<a href="#!" id="save_btn" class=" modal-action waves-effect waves-green btn-flat">Save</a>
		<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
	</div>
</div>


<script>
	$(function(){
		$("#save_btn").on('click', function(e){
			e.preventDefault();

			var form = $("#journal_form");

			var data = form.serialize();

			$.post($base_url + 'welcome/save' , data, function(result){

				alert(result.msg);

			}, 'json');



		});
	});
</script>