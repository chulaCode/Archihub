<footer class="footer footer-bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-left">
					<h3 class="footer__title">Top Products</h3>
					<ul class="footer__link">
						<li><a href="#/">managed Website</a></li>
						<li><a href="#/">Manage Reputation</a></li>
						<li><a href="#/">power Tools</a></li>
						<li><a href="#/">Marketing Service</a></li>
					</ul>
				</div>
				<div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-left">
					<h3 class="footer__title">Quick Links</h3>
					<ul class="footer__link">
						<li><a href="#/">Jobs</a></li>
						<li><a href="#/">Brand Assets</a></li>
						<li><a href="#/">Investor Relations</a></li>
						<li><a href="#/">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-left">
					<h3 class="footer__title">Features</h3>
					<ul class="footer__link">
						<li><a href="#/">Jobs</a></li>
						<li><a href="#/">Brand Assets</a></li>
						<li><a href="#/">Investor Relations</a></li>
						<li><a href="#/">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-left">
					<h3 class="footer__title">Resources</h3>
					<ul class="footer__link">
						<li><a href="#/">Guides</a></li>
						<li><a href="#/">Research</a></li>
						<li><a href="#/">Experts</a></li>
						<li><a href="#/">Agencies</a></li>
					</ul>
				</div>
				<div class="col-sm-8 col-lg-4 mb-4 mb-lg-0 text-left">
					<h3 class="footer__title">Newsletter</h3>
					<p>You can trust us. we only send promo offers,</p>
					<form action="" class="form-subscribe">
						<div class="input-group">
							<input type="email" class="form-control" placeholder="Your email address" required>
							<div class="input-group-append">
								<button class="btn-append" type="submit"><i class="lnr lnr-arrow-right"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="d-sm-flex justify-content-between footer__bottom top-border">
				<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				<ul class="social-icons mt-2 mt-sm-0">
					<li><a href="#/"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="#/"><i class="fab fa-twitter"></i></a></li>
					<li><a href="#/"><i class="fab fa-dribbble"></i></a></li>
					<li><a href="#/"><i class="fab fa-behance"></i></a></li>					
				</ul>
			</div>
		</div>
	</footer>


   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
	<script src="{{asset('vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('vendor/owl-carousel/owl.carousel.min.js')}}"></script>
   
    
	<script>
		var testimonialCarousel = $('.testimonialCarousel');
      testimonialCarousel.owlCarousel({
      loop:true,
      margin:80,
      startPosition: 2,
      nav: false,
      responsiveClass:true,
      responsive:{
        0:{
            items:1
        },
        1000:{
            items:2,
            loop:true
        }
      }
    });

    var heroCarousel = $('.heroCarousel');
      heroCarousel.owlCarousel({
      loop:true,
      margin:10,
      nav: false,
      startPosition: 1,
      responsiveClass:true,
      responsive:{
        0:{
            items:1
        }
      }
	});

	var dropToggle = $('.menu_right > li').has('ul').children('a');
	dropToggle.on('click', function() {
		dropToggle.not(this).closest('li').find('ul').slideUp(200);
		$(this).closest('li').children('ul').slideToggle(200);
		return false;
	});

	$( ".toggle_icon" ).on('click', function() {
		$( 'body' ).toggleClass( "open" );
	});
let i=1;
$('#add').on('click', function(){
	i++;
			$('#dynamic_field').append(`
				<tr id="row${i}"><td style="margin-top:4px!important;"><input id="name" type="text" placeholder="{{ __('Staff Name') }}"class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
				' name="name[]" value="{{ old('name[]') }}" required autofocus> @if ($errors->has('name'))'
					<span class="invalid-feedback" role="alert"> <strong>{{ $errors->first('name') }}</strong></span> @endif</td></tr>

					<tr id="row${i}"><td style="margin-top:4px!important;"><input id="email" type="email" placeholder="{{ __('Agency Email') }}"class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
				' name="email[]" value="{{ old('enail[]') }}" required autofocus> @if ($errors->has('email'))'
					<span class="invalid-feedback" role="alert"> <strong>{{ $errors->first('email') }}</strong></span> @endif</td>
					<td> <button type="button" name="remove" class="btn btn-danger float-right btn_remove" id="${i}" style="background:red!important;">remove</button> </td> </tr> `)
					
					$(".btn_remove").on('click',function(){
         let button_id=$(this).attr("id");
          $(`#row${button_id}`).remove();
     //console.log(button_id)
       })
	});
//code for experience level
$(document).ready(function() {
  $('input').click(function() {
    $('input:not(:checked)').parent().removeClass("checked");
    $('input:checked').parent().addClass("checked");
  });
});
//ends here
 
	</script>
</body>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      
      <div class="modal-body">

       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
        <!-- 16:9 aspect ratio -->
		<div class="embed-responsive embed-responsive-16by9">
		<iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
		</div>
        
        
      </div>

    </div>
  </div>

</html>