function dynamicHsl(h, s, l) {
  return ({ opacityVariable, opacityValue }) => {
      if (opacityValue !== undefined) {
          	return `hsla(${h}, ${s}, ${l}, ${opacityValue})`
      }
      if (opacityVariable !== undefined) {
          	return `hsla(${h}, ${s}, ${l}, var(${opacityVariable}, 1))`
      }
      return `hsl(${h}, ${s}, ${l})`
  }
}

/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./resources/**/*.blade.php",
		"./resources/**/*.js",
		"./resources/**/*.vue",
		"./node_modules/@themesberg/flowbite/**/*.js"
	],
  	theme: {
		extend: {
			colors: {
				primary: {
					DEFAULT: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'var(--color-primary-l)'),
					100: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) + 30%)'),
					200: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) + 24%)'),
					300: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) + 18%)'),
					400: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) + 12%)'),
					500: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) + 6%)'),
					600: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'var(--color-primary-l)'),
					700: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) - 6%)'),
					800: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) - 12%)'),
					900: dynamicHsl('var(--color-primary-h)', 'var(--color-primary-s)', 'calc(var(--color-primary-l) - 18%)'),
				},
			},
		}
  	},
	plugins: [
		require('@tailwindcss/forms'),
		require("tailwindcss-animate"),
		require('flowbite/plugin'),
		require('@tailwindcss/aspect-ratio'),
		require('@tailwindcss/typography'),
		require('tailwind-scrollbar'),
	],
}