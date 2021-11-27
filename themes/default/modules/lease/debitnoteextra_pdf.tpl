<!-- BEGIN: main -->
<!-- BEGIN: vi -->
<!-- BEGIN: form -->
<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}/waitingview" method="post">
	<input type="hidden" name="id" value="{ROW.id}" />
	<input type="hidden" name="compannycode" value="{ROW.company_code}" />
	<input type="hidden" name="compannyid" value="{ROW.companyid}" />
	<input type="hidden" name="status" value="2" />
	<!-- END: form -->
	<div class="form-row">
		<div class="col-md-3 mb-3">
			<label ><strong>{LANG.debitcode_vi}</strong></label>: {ROW.debitcode}			
		</div>
		<div class="col-md-3 mb-3">
			<label for="title">{LANG.product_vi} </label>: {ROW.product}	
		</div>
		<div class="col-md-3 mb-3">
			<label for="title">{LANG.customer_vi} </label>: {ROW.customer}	
		</div>
		
	</div>
	<div class="form-row">
		<div class="col-md-3 mb-3">
			<label for="title">{LANG.debitnotedate_vi} </label>: {ROW.debitnotedate}
			
		</div>
		<div class="col-md-9 mb-3">
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label for="title">{LANG.areareal_vi} </label>: {ROW.areareal} {LANG.m2}
				</div>
				<div class="col-md-3 mb-3">
					<label for="title">{LANG.exchangeusd_vi} </label>: {ROW.exchangeusd}
				</div>
			</div>
		</div>
	</div>
	<div> 
		<label>{LANG.listservice_vi} </label> 
		<div class="col-md-6 mb-3 vi">
			<label ><strong>{LANG.explain_vi}</strong> </label>  : {ROW.explain_vi}
		</div>
		<div  class="vi">
			<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>{LANG.service}</th>
							<th>{LANG.datefrom}</th>
							<th>{LANG.dateto}</th>
							<th>{LANG.price}</th>
							<th>{LANG.amount}</th>
							<th>{LANG.total}</th>
						</tr>
					</thead>
					<tbody >
						<!-- BEGIN: service_vi -->
						<tr >
							<td >{DBN.service}</td>
							<td >{ROW.datefrom}</td>
							<td >{ROW.dateto}</td>
							<td >{DBN.price_vi}</td>
							<td >{DBN.amount}</td>
							<td >{DBN.total_vi}</td>
						</tr>
						<!-- END: service_vi -->
					</tbody>
					<tfoot>
						<tr>
							<th>{LANG.service}</th>
							<th>{LANG.datefrom}</th>
							<th>{LANG.dateto}</th>
							<th>{LANG.price}</th>
							<th>{LANG.amount}</th>
							<th>{LANG.total} [{total_vi}]</th>
						</tr>
					</tfoot>	
				</table>
			</div>
		</div>
		
	</div>
	<div class="form-row">
		<div class="col-md-6 mb-3">
			<div class="col-md-6 mb-3 vi">
				<label for="title">{LANG.recipients_vi}</label>  : {ROW.recipients_vi}
			</div>
		</div>
	</div>
	<div class="vi">
		<div class="form-row">
			<div class="col-md-3 mb-3">
				<label ><strong>{LANG.account_bankvi_vi}</strong> </label> : {ROW.account_bank_vi}
			</div>
			<div class="col-md-3 mb-3">
				<label ><strong>{LANG.holdingvi_vi}</strong> </label>  : {ROW.holding_vi}
			</div>
			<div class="col-md-3 mb-3">
				<label ><strong>{LANG.bank_namevi_vi}</strong> </label>  : {ROW.bank_name_vi}
			</div>
		</div>
		<div class="form-group">
			<label ><strong>{LANG.bank_addressvi_vi}</strong> </label>  : {ROW.bank_address_vi}
		</div>	

	</div>
	<div class="vi">
		<div class="form-row">
			<div class="col-md-3 mb-3">
				<label ><strong>{LANG.account_bankvi_en}</strong> </label> : {ROW.account_bank_en}
			</div>
			<div class="col-md-3 mb-3">
				<label ><strong>{LANG.holdingvi_en}</strong> </label>  : {ROW.holding_en}
			</div>
			<div class="col-md-3 mb-3">
				<label ><strong>{LANG.bank_namevi_en}</strong> </label>  : {ROW.bank_name_en}
			</div>
		</div>
		<div class="form-group">
			<label ><strong>{LANG.bank_addressvi_en}</strong> </label>  : {ROW.bank_address_en}
		</div>	
			
		<div class="form-group">
			<label ><strong>{LANG.note_vi}</strong> </label>
			<div class="col-sm-19 col-md-20">
				 {ROW.node_vi}
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<label ><strong>{LANG.swiftcode}</strong> </label>  : {ROW.swiftcode}

	</div>
	<div class="form-group">
		<label ><strong>{LANG.comapyname_vi}</strong> </label> : {ROW.comapyname_vi}
	</div>
	<div class="form-group">
		<label ><strong>{LANG.manager_name_vi}</strong> </label> : {ROW.manager_name_vi}
	</div>


	<!-- BEGIN: form1 -->
	
</form>
<!-- END: form1 -->
<!-- END: vi -->
<!-- BEGIN: en-->
		<div class="panel panel-default">
		<div class="panel-body">
		<!-- BEGIN: form -->
		<form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}/waitingview" method="post">
			<input type="hidden" name="id" value="{ROW.id}" />
			<input type="hidden" name="compannycode" value="{ROW.company_code}" />
			<input type="hidden" name="compannyid" value="{ROW.companyid}" />
			<input type="hidden" name="status" value="2" />
		<!-- END: form -->
			<div class="form-row">
				
				<div class="col-md-3 mb-3">
					<label ><strong>{LANG.debitcode_en} Debitcode</strong></label> : {ROW.debitcode}			
				</div>
				<div class="col-md-3 mb-3">
					<label for="title">{LANG.product_en} </label> : {ROW.product}	
				</div>
				<div class="col-md-3 mb-3">
					<label for="title">{LANG.customer_en} </label> : {ROW.customer}	
				</div>
				
			</div>

			
			
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label for="title">{LANG.debitnotedate_en} </label> : {ROW.debitnotedate}
					
				</div>
				<div class="col-md-9 mb-3">
					<div class="form-row">
						
						<div class="col-md-3 mb-3">
							<label for="title">{LANG.areareal_en} </label> : {ROW.areareal} {LANG.m2}
						</div>
						<div class="col-md-3 mb-3">
							<label for="title">{LANG.exchangeusd_en} </label> : {ROW.exchangeusd}
						</div>
					</div>
				</div>
			</div>
			<div> 
				<label for="title">{LANG.listservice_en} </label> 

	
				<div class="col-md-6 mb-3 en">
					<label ><strong>{LANG.explain_en}</strong> </label>  : {ROW.explain_en}
				</div>
				
	
				<div  class="en">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>{LANG.service}</th>
									<th>{LANG.datefrom}</th>
									<th>{LANG.dateto}</th>
									<th>{LANG.price}</th>
									<th>{LANG.amount}</th>
									<th>{LANG.total}</th>
								</tr>
							</thead>
							<tbody id="lableservicemainen">
								<tr id="">
									<td colspan="6">{LANG.servicemain_en}</td>
								</tr>
							</tbody>
							<tbody id="servicemainen">
							</tbody>
							<tbody id="lableserviceextraen">
								<tr id="">
									<td colspan="6">{LANG.serviceextra_en}</td>
								</tr>
							</tbody>
							<tbody id="serviceextraen">
							</tbody>
							<tfoot>
								<tr>
									<th>{LANG.service}</th>
									<th>{LANG.datefrom}</th>
									<th>{LANG.dateto}</th>
									<th>{LANG.price}</th>
									<th>{LANG.amount}</th>
									<th>{LANG.total}</th>
								</tr>
							</tfoot>	
						</table>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<div class="col-md-6 mb-3 en">
						<label ><strong>{LANG.recipients_en}</strong> </label>  : {ROW.recipients_en}
					</div>
				</div>
			</div>
	
			
			<div class="en">
				<div class="form-row">
					<div class="col-md-3 mb-3">
						<label ><strong>{LANG.account_banken_vi}</strong> </label>  : {ROW.account_bank_en}
					</div>
					<div class="col-md-3 mb-3">
						<label ><strong>{LANG.holding_en}</strong> </label> : {ROW.holding_en}
					</div>
					<div class="col-md-3 mb-3">
						<label ><strong>{LANG.bank_name_en}</strong> </label>  : {ROW.bank_name_en}
					</div>
				</div>
				<div class="form-group">
					<label ><strong>{LANG.bank_address_en}</strong> </label>  : {ROW.bank_address_en}

				</div>
				<div class="form-group">
					<label ><strong>{LANG.note_en}</strong> </label>
					<div class="col-sm-19 col-md-20">
						  {ROW.note_en}
					</div>
				</div>
			</div>
			
			
			<div class="form-group">
				<label ><strong>{LANG.swiftcode}</strong> </label>  : {ROW.swiftcode}

			</div>
			
		

			<div class="en">
				<div class="form-group">
					<label ><strong>{LANG.comapyname_en}</strong> </label>  : {ROW.comapyname_en}
	
				</div>
				<div class="form-group">
					<label ><strong>{LANG.manager_name_en}</strong> </label> : {ROW.manager_name_en}
				</div>
			</div>

			<!-- BEGIN: form1 -->
		</form>
		<!-- END: form1 -->
		</div></div>
<!-- END: en -->
<!-- END: main -->
