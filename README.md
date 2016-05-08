# restfulltamtam
Restfull api for TamTam splash battle game

This restfull API is written in PHP with the Laravel framework. It acts as the interface between the Game and the database, and the
Android Application and the database. Therefore, instead of accessing the database directly and writing queries, http requests are
made to the API which is both a safer and more of a clean implementation.

## Usage
It is a very fast and to-the-point API, and therefore quite ease in use. All http request has to be sent to the base URL followed
by the route. All the requests are based on Restfull, so __POST, GET, PUT and DELETE__, with the following paths:

* /users
* /scores
* /invites
* /invitedPlayers

### Examples http requests

Create of a user
__POST http://base_url/users?firstname='John'&lastname='Doe'&etc..__

Get all users
__GET http://base_url/users__

Get single user
__GET http://base_url/users/1__



## Response
All the http requests will give a response. All the responses are containing the following:
* JSON body
  *Json Object (Single response object)
  *Json Array [Json Objects] (Multiple response objects)

* Response Code
  * __200__ OK (request succeeded)
  * __500__ ERROR (request failed)

### Example response

      {
        "id":1,
        "time":"2016-05-12 21:00:00",
        "location":"TamTam Rotterdam",
        "usersAccepted":"0",
        "usersInvited":"4",
        "created_at":"2016-05-08 14:50:20",
        "updated_at":"2016-05-08 14:50:20"
      }

## API reference tables

### Users
Path | Params (* Optional) | Explanation
------------ | ------------- | ------------
GET __/users__ | None | Retreive all Users
GET __/users/{id}__ | None | Retreive single user by Id
POST __/users__ | firstname, lastname, email, password, dateOfBirth, gamertag, description  | Create new User
PUT __/users/{id}__ | firstname\*, lastname\*, email\*, password\*, dateOfBirth\*, gamertag\*, description\* | Update User by Id
DELETE __/users/{id}__ | None | Delete User by Id

### Scores
Path | Params (* Optional) | Explanation
------------ | ------------- | ------------
GET __/scores__ | None | Retreive all Scores
GET __/scores/{id}__ | None | Retreive single Score by Id
POST __/scores__ | userId, score* | Create new score
PUT __/scores/{userid}__ | score | Updates score of user by userId
DELETE __/scores/{userid}__ | None | Deletes Score by userId



