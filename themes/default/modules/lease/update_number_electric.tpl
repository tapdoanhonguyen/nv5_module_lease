<!-- BEGIN: main -->
<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th class="w100">
				STT
			</th>
			<th class="text-center">
				Sản phẩm 
			</th>
			<th class="text-center">
				Khách hàng
			</th>
			<th class="text-center">
				Số điện cũ
			</th>
			<th class="text-center">
				Số điện mới
			</th>
			<th class="text-center">
				Số sử dụng
			</th>
			
		</tr>
	</thead>
	<!-- BEGIN: generate_page -->
	<tfoot>
		<tr>
			<td class="text-center" colspan="11">{NV_GENERATE_PAGE}</td>
		</tr>
	</tfoot>
	<!-- END: generate_page -->
	<tbody>
		<!-- BEGIN: product -->
		<tr class="text-center">
			<td>
				{product.stt} - {product.info_service_extra}- {product.info_customer.cid}
			</td>
			<td>
				{product.title_vi}
			</td>
			<td>
				{product.info_customer.title}
			</td>
			<td>
				<input type="number" step="0.1" name="number_old_{product.pid}" id="number_old_{product.pid}" value ="{product.number_old}" class="form-control" placeholder="Nhập số  cũ" onkeyup="get_number_electric_{product.pid}()" readonly="">
			</td>
			<td>
				<input type="number" step="0.1" name="number_new" id="number_new_{product.pid}" class="form-control" placeholder="Nhập số  mới" onkeyup="get_number_electric_{product.pid}()">
			</td>
			<td>
				<input type="number" step="0.1" name="number_use" id="number_use_{product.pid}" class="form-control" placeholder="Số  sử dụng" readonly="">
			</td>
			
			<script type="text/javascript">
				function get_number_electric_{product.pid}(){
					var number_old = $('#number_old_{product.pid}').val();
					var number_new = $('#number_new_{product.pid}').val();

					if(number_old && number_new){
						var number_use = number_new - number_old;
						if(number_use > 0){
							$('#number_use_{product.pid}').val(number_use);
						}

					}
				}
			</script>
		</tr>
		<!-- END: product -->
	</tbody>
</table>



<!-- END: main -->