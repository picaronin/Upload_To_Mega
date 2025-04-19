[![phpBB](https://www.phpbb-es.com/foro/styles/flat-style/theme/images/logo_new_small.png)](https://www.phpbb-es.com/foro/viewtopic.php?t=44409)
# [3.3][DEV] UploadToMega 3.3.0
This Extension endows our phpBB forum with the option to upload and host any type of file in [MEGA](https://mega.nz) when we are creating or editing a thread. Once uploaded, he make the download link to include in our forum message.
* You need to configure from the ACP the maximum size of the file to host, as well as the login data of the [MEGA](https://mega.nz) account to be used.
* It is totally viable to use a FREE account of [MEGA](https://mega.nz), which finally includes 20 GB of free storage.

## Requirements
* This Extension REQUIRES access to the server terminal (example: PuTTY) with ROOT access power.
* This Extension REQUIRES that has INSTALLED and OPERATING on OUR server, the [MEGA CMD](https://mega.io/es/cmd#download) tool.
* This Extension REQUIRES a server under [Debian](https://www.debian.org/) or [Ubuntu](https://ubuntu.com/)
* phpBB >= 3.3.9
* PHP >= 7.2.0
* This Extension is has checked on a server under Debian 12 with [MEGA CMD](https://mega.io/es/cmd#download) installed.
* **WARNING: IF YOUR SERVER DOES NOT MEET THESE REQUIREMENTS, THIS EXTENSION WILL NOT SERVE YOU FOR ANYTHING.**

## Install
1. Download the latest release.
2. In the `ext` directory of your phpBB board, copy the `pikaron/uploadtomega` folder. It must be so: `/ext/pikaron/uploadtomega`
3. Navigate in the ACP to `Customise -> Manage extensions`.
4. Look for `Upload To Mega` under the Disabled Extensions list, and click its `Enable` link.
5. Configure by navigating in the ACP -> POSTING -> Post settings -> Extension: `Upload To Mega`

## Uninstall
1. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
2. Look for `Upload To Mega` under the Enabled Extensions list, and click its `Disable` link.
3. To permanently uninstall, click `Delete Data` and then delete the `/ext/pikaron/uploadtomega` folder.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)