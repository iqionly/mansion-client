# Mansion Client
Package to handle sso simple login Mansion Website for Laravel Application.

<br/>

# How to use
## Create New Client Mansion
If you done this jump to Installing section. To use this packages, you will need to register your app to mansion server, for package `mansion-client` works properly.

Todo so, you have to:

- Open your mansion server (regarding to Mansion your use)
- Go to Management Application Menu
- Click button Add Data
- Fill up the field name and URL App for your application
- Then enter your URL Login for your app. for `mansion-client` this the example: `https://yourapp.example/mansion/login-sso`, (change uri to your domain app)
- Also enter your URL Redirect for your app. for `mansion-client` this the example: `https://yourapp.example/mansion/callback`, (change uri to your domain app)
- After that fill up all required field
- Then click button Save Changes
- Save the id and secret key, paste to your environment app 
- Enjoy the coffee

## Installing
First install the packages:
```
composer require iqionly/mansion-client
```
After that, copy your client id and secret key from your Mansion Server > Management Application to your .env. Example:

```
MANSION_URL=http://mansion.example  # your mansion url
MANSION_CLIENT_ID=12345xxxxxxxx
MANSION_CLIENT_SECRET=abcdefxxx
```
If you using other `Users` table with different column name and key, please tell `mansion-client` how to consume it, with just adding another environment variables:
```
MANSION_USERNAME="(YOUR COLUMN/KEY USERS)"
MANSION_PASSWORD="(YOUR PASSWORD FOR USERS)"
```
`mansion-client` also using config providers users to authenticate the sign-in user, if you not change, it works fine :)

This package require, middleware `web`. So if you change it, please configure the middleware in mansion config also.

## Contacts
Any help, contacts me to: izzy25.mr@gmail.com or mochammadrizkyashyari@gmail.com
