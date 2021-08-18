<!-- BEGIN: main -->

<link href="/themes/softs/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/softs/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

		
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">Sản phẩm</div>
	<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="/"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item"><a href="/">{LANG.product}</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">{LANG.product_view}</li>
								</ol>
							</nav>
						</div>
	<div class="ml-auto">
							<div class="btn-group">
								<a type="button" class="btn btn-primary" href="{PRODUCT_ADD}">{LANG.product_add}</a> 
								<button type="button" class="btn btn-primary bg-split-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">	<span class="sr-only">{LANG.product_more}</span>
								</button>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
									<a class="dropdown-item" href="{PRODUCT_IMPORT}">{LANG.product_import}</a>
									<a class="dropdown-item" href="{PRODUCT_EXPORT}">{LANG.product_export}</a>
									<div class="dropdown-divider"></div>	
								</div>
							</div>
						</div>
</div>
		
		<div class="card">
			<div class="card-body">
				<div class="card-title">
					<h4 class="mb-0">{LANG.product} : {ROW.title}  </h4>
				</div>
				<hr/>	
				{LANG.develop}
			</div>
		</div>	
    
<!-- END: view -->


<!-- END: main -->