export const SITE = {
	title: 'Miners Online',
	description: 'Miners Online - the developers of History Survival.',
	defaultLanguage: 'en-us',
} as const;

export const OPEN_GRAPH = {
	image: {
		src: 'https://github.com/withastro/astro/blob/main/assets/social/banner-minimal.png?raw=true',
		alt:
			'astro logo on a starry expanse of space,' +
			' with a purple saturn-like planet floating in the right foreground',
	},
	twitter: 'astrodotbuild',
};

export const KNOWN_LANGUAGES = {
	English: 'en',
} as const;
export const KNOWN_LANGUAGE_CODES = Object.values(KNOWN_LANGUAGES);

export const GITHUB_EDIT_URL = `https://github.com/ajh123-development/website/tree/main`;

export const COMMUNITY_INVITE_URL = `https://discord.gg/MMwxg32`;

// See "Algolia" section of the README for more information.
export const ALGOLIA = {
	indexName: 'XXXXXXXXXX',
	appId: 'XXXXXXXXXX',
	apiKey: 'XXXXXXXXXX',
};

export type Sidebar = Record<
	(typeof KNOWN_LANGUAGE_CODES)[number],
	Record<string, { text: string; link: string }[]>
>;
export const SIDEBAR: Sidebar = {
	en: {
		'Miners Online': [
			{ text: 'Introduction', link: 'docs/en/introduction' },
		],
		'History Survival': [
			{ text: 'Introduction', link: 'docs/en/history-survival/' },
			{ text: 'Multiplayer', link: 'docs/en/history-survival/multiplayer/' },
			{ text: 'Text Formaatting', link: 'docs/en/history-survival/formatting/' },
			{ text: 'JSON text', link: 'docs/en/history-survival/JSON' },
		],
	},
};
