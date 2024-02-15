<div class="col-sm-12 space-around" id="assignRoles" style="display: none;">
	<div class="alert-info"></div>
	<input type="hidden" id="aRole-modal-title" value="{{Lang::get('Assign Roles')}}">
	<div class="row">
		<div class="col-sm-12 col-lg-12">	
			<label class="col-md-12 control-label">
					<strong>{{ Lang::get("Name:") }}</strong>
					<label id="modalUserName"></label>
			</label>
				
			<label class="col-md-12 control-label">
				<strong>{{ Lang::get("E-Mail Address:") }}</strong>
				<label id="modalUserEmail"></label>		
			</label>
			
		</div>
	</div>
	
	<div class="row space-around">
		<div class="col-sm-12 col-lg-12">
			<div class="panel panel-primary panel-container borrower-admin space-around">
				<form method="post" id="form-user-roles" data-action="{{url('admin/assignRoles')}}">
					<input type="hidden" name="roleUserId" id="roleUserId" value="">
					
					<div class="table-responsive">
						<table class="table tab-fontsize text-left">
							<thead>
								<tr>
									<th class="tab-head text-left">
										{{Lang::get('Role Name')}}
									</th>
									<th class="tab-head text-left">
										{{Lang::get('Actions')}}
									</th>				
								</tr>
							</thead>
							<tbody id="role_list">	
								
							</tbody>
						</table>					
					</div>		
				</form>			
			</div>	<!---panel-->
		</div>
	</div>					
	<div class="aRole-form-buttons" style="display: none">
		<button type="button" class="btn verification-button save_permission" id="save_permission">{{Lang::get('Save')}}</button>
		<img src="{{url('img/loader_64.gif')}}"  width="5%" id="loader" style="display:none;"/>
	</div>
</div>
