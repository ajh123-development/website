import React from 'react';
import './Videos.css'

export interface VideoInfo {
	title: string,
	link: string,
	guid: string
};


interface VideoProps {
	video: VideoInfo
};

export function Video(props: VideoProps) {
	return (
		<div className="videos__item">
			<div className="video__image">
				<a target="_blank" href={props.video.link}>
					<img src={`https://i4.ytimg.com/vi/${props.video.guid.split(':')[2]}/mqdefault.jpg`} />
				</a>
			</div>
			<div className="video__footer">
				<p>{props.video.title}</p>
			</div>
		</div>
	)
}