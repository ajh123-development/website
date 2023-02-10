import type { Component } from 'react';
import { useState, useEffect } from 'react';
// import { HTMLElement } from 'react/'
import { CSSTransition } from 'react-transition-group';
import './Navigation.css';

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faGear, faArrowRight, faArrowLeft} from '@fortawesome/free-solid-svg-icons'

library.add(faGear, faArrowRight, faArrowLeft)

interface NavItemProps {
	children?: string | JSX.Element | JSX.Element[]
	icon?: Component | undefined
	id: string
};

interface DropdownProps {
};

interface DropdownItemProps {
	children?: string | JSX.Element | JSX.Element[]
	leftIcon?: Component | String | JSX.Element | undefined 
	rightIcon?: Component | String | JSX.Element | undefined
	goToMenu?: string;
};


export function NavItem(props: NavItemProps) {
	const [open, setOpen] = useState<boolean>(false);
	return (
		<div className="nav-item">
			<a href='#' aria-pressed={open ? 'true' : 'false'} className="icon-button" onClick={() => {
					setOpen(!open);
				}}>
				{props.icon}
			</a>
			{open && props.children}
		</div>
	);
};

export function Dropdown(props: DropdownProps) {
	const [activeMenu, setActiveMenu] = useState<string>("main");
	const [menuHeight, setMenuHeight] = useState<number>(0);

	function calcHeight(e: HTMLElement) {
		console.log("asda")
		console.log(e)
		const height = e.offsetHeight + 30;
		setMenuHeight(height);
	}

	function DropdownItem(props: DropdownItemProps) {
		return (
			<a href="#" className="nav-dropdown-item" onClick={() => props.goToMenu && setActiveMenu(props.goToMenu)}>
				<span className="icon-button">{props.leftIcon}</span>
				{props.children}
				<span className="icon-right">{props.rightIcon}</span>
			</a>
		);
	};

	return (
		<div className="nav-dropdown" style={{ height: menuHeight }}> 
			<CSSTransition
				in={activeMenu === "main"} 
				unmountOnExit timeout={500} 
				classNames="menu-primary"
				onEnter={calcHeight}
				>
				<div className="menu">
					<DropdownItem>My Profile</DropdownItem>
					<DropdownItem 
						leftIcon={<FontAwesomeIcon icon="gear"/>} 
						rightIcon={<FontAwesomeIcon icon="arrow-right"/>}
						goToMenu="settings"
					>
						Settings
					</DropdownItem>
				</div>
			</CSSTransition>
			<CSSTransition 
				in={activeMenu === "settings"} 
				unmountOnExit 
				timeout={500} 
				classNames="menu-secondary"
				onEnter={calcHeight}
				>
				<div className="menu">
					<DropdownItem leftIcon={<FontAwesomeIcon icon="arrow-left"/>} goToMenu="main" ></DropdownItem>
					<DropdownItem>Settings</DropdownItem>
					<DropdownItem>Stuff</DropdownItem>
				</div>
			</CSSTransition>
		</div>
	);
};

export default { NavItem, Dropdown };
