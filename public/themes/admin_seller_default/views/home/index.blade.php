		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				{{ $pageTitle }}
				<small>{{ $pageDesc }}</small>
			</h1>
			
			<!-- <ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol> -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-lg-12 col-xs-6">
					
					{{-- widget --}}
					<div class="row">
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-aqua">
								<div class="inner">
									<h3>{{ $widget['totalbox']['product_listed'] }}</h3>
									<p>Listed Products</p>
								</div>
								<div class="icon">
									<i class="fa fa-shopping-cart"></i>
								</div>
								<a href="#" class="small-box-footer">
									More info <i class="fa fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-green">
								<div class="inner">
									<h3>{{ $widget['totalbox']['product_sold'] }}</h3>
									<p>Sold Products</p>
								</div>
								<div class="icon">
									<i class="fa fa-shopping-cart"></i>
								</div>
								<a href="#" class="small-box-footer">
									More info <i class="fa fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-red">
								<div class="inner">
									<h3>{{ $widget['totalbox']['product_outstock'] }}</h3>
									<p>Out Of Stock</p>
								</div>
								<div class="icon">
									<i class="fa fa-shopping-cart"></i>
								</div>
								<a href="#" class="small-box-footer">
									More info <i class="fa fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-aqua">
								<div class="inner">
									<h3>{{ $widget['totalbox']['order_amount_paid'] }}</h3>
									<p>Amount Paid</p>
								</div>
								<div class="icon">
									<i class="fa fa-shopping-cart"></i>
								</div>
								<a href="#" class="small-box-footer">
									More info <i class="fa fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-green">
								<div class="inner">
									<h3>{{ $widget['totalbox']['order_amount_pending_paid'] }}</h3>
									<p>Pending Payment</p>
								</div>
								<div class="icon">
									<i class="fa fa-shopping-cart"></i>
								</div>
								<a href="#" class="small-box-footer">
									More info <i class="fa fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-red">
								<div class="inner">
									<h3>{{ $widget['totalbox']['order_amount_cancel'] }}</h3>
									<p>Amount Canceled</p>
								</div>
								<div class="icon">
									<i class="fa fa-shopping-cart"></i>
								</div>
								<a href="#" class="small-box-footer">
									More info <i class="fa fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
					</div>
					{{-- end widget --}}

					{{-- sales graph --}}
					<div class="row">
						<div class="col-lg-9">
							<div class="box box-solid bg-teal-gradient">
								<div class="box-header">
									<i class="fa fa-th"></i>
									<h3 class="box-title">Sales Graph</h3>
									<div class="box-tools pull-right">
										<button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
										<button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
									</div>
								</div>
								<div class="box-body border-radius-none">
									<div class="chart" id="line-chart" style="height: 250px;"></div>
								</div><!-- /.box-body -->
							</div>	
						</div>
					</div>
					{{-- sales graph --}}

				</div>
			</div>
        </section><!-- /.content -->