# This is a template project for automaticly deployment

## General usage

Copy this ansible folder and all subfolders into root directory of product.

Copy the `Jenkisfile` from `projectRoot` directory into your project root directory and set `@@linkToProjectGitRepository@@`
placeholder to your project git repository.

It is neccessary to set all needed values to have an deploy that works.

## Some details about this Jenkisfile.

This `Jenkinsfile` is an given parameter to jenkins job and control the flow of deploy.

In first step _`stage(Checkout)`_ jenkins check out branch defined by `$BRANCH` variable from defined scm.

In second step ansible playbook is called with limitation to `$TARGETENV` using `host.yml` file. This will execute the whole deploy process.

In last step Jira is updated about deploy.

## General structure

#### Basic setup

First of all open `vars/default.yml` file and set up project basics.

Important to adapt are the following variables:

`deployment_repository`: This define the repsitory of your project, f.e `http://psgit.oxid-esales.com:3000/infrastructure/deploy´

`webroot_path` and `releases_path` depends on your target structure.

Often OXID use astructure like following:
```
-/var/
--www/
---oxid/
----releases/
----current/
----shared/
```
- Inside `releases` there are the files from a deploy stored inside a subdirectory with deploy timestamp as name.
- The latest deploy directory is symlinked to `current` directory, so it is easy to switch from one to another release and back.
- Inside share directory all 'static' directories are symlinked, f.e out directory that contains images that are not part of deploy.

Using this one must define

`webroot_path: /var/www/oxid`

`release_path: {{webroot_path}}/releases`

### Deploy specific settings

Inside the `ansible` directory there is the playbook that define targets, other variables and steps of deploy.

`-hosts: [all|testing|integration|staging|production]`

Here one can define where to deploy. This is done in a file named `hosts.yml` located in `inventories` sub directory

This `hosts.yml` file contains a tagret and some variables to use. Here is an example.

```
[integration]
testing.myProjectHost.de ansible_user=jenkins ansible_host=testing.myProjectHost.de
```

### Settings for eshop and database

When deploy one need some values for basic shop setup and database connection.
This can be done inside `group_vars` directory.
There one can define subdirectories for each target to deploy to.
By default there are directories for __testing__, __integration__, __staging__ and __production__.
Inside this directories there are 2 two files located.

`db_settings.yml` contains data for connect to database like host, user, password and database to use,

`shop_settings.yml` contains those data used to control deploy and some general shop settings.

> The variable definition inside this files are used for configuring deploy flow (to which target)
and populate `config.inc.php` file with values. See __example file__:

```
// staging/shop_settings.yml

---
oxid:
    shop_url: "https://stage.myprojectshop.com/"
    shop_sslurl: "https://stage.myprojectshop.com/"
    shop_path: "/var/www/oxid/current/source"
    shop_tmp_path: "/var/www/oxid/current/source/tmp"
    environment_name: "staging"
    current_path_name: "current"
    shared:
        - { path: "configurations", src: "configurations" }
        - { path: "source/out",  src: "out" }
        - { path: "source/log",  src: "log" }
        - { path: "source/tmp",  src: "tmp" }
        - { path: "source/export",  src: "export" }
        - { path: "source/cache",  src: "cache" }
```

The values for `shop_url`, `shop_sslurl`, `shop_path` and `shop_tmp_path`
define the values set up in `config.inc.php` by __role create_shop_config__.

`environment_name` define the name that is used as value for
--env={{oxid:environment_name}} when importing shop config via oxid console.
This is used in on of this roles defined in __role fixup__. At this example this is called.

```
php oxid config:import --env=staging
```

When the name of `current` directory (symlinked) should be different,
`current_path_name` can be used. In this case the directory name where
current shop version is linked to, is this variable value. This variables are used in __role deploy__

### Create an jenkins job

Create an new job in jenkins and use https://jenkins-ps.oxid-esales.com/job/DeployTemplate/ as "copy from" source.
Fix the git entry to point to your project. Enjoy :)
