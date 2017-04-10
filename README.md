# Laralum
The modular open source laravel administration panel

<p align="center">
    <a href="https://styleci.io/repos/69903606"><img src="https://styleci.io/repos/69903606/shield?branch=master" alt="StyleCI"></a>
</p>



**UNDER ACTIVE DEVELOPMENT**

## Please use version 2.*

https://github.com/ConsoleTVs/Laralum


## Getting started

*For beta testers*

Before starts with installation you should have done `auth`

```
php artisan make:auth
```

### Installation

Require laralum/laralum with composer

```
composer require laralum/laralum dev-master
```

### Register service provider

Include the line below to config/app.php inside providers array :

```php
Laralum\Laralum\LaralumServiceProvider::class,
```

### Migrate

Migrate database tables

```
php artisan:migrate
```

### Packages

Laralum requires basic packages such permissions, roles, users... but there are also optional packages such advertisements, tickets...

To install an optional package, you should follow the documentation of each package on the specified README

## Package Menu

The package menus can be defined creating a ```Menu.json``` file in the /src/ of your package.

Sample:

```json
{
    "items": [
        {
            "text": "Permission List",
            "url": "https://google.com"
        },
        {
            "trans": "laralum_permissions::general.create_permission",
            "route": "laralum::permissions.create",
            "permission": "laralum_permissions::permissions.access"
        }
    ]
}

```

## Injections

To inject code into diferent parts of laralum as a module, you'll need to create a folder in your package:

```
src/Injectors/
```

Inside this folder you'll need to place all the injections you want to make inside.

The list of the currently supported injectors is:

-   **style (style.php)**
    This will inject the php code inside style.php under the specified directory inside the header of
    the master template inside the administration panel.

-   **script (script.php)**
    This will inject the php code inside script.php under the specified directory before the end of the ```<body>``` tag in the master template inside the administration panel.

-   **laralum.base (laralum.base.php)**
    This will inject the php code inside laralum.base.php inside the laralum.base middleware used across
    all the administration panel.

-   **laralum.auth (laralum.auth.php)**
    This will inject the php code inside laralum.auth.php inside the laralum.auth middleware used across
    all the administration panel.

-   **user (user.php)**
    This will inject the php *array* that is returned in user.php inside the user menu on the admin panel.

    ```php
    return  [
        [
            'text'  => 'item Text',
            'url'   => 'https://google.com'
        ]
    ]
    ```
