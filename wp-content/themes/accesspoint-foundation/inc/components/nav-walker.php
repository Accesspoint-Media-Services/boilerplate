<?php
/**
 * AP_Nav_Walker
 * Custom walker for the primary navigation menu.
 */

if ( ! class_exists( 'AP_Nav_Walker' ) ) :

	class AP_Nav_Walker extends Walker_Nav_Menu {

		public function start_lvl( &$output, $depth = 0, $args = null ) {
			$indent  = str_repeat( "\t", $depth );
			$output .= "\n{$indent}<ul class=\"nav__submenu\">\n";
		}

		public function end_lvl( &$output, $depth = 0, $args = null ) {
			$indent  = str_repeat( "\t", $depth );
			$output .= "{$indent}</ul>\n";
		}

		public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
			$classes      = empty( $item->classes ) ? array() : (array) $item->classes;
			$has_children = in_array( 'menu-item-has-children', $classes, true );

			$item_classes = array( 'nav__item' );
			if ( $depth > 0 ) {
				$item_classes[] = 'nav__item--sub';
			}
			if ( $has_children ) {
				$item_classes[] = 'nav__item--has-children';
			}
			if ( in_array( 'current-menu-item', $classes, true ) ) {
				$item_classes[] = 'nav__item--current';
			}

			$output .= '<li class="' . esc_attr( implode( ' ', $item_classes ) ) . '">';

			$atts           = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target ) ? $item->target : '';
			$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
			$atts['href']   = ! empty( $item->url ) ? $item->url : '';
			$atts['class']  = 'nav__link' . ( $depth === 0 ? ' nav__link--top' : '' );

			if ( $has_children ) {
				$atts['aria-haspopup'] = 'true';
				$atts['aria-expanded'] = 'false';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( '' === $value ) {
					continue;
				}
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}

			$title = apply_filters( 'the_title', $item->title, $item->ID );

			$output .= '<a' . $attributes . '>';
			$output .= '<span class="nav__link-text">' . $title . '</span>';

			if ( $has_children ) {
				$output .= '<span class="nav__toggle" aria-hidden="true"><i class="fa-solid fa-chevron-down"></i></span>';
			}

			$output .= '</a>';
		}

		public function end_el( &$output, $item, $depth = 0, $args = null ) {
			$output .= "</li>\n";
		}
	}

endif;