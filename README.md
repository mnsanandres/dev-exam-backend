# Application Backend

This application provides the backend APIs for the date time and CRUD operations.

#### Ports
* `3000` - NodeJS Date Time API
* `8000` - Laravel CRUD API

#### Building

`docker-compose build`

#### Running

`docker-compose up -d`


# API Guide

## Date Time API

<a name="get_date_time"></a>
### Get Date and Time

Returns a JSON response containing the current date and time.

* **URL**

  `/`

* **Method:**

  `GET`
  
*  **URL Params**

   None

* **Data Params**

   None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{"date_time": "2021-04-14 13:56:29"}`

* **Sample Call:**

  ```javascript
    var request = require('request');
    var options = {
      'method': 'GET',
      'url': 'http://localhost:3000'
    };
    request(options, function (error, response) {
      if (error) throw new Error(error);
      console.log(response.body);
    });
  ```

## Backend API

### Get Responses

Returns a JSON response containing a list of date time requested from [Get Date and Time](#get_date_time)

* **URL**

  `/api/responses`

* **Method:**

  `GET`
  
*  **URL Params**

   None

* **Data Params**

   None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** 
    ```JSON
    {"data":[
      {
        "id": 21,
        "date_time": "2021-04-14 14:05:12",
        "content": "{\"data\":{\"date_time\":\"2021-04-14 14:05:12\"},\"status\":200,\"statusText\":\"OK\",\"headers\":{\"content-length\":\"35\",\"content-type\":\"application/json; charset=utf-8\"},\"config\":{\"url\":\"http://localhost:3000\",\"method\":\"get\",\"headers\":{\"Accept\":\"application/json, text/plain, */*\"},\"transformRequest\":[null],\"transformResponse\":[null],\"timeout\":0,\"xsrfCookieName\":\"XSRF-TOKEN\",\"xsrfHeaderName\":\"X-XSRF-TOKEN\",\"maxContentLength\":-1,\"maxBodyLength\":-1},\"request\":{}}",
        "created_at": null,
        "updated_at": null
      }
    ]}
 
* **Sample Call:**

  ```javascript
    var request = require('request');
    var options = {
      'method': 'GET',
      'url': 'http://localhost:8000/api/responses'
    };
    request(options, function (error, response) {
      if (error) throw new Error(error);
      console.log(response.body);
    });
  ```
  
### Post Response

Saves a JSON response from a date time query from [Get Date and Time](#get_date_time)

* **URL**

  `/api/response`

* **Method:**

  `POST`
  
*  **URL Params**

   None

* **Data Params**

  **Required:**
   
  ```
  { "date_time": "2021-04-15 00:30:45", 
  "content": "{\"data\":{\"date_time\":\"2021-04-15 00:30:45\"},\"status\":200}" }
  ```

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** None
 
* **Sample Call:**

  ```javascript
    var request = require('request');
    var options = {
      'method': 'POST',
      'url': 'http://localhost:8000/api/response',
      'headers': {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        "date_time": "2021-04-15 00:30:45",
        "content": "{\"data\":{\"date_time\":\"2021-04-15 00:30:45\"},\"status\":200}"
      })
    };
    request(options, function (error, response) {
      if (error) throw new Error(error);
      console.log(response.body);
    });
  ```