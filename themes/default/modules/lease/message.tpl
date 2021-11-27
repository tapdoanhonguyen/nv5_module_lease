<!-- BEGIN: main -->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset={SITE_CHARSET}" />
		<style type="text/css">
			.content {
				COLOR: #333;
				FONT: 13px Arial, Helvetica, sans-serif;
				MARGIN: 15px 0px 20px 0px;
			}

			.footer {
				COLOR: #333;
				FONT: 12px Arial, Helvetica, sans-serif;
			}

			.sitename {
				COLOR: #333;
				FONT: bold 17px Arial, Helvetica, sans-serif;
				MARGIN: 5px 0px 5px 0px;
			}

			.subtitle {
				COLOR: #333;
				FONT: bold 12px Arial, Helvetica, sans-serif;
			}

			.subtitle A, .footer A {
				COLOR: #333;
				TEXT-DECORATION: underline;
			}

			.title {
				COLOR: #F00;
				FONT: bold 14px Arial, Helvetica, sans-serif;
				MARGIN: 15px 0px 5px 0px;
			}

			.footer A:hover, .content A:hover {
				COLOR: #F00;
			}

			.subtitle A:hover {
				COLOR: #F00;
				TEXT-DECORATION: none;
			}
		</style>
	</head>
	<body>
		<div class="sitename">
			{SITE_NAME} - {SITE_SLOGAN}
		</div>
		<div class="subtitle">
			Email: <a href="mailto:{SITE_EMAIL}">{SITE_EMAIL}</a>&nbsp;&nbsp; Tel: {SITE_FONE}&nbsp;&nbsp; Website: <a href="{SITE_URL}">{SITE_URL}</a>
		</div>
		<hr/>
		<div class="title">
			{TITLE}
		</div>
		<div class="content">
			<div class="form-row">
				
				<div class="col-md-3 mb-3">
					<label ><strong>{LANG.debitcode}</strong></label> : {ROW.debitcode}			
				</div>
				<div class="col-md-3 mb-3">
					<label for="title">{LANG.product} </label> : {ROW.product}	
				</div>
				<div class="col-md-3 mb-3">
					<label for="title">{LANG.customer} </label> : {ROW.customer}	
				</div>
				
			</div>

			
			
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label for="title">{LANG.debitnotedate} </label> : {ROW.debitnotedate}
					
				</div>
				<div class="col-md-9 mb-3">
					<div class="form-row">
						
						<div class="col-md-3 mb-3">
							<label for="title">{LANG.areareal} </label> : {ROW.areareal} {LANG.m2}
						</div>
						<div class="col-md-3 mb-3">
							<label for="title">{LANG.exchangeusd} </label> : {ROW.exchangeusd}
						</div>
					</div>
				</div>
			</div>
			<div> 
				<label for="title">{LANG.listservice} </label> 

				<div class="col-md-6 mb-3 vi">
					<label ><strong>{LANG.explain_vi}</strong> </label>  : {ROW.explain_vi}
				</div>
				<div class="col-md-6 mb-3 en">
					<label ><strong>{LANG.explain_en}</strong> </label>  : {ROW.explain_en}
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
					<div class="col-md-6 mb-3 vi">
						<label for="title">{LANG.recipients_vi}</label>  : {ROW.recipients_vi}
					</div>
					<div class="col-md-6 mb-3 en">
						<label ><strong>{LANG.recipients_en}</strong> </label>  : {ROW.recipients_en}
					</div>
				</div>
			</div>
	
			<div class="vi">
				<div class="form-row">
					<div class="col-md-3 mb-3">
						<label ><strong>{LANG.account_bank_vi}</strong> </label> : {ROW.account_bank_vi}
					</div>
					<div class="col-md-3 mb-3">
						<label ><strong>{LANG.holding_vi}</strong> </label>  : {ROW.holding_vi}
					</div>
					<div class="col-md-3 mb-3">
						<label ><strong>{LANG.bank_name_vi}</strong> </label>  : {ROW.bank_name_vi}
					</div>
				</div>
				<div class="form-group">
					<label ><strong>{LANG.bank_address_vi}</strong> </label>  : {ROW.bank_address_vi}
				</div>	
					
				<div class="form-group">
					<label ><strong>{LANG.note_vi}</strong> </label>
					<div class="col-sm-19 col-md-20">
						 {ROW.node_vi}
					</div>
				</div>
			
			</div>
			<div class="en">
				<div class="form-row">
					<div class="col-md-3 mb-3">
						<label ><strong>{LANG.account_bank_en}</strong> </label>  : {ROW.account_bank_en}
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
			
			
			
			<div class="form-group">
				<label ><strong>{LANG.comapyname_vi}</strong> </label> : {ROW.comapyname_vi}

			</div>
	
			<input class="form-control" type="hidden" name="manager_name_vi" value="{ROW.manager_name_vi}"  />

			<div class="en">
				<div class="form-group">
					<label ><strong>{LANG.comapyname_en}</strong> </label>  : {ROW.comapyname_en}
	
				</div>
				

				<input class="form-control" type="hidden" name="manager_name_en" value="{ROW.manager_name_en}"  />
			</div>
				<div class="form-group">
					<label ><strong>{LANG.note}</strong></label>
					<div class="col-sm-19 col-md-20">
						  {ROW.note}
					</div>
				</div>
		</div>
		<hr/>
		<div class="footer">
			{AUTHOR_SIG},
			<br/>
			<br/>
			{AUTHOR_NAME}
			<br/>
			{AUTHOR_POS}
			<br/>
			Contact: <a href="mailto:{AUTHOR_EMAIL}">{AUTHOR_EMAIL}</a>
		</div>
	</body>
</html>
<!-- END: main -->