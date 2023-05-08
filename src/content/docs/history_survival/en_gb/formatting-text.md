---
title: "Formatting Text"
description: "A Guide on how to format text in History Survival"
tags: ["miners online", "history survival", "formatting", "text"]
---

## Colors

<style>
    .color{
        height: 50px;
        width: 120%;
        padding-bottom:30%;
        border-style: inset;
    }
</style>

In the table below are all acepted named colors in formating. You don't have to use these, you may use raw hex codes, in the format of #rrggbb where 'r' is red, 'g' is green 'b' is blue. Also all of the names below are **not translated**. Color codes cannot be used in the [JsonTextComponment](/docs/en/history-survival/json-text) ```color``` porporty.

??? note "JavaScript notice" 
    You may need to enable JavaScript for all of the text outputs to work below.

| Name         | Code | Hex     | Output                                                 | Text                                         |
| ------------ | ---- | ------- | ------------------------------------------------------ | -------------------------------------------- |
| black        | §0   | #000000 | <div class="color" style="background-color: #000000;"> | <p id="black">§0I am black</p>               |
| dark_blue    | §1   | #0000AA | <div class="color" style="background-color: #0000AA;"> | <p id="dark_blue">§1I am dark_blue</p>       |
| dark_green   | §2   | #00AA00 | <div class="color" style="background-color: #00AA00;"> | <p id="dark_green">§2I am dark_green</p>     |
| dark_aqua    | §3   | #00AAAA | <div class="color" style="background-color: #00AAAA;"> | <p id="dark_aqua">§3I am dark_aqua</p>       |
| dark_red     | §4   | #AA0000 | <div class="color" style="background-color: #AA0000;"> | <p id="dark_red">§4I am dark_red</p>         |
| dark_purple  | §5   | #AA00AA | <div class="color" style="background-color: #AA00AA;"> | <p id="dark_purple">§5I am dark_purple</p>   |
| gold         | §6   | #FFAA00 | <div class="color" style="background-color: #FFAA00;"> | <p id="gold">§6I am gold</p>                 |
| gray         | §7   | #AAAAAA | <div class="color" style="background-color: #AAAAAA;"> | <p id="gray">§7I am gray</p>                 |
| dark_gray    | §8   | #555555 | <div class="color" style="background-color: #555555;"> | <p id="dark_gray">§8I am dark_gray</p>       |
| blue         | §9   | #5555FF | <div class="color" style="background-color: #5555FF;"> | <p id="blue">§9I am blue</p>                 |
| green        | §a   | #55FF55 | <div class="color" style="background-color: #55FF55;"> | <p id="green">§aI am green</p>               |
| aqua         | §b   | #55FFFF | <div class="color" style="background-color: #55FFFF;"> | <p id="aqua">§bI am aqua</p>                 |
| red          | §c   | #FF5555 | <div class="color" style="background-color: #FF5555;"> | <p id="red">§cI am red</p>                   |
| light_purple | §d   | #FF55FF | <div class="color" style="background-color: #FF55FF;"> | <p id="light_purple">§dI am light_purple</p> |
| yellow       | §e   | #FFFF55 | <div class="color" style="background-color: #FFFF55;"> | <p id="yellow">§eI am yellow</p>             |
| white        | §f   | #FFFFFF | <div class="color" style="background-color: #FFFFFF;"> | <p id="white">§fI am white</p>               |

## Extra formating

There are some extra codes which do not modify the color of text, but modify how it behaves. These cannont be used in the [JsonTextComponment](/docs/en/history-survival/json-text) ```color``` porporty, but can be used in their named individual proporties.
However any 'codes' can be used in raw strings, e.g. the ```text``` property of [JsonTextComponments](/docs/en/history-survival/json-text) or [chat messages](/docs/en/history-survival/multiplayer/#chat).


| Name          | Code | Usage and Output                                        |
| ------------- | ---- | ------------------------------------------------------- |
| obfuscated    | §k   | <p id="obfuscated">§kI am obfuscated</p>                |
| bold          | §l   | <p id="bold">§lI am bold</p>                            |
| strikethrough | §m   | <p id="strikethrough">§mI have been strikethroughed</p> |
| underline     | §n   | <p id="underline">§nI am underlined</p>                 |
| italic        | §o   | <p id="italic">§oI am using italic</p>                  |
| reset         | §r   | <p id="reset">§rI am normal</p>                         |

<script>
minerslib.mineParseElement("obfuscated")
minerslib.mineParseElement("bold")
minerslib.mineParseElement("strikethrough")
minerslib.mineParseElement("underline")
minerslib.mineParseElement("italic")
minerslib.mineParseElement("reset")

minerslib.mineParseElement("white")
minerslib.mineParseElement("yellow")
minerslib.mineParseElement("light_purple")
minerslib.mineParseElement("red")
minerslib.mineParseElement("aqua")
minerslib.mineParseElement("green")
minerslib.mineParseElement("blue")
minerslib.mineParseElement("dark_gray")
minerslib.mineParseElement("gray")
minerslib.mineParseElement("gold")
minerslib.mineParseElement("dark_purple")
minerslib.mineParseElement("dark_red")
minerslib.mineParseElement("dark_aqua")
minerslib.mineParseElement("dark_green")
minerslib.mineParseElement("dark_blue")
minerslib.mineParseElement("black")
</script>