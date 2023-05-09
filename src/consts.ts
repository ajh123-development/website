export const SITE = {
	title: 'Miners Online',
	description: 'Miners Online - the developers of History Survival.',
	defaultLanguage: 'en_gb',
} as const;

export const OPEN_GRAPH = {
	image: {
		src: 'https://github.com/withastro/astro/blob/main/assets/social/banner-minimal.png?raw=true',
		alt:
			'astro logo on a starry expanse of space,' +
			' with a purple saturn-like planet floating in the right foreground',
	},
	twitter: '',
};

export const KNOWN_LANGUAGES = {
	'English UK': 'en_gb',
	'English US': 'en_us',
} as const;
export const KNOWN_LANGUAGE_CODES = Object.values(KNOWN_LANGUAGES);

export const GITHUB_EDIT_URL = `https://github.com/ajh123-development/website/tree/main`;

export const COMMUNITY_INVITE_URL = `https://discord.gg/MMwxg32`;

export type Sidebar = Record<
	(string)[number],
	Record<string, { text: string; link: string }[]>
>;
export const SIDEBAR: Sidebar = {};


import type { SiteConfig } from "./site-config";
import HISTORY_SURVIVAL from "./sites/HistorySurvival/site-config.json";
const siteConfig: SiteConfig = HISTORY_SURVIVAL;

Object.keys(siteConfig.projects.docs).forEach(function(lang) {
	SIDEBAR[lang] = {}
	SIDEBAR[lang][siteConfig.site_name[lang]] = []
	Object.keys(siteConfig.projects.docs[lang].sidebar).forEach(function(pageIndex) {
		var page = siteConfig.projects.docs[lang].sidebar[pageIndex]
		var newPage = {
			text: page.text,
			link: "."+page.link
		}
		SIDEBAR[lang][siteConfig.site_name[lang]][(pageIndex as unknown) as number] = newPage;
	});
});
