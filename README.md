# H5P X-FrameOptions module

Checks if `X-Frame-Options` header is present for the H5P embed endpoint and
sets the value to `ALLOWALL`. This would allow the content to be embedded in
any context.

The solution logic is based on
[x_frame_options](https://www.drupal.org/project/x_frame_options) module and
[this](https://ipfs-sec.stackexchange.cloudflare-ipfs.com/drupal/A/question/188924.html)
discussion.

Current solution is required until the main H5P module implements something
similar as part of its codebase.

**Please note** that check for the path is strict and would only allow two path
variations to match: `/h5p/<ID>/embed` and `/h5p/<ID>/embed/`


## Usage

Install and activate the module.
