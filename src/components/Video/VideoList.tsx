import React, { useState, useEffect } from 'react';
import { Video, VideoInfo } from './Video';
import './Videos.css'


interface VideoListProps {
	currentChannelId: string
};

export function VideoList(props: VideoListProps) {
	const [videos, setVideos] = useState<VideoInfo[]>([]);

    const baseUrl = 'https://api.rss2json.com/v1/api.json?rss_url=https%3A%2F%2Fwww.youtube.com%2Ffeeds%2Fvideos.xml%3Fchannel_id%3D';

	useEffect(() => {
		(async () => {
			if (props.currentChannelId) {
				try {
					const data = await fetch(`${baseUrl}${props.currentChannelId}`).then(response => response.json());
					setVideos(data.items);
				} catch (error) {
					console.log(error);
				}
			}
		})();
	}, [props.currentChannelId]);

	return (
		<div className="app-container">
			<div className="videos">
				{videos.map(video => <Video key={video.guid} video={video} />)}
			</div>
		</div>
	);
}