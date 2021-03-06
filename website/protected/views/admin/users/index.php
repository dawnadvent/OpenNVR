<div class="col-sm-12">
	<?php
	if(Yii::app()->user->hasFlash('notify')) {
		$notify = Yii::app()->user->getFlash('notify');
		?>
		<div class="alert alert-<?php echo $notify['type']; ?>"><?php echo $notify['message']; ?>.</div>
		<?php } ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<ul class="nav nav-tabs">
					<li class='active' id='admins'>
						<?php echo CHtml::link(Yii::t('admin', 'Admins'), '#'); ?>
					</li>
					<li class='' id='operators'>
						<?php echo CHtml::link(Yii::t('admin', 'Operators'), '#'); ?>
					</li>
					<li class='' id='viewers'>
						<?php echo CHtml::link(Yii::t('admin', 'Viewers'), '#'); ?>
					</li>
					<li class='' id='banned'>
						<?php echo CHtml::link(Yii::t('admin', 'Banned'), '#'); ?>
					</li>
					<li class='' id='all_others'>
						<?php echo CHtml::link(Yii::t('admin', 'All others'), '#'); ?>
					</li>
				</ul>
			</div>
			<div class="panel-body" id="admins_tab">
				<?php
				if(!empty($admins)) {
					?>
					<table class="table table-striped">
						<thead>
							<th><?php echo CHtml::activeCheckBox($form, "checkAllA", array ("class" => "checkAllA")); ?></th>
							<th>#</th>
							<th><?php echo Yii::t('admin', 'Nick'); ?></th>
							<th><?php echo Yii::t('admin', 'Email'); ?></th>
						</thead>
						<tbody>
							<?php
							echo CHtml::beginForm($this->createUrl('admin/users'), "post");
							foreach ($admins as $key => $user) {
								echo '<tr>
								<td>'.CHtml::activeCheckBox($form, 'auser_'.$user->id).'</td>
								<td>'.($key+1).'</td>
								<td>'.CHtml::encode($user->nick).'</td>
								<td>'.CHtml::encode($user->email).'</td>
								</tr>';
							}
							?>
							<tr>
								<td colspan="2"><?php echo Yii::t('cams', 'Mass actions: '); ?></td>
								<td><?php echo CHtml::submitButton(Yii::t('admin', 'LevelDown'), array('name' => 'dismiss', 'class' => 'btn btn-primary')); ?></td>
								<td><?php echo CHtml::submitButton(Yii::t('admin', 'Ban'), array('name' => 'ban', 'class' => 'btn btn-danger')); ?></td>
							</tr>
							<?php echo CHtml::endForm(); ?>
						</tbody>
					</table>
					<?php
				} else {
					echo Yii::t('admin', 'Admins list is empty.<br/>');
				}
				?>
			</div>
			<div class="panel-body" id="operators_tab" style="display:none">
				<?php
				if(!empty($operators)) {
					?>
					<table class="table table-striped">
						<thead>
							<th><?php echo CHtml::activeCheckBox($form, "checkAllO", array ("class" => "checkAllO")); ?></th>
							<th>#</th>
							<th><?php echo Yii::t('admin', 'Nick'); ?></th>
							<th><?php echo Yii::t('admin', 'Email'); ?></th>
						</thead>
						<tbody>
							<?php
							echo CHtml::beginForm($this->createUrl('admin/users'), "post");
							foreach ($operators as $key => $user) {
								echo '<tr>
								<td>'.CHtml::activeCheckBox($form, 'ouser_'.$user->id).'</td>
								<td>'.($key+1).'</td>
								<td>'.CHtml::encode($user->nick).'</td>
								<td>'.CHtml::encode($user->email).'</td>
								</tr>';
							}
							?>
							<tr>
								<td colspan="1"><?php echo Yii::t('cams', 'Mass actions: '); ?></td>
								<td><?php echo CHtml::submitButton('LevelUp', array('name' => 'levelup', 'class' => 'btn btn-success')); ?></td>
								<td><?php echo CHtml::submitButton('LevelDown', array('name' => 'dismiss', 'class' => 'btn btn-primary')); ?></td>
								<td><?php echo CHtml::submitButton('Ban', array('name' => 'ban', 'class' => 'btn btn-danger')); ?></td>
							</tr>
							<?php echo CHtml::endForm(); ?>
						</tbody>
					</table>
					<?php
				} else {
					echo Yii::t('admin', 'Operators list is empty<br/>');
				}
				?>
			</div>
			<div class="panel-body" id="viewers_tab" style="display:none">
				<?php
				echo CHtml::link(Yii::t('admin', 'Add user'), $this->createUrl('admin/addUser'), array('class' => 'btn btn-success'));
				if(!empty($viewers)) {
					?>
					<table class="table table-striped">
						<thead>
							<th><?php echo CHtml::activeCheckBox($form, "checkAllV", array ("class" => "checkAllV")); ?></th>
							<th>#</th>
							<th><?php echo Yii::t('admin', 'Nick'); ?></th>
							<th><?php echo Yii::t('admin', 'Email'); ?></th>
						</thead>
						<tbody>
							<?php
							echo CHtml::beginForm($this->createUrl('admin/users'), "post");
							foreach ($viewers as $key => $user) {
								echo '<tr>
								<td>'.CHtml::activeCheckBox($form, 'vuser_'.$user->id).'</td>
								<td>'.($key+1).'</td>
								<td>'.CHtml::encode($user->nick).'</td>
								<td>'.CHtml::encode($user->email).'</td>
								</tr>';
							}
							?>
							<tr>
								<td colspan="2"><?php echo Yii::t('cams', 'Mass actions: '); ?></td>
								<td><?php echo CHtml::submitButton('LevelUp', array('name' => 'levelup', 'class' => 'btn btn-success')); ?></td>
								<td><?php echo CHtml::submitButton('Ban', array('name' => 'ban', 'class' => 'btn btn-danger')); ?></td>
							</tr>
							<?php echo CHtml::endForm(); ?>
						</tbody>
					</table>
					<?php
				} else {
					echo Yii::t('admin', 'Viewers list is empty<br/>');
				}
				?>
			</div>
			<div class="panel-body" id="banned_tab" style="display:none">
				<?php
				if(!empty($banned)) {
					?>
					<table class="table table-striped">
						<thead>
							<th><?php echo CHtml::activeCheckBox($form, "checkAllZ", array ("class" => "checkAllZ")); ?></th>
							<th>#</th>
							<th><?php echo Yii::t('admin', 'Nick'); ?></th>
							<th><?php echo Yii::t('admin', 'Email'); ?></th>
						</thead>
						<tbody>
							<?php
							echo CHtml::beginForm($this->createUrl('admin/users'), "post");
							foreach ($banned as $key => $user) {
								echo '<tr>
								<td>'.CHtml::activeCheckBox($form, 'zuser_'.$user->id).'</td>
								<td>'.($key+1).'</td>
								<td>'.CHtml::encode($user->nick).'</td>
								<td>'.CHtml::encode($user->email).'</td>
								</tr>';
							}
							?>
							<tr>
								<td colspan="3"><?php echo Yii::t('cams', 'Mass actions: '); ?></td>
								<td><?php echo CHtml::submitButton(Yii::t('admin', 'Unban'), array('name' => 'unban', 'class' => 'btn btn-primary')); ?></td>
							</tr>
							<?php echo CHtml::endForm(); ?>
						</tbody>
					</table>
					<?php
				} else {
					echo Yii::t('admin', 'Banned list is empty<br/>');
				}
				?>
			</div>
			<div class="panel-body" id="all_others_tab" style="display:none">
				<?php
				if(!empty($all)) {
					?>
					<table class="table table-striped">
						<thead>
							<th><?php echo CHtml::activeCheckBox($form, "checkAll", array ("class" => "checkAll")); ?></th>
							<th>#</th>
							<th><?php echo Yii::t('admin', 'Nick'); ?></th>
							<th><?php echo Yii::t('admin', 'Email'); ?></th>
							<th><?php echo Yii::t('admin', 'Status'); ?></th>
						</thead>
						<tbody>
							<?php
							echo CHtml::beginForm($this->createUrl('admin/users'), "post");
							foreach ($all as $key => $user) {
								echo '<tr>
								<td>'.CHtml::activeCheckBox($form, 'user_'.$user->id).'</td>
								<td>'.($key+1).'</td>
								<td>'.CHtml::encode($user->nick).'</td>
								<td>'.CHtml::encode($user->email).'</td>
								<td>'.($user->status == 1 ? Yii::t('admin', 'Activated') : Yii::t('admin', 'Not activated')).'</td>
								</tr>';
							}
							?>
							<tr>
								<td colspan="2">
									<?php echo Yii::t('cams', 'Mass actions: '); ?>
								</td>
								<td><?php echo CHtml::submitButton(Yii::t('admin', 'Activate'), array('name' => 'active', 'class' => 'btn btn-primary')); ?></td>
								<td><?php echo CHtml::submitButton(Yii::t('admin', 'Ban'), array('name' => 'ban', 'class' => 'btn btn-danger')); ?></td>
							</tr>
							<?php echo CHtml::endForm(); ?>
						</tbody>
					</table>
					<?php
				} else {
					echo Yii::t('admin', 'Users list is empty<br/>');
				}
				?>
			</div>
		</div>
	</div>
	<script>
	$(document).ready(function(){
		$(".checkAll").click(function(){
			$('input[id*="UsersForm_user_"]').not(this).prop('checked', this.checked);
		});
		$(".checkAllA").click(function(){
			$('input[id*="UsersForm_auser_"]').not(this).prop('checked', this.checked);
		});		
		$(".checkAllO").click(function(){
			$('input[id*="UsersForm_ouser_"]').not(this).prop('checked', this.checked);
		});
		$(".checkAllZ").click(function(){
			$('input[id*="UsersForm_zuser_"]').not(this).prop('checked', this.checked);
		});			
		$(".checkAllV").click(function(){
			$('input[id*="UsersForm_vuser_"]').not(this).prop('checked', this.checked);
		});
		$('.nav-tabs li').click(function(){
			$(".nav-tabs li").removeClass("active");
			$("#"+this.id).addClass("active");
			$(".panel-body").hide();
			$("#"+this.id+"_tab").show();
		});
	});
	</script>