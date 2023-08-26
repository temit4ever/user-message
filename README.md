 <p> How to set up project locally</p>

Notes!
The backend is set up by using Laravel while the frontend is Vuejs.

1. If you don't have PHP on your local machine you can install Laravel Herd. This comes with all you need to run the project
2. clone the project from git
3. Also, customise the url by going into your local machine host file and add this `127.0.0.1 user-message.test`
4. After cloned cd into the project directory and run `composer install && php artisan serve --host=user-message.test --port=8080`
to start the backend server and ` npm install && npm run dev` to set up and start the front end server
5. Hit the browser and type in ` http://user-message.test:8080` to see the application on the website.

