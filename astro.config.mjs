import { defineConfig } from 'astro/config';
import preact from '@astrojs/preact';
import react from '@astrojs/react';

// https://astro.build/config
import cloudflare from "@astrojs/cloudflare";

// https://astro.build/config
export default defineConfig({
  integrations: [
  // Enable Preact to support Preact JSX components.
  preact(),
  // Enable React for the Algolia search component.
  react()],
  site: `https://minersonline.tk`,
  vite: {
    resolve: {
      preserveSymlinks: true
    }
  },
  output: "server",
  adapter: cloudflare()
});