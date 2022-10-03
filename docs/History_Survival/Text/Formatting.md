# Formatting text

## Colors

<style>
    .color{
        height:0;
        width: 100%;
        padding-bottom:30%;
        border-style: inset;
    }
</style>

In the table below are all acepted named colors in formating. You don't have to use these, you may use raw hex codes, in the format of #rrggbb where 'r' is red, 'g' is green 'b' is blue. Also all of the names below are **not translated**.

| Name        | Code        | Hex         | Output                                                 |
| ----------- | ----------- | ----------- | ------------------------------------------------------ |
| black       | §0          | #000000     | <div class="color" style="background-color: #000000;"> |
| dark_blue   | §1          | #0000AA     | <div class="color" style="background-color: #0000AA;"> |
| dark_green  | §2          | #00AA00     | <div class="color" style="background-color: #00AA00;"> |
| dark_aqua   | §3          | #00AAAA     | <div class="color" style="background-color: #00AAAA;"> |
| dark_red    | §4          | #AA0000     | <div class="color" style="background-color: #AA0000;"> |
| dark_purple | §5          | #AA00AA     | <div class="color" style="background-color: #AA00AA;"> |
| gold        | §6          | #FFAA00     | <div class="color" style="background-color: #FFAA00;"> |
| gray        | §7          | #AAAAAA     | <div class="color" style="background-color: #AAAAAA;"> |
| dark_gray   | §8          | #555555     | <div class="color" style="background-color: #555555;"> |
| blue        | §9          | #5555FF     | <div class="color" style="background-color: #5555FF;"> |
| green       | §a          | #55FF55     | <div class="color" style="background-color: #55FF55;"> |
| aqua        | §b          | #55FFFF     | <div class="color" style="background-color: #55FFFF;"> |
| red         | §c          | #FF5555     | <div class="color" style="background-color: #FF5555;"> |
| light_purple| §d          | #FF55FF     | <div class="color" style="background-color: #FF55FF;"> |
| yellow      | §e          | #FFFF55     | <div class="color" style="background-color: #FFFF55;"> |
| white       | §f          | #FFFFFF     | <div class="color" style="background-color: #FFFFFF;"> |

## Extra formating

There are some extra codes which do not modify the color of text, but modify how it behaves. These cannont be used in the [JsonTextComponment](/History_Survival/Text/Json/) color porporty, but can be used in their named individual proporties.
However any 'codes' can be used in raw strings, e.g. the 'text' property of [JsonTextComponments](/History_Survival/Text/Json/) or chat messages.

| Name          | Code        | Output                     |
| ------------- | ----------- | -------------------------- |
| obfuscated    | §k          | <p id="obfuscated"></p>    |
| bold          | §l          | <p id="bold"></p>          |
| strikethrough | §m          | <p id="strikethrough"></p> |
| underline     | §n          | <p id="underline"></p>     |
| italic        | §o          | <p id="italic"></p>        |
| reset         | §r          | <p id="reset"></p>         |

<script>

</script>