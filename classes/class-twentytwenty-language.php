<?php
/**
 * Language handling.
 *
 * Handle non-latin languegs fallbacks.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

if ( ! class_exists( 'TwentyTwenty_Language' ) ) {
	/**
	 * Language handling.
	 */
	class TwentyTwenty_Language {

		/**
		 * Get custom CSS.
		 *
		 * Return CSS for non-latin languagee, if available, or null
		 *
		 * @return string|null
		 */
		public static function load_fallback_languages() {

			$locale = get_bloginfo( 'language' );

			$font_family = apply_filters(
				'twentytwenty_get_localized_font_family_types',
				array(
					// Arabic.
					'ar'    => 'Tahoma, Arial, sans_serif',
					'ary'   => 'Tahoma, Arial, sans_serif',
					'azb'   => 'Tahoma, Arial, sans_serif',
					'ckb'   => 'Tahoma, Arial, sans_serif',
					'fa-IR' => 'Tahoma, Arial, sans_serif',
					'haz'   => 'Tahoma, Arial, sans_serif',
					'ps'    => 'Tahoma, Arial, sans_serif',
					// Chinese Simplified (China) - Noto Sans SC.
					'zh-CN' => '"PingFang SC", "Helvetica Neue", "Microsoft YaHei New", "STHeiti Light", sans-serif',
					// Chinese Traditional (Taiwan) - Noto Sans TC.
					'zh-TW' => '"PingFang TC", "Helvetica Neue", "Microsoft YaHei New", "STHeiti Light", sans-serif',
					// Chinese Traditional (Taiwan) - Noto Sans TC.
					'zh-TW' => '"PingFang TC", "Helvetica Neue", "Microsoft YaHei New", "STHeiti Light", sans-serif',
					// Chinese (Hong Kong) - Noto Sans HK.
					'zh-HK' => '"PingFang HK", "Helvetica Neue", "Microsoft YaHei New", "STHeiti Light", sans-serif',
					// Cyrillic.
					'bel'   => '"Helvetica Neue", Helvetica, "Segoe UI", Arial, sans_serif;',
					'bg-BG' => '"Helvetica Neue", Helvetica, "Segoe UI", Arial, sans_serif;',
					'kk'    => '"Helvetica Neue", Helvetica, "Segoe UI", Arial, sans_serif;',
					'mk-MK' => '"Helvetica Neue", Helvetica, "Segoe UI", Arial, sans_serif;',
					'mn'    => '"Helvetica Neue", Helvetica, "Segoe UI", Arial, sans_serif;',
					'ru-RU' => '"Helvetica Neue", Helvetica, "Segoe UI", Arial, sans_serif;',
					'sah'   => '"Helvetica Neue", Helvetica, "Segoe UI", Arial, sans_serif;',
					'sr-RS' => '"Helvetica Neue", Helvetica, "Segoe UI", Arial, sans_serif;',
					'tt-RU' => '"Helvetica Neue", Helvetica, "Segoe UI", Arial, sans_serif;',
					'uk'    => '"Helvetica Neue", Helvetica, "Segoe UI", Arial, sans_serif;',
					// Devanagari.
					'bn-BD' => 'Arial, sans_serif;',
					'hi-IN' => 'Arial, sans_serif;',
					'mr'    => 'Arial, sans_serif;',
					'ne-NP' => 'Arial, sans_serif;',
					// Greek.
					'el'    => '"Helvetica Neue", Helvetica, Arial, sans_serif;',
					// Gujarati.
					'gu'    => 'Arial, sans_serif;',
					// Hebrew.
					'he-IL' => '"Arial Hebrew", Arial, sans_serif;',
					// Japanese.
					'ja'    => '"Hiragino Kaku Gothic ProN", "Meiryo", sans-serif;',
					// Korean.
					'ko-KR' => '"Apple SD Gothic Neo", "Malgun Gothic", "Nanum Gothic", Dotum, sans-serif;',
					// Thai.
					'th'    => '"Sukhumvit Set", "Helvetica Neue", Helvetica, Arial, sans-serif;',
					// Vietnamese.
					'vi'    => '"Libre Franklin", sans-serif;',
				)
			);

			$elements = apply_filters(
				'twentytwenty_get_localized_font_family_elements',
				array(
					'front-end'      => array( 'body', 'input', 'textarea', 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file__button', '.has-drop-cap:not(:focus)::first-letter', '.has-drop-cap:not(:focus)::first-letter', '.entry-content .wp-block-archives', '.entry-content .wp-block-categories', '.entry-content .wp-block-cover-image', '.entry-content .wp-block-latest-comments', '.entry-content .wp-block-latest-posts', '.entry-content .wp-block-pullquote', '.entry-content .wp-block-quote.is-large', '.entry-content .wp-block-quote.is-style-large', '.entry-content .wp-block-archives *', '.entry-content .wp-block-categories *', '.entry-content .wp-block-latest-posts *', '.entry-content .wp-block-latest-comments *', '.entry-content p', '.entry-content ol', '.entry-content ul', '.entry-content dl', '.entry-content dt', '.entry-content cite', '.entry-content figcaption', '.entry-content .wp-caption-text', '.comment-content p', '.comment-content ol', '.comment-content ul', '.comment-content dl', '.comment-content dt', '.comment-content cite', '.comment-content figcaption', '.comment-content .wp-caption-text', '.widget_text p', '.widget_text ol', '.widget_text ul', '.widget_text dl', '.widget_text dt', '.widget-content .rssSummary', '.widget-content cite', '.widget-content figcaption', '.widget-content .wp-caption-text' ),
					'block-editor'   => array( '.editor-styles-wrapper > *', '.editor-styles-wrapper p', '.editor-styles-wrapper ol', '.editor-styles-wrapper ul', '.editor-styles-wrapper dl', '.editor-styles-wrapper dt', '.editor-post-title__block .editor-post-title__input', '.editor-styles-wrapper .wp-block h1', '.editor-styles-wrapper .wp-block h2', '.editor-styles-wrapper .wp-block h3', '.editor-styles-wrapper .wp-block h4', '.editor-styles-wrapper .wp-block h5', '.editor-styles-wrapper .wp-block h6', '.editor-styles-wrapper .has-drop-cap:not(:focus)::first-letter', '.editor-styles-wrapper cite', '.editor-styles-wrapper figcaption', '.editor-styles-wrapper .wp-caption-text' ),
					'classic-editor' => array( 'body#tinymce.wp-editor', 'body#tinymce.wp-editor p', 'body#tinymce.wp-editor ol', 'body#tinymce.wp-editor ul', 'body#tinymce.wp-editor dl', 'body#tinymce.wp-editor dt', 'body#tinymce.wp-editor figcaption', 'body#tinymce.wp-editor .wp-caption-text', 'body#tinymce.wp-editor .wp-caption-dd', 'body#tinymce.wp-editor cite', 'body#tinymce.wp-editor table' ),
				)
			);

			var_dump($font_family[ $locale[0] ]);

			// Generate and inline the CSS
			foreach ( $elements as $element ) {
				$custom_css = twentytwenty_generate_css( implode( ',', $element ), 'font-family', $font_family[ $locale ], null, null, false );
				wp_add_inline_style( 'twentytwenty-style', $custom_css );
			}
		}
	}
}
