---
layout: default
title: "ALACRITTY configuration"
description: "A short description for this page."
---

### ALACRITTY, THE BEST TERMINAL

My configuration

```toml
[colors]
draw_bold_text_with_bright_colors = true
transparent_background_colors = true


[colors.bright]
black = "#575b70"
blue = "#caa9fa"
cyan = "#9aedfe"
green = "#5af78e"
magenta = "#ff92d0"
red = "#ff6e67"
white = "#e6e6e6"
yellow = "#f4f99d"

[colors.normal]
black = "#000000"
blue = "#caa9fa"
cyan = "#8be9fd"
green = "#50fa7b"
magenta = "#ff79c6"
red = "#ff5555"
white = "#bfbfbf"
yellow = "#f1fa8c"

[colors.primary]
background = "#282a36"
foreground = "#f8f8f2"

[cursor]
unfocused_hollow = true

[cursor.style]
blinking = "on"
shape = "Underline"

[font]
size = 11.0

[font.bold]
family = "MesloLGS NF"
style = "Bold"

[font.bold_italic]
family = "MesloLGS NF"
style = "Bold Italic"

[font.italic]
family = "MesloLGS NF"
style = "Italic"

[font.normal]
family = "MesloLGS NF"
style = "Regular"

[[keyboard.bindings]]
action = "Paste"
key = "V"
mods = "Control|Shift"

[[keyboard.bindings]]
action = "Paste"
key = "V"
mods = "Control"

[[keyboard.bindings]]
action = "Copy"
key = "C"
mods = "Control|Shift"

[[keyboard.bindings]]
action = "Copy"
key = "C"
mods = "Control"

[[keyboard.bindings]]
action = "SpawnNewInstance"
key = "N"
mods = "Command"

[[keyboard.bindings]]
action = "Quit"
key = "Q"
mods = "Alt"

[[keyboard.bindings]]
action = "ToggleFullscreen"
key = "Return"
mods = "Alt"

[[keyboard.bindings]]
action = "IncreaseFontSize"
key = "Plus"
mods = "Control"

[[keyboard.bindings]]
action = "DecreaseFontSize"
key = "Minus"
mods = "Control"

[[keyboard.bindings]]
action = "ResetFontSize"
key = "Key0"
mods = "Control"

[mouse]
hide_when_typing = true

[scrolling]
history = 10000
multiplier = 10

[selection]
save_to_clipboard = true
semantic_escape_chars = ",│`|:\"' ()[]{}<>"

[terminal.shell]
program = "powershell"

[window]
decorations = "Full"
startup_mode = "Windowed"
opacity = 0.95

[window.dimensions]
columns = 172
lines = 46

[window.padding]
x = 15
y = 15

[window.position]
x = 100
y = 100

[general]
live_config_reload = true
working_directory = 'C:\\Users\\<your_user>\\'

[terminal]

``` 
