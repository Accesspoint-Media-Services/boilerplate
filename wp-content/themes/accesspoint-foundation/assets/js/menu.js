( function ( $ ) {
	'use strict';

	$( function () {
		var $body       = $( 'body' );
		var $toggle     = $( '.nav-toggle' );
		var $nav        = $( '#primary-menu' );
		var $navItems   = $nav.find( '.nav__item' );
		var $window     = $( window );
		var breakpoint  = 1200;
		var staggerStep = 250;

		var $overlay = $( '<div class="nav-overlay"></div>' ).appendTo( $body );

		function setStaggerDelays() {
			$navItems.each( function ( index ) {
				$( this ).css( 'transition-delay', ( index * staggerStep ) + 'ms' );
			} );
		}

		function clearStaggerDelays() {
			$navItems.css( 'transition-delay', '' );
		}

		function openMenu() {
			setStaggerDelays();
			$nav.addClass( 'nav--active' );
			$toggle.addClass( 'nav-toggle--active' ).attr( 'aria-expanded', 'true' );
			$overlay.addClass( 'nav-overlay--active' );
			$body.addClass( 'nav-open' );
		}

		function closeMenu() {
			$nav.removeClass( 'nav--active' );
			$toggle.removeClass( 'nav-toggle--active' ).attr( 'aria-expanded', 'false' );
			$overlay.removeClass( 'nav-overlay--active' );
			$body.removeClass( 'nav-open' );
			closeAllSubmenus();
			clearStaggerDelays();
		}

		function closeAllSubmenus() {
			$( '.nav__item--open' ).removeClass( 'nav__item--open' )
				.find( '> .nav__toggle, > .nav__link' )
				.attr( 'aria-expanded', 'false' );
		}

		$toggle.on( 'click', function () {
			$nav.hasClass( 'nav--active' ) ? closeMenu() : openMenu();
		} );

		$overlay.on( 'click', closeMenu );

		// Submenu toggle (mobile)
		$nav.on( 'click', '.nav__toggle', function ( e ) {
			e.preventDefault();

			var $button = $( this );
			var $item   = $button.closest( '.nav__item' );
			var isOpen  = $item.hasClass( 'nav__item--open' );

			// Accordion: close siblings first
			$item.siblings().removeClass( 'nav__item--open' )
				.find( '> .nav__toggle, > .nav__link' )
				.attr( 'aria-expanded', 'false' );

			$item.toggleClass( 'nav__item--open', ! isOpen );
			$button.attr( 'aria-expanded', ! isOpen );
			$item.find( '> .nav__link' ).attr( 'aria-expanded', ! isOpen );
		} );

		// Escape key closes everything
		$( document ).on( 'keydown', function ( e ) {
			if ( e.key === 'Escape' ) {
				closeMenu();
			}
		} );

		// Click outside closes desktop dropdowns
		$( document ).on( 'click', function ( e ) {
			if ( ! $( e.target ).closest( '.nav' ).length ) {
				closeAllSubmenus();
			}
		} );

		// Reset state when crossing the breakpoint
		var currentWidth = $window.width();
		$window.on( 'resize', function () {
			var newWidth = $window.width();
			var crossed  = ( currentWidth < breakpoint && newWidth >= breakpoint ) ||
			               ( currentWidth >= breakpoint && newWidth < breakpoint );

			if ( crossed ) {
				closeMenu();
			}
			currentWidth = newWidth;
		} );
	} );

} )( jQuery );