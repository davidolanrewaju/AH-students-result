module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      extend: {},
      colors: {
        transparent: 'transparent',
        current: 'currentColor',
        'white': '#ffffff',
        'primary-50': '#e6e9ec',
        'primary-100': '#b0bac3',
        'primary-200': '#8a98a7',
        'primary-300': '#54697e',
        'primary-400': '#334c65',
        'primary-500': '#001f3f',
        'primary-600': '#001c39',
        'primary-700': '#00162d',
        'primary-800': '#001123',
        'primary-900': '#000d1a',
        'secondary-50': '#f9f1eb',
        'secondary-100': '#edd2c0',
        'secondary-200': '#e4bca1',
        'secondary-300': '#d89e76',
        'secondary-400': '#d18b5c',
        'secondary-500': '#c56e33',
        'secondary-600': '#b3642e',
        'secondary-700': '#8c4e24',
        'secondary-800': '#6c3d1c',
        'secondary-900': '#532e15',
      },
    },
    plugins: [
        require('flowbite/plugin')
    ],
  }
