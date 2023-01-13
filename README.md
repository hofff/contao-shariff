**This repository will not be maintained anymore, because the based repository is not maintained since more than two years. Please see https://github.com/hofff/contao-shariff/issues/34**
--

# Shariff – Social media buttons with privacy

Contao CMS module and content element providing [Shariff](https://github.com/heiseonline/shariff). For more information about Shariff, please refer to [heise online](http://www.heise.de/ct/artikel/Shariff-Social-Media-Buttons-mit-Datenschutz-2467514.html).

## Features

Provides sharing links for:

- AddThis
- diaspora*
- facebook
- Flattr
- Flipboard
- LinkedIn
- Mail (via mailto:)
- Pinterest
- Print
- Qzone
- reddit
- StumbleUpon
- Telegram
- Tencent Weibo
- Threema
- Tumblr
- Twitter
- VK
- Weibo
- WhatsApp
- XING

You can choose your preferred service in the backend module or in the content element.

**NOTE:** For the time being, `hofff/contao-shariff` does not support the info button that links to the heise website. We do not think this is necessary at the moment, but might include it in the future.

## Options

- Choose a predefined or use the current URL for sharing
- Add a predefined sharing text instead of page title
- Add referrer track to URL
- "Twitter via" integration
- Add an email subject
- Add an email text
- Alignment: horizontal or vertical
- Color theme: standard or gray
- Display number of shares

**IMPORTANT:**

To use the social media icons in the frontend, you have to include Font Awesome. Since Shariff v3 only Font Awesome v5 is supported. So just add the CSS `<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">` to your layout. You also have to include jQuery.

## Installation

Add via Contao-Manager or run the composer command from the CLI inside your Contao root directory: `composer require hofff/contao-shariff` (requires composer to be installed globally)
