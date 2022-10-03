# Creating text with JSON

Text can be created using JSON. Below are the properties which can be used, this is known as a JSONTextComponent.

```json
{
    "text": "A string",
    "translate": "",
    "with": [
        "",
        "",
    ],
    "score": {
        "name": "",
        "objective": "",
        "value": ""
    },
    "selector": "",
    "color": "//A color as defined in (/History_Survival/Text/Colors/)",
    "bold": true|false,
    "italic": true|false,
    "underline": true|false,
    "strikethrough": true|false,
    "obfuscated": true|false,
    "insertion": "",
    "clickEvent": {
        "action": "",
        "value": ""
    },
    "hoverEvent": {
        "action": "",
        "value": ""
    },
    "extra": [
        //A list of JSONTextComponents
    ]
}
```