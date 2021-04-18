#### Run application

From the root directory, the following command should be run: 

`docker-compose up`

After the docker packages have been successfully installed, the application can be reached on localhost:8080

#### TO DO

- Create a git repository (`git init`). Please use commits as much as you can to track how are you moving forward in the development process.
- If a user clicks on the "Load more" button, the next dose of diamond cards should be loaded through an AJAX request. Pay attention, the number of the items which must be obtained should be different in each request for the design to display correctly. One request must obtain 9 pieces and the other 10 pieces. When loading the page, you should always show 10 pieces.
- The application must be worked without JavaScript as well.
- If a new parameter should be passed to frontend, you can add new array elements in test() method in the TestController.php.
- If there is no more items, the "Load more" button should be hidden.
- If a user reload the page, the last state/number of diamonds should be shown. This means, if there is 29 items and the user reload the site, the 29 items must be shown again. The "from" and "limit" GET parameters can already be used when the site is loaded e.g. http://localhost:8080/?from=1&limit=10

The current structure can be modified as you want.

##### Api endpoint
/get-data/{from}/{limit}

The Api endpoint returns back an array with numbers from 1 to 100. The {from} parameter means the start number of the range, the {limit} is the number of the items which should be returned. Example link: http://localhost:8080/get-data/6/10

#### Structure
- View files can be found under the View
- The Data layer contains the services which provides the data
- The Api is a framework which links the View and the Data layer and responsible for the endpoints.
