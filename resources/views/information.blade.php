@extends('Layout.User')

@section('content')

	<main>

		<div class="hero_single inner_pages background-image" data-background="url({{asset('resto/gallery6.jpg')}})">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-8">
							<h1>Information & Contact</h1>
							<p>Vinautism Art & Resto</p>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
			<div class="frame white"></div>
		</div>
		<!-- /hero_single -->

		<div class="bg_gray">
		    <div class="container margin_60_40">
		        <div class="row justify-content-center">
		            <div class="col-lg-4">
		                <div class="box_contacts">
		                    <i class="icon_tag_alt"></i>
		                    <h2>Reservasi</h2>
		                    <a href="#0">+94 423-23-221</a> - <a href="#0">reserve@.com</a>
		                    <small>- <a href="/reservation">atau melalui Form berikut</a> -</small>
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="box_contacts">
		                    <i class="icon_pin_alt"></i>
		                    <h2>Alamat</h2>
		                    <div>G Walk, Junction TL 6</div>
                            <div>Jl. Citraland Surabaya No.11, Sambikerep, Kec. Sambikerep, Surabaya, Jawa Timur 60217</div>
                            <br>
		                    <small>- <a href="https://maps.app.goo.gl/Tamxt7FJ142nxLbk8">Lihat Petunjuk</a> -</small>
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="box_contacts">
		                    <i class="icon_clock_alt"></i>
		                    <h2>Jam Buka</h2>
		                    <div>Senin sampai Rabu 09:00 - 20:00</div>
                            <div>Kamis sampai Sabtu 09:00 - 19:00</div>
                            <div>Minggu 11:00 - 19:00</div>
		                </div>
		            </div>
		        </div>
		        <!-- /row -->
		    </div>
		    <!-- /container -->
		</div>
		<!-- /bg_gray -->

		<div class="container margin_60_40">
		    <h5 class="mb_5">Kirimkan Pesan Anda</h5>
		    <div class="row">
		        <div class="col-lg-4 col-md-6 add_bottom_25">
		            <div id="message-contact"></div>
		            <form method="post" action="phpmailer/contact_template_email.php" id="contactform" autocomplete="off">
		                <div class="form-group">
		                    <input class="form-control" type="text" placeholder="Nama" id="name_contact" name="name_contact">
		                </div>
		                <div class="form-group">
		                    <input class="form-control" type="email" placeholder="Email" id="email_contact" name="email_contact">
		                </div>
		                <div class="form-group">
		                    <textarea class="form-control" style="height: 150px;" placeholder="Pesan" id="message_contact" name="message_contact"></textarea>
		                </div>
		                <div class="form-group">
		                    <input class="form-control" type="text" id="verify_contact" name="verify_contact" placeholder="Are you human? 3 + 1 =">
		                </div>
		                <div class="form-group">
		                    <input class="btn_1 full-width" type="submit" value="Submit" id="submit-contact">
		                </div>
		            </form>
		        </div>
		        <div class="col-lg-8 col-md-6 add_bottom_25">
		            <iframe class="map_contact" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15830.088684249085!2d112.6546951!3d-7.2950762!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fdc112922645%3A0xc953059a61c6938!2sVin%20Autism%20Gallery!5e0!3m2!1sen!2sid!4v1716727706507!5m2!1sen!2sid" allowfullscreen></iframe>
		        </div>
		    </div>
		    <!-- /row -->
		</div>
		<!-- /container -->

	</main>
@endsection
