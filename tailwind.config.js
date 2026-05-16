import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import containerQueries from '@tailwindcss/container-queries';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                "tertiary-fixed": "#bdece2",
                "background": "#f8f9ff",
                "primary": "#006e2f",
                "secondary-fixed": "#dce1ff",
                "outline-variant": "#bccbb9",
                "surface-container-highest": "#d3e4fe",
                "on-tertiary-fixed": "#00201c",
                "inverse-surface": "#213145",
                "surface-dim": "#cbdbf5",
                "on-surface": "#0b1c30",
                "on-tertiary-container": "#1a4741",
                "primary-fixed-dim": "#4ae176",
                "primary-fixed": "#6bff8f",
                "on-surface-variant": "#3d4a3d",
                "surface-container-lowest": "#ffffff",
                "on-primary-container": "#004b1e",
                "inverse-on-surface": "#eaf1ff",
                "surface-bright": "#f8f9ff",
                "on-background": "#0b1c30",
                "on-secondary-fixed": "#00164e",
                "inverse-primary": "#4ae176",
                "on-tertiary-fixed-variant": "#224e47",
                "on-primary": "#ffffff",
                "primary-container": "#22c55e",
                "surface-variant": "#d3e4fe",
                "surface-container": "#e5eeff",
                "surface-container-low": "#eff4ff",
                "secondary": "#4059aa",
                "error": "#ba1a1a",
                "surface": "#f8f9ff",
                "on-primary-fixed-variant": "#005321",
                "on-secondary-fixed-variant": "#264191",
                "secondary-container": "#8fa7fe",
                "tertiary-fixed-dim": "#a2d0c6",
                "on-error": "#ffffff",
                "outline": "#6d7b6c",
                "surface-container-high": "#dce9ff",
                "on-primary-fixed": "#002109",
                "secondary-fixed-dim": "#b6c4ff",
                "on-error-container": "#93000a",
                "on-secondary": "#ffffff",
                "tertiary": "#3b665f",
                "tertiary-container": "#88b5ac",
                "on-secondary-container": "#1d3989",
                "error-container": "#ffdad6",
                "surface-tint": "#006e2f",
                "on-tertiary": "#ffffff"
            },
            borderRadius: {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px"
            },
            spacing: {
                "lg": "24px",
                "gutter": "16px",
                "xl": "40px",
                "xs": "4px",
                "margin-desktop": "64px",
                "sm": "8px",
                "md": "16px",
                "margin-mobile": "20px"
            },
            fontFamily: {
                sans: ['Manrope', ...defaultTheme.fontFamily.sans],
                "label-md": ["Manrope"],
                "headline-md": ["Manrope"],
                "headline-lg-mobile": ["Manrope"],
                "display-xl": ["Manrope"],
                "headline-lg": ["Manrope"],
                "body-lg": ["Manrope"],
                "body-md": ["Manrope"],
                "caption": ["Manrope"]
            },
            fontSize: {
                "label-md": ["14px", { "lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "600" }],
                "headline-md": ["24px", { "lineHeight": "32px", "fontWeight": "600" }],
                "headline-lg-mobile": ["24px", { "lineHeight": "32px", "fontWeight": "700" }],
                "display-xl": ["48px", { "lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "800" }],
                "headline-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700" }],
                "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
                "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                "caption": ["12px", { "lineHeight": "16px", "fontWeight": "500" }]
            }
        },
    },

    plugins: [forms, containerQueries],
};
