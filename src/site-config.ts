export interface SiteConfig {
	github_edit_url: string;
	content_path: string;
	site_slug: string;
	site_name: Record<string, string>;
	projects: Record<string, Record<string, Record<string, any>>>;
}
