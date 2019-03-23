# Laravel Github Integration
This package will allow you to integrate github api into laravel application.

## Steps

### Step 1 
get package from composer ```composer require sharik709/laravel-github```

### Step 2
If you are using laravel 5.5 and above then you don't need to register service provider. Otherwise, you will need to add this package's service provider into your ```config/app.php``` file's providers array.
```LaravelGithub\LaravelGithubServiceProvider::class```

### Step 3
In your ```.env``` file you will need to setup your api keys. Which you can get from github
```
[Laravel Github Keys]

[Laravel Github API]
GITHUB_USERNAME=
GITHUB_PASSWORD=
```
You can also set these things to ```.env.example```

Now, You should be able to use the api

## Usage

#### To Retrieve all repositories
```php
use LaravelGithub\Repositories;

$repos = new Repositories;
$repositories = $repos->list()
```

#### To Get a specific repository
```php
use LaravelGithub\Repositories;

$repos = new Repository;

$repository = $repos->get($name);

```

#### To get issues of a repository
```php
$repository->issues()
```

#### To get pull requests for a repository
```php
$repository->pullRequests();
```

#### To get contributors for a repository
```php
$repository->contributors();
```
---

### More in usage.md file

---

above ```$repository``` variable can be the result of ```get``` or you can call ```list```
get list of repositories and find the one you want to work with and call above methods.


### More Coming
I'm working to get more functionality available. Soon, adding more helpful methods.

This repository is built on top of another repository called ```tan-tan-kanarek/github-php-client``` to make it
more like laravel packages but more better approach to interact with github.



# License
MIT