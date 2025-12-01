<a id="readme-top"></a>

# Pipeline

The Nacosvel Components

[![GitHub Tag][GitHub Tag]][GitHub Tag URL]
[![Total Downloads][Total Downloads]][Packagist URL]
[![Packagist Version][Packagist Version]][Packagist URL]
[![Packagist PHP Version Support][Packagist PHP Version Support]][Repository URL]
[![Packagist License][Packagist License]][Repository URL]

<!-- TABLE OF CONTENTS -->
<details>
    <summary>Table of Contents</summary>
    <ol>
        <li><a href="#installation">Installation</a></li>
        <li><a href="#usage">Usage</a></li>
        <li><a href="#contributing">Contributing</a></li>
        <li><a href="#contributors">Contributors</a></li>
        <li><a href="#license">License</a></li>
    </ol>
</details>

<!-- INSTALLATION -->

## Installation

You can install the package via [Composer]:

```bash
composer require nacosvel/pipeline
```

<p align="right">[<a href="#readme-top">back to top</a>]</p>

<!-- USAGE EXAMPLES -->

## Usage

```php
$pipeline = new Nacosvel\Pipeline\Pipeline();

$pipeline = $pipeline->send($passable = 'hello')->through([
    new Middleware,
])->then(function ($passable) {
    return $passable;
});

var_dump($pipeline);
```

```php
$hub = new Nacosvel\Pipeline\Hub();

$hub->pipeline('pipeline', function (Pipeline $pipeline, $passable) {
    return $pipeline->send($passable)->through([
        new Middleware,
    ])->thenReturn();
});

$hub->pipelines('pipelines', [
    new Middleware,
]);

var_dump($hub->pipe($passable = 'hello', 'pipeline'));
var_dump($hub->pipe($passable = 'hello', 'pipelines'));
```

<!-- CONTRIBUTING -->

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">[<a href="#readme-top">back to top</a>]</p>

<!-- CONTRIBUTORS -->

## Contributors

Thanks goes to these wonderful people:

<a href="https://github.com/nacosvel/pipeline/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=nacosvel/pipeline" alt="contrib.rocks image" />
</a>

Contributions of any kind are welcome!

<p align="right">[<a href="#readme-top">back to top</a>]</p>

<!-- LICENSE -->

## License

Distributed under the MIT License (MIT). Please see [License File] for more information.

<p align="right">[<a href="#readme-top">back to top</a>]</p>

[GitHub Tag]: https://img.shields.io/github/v/tag/nacosvel/pipeline

[Total Downloads]: https://img.shields.io/packagist/dt/nacosvel/pipeline?style=flat-square

[Packagist Version]: https://img.shields.io/packagist/v/nacosvel/pipeline

[Packagist PHP Version Support]: https://img.shields.io/packagist/php-v/nacosvel/pipeline

[Packagist License]: https://img.shields.io/github/license/nacosvel/pipeline

[GitHub Tag URL]: https://github.com/nacosvel/pipeline/tags

[Packagist URL]: https://packagist.org/packages/nacosvel/pipeline

[Repository URL]: https://github.com/nacosvel/pipeline

[GitHub Open Issues]: https://github.com/nacosvel/pipeline/issues

[Composer]: https://getcomposer.org

[License File]: https://github.com/nacosvel/pipeline/blob/main/LICENSE
