(function () {

	var mm = {

		init: function () {
			this.cacheDom();
			this.bindEvents();
			this.totopButton();
			this.isotopefilter();
			this.enablePopupGallery();
			this.enablePopupImage();
			this.enablePopupCart();
			this.enablePopupLogin();
			this.initCounterElement();
			this.stickyHeader();
			this.initSlider();
			this.initParallax();
			this.SmoothScroll();
			this.isotopeSort();
		},
		cacheDom: function(){
			this.toTop = $('.totop');
			this.testimonialSlider = $('.mm-testimonialSlider');
			this.topTrigger = $('.mm__mainMenu-trigger');
			this.menuBurger = $('.mm__menuBurger');
			this.cgmenu = $('.mm__mainMenu');
			this.rezMenu = $('.mm__resMenu');
			this.pageWrapper = $('#page_wrapper');
			this.backIcon = $('.mm__resMenu-backIcon');
			this.hasAnimation = $('.hasAnimation');
			this._body = $('body');
			this.menuLink = $('.mm__menu-link');
			this.iframeContact = $('.mm__contact');
			this.iframeAddtocart = $('.addtocart');
			this.iframeVideo = $('.icon-box_link');
			this.showlogin = $ ('.showlogin');
			this.showcoupon = $ ('.showcoup');
			this.isotope= $('.product');
			this.cart= $('.addtocart-trigger');
		},
		bindEvents: function(){
			var self = this;
			self.topTrigger.on('click', self.responsiveTopMenu);
			self.menuBurger.on('click', self.triggerMenu);
			self.rezMenu.find( 'a:not(.mm__resMenu-back)').on('click', self.CloseMenu);
			self.backIcon.on('click', self.CloseMenu);
			self.iframeVideo.magnificPopup({type:'iframe'});
			$(window).on('scroll', self.addAnimations);
			self.showcoupon.on('click', self.showCoupon);
			self.showlogin.on('click', self.showLogin);
			self.cart.on('click', self.addToCart);

		},
		addAnimations: function() {
			mm.hasAnimation.each(mm.startAnimations);
		},
		startAnimations: function(index, el) {
			var itemIsReached = mm.isScrolledIntoView(el);
			if (itemIsReached) {

				var animationType = $(this).attr("data-animationType");
				var animationDuration = $(this).attr("data-animationDuration");
				var animationDelay = $(this).attr("data-animationDelay");

				if (!$(this).hasClass('is-animating')) {

					$(this).css({"animation-duration": animationDuration,
								"animation-name":animationType,
								"animation-delay":animationDelay});
				}
				$(this).addClass('is-animating');
			}
		},
		isScrolledIntoView: function(elem) {
			var docViewTop = $(window).scrollTop();
			var docViewBottom = docViewTop + $(window).height();
			var elemTop = $(elem).offset().top;
			var elemBottom = elemTop + $(elem).height();
			var offset = 600;
			return ((elemBottom <= docViewBottom + offset) && (elemTop >= docViewTop - offset));
		},
		SmoothScroll: function() {
			var $el = $(".mm__menu-link");

			$('.mm__menu-link').smoothScroll({
				speed: 400,
      });
			//Add active class on menu link
			$('.mm__menu-link').on('click', function (e) {
			 $('.mm__menu-link').each(function () {
					 $(this).removeClass('active');
			 })
			 $(this).addClass('active');
			 });
		},

		initSlider: function() {
			var self = this;
			this.testimonialSlider.slick({
				infinite: true,
				arrows: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				infinite: true,
				adaptiveHeight: true,
				fade: true,
			  appendArrows: ".testim__nav",
				nextArrow: '<span class="testim--arrow testim--arrow__next" style="display: block;"><svg viewBox="0 0 256 256"><polyline fill="none" stroke="black" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="72,16 184,128 72,240"></polyline></svg></span>',
			  prevArrow: '<span class="testim--arrow testim--arrow__prev" style="display: block;"><svg viewBox="0 0 256 256"><polyline fill="none" stroke="black" stroke-width="16" stroke-linejoin="round" stroke-linecap="round" points="184,16 72,128 184,240"></polyline></svg></span>',
				});
		},
		initParallax: function() {
			var $rellaxItems = $('.rellax');
			if( $rellaxItems.length > 0 ){
				// Also can pass in optional settings block
				var rellax = new Rellax('.rellax', {
					speed: 5,
					center: false,
			    round: true,
			    vertical: true,
				});
			}
		},
		showCoupon: function(e) {
			e.preventDefault();
			if ($('.form-coupon').hasClass('visible')) {
				$('.form-coupon').addClass('animated');
				$('.form-coupon').removeClass('visible');


			} else {
				$('.form-coupon').addClass('visible');
				$('.form-coupon').removeClass('animated');
			}
		},
		showLogin: function(e) {
			e.preventDefault();
			if ($('.form-login').hasClass('visible')) {
				$('.form-login').toggleClass('animated');
				$('.form-login').removeClass('visible');


			} else {
				$('.form-login').addClass('visible');
				$('.form-login').removeClass('animated');
			}
		},
		addToCart: function(even) {
			var $addToCartButton = $('.cart-button'),
					$cartIcon = $('.cart-icon'),
					itemsInCart = $cartIcon.attr('data-count');

					// Update the data count attribute from cart icon
					$cartIcon.attr('data-count', parseInt(itemsInCart) + 1);
					$('.topnav-drop').addClass('has-data');
					$('.mini-cart-content').addClass('visible');

		},
		isotopeSort: function() {
      // init Isotope
			var $grid = $('.product-grid');
			$grid.each(function(){
				var $el = $(this);

				// Wait until the iamges are loaded before triggering isotope
				$el.imagesLoaded(function(){
					// enable isotope

	        $el.isotope({
						itemSelector: '.product',
					  layoutMode: 'fitRows',
					  getSortData: {
					    name: '[data-title]',
							popularity: '[data-popularity]',
					    date: '[data-date]',
							price: '[data-price]',
  					},
						sortBy: ['name']
					});

					// bind sort button click
					var $sortItems = $el.prev('.sorting-select').find('.select-control--sort');
					$sortItems.on( 'change', function() {
					  $grid.isotope({
							sortBy: $(this).val(),
							sortAscending: $(this).find(':selected').data('sort-order')
						});
					});
	      });
			});
		},

		responsiveTopMenu: function() {
			if ($(this).hasClass('is-toggled')) {
				$(this).closest('.mm__topMenu-wrapper').removeClass('is-opened');
				$(this).removeClass('is-toggled');
			} else {
				$(this).closest('.mm__topMenu-wrapper').addClass('is-opened');
				$(this).addClass('is-toggled');
			}
		},

		triggerMenu: function(e) {
			e.preventDefault();
				if($(this).hasClass('is-active')){
					mm.CloseMenu();
				}
				else {
					mm.OpenMenu();
			}
		},
		OpenMenu: function() {
			mm.rezMenu.addClass('mm__menu--visible');
			mm.menuBurger.addClass('is-active');
			mm.setMenuHeight();
		},
		CloseMenu: function() {
			$(this).closest('ul').removeClass('mm__menu--visible');
			mm.menuBurger.removeClass('is-active');
			mm.removeMenuHeight();
		},
		removeMenuHeight: function() {
			mm.pageWrapper.css({'height':'auto'});
		},
		setMenuHeight: function() {
			var _menu = $('.mm__menu--visible').last(),
				window_height  = $(window).height(),
				height = _menu.css({window_height:'auto'});
			mm.pageWrapper.css({'height':height});
		},
		isotopefilter: function() {
      // init Isotope
			var $grid = $('.grid');
			$grid.each(function(){
				var $el = $(this);
				// Wait until the iamges are loaded before triggering isotope
				$el.imagesLoaded(function(){
					// enable isotope
	        $el.isotope();
					// bind filter button click
					var $filterItems = $el.parent('.portfolio-filter').find('.filter-button-group button');

					// Don't proceed if we don't have filters
					if( $filterItems.length === 0 ){
						return;
					}

					$filterItems.on( 'click', function() {
					  var filterValue = $( this ).attr('data-filter');
					  $el.isotope({ filter: filterValue });
						// Remove active class from filters
						$filterItems.removeClass('is-checked');
						// Add active class for current filter
						$(this).addClass('is-checked');
					});
	      });
			});
		},
		enablePopupCart: function() {
			var self = this;
			self.iframeAddtocart.magnificPopup({
				type:'iframe',
				iframe:{ markup: '<div class="mfp-content--contact">'+
	            '<div class="mfp-close"></div>'+
	            '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
	          '</div>'}
			});
		},
		enablePopupLogin: function(){
			var self = this;
			self.iframeContact.magnificPopup({
				type:'iframe',
				iframe:{ markup: '<div class="mfp-content--contact">'+
	            '<div class="mfp-close"></div>'+
	            '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
	          '</div>'}

			});
		},
		enablePopupGallery: function() {
			$('.mm-gridGallery-jstrigger').each(function() {
			    $(this).magnificPopup({
			        delegate: 'a',
			        type: 'image',
			        gallery: {
			          enabled:true
			        }
			    });
			});
		},
		enablePopupImage: function() {
			$('.mm-imagePopup-jstrigger').each(function() {
					$(this).magnificPopup({
						type: 'image',
						closeOnContentClick: true,
						closeBtnInside: false,
						fixedContentPos: true,
						mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
						image: {
							//verticalFit: true
						},
						zoom: {
							enabled: true,
							duration: 100 // don't foget to change the duration also in CSS
						}

					});
			});
		},
		initCounterElement: function() {
			var counterElement = $('.counter_trigger'),
					itemIsReached;
			counterElement.each(function(){
				var $el = $(this);
				$(window).scroll(function(){
					itemIsReached = mm.isScrolledIntoView($el);
					if (itemIsReached) {
						if( $el.hasClass( 'mm__didAnimation' ) ){
							return true;
						}
						$el.data('countToOptions', {
							formatter: function (value, options) {
								return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
							}
						});
						var options = $.extend({}, options || {}, $el.data('countToOptions') || {});
						$el.countTo(options);
						$el.addClass( 'mm__didAnimation' );
					}
				}).trigger('scroll');
			});
		},
		totopButton: function() {
			var self = this;

			/* Show totop button*/
			$(window).scroll(function(){
				var toTopOffset = self.toTop.offset().top;
				var toTopHidden = 1000;

				if (toTopOffset > toTopHidden) {
					self.toTop.addClass('totop-vissible');
				} else {
					self.toTop.removeClass('totop-vissible');
				}
			});

			/* totop button animation */
			if(self.toTop && self.toTop.length > 0){
				self.toTop.on('click',function (e){
					e.preventDefault();
					$( 'html, body').animate( {scrollTop: 0 }, 'slow' );
				});
			}
		},
		stickyHeader: function() {

		var $el = $(".site-header"),
			headerHeight = $el.find('.siteheader-container').outerHeight();

		$(window).on('scroll', function(event){
			if( $(window).scrollTop() > headerHeight ){
				$el.removeClass('header--not-sticked');
				$el.addClass('header--is-sticked');
				$el.addClass('header--light');

			}
			else{
				$el.removeClass('header--is-sticked');
				$el.removeClass('header--light');
				$el.addClass('header--not-sticked');
			}
		});
	}
	};
	mm.init();
})();
