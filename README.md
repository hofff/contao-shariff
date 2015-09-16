# Shariff – Social media buttons with privacy

Contao CMS module and content element providing [Shariff] (https://github.com/heiseonline/shariff). For more information about Shariff, please refer to [heise online] (http://www.heise.de/ct/artikel/Shariff-Social-Media-Buttons-mit-Datenschutz-2467514.html).

## Features

Provides sharing links for:

- Facebook
- Twitter
- Google+
- WhatsApp
- LinkedIn
- Xing
- Pinterest
- Email (via mailto:)

You can choose your preferred service in the backend module or in the content element.

**NOTE:** For the time being, hofff/contao-shariff does not support the info button that links to the heise website. We do not think this is necessary at the moment, but might include it in the future.

## Options

- Choose a predefined or use the current URL for sharing
- Add a predefined sharing text instead of page title
- Add referrer track to URL
- "Twitter via" integration
- add an email subject
- add an email text
- Alignment: horizontal or vertical
- Color theme: standard or gray
- Display number of shares

**IMPORTANT:**

To use the social media icons in the frontend, you will need to integrate Font Awesome. Just add the CSS from the Bootstrap CDN `//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css` (`<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">`) to your layout. You also have to include jQuery.

For now the installation is just possible via composer. A manual installation will not be working because the requirements will not be resolved.
