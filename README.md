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

# Under Development
Please do not use this package in production env. This package is still under development

# License
MIT