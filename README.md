# AutoBill Mini Client

**Assumption**
This client is located at http://localhost/abcpm

**Please make sure**
util/apiConfig.xml is writable

## Step-1: Create Application

1. Login https://dev-app.autobill.com
2. Create an application
3. Enter http://localhost/abcpm/callback.php as callback url
4. View the Application and note __Client ID__ and __Client Secret__
5. Assign it all permissions to Account by going to Scope option in the application

## Step-2: Edit API Configuration in the client

Update the following values by editing util/apiConfig.xml or submitting the form in http://localhost/abcpm/index.php
1. apiUrl: https://dev-api.autobill.com
2. appUrl: https://dev-app.autobill.com
3. clientId: Get from Step-1 
4. clientSecret: Get from Step-1
5. redirectUrl: Same as you entered in Step-1

## Step-3: Connect

1. Go to http://localhost/abcpm/index.php
2. Click __Connect AutoBill__
3. Click Allow

## Step-4: Test Simple Endpoint - List Account

1. Click __Account__ in the top menu. If you can see account list without any error, connection is successful.

## Step-5: Test Renewing Access Token

1. Go to http://localhost/abcpm/index.php
2. Click __Invalidate token__
3. Click __Account__ in the top menu and confirm it is __not__ fetching account list
4. Go back to index page, and click __Renew token__
5. Click __Account__ in the top menu and confirm it is fetching account list


