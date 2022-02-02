<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Inventory App</title>
	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url(); ?>assets/Boostrap 5/assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/CSS/datatable.css" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/CSS/fonts.css" /> -->
	<link rel="icon" href="<?php echo base_url() ?>assets/favicon.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/CSS/style.css">
</head>

<body>

	<div id="container">


		<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
				Inventory Application
			</a>
			<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
			<!-- <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div> -->
		</header>

		<div class="container-fluid">
			<div class="row">
				<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
					<div class="position-sticky pt-3">
						<!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 ">
          Menu
        </h6> -->
						<ul class="nav flex-column ">
							<li class="nav-item">
								<!-- <a class="nav-link active" aria-current="page" href="#">
             
              Menu
            </a> -->
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" value="inventory">
									<i class="fa fa-suitcase"></i>
									Inventory
								</a>
							</li>

							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" value="category">
									<i class="fa fa-tag"></i>
									Category
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" value="subcategory">
									<i class="fa fa-tags"></i>
									Subcategory
								</a>
							</li>
						</ul>

						<!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <i>Saved reports</i>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <i class="fa fa-plus-circle"></i>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-file-text"></i>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-file-text"></i>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-file-text"></i>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-file-text"></i>
              Year-end sale
            </a>
          </li>
        </ul> -->
					</div>
				</nav>

				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
					<form action="" method="post">
						<?php //echo $error; 
						?>
						<!-- <input type="file" name="userfile" >
						<input type="submit" name="submit"> -->
					</form>
					<div id="alert"></div>
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" id="header">

						<h3><i class="fa fa-hand-o-left"></i> Select From The Menu To Get Started!</h3>
					</div>
					<div id="main">
					</div>
				</main>
			</div>
		</div>

	</div>
	<!-- Modal -->
	<div class="modal fade" id="ModalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-toggle="modal">
		<form action="" method="post">

			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="ModalTitle">Import CSV File</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body" id="Modal">
						<input type="file" name="CsvFile">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-dark btn-sm" name="ImportCSV"><i class="fa fa-save"></i> Save</button>
						<button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<script src="<?php echo base_url(); ?>assets/Boostrap 5/assets/dist/js/bootstrap.bundle.min.js" defer></script>
	<!-- <script src="<?php echo base_url(); ?>assets/JS/feather.js" defer></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js.map"></script> -->
	<script src="<?php echo base_url() ?>assets/JS/jquery.js" defer></script>
	<script src="<?php echo base_url() ?>assets/JS/datatable.js" defer></script>
	<script src="<?php echo base_url() ?>assets/JS/csv.js" defer></script>
	<script src="<?php echo base_url() ?>assets/JS/datatablebuttons.js" defer></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
	<!-- <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script> -->
	<script>
		var base_url = '<?php echo base_url() ?>';
	</script>
	<script src="<?php echo base_url() ?>assets/JS/main.js" defer></script>
	<script>
		// $(document).ready(function() { 
		// LoadMain('inventory');

		// });
	</script>

</body>

</html>