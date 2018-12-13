# PMSubService Task for PM Connect

You can find my work for the PM Connect Proposed test in this public repo.

I've spent a few hours going over a Laravel way to complete this, Laravel offers the best
chance to "cut a few corners" and speed up time to market as it provides quite a few features
"out the box" such as but not limited to Authentication, API, Sanitising, Caching and Migrations.

I'd have normally done a deep dive of the requirements and scoped out a **week** sprint
and written unit tests but time is not on my side due to work requirements and sleeping
patterns.

You can get this running locally by pulling the repo down and doing a `composer install` followed by `npm install`
this will install the vendors and set up the basic system.

Unless you have a `MYSQL` database to hand this will use the flatfile `sqlite` to allow for faster testing. Run `touch database/database.sqlite` to generate the database and run `php artisan db:seed` to seed whatever database you use.

> Make sure if you use MYSQL to update the enviroment variables in the step below - [Laravel Database Docs](https://laravel.com/docs/5.7/database)

You can copy the `.env.example` to `.env` for the environment. I've included a basic environment with 
this copy to speed that process up, but normally environment variables would be kept outside source control.

If you need a database dump, please ask. You can run `php artisan migrate` to `migrate` the database schema
and head to `/register` to create an account for the admin dashboard, it currently does not protect the `/dashboard` route
but will at a later date.

The frontend, will use `VueJS` but currently the endpoints and `JSON` API I have planned to use `JSONP` standard but at this stage is not ready.

You will need to generate a bearer token to use postman you can do this on the dashboard of the application all api routes are protected so you cant test without one.
