# Code Quality

## Code standard style

### cs-fixer used library

like mollie-api-php

### how to integrate php-cs-fixer to CI/CD?

1. add php-cs-fixer in composer.json
2. set php-cs-fixer config file in project root folder
3. use github action to run.

```
name: Fix Code Style

on:
  push:
    paths:
      - "**.php"

jobs:
  php-code-styling:
    runs-on: ubuntu-latest
    timeout-minutes: 5

    steps:
      - name: Checkout code
        uses: actions/checkout@v4

      - name: Run PHP CS Fixer
        uses: docker://oskarstark/php-cs-fixer-ga
        with:
          args: --config=.php-cs-fixer.dist.php --allow-risky=yes

      - name: Commit linted files
        uses: stefanzweifel/git-auto-commit-action@v5
        with:
          commit_message: "Fixes coding style"
```
https://github.com/mollie/mollie-api-php/blob/master/.github/workflows/fix-codestyle.yml  

## Static Analysis

### phpstan 

like mollie, fruitcake, laravel framework

### how to integrate phpstan to CI/CD?

phpstan config file in project folder, how about phpstan? put in composer or standalone?

The answer is put in composer and then set github action.

1. add phpstan in composer.json
2. set phpstan config file in project root folder
3. use github action to run.

```
name: PHPStan

on:
  push:
    paths:
      - "**.php"
      - "phpstan.neon.dist"
      - ".github/workflows/phpstan.yml"

jobs:
  phpstan:
    name: phpstan
    runs-on: ubuntu-latest
    timeout-minutes: 5
    steps:
      - uses: actions/checkout@v4

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: "8.4"
          coverage: none

      - name: Install composer dependencies
        uses: ramsey/composer-install@v3

      - name: Run PHPStan
        run: ./vendor/bin/phpstan --error-format=github
```
https://github.com/mollie/mollie-api-php/blob/master/.github/workflows/phpstan.yml 

```
name: static analysis

on:
  push:
    branches:
      - master
      - '*.x'
  pull_request:

jobs:
  types:
    runs-on: ubuntu-22.04

    strategy:
      fail-fast: true
      matrix:
        directory: [src, types]

    name: ${{ matrix.directory == 'src' && 'Source Code' || 'Types' }}

    steps:
      - name: Checkout code
        uses: actions/checkout@v4

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: 8.1
          tools: composer:v2
          coverage: none

      - name: Set Framework version
        run: composer config version "10.x-dev"

      - name: Install dependencies
        uses: nick-fields/retry@v3
        with:
          timeout_minutes: 5
          max_attempts: 5
          command: composer update --prefer-stable --prefer-dist --no-interaction --no-progress

      - name: Execute type checking
        run: vendor/bin/phpstan --configuration="phpstan.${{ matrix.directory }}.neon.dist"  
```
https://github.com/laravel/framework/blob/10.x/.github/workflows/static-analysis.yml  

## Unit test

### how to ingegrate phpunit to CI/CD

https://github.com/mollie/mollie-api-php/blob/master/.github/workflows/tests.yml

```
name: tests

on:
  push:
    paths:
      - "**.php"
      - ".github/workflows/tests.yml"
      - "phpunit.xml.dist"
      - "composer.json"
      - "composer.lock"
  pull_request:
  schedule:
    - cron: "0 0 * * *"

jobs:
  tests:
    runs-on: ubuntu-latest

    strategy:
      fail-fast: true
      matrix:
        php: [7.4, 8.0, 8.1, 8.2, 8.3, 8.4]

    name: PHP - ${{ matrix.php }}
    steps:
      - name: Checkout code
        uses: actions/checkout@v4

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: ${{ matrix.php }}
          extensions: dom, curl, libxml, mbstring, zip
          coverage: none

      - name: Setup problem matchers
        run: |
          echo "::add-matcher::${{ runner.tool_cache }}/php.json"
          echo "::add-matcher::${{ runner.tool_cache }}/phpunit.json"

      - name: Install dependencies
        run: |
          composer update --prefer-dist --no-interaction --no-progress

      - name: List Installed Dependencies
        run: composer show -D

      - name: Execute tests
        run: vendor/bin/paratest --verbose
```
