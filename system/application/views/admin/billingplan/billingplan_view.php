<?php $this->load->view('admin/header') ?>

<h1><?=$h1?></h1>


<table class="stripe">
<tbody>
	<tr>
		<th>id</th>
		<th>Name</th>
		<th>Type</th>
		<th>Amount</th>
		<th>Price</th>
		<th>DL rate</th>
		<th>Up rate</th>
		<th>Created by</th>
		<th></th>
	</tr>

<?php foreach ($query->result() as $row): ?>
	<tr>
		<td><?=$row->id?></td>
		<td><?=$row->name?></td>
		<td><?=$row->type?></td>
		<td><?=$row->amount?></td>
		<td><?=$this->config->item('currency_symbol')?><?=number_format($row->price,2)?></td>
		<td><?=$row->bw_download?></td>
		<td><?=$row->bw_upload?></td>
		<td><?=$row->created_by?></td>
		<td><?=anchor('admin/billingplan/delete/'.$row->id.'/'.$row->name,'del','class="delete" onClick="return confirm(\'Delete Billing Plan'.' '.$row->name.'? CAUTION IT WILL DELETE ALL '.$row->name.' VOUCHERS\')"')?></td>
	</tr>
<?php endforeach;?>
</tbody>
</table>

<?=$this->easyhotspot_validation->error_string;?>

<?=form_open('admin/billingplan')?>
<ul>
	
	<li><label>Name</label>
	<?= form_input('name')?> <acronym title="The name of billing plan">?</acronym></li>
	<li><label>Type</label>
	<?= form_dropdown('type',array('time'=>'Time Bassed','packet'=>'Packet Bassed'))?> <acronym title="Type of the hotspot billing">?</acronym></li>
	<li><label>Amount</label>
	<?= form_input(array('size'=>'5','name'=>'amount'))?><acronym title="Time : in Minutes, Packet : in MegaByte">?</acronym></li>
	<li><label>Price</label>
	<?= form_input(array('size'=>'5','name'=>'price'))?> <acronym title="The price of billing plan">?</acronym></li>
	<li><label>Download Rate</label>
	<?= form_dropdown('bw_download',array(''=>'default','32'=>'32 kbps','64'=>'64 kbps', '128' => '128 kbps', '256'=>'256 kbps', '512'=>'512 kbps','1024'=>'1 MBps','2048'=>'2 MBps'))?> <acronym title="The maximum of download rate">?</acronym></li>
	<li><label>Upload Rate</label>
	<?= form_dropdown('bw_upload',array(''=>'default','32'=>'32 kbps','640'=>'64 kbps', '128' => '128 kbps', '256'=>'256 kbps', '512'=>'512 kbps','1024'=>'1 MBps','2048'=>'2 MBps'))?> <acronym title="The maximum of upload rate">?</acronym></li>
	<li><label>Idle Timeout</label>
	<?= form_input(array('size'=>'5','name'=>'IdleTimeout'))?><acronym title="Disconnect user when there is no activity within the given minute">?</acronym></li>
</ul>
	<?=form_hidden('created_by',$this->db_session->userdata('user_name'))?>
<input type="submit" value="Add Billing Plan" class="submit"  />
<?=form_close()?>
<? $this->load->view('footer'); ?>
