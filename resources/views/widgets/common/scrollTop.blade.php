<style type="text/css">
	.scroll-to-top
	{
		position: fixed;
		z-index: 1;
		right: 20px;
		bottom: 20px;
		border-radius: 50%;
		background-color: var(--themeColor);
		color: #fff !important;
		border: 2px solid var(--themeColor);
		height: 40px;
		width: 40px;
		font-size: 20px;
		display: inline-flex;
		justify-content: center;
		align-items: center;
		box-shadow: 0px 0px 10px 0px #000;
		transition: all 0.3s ease-out;
	}

	.scroll-to-top:hover, .scroll-to-top:focus
	{
		background-color: #fff;
		color: var(--themeColor) !important;
	}
</style>

<a class="scroll-to-top hide">
	<i class="fa fa-chevron-up"></i>
</a>

<script type="text/javascript">
	$(document).on('scroll', function(){
		var scrollPos = document.documentElement.scrollTop;
		var menuHeight = $('#mainMenu').outerHeight();
		if(scrollPos > menuHeight){
			$('.scroll-to-top').removeClass('hide');
		}else{
			$('.scroll-to-top').addClass('hide');
		}
	});

	$(document).on('click', '.scroll-to-top', function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: 0
		}, 500, function(){});
	});
</script>