# Lego Builder

**Lego Builder** is a simple open-source _page-builder_ that works on the main PHP Content Management System (Wordpress, PrestaShop) with a special focus on performance, code quality and a clean front-end developer environment. [Check all available and future features](#features)

This repository contains the source code of the framework as well as modules for CMS, **exclusively for development and previewin** To download the latest public stable release, please visit the [releases page](https://github.com/ca-joue-ce-soir/legobuilder/releases).

## Features

- Widget creation made easy
- Focus on performance
- Scalable editor
- Special attention to the user experience
- Simple implementation for each CMS
- And a lot more, [see the documentation](#)

## Installation

Make sure you have Docker installed ([download](https://www.docker.com/)) and NodeJS ([download](https://nodejs.org/en/download)).

Initialize your project by cloning the repository ``git clone git@github.com:ca-joue-ce-soir/legobuilder.git`` and use Docker 
to create your PrestaShop environment:

```bash
docker-compose up -d
```

```bash
docker exec -it legobuilder_prestashop /bin/sh  # To enter the prestashop docker
npm install & npm run dev # To develop the editor on your environment
```

You can access **PrestaShop** at the following address: http://localhost.

## License

GNU General Public License v3.0 or later

See [LICENSE](/LICENSE) to see the full text.