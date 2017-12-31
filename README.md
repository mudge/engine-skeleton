# Engine Skeleton

This is a starter kit for a web application written with [Engine](https://github.com/mudge/engine).

**Current version:** Unreleased  
**Supported PHP versions:** 7.1, 7.2

## Creating an Engine project

```console
$ composer create-project mudge/engine-skeleton:dev-master my-project
```

## Running a development server

```console
$ cd my-project
$ php -S localhost:8080 -t public
```

Now go to http://localhost:8080 and you should see a welcome page from Engine.

## Adding your own code

* Add your controllers to `src` and route requests to them in `public/index.php`
* Add your own templates to `templates`
* Add your own static files to `public`
* Replace this README with something meaningful for your application
