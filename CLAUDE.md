# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Hugo-based multilingual portfolio website (English/French) using the GoFolium theme, deployed via GitHub Pages to ahmed78.me.

## Common Commands

### Development and Build
```bash
# Start Hugo development server
hugo server

# Build the site for production (outputs to /public)
hugo --minify

# Build with specific environment
HUGO_ENVIRONMENT=production HUGO_ENV=production hugo --minify --baseURL "https://ahmed78.me/"
```

### Theme Development
```bash
# Watch SCSS changes (if using external SCSS compiler)
# Note: Hugo handles SCSS compilation via its asset pipeline
```

## Architecture

### Multilingual Structure
- **English**: `content/english/` (primary language, weight 1)
- **French**: `content/french/` (secondary language, weight 2)
- Language-specific data: `data/en/homepage.yml` and `data/fr/homepage.yml`
- UI translations: `i18n/en.yaml` and `i18n/fr.yaml`

### Content Types
- **Projects**: Markdown files in `content/[lang]/projects/`
- **Blogs**: Markdown files in `content/[lang]/blogs/`
- **Publications**: Academic/professional publications
- **Talks**: Speaking engagements and presentations
- **Contact**: Single page with web3forms.com integration

### Theme Customization
- **Base theme**: GoFolium located in `themes/gofolium/`
- **Custom CSS**: `static/css/custom.css` for style overrides
- **Assets**: SCSS in `themes/gofolium/assets/scss/` with modular structure
- **Color scheme**: Primary green (#14AF4A), dark theme

### Configuration Files
- **Main config**: `config.toml` - site settings, languages, navigation, plugins
- **Homepage content**: `data/[lang]/homepage.yml` - data-driven homepage sections
- **Translations**: `i18n/[lang].yaml` - UI text translations

### Key Features
- Particle.js animated background (configurable via `params.particles = true`)
- Contact form using web3forms.com API
- Language-specific CV downloads in `static/files/[lang]/CV.pdf`
- Custom education timeline and experience cards
- Bootstrap + custom SCSS architecture

### Deployment
- **Platform**: GitHub Pages
- **Workflow**: `.github/workflows/hugo.yml`
- **Hugo version**: 0.120.4 (specified in workflow)
- **Domain**: ahmed78.me (configured via CNAME)
- **Trigger**: Automatic on push to main branch

### Asset Management
- **CSS Plugins**: Bootstrap, Themify Icons, Font Awesome, custom CSS
- **JS Plugins**: jQuery, Bootstrap JS, Particles.js, reading time calculator
- **Images**: Stored in `static/images/` with organized subdirectories
- **Static files**: CV documents, favicon, and other assets in `static/`

## Development Notes

### Content Updates
- Homepage sections are controlled via YAML files in `data/[lang]/homepage.yml`
- Each section can be enabled/disabled with boolean flags
- Projects, blogs, and other content use Hugo's front matter in markdown files

### Styling
- Custom styles should go in `static/css/custom.css`
- Theme SCSS variables are in `themes/gofolium/assets/scss/_variables.scss`
- Hugo compiles SCSS automatically via its asset pipeline

### Forms
- Contact form posts to web3forms.com API
- Form configuration is in the contact page front matter
- Language-specific form labels are in i18n files