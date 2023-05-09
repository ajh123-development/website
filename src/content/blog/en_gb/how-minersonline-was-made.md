---
title: 'How its made. The Miners Online Website!'
pubDate: '2023-02-05'
description: 'How the Miners Online Website was made using Astro!'
authors: ['ajh123']
tags: ["astro", "miners online", "web development"]
---

## Introduction

Previously we have had a website for years. Originally just plain HTML / CSS, then we had a simple site which had pages generated with PHP, then [MkDocs](https://www.mkdocs.org/) which can be used to generate HTML pages from a simple Markdown document, then MkDocs with a mixture of PHP.

Our previous iteration of our site was done with MkDocs (with the [Material theme](https://squidfunk.github.io/mkdocs-material/)). It was great when we needed simple static pages but we eventually needed some dynamic content done with PHP. A solution was made, the [miners-utils](https://github.com/ajh123-development/website/tree/33d670e2e73f0153936d3a4873900927e00f71aa/miners_utils) python extension. It simply turned all the `.html` pages to `.php`. This means we could use our PHP again! But, it resulted in our website's source being a mess and forcing users to add the `.php` extension to the URL.

With the messy source code, if we needed a more complex design it would be harder to change things around. So a better solution was needed.

## The Idea

We needed something like [React](https://reactjs.org/) which is a "JavaScript library for building user interfaces" but it can use Markdown files like MkDocs. React allows websites to be designed with JSX (JavaScript with XML), you are allowed to use normal HTML tags inside a special JavaScript file. React also allows you to create components, which are like snippets of code branded inside a new HTML element, and components can be imported across different pages which will make sure the design of the website stays the same.

But what about Markdown?

Markdown is a simple document format which allows you to use a plain text document but use certain symbols to change the rendering of the text. (This blog post is made in Markdown!)
However by default, React dose not support Markdown! So, all of our pre-existing documentation will not work with normal React (without a lot of work). We needed a plan ...

## The Plan

[Astro](https://astro.build/)! Astro is a similar system to React, it allows you to do everything thing React dose (in fact you can [make it use React](https://docs.astro.build/en/core-concepts/framework-components/)). Astro is very good, it allows you to make the same components and layouts, as you would in React, and you can make it render Markdown files! Finally ...

Astro even allows you to include your custom components inside your Markdown files and deploy your site to GitHub Pages to!

## The Solution

I needed to understand Astro, I already understood React so switching to Astro should be easy. Indeed it was. So I took the [Documentation template](https://github.com/withastro/astro/tree/latest/examples/docs?on=github) form Astro, then I re-branded the site and modified the links, and built a new nav-bar for the site and added support for a blog like pages.

Of course I needed to add my pre existing Markdown files to the mix.

Finally the site was stored in my exiting [GitHub Repository](https://github.com/ajh123-development/website). As a result I was able to publish the site to GitHub Pages and the site will be online forever! I then rerouted the CNAME record on the root of my domain to the GitHub Pages address - but made sure a Service record was pointing to the right place for my Minecraft server to work properly.

Then the rest was history I guess?
