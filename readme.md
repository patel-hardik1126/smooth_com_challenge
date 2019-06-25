### Install
Clone the git repository on your computer
```
$ git clone https://github.com/patel-hardik1126/smooth_com_challenge.git
```

You can also download the entire repository as a zip file and unpack in on your computer if you do not have git

After cloning the application, you need to install it's dependencies. 
```
$ cd smooth_com_challenge
$ composer install
```

### Setup
When you are done with installation, copy the `.env.example` file to `.env`
```
$ cp .env.example .env
```

Generate the application key
```
$ php artisan key:generate
```

Add your database credentials to the necessary `env` fields

Migrate the application
```
$ php artisan migrate
```

Seed the application
```
$ php artisan db:seed
```

### Run the application
```
$ php artisan serve
```