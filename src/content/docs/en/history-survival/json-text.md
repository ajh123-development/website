---
title: "Creating text with JSON"
description: "A guide to Json Text Componments"
tags: ["miners online", "history survival", "json", "text"]
---

## JSONTextComponents

Text can be created using JSON. Below are the properties which can be used, this is known as a JSONTextComponent or referenced as 'Component' on this page . All the properties are optional.

```json
{
    "text": "A string",
    "translate": "",
    //A translation identifier, this will match up the text 
    //defined in the client's current language.
    "with": [
        //A list of Components which will be used to fill in the 
        //translation's arguments. This will only work if the 'translate'
        //property is set.
    ],
    "score": {
        "name": "", //A name of a player or a valid selector.
        "objective": "", //A valid objective.
        "value": "" //This will be displayed regardless of the resulted score.
    },
    "selector": "", 
    //A valid selector which will be used to display the names of resulted
    //entities.
    "color": "", //A color as defined in (/History_Survival/Text/Formatting/).
    "bold": true|false,
    "italic": true|false,
    "underline": true|false,
    "strikethrough": true|false,
    "obfuscated": true|false,
    "insertion": "", 
    //When this Component is shift-clicked by a player, 
    //this string is inserted in their chat input. 
    //It does not overwrite any existing text the player was writing. 
    //This only works for Components sent in the chat.
    "clickEvent": { //See below 
        "action": "",
        "value": ""
    },
    "hoverEvent": { //See below 
        "action": "",
        "value": ""
    },
    "extra": [
        //A list of JSONTextComponents which will be displayed after this one.
    ]
}
```

## Click Events

## Hover Events