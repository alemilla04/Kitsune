/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./Models/**/*.{html,js,php}", "./Views/**/*.{html,js,php}"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}

