1. Open the terminal and change directory into the project and run the following command to run the PHP's development server
   $php -S 127.0.0.1:8000
2. Open Postman
3. Post a json body with the following format {"ip": "valid_or_invalid_ip_address"} to 127.0.0.1:8000/ip
4. If the IP address is valid a status code 201 will be retuned and the IP will be stored to the database.
