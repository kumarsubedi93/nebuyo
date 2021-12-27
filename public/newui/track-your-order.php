<?php
	include('header.php');
?>

		<!-- ========== MAIN CONTENT ========== -->
		<main id="content" role="main">
			<!-- breadcrumb -->
			<div class="bg-gray-13 bg-md-transparent">
				<div class="container">
					<!-- breadcrumb -->
					<div class="my-md-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
								<li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Track your Order</li>
							</ol>
						</nav>
					</div>
					<!-- End breadcrumb -->
				</div>
			</div>
			<!-- End breadcrumb -->

			<div class="container">
				<div class="mx-xl-10">
					<div class="mb-6 text-center">
						<h1 class="mb-6">Track your Order</h1>
						<p class="text-gray-90 px-xl-10">To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
					</div>
					<div class="my-4 my-xl-8">
						<form class="js-validate" novalidate="novalidate">
							<div class="row">
								<div class="col-md-6 mb-3">
									<!-- Form Group -->
									<div class="js-form-message form-group">
										<label class="form-label" for="orderid">Order ID
										</label>
										<input type="text" class="form-control" name="text" id="orderid" placeholder="Found in your order confirmation email." aria-label="Found in your order confirmation email.">
									</div>
									<!-- End Form Group -->
								</div>
								<div class="col-md-6 mb-3">
									<!-- Form Group -->
									<div class="js-form-message form-group">
										<label class="form-label" for="billingemail">Billing email
										</label>
										<input type="email" class="form-control" name="email" id="billingemail" placeholder="Email you used during checkout." aria-label="Email you used during checkout." required
										data-msg="Please enter a valid email address."
										data-error-class="u-has-error"
										data-success-class="u-has-success">
									</div>
									<!-- End Form Group -->
								</div>
								<!-- Button -->
								<div class="col mb-1">
									<button type="button" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">Track</button>
								</div>
								<!-- End Button -->
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
		<!-- ========== END MAIN CONTENT ========== -->

<?php
	include('footer.php');
?>