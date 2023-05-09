import { defineCollection, z } from 'astro:content';
import { SITE } from '../consts.js';

const docs = defineCollection({
	schema: z.object({
		title: z.string().default(SITE.title),
		description: z.string().default(SITE.description),
		dir: z.union([z.literal('ltr'), z.literal('rtl')]).default('ltr'),
		image: z
			.object({
				src: z.string(),
				alt: z.string(),
			})
			.optional(),
		ogLocale: z.string().optional(),
		tags: z.array(z.string()),
	}),
});

const blog = defineCollection({
	schema: z.object({
		title: z.string().default(SITE.title),
		pubDate: z.string(),
		description: z.string().default(SITE.description),
		authors: z.array(z.string()),
		tags: z.array(z.string()),
	}),
});

const legal = defineCollection({
	schema: z.object({
		title: z.string().default(SITE.title),
		description: z.string().default(SITE.description),
		authors: z.array(z.string()),
		tags: z.array(z.string()),
	}),
});


export const collections = { docs, blog, legal };
