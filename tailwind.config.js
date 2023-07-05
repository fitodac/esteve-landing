const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		'./storage/framework/views/*.php',
		'./resources/views/**/*.blade.php',
		'./resources/js/**/*.vue',
		'./tailwind-whitelist.txt',
	],

	theme: {

		extend: {
			fontFamily: {
				ropa: '"Ropa Sans", sans-serif'
				// sans: ['Barlow', ...defaultTheme.fontFamily.sans],
			},

			colors: {
				'brand': {
					orange: {
						DEFAULT: '#EC7E3E'
					},
					green: {
						100: '#EAF2DD',
						400: '#81B56A',
						DEFAULT: '#188338'
					}
				},
				'color-form': '#EBF2F4',
				'gray-light': '#EBF2F4'
			}
		},
	},

	plugins: [
		require('@tailwindcss/forms')
	],
};
