# Lego Builder

**Lego Builder** is a simple open-source _page-builder_ that works on the main PHP Content Management System (Wordpress, PrestaShop) with a special focus on performance, code quality and a clean front-end developer environment. [Check all available and future features](#features)

This repository contains the source code of the framework as well as modules for CMS, **exclusively for development and previewin** To download the latest public stable release, please visit the [releases page](https://github.com/ca-joue-ce-soir/legobuilder/releases).

## Features

- Widget creation made easy
- Focus on performance
- Scalable editor
- Special attention to the user experience
- CMS Agnostis, fast implementation
- And a lot more, [see the documentation](#)

## Installation

Make sure you have Docker installed ([download](https://www.docker.com/)).

Initialize your project by cloning the repository ``git clone git@github.com:ca-joue-ce-soir/legobuilder.git`` and use Docker 
to create your development environment:

```bash
docker-compose --profile [prestashop,wordpress,all] up -d
```

The **legobuilder_development** (*latest Node LTS with PHP 7.3*) container will allow you to bundle your JS files and access PHP Composer :

```bash
docker exec -it legobuilder_development /bin/bash
```

You can access **PrestaShop** at the following address: http://localhost and **Wordpress** at the following address: http://localhost:8080/

## License

GNU General Public License v3.0 or later

See [LICENSE](/LICENSE) to see the full text.