---
title: "Multiplayer"
description: "A guide on how Multiplayer will work in History Survival"
---

# **Since the [LibGDX Rewrite](https://github.com/ajh123-development/HistorySurvival/pull/2) pull request has been merged multiplayer is not functional!**

## Setting up

History Survival comes with multiplayer.

In order to play ```online-mode``` servers you must register an account, you may do so [here](/api/auth/register.php).

Once an account is created, you may look at your [profile information](/profile.php). Then you may download a copy of the launcher. This requires atleast Java 8 to be installed. You may be warned that the launcher is unidentified software.

## Using the Launcher
Currrently the launcher isn't downloadable, but please be paitent!

Instead the game can be [downloaded from Github](https://github.com/ajh123-development/HistorySurvival/releases) for now?

### Adding an account
The launcher will ask for account details. The username will be your email address used during account creation. Your password will be your password. Did you guess it, Sherlock?

### Starting the gane

## Chat

Messages in chat can use any color or formatting code as defined [here](/docs/en/history-survival/text/formatting). These codes begin with the § symbol (known as a section sign/symbol). A message can contain multiple codes, useful if you want a rainbow.

An example of multiple codes looks like this. You may need to enable JavaScript for the result to work properly.

<p>
    <div id="multiCodes">
        §a§nHello, World!
    </div>
</p>

<script>
minerslib.mineParseElement("multiCodes", "Result: ")
</script>