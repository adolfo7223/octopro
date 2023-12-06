			<main id="main">
				<section id="about" class="about text-center">
					<div class="row">
							<!-- <div class="card col-6 offset-3 text-center mt-5" style="width: 50%;">
								<div class="card-body">
									
								</div>
							</div> -->
							<button class="btn btn-social col-6 offset-3 text-center mt-2 h3 font-weight-bold" style="width: 50%;" id="google">
								Google
							</button>
					<div>
					<div class="row">
						<!-- <div class="card col-6 offset-3 text-center mt-5" style="width: 50%;">
							<div class="card-body">
								<div>
									
								</div>
							</div>
						</div> -->
						<button class="btn btn-social col-6 offset-3 text-center mt-2 h3 font-weight-bold" id="facebook">Facebook</button>
					<div>
					<div class="row">
						<!-- <div class="card col-6 offset-3 text-center mt-5" style="width: 50%;">
							<div class="card-body">
								<div>
									
								</div>
							</div>
						</div> -->
						<button type="button" class="btn btn-social col-6 offset-3 text-center mt-2 h3 font-weight-bold" id="others">
							Others
						</button>
					<div>
					<div class="row" id="other_socials">

					</div>
					<!-- <div class="row m-5">
						<div class="col-12 text-center fs-5">
							OR
						</div>
					</div>
					<div class="row">
						<div class="card col-6 offset-3 text-center" style="width: 50%;">
							<div class="card-body">
								<div>
									<a href="sms:+9562931921" class="btn btn-success">
										Use SMS
									</a>
								</div>
							</div>
						</div>
					</div> -->
				</section>
			</main>

	<!-- Modal -->
	<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Other Links</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
					<button class="btn btn-primary" id="yelp">Yelp</button>
					<button class="btn btn-primary" id="nextdoor">Nextdoor</button>
					<button class="btn btn-primary" id="thumbtack">Thumbtack</button>
				</div>
			</div>
		</div>
	</div> -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <!-- Vendor JS Files -->
    <script src="<?php echo base_url('public/theme/onepage/vendor/purecounter/purecounter_vanilla.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/aos/aos.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/glightbox/js/glightbox.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/isotope-layout/isotope.pkgd.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/swiper/swiper-bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/theme/onepage/vendor/php-email-form/validate.js'); ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url('public/theme/onepage/js/main.js'); ?>"></script>

	<script type="text/javascript">

		var facebook = 'https://www.facebook.com/octoprocoatings/reviews';

        var google = 'https://g.page/r/CeWsqmTs3QcjEAI/review';

		var yelp = 'https://www.yelp.com/writeareview/biz/X5Hzc48xWL9KnooL_iOHUA?return_url=%2Fbiz%2FX5Hzc48xWL9KnooL_iOHUA&review_origin=biz-details-war-button';

		var nextdoor = 'https://www.nextdoor.com';

		var thumbtack = 'https://www.thumbtack.com/reviews/services/494978829560356879/write';

		$('#others').click(() => {
			$('#others').remove();
			var other_socials = ['yelp', 'nextdoor', 'thumbtack'];
			$.each(other_socials, function(key, value) {
				str = value.toLowerCase().replace(/\b[a-z]/g, function(letter) {
					return letter.toUpperCase();
				});
				$("#other_socials").append(`<button class="btn btn-social col-6 offset-3 text-center mt-2 h3 font-weight-bold" id="`+value+`">`+str+`</button>`)
			})
			
			$('#yelp').click(() => {
				// window.location.href = yelp;
				window.open(yelp, "_blank");
			})

			$('#nextdoor').click(() => {
				// window.location.href = nextdoor;
				window.open(nextdoor, "_blank");
			})

			$('#thumbtack').click(() => {
				// window.location.href = thumbtack;
				window.open(thumbtack, "_blank");
			})
		})

		$('#google').click(() => {
			// window.location.href = google;
			window.open(google, "_blank");
		})

		$('#facebook').click(() => {
			// window.location.href = facebook;
			window.open(facebook, "_blank");
		})

	</script>

</body>
</html>