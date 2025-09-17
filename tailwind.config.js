/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: "#0EA5A5",   // Turquesa CEAR
          dark: "#0B7C7C",      // Turquesa oscuro
          light: "#14B8B8",     // Turquesa claro
        },
        secondary: {
          DEFAULT: "#005F73",   // Azul petróleo
          light: "#0A9396",
          dark: "#00343D",
        },
        neutral: {
          DEFAULT: "#334155",   // Gris oscuro texto
          light: "#64748B",     // Gris claro
        },
        background: {
          DEFAULT: "#F8FAFC",   // Fondo gris muy claro
          dark: "#1E293B",      // Fondo oscuro (footer)
        },
      },
      fontFamily: {
        sans: ["Inter", "ui-sans-serif", "system-ui"], // Fuente moderna
      },
    },
  },
  plugins: [],
}
