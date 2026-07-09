module.exports = {
  content: [
    "./app/Views/**/*.php",
    "./public/**/*.js"
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        "on-tertiary-fixed-variant": "#703700",
        "tertiary-container": "#d97721",
        "secondary": "#b8c4ff",
        "on-primary-fixed": "#07006c",
        "surface-bright": "#3a3939",
        "on-primary-fixed-variant": "#2f2ebe",
        "surface": "#131313",
        "on-secondary": "#1a2b6a",
        "on-secondary-container": "#a2b1f9",
        "surface-container-high": "#2a2a2a",
        "primary": "#c0c1ff",
        "on-secondary-fixed": "#001354",
        "secondary-fixed": "#dde1ff",
        "inverse-surface": "#e5e2e1",
        "primary-fixed": "#e1e0ff",
        "surface-container": "#201f1f",
        "surface-container-lowest": "#0e0e0e",
        "surface-container-low": "#1c1b1b",
        "tertiary-fixed": "#ffdcc5",
        "tertiary-fixed-dim": "#ffb783",
        "surface-variant": "#353534",
        "error": "#ffb4ab",
        "background": "#131313",
        "inverse-on-surface": "#313030",
        "outline": "#908fa0",
        "secondary-fixed-dim": "#b8c4ff",
        "on-tertiary-fixed": "#301400",
        "inverse-primary": "#494bd6",
        "on-tertiary-container": "#452000",
        "secondary-container": "#334282",
        "primary-container": "#8083ff",
        "on-background": "#e5e2e1",
        "surface-dim": "#131313",
        "primary-fixed-dim": "#c0c1ff",
        "error-container": "#93000a",
        "surface-container-highest": "#353534",
        "on-error-container": "#ffdad6",
        "tertiary": "#ffb783",
        "on-primary": "#1000a9",
        "on-tertiary": "#4f2500",
        "on-surface": "#e5e2e1",
        "surface-tint": "#c0c1ff",
        "on-error": "#690005",
        "outline-variant": "#464554",
        "on-surface-variant": "#c7c4d7",
        "on-secondary-fixed-variant": "#334282",
        "on-primary-container": "#0d0096"
      },
      borderRadius: {
        "DEFAULT": "0.25rem",
        "lg": "0.5rem",
        "xl": "0.75rem",
        "full": "9999px"
      },
      spacing: {
        "margin-desktop": "64px",
        "margin-mobile": "20px",
        "container-max": "1280px",
        "unit": "4px",
        "gutter": "24px",
        "section-gap": "120px",
        "section-gap-mobile": "60px"
      },
      fontFamily: {
        "body-md": ["Inter"],
        "label-md": ["Inter"],
        "body-lg": ["Inter"],
        "display": ["Outfit"],
        "headline-lg-mobile": ["Outfit"],
        "headline-md": ["Outfit"],
        "headline-lg": ["Outfit"]
      },
      fontSize: {
        "body-md": ["16px", {
          "lineHeight": "24px",
          "fontWeight": "400"
        }],
        "label-md": ["14px", {
          "lineHeight": "20px",
          "letterSpacing": "0.05em",
          "fontWeight": "600"
        }],
        "body-lg": ["18px", {
          "lineHeight": "28px",
          "fontWeight": "400"
        }],
        "display": ["72px", {
          "lineHeight": "80px",
          "letterSpacing": "-0.02em",
          "fontWeight": "700"
        }],
        "headline-lg-mobile": ["32px", {
          "lineHeight": "40px",
          "fontWeight": "600"
        }],
        "headline-md": ["32px", {
          "lineHeight": "40px",
          "fontWeight": "600"
        }],
        "headline-lg": ["48px", {
          "lineHeight": "56px",
          "letterSpacing": "-0.01em",
          "fontWeight": "600"
        }]
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/container-queries')
  ],
}
