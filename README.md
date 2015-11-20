# PHP Slack Api


[![Software License](https://img.shields.io/badge/licence-%20GNU%20General%20Public%20License%20v3.0-brightgreen.svg)](LICENSE.md)
![](https://img.shields.io/badge/version-1.0.0-brightgreen.svg)

A complete native php wrapper for the [Slack API](https://api.slack.com/)

## Install

Via Composer

``` bash
$ composer require morningtrain/slack-api
```

## Usage

``` php
require 'vendor/autoload.php';
use MorningTrain\SlackApi\SlackApi;

define('SLACK_API_KEY', 'YOUR-SLACK-API-KEY');

$slack_client = new SlackApi(SLACK_API_KEY);
$result = $slack_client->getAllUsers();

```

## Security

If you discover any security related issues, please email mail@morningtrain.dk instead of using the issue tracker.

## Credits

- [morningtrain.dk](http://morningtrain.dk/)

## License

 GNU General Public License v3.0. Please see [License File](LICENSE.md) for more information.
