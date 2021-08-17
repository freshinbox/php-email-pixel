# php-email-pixel

Open tracker for email with external CSS pixel option. 

https://freshinbox.com/blog/how-to-build-your-own-email-open-tracking-pixel/

Parameters:
- p:  A unique value to track.
- ext_css (optional): Generate CSS that loads an "external CSS pixel". 
- css_pixel: Auto generated by ext_css option that records an external CSS pixel open.

Logging notes:
- Request contains only "p", it will be logged as "Regular pixel fetched". 
- Request contains "ext_css", it will be logged as "External CSS fetched". 
- Request contains "css_pixel", it will be logged as "CSS pixel fetched". 

To use regular pixel:
```
<img src="https://myserver.com/path/to/pixel.php?p=mypixel123" width=1>
```

To use External CSS pixel (only for email clients that support external CSS):
```
<link rel="stylesheet" href="https://myserver.com/path/to/pixel.php?p=mypixel123&ext_css=1">
```

