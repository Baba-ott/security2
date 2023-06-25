<!DOCTYPE html>
<html>
<head>
    <title>Securing Laravel Projects with Sanctum Authenticator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1, h2 {
            color: #333;
        }
        p, pre {
            color: #333;
            line-height: 1.5em;
        }
        pre {
            background-color: #eee;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
    <br>
    <br>
    <a href="{{ route('dashboard') }}">Return to Dashboard</a>
</head>
<body>
<div class="container">
    <h1>Securing Laravel Projects with Sanctum Authenticator</h1>

    <p>

        Sanctum Authenticator, a feature of Laravel, provides a simple way to authenticate users in Laravel applications. It uses tokens, which is a unique strings of characters that authenticate a user's identity. Laravel stores these tokens in a single database.

   </p>

    <p>On top of this, Sanctum includes security measures to protect against Cross-Site Request Forgery. CSRF is a type of attack that tricks a user into submitting a malicious request. By including CSRF protection, Sanctum protects the application and the data of it, making sure only valid requests are processed.
    </p>

    <p>

        Choosing Sanctum Authenticator for Laravel gives developers a secure way to handle user authentication. It's perfect for those who value safety!

        In this guide, I will explain how to install, configure, and use Sanctum Authenticator in Laravel. This will help you improve your Laravel projects with Sanctum's solid security features.
    </p>

    <h2>Installation</h2>

    <p>To get started, create a new Laravel project:</p>

    <pre>
            composer create-project laravel/laravel example-app
            </pre>

    <p>Install Sanctum via composer:</p>

    <pre>
            composer require laravel/sanctum
            </pre>

    <p>After the package is installed run Sanctum's migrations. This will create the personal_access_tokens table in your database:</p>

    <pre>
            php artisan migrate
            </pre>

    <h2>Configuration</h2>

    <p>Publish the Sanctum configuration and migration files using the following command:</p>

    <pre>
            php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
            </pre>

    <p>In your config/auth.php file, set the api guard's driver to sanctum if it isn't already:</p>

    <pre>
            'guards' => [
                'web' => [
                    'driver' => 'session',
                    'provider' => 'users',
                ],

                'api' => [
                    'driver' => 'sanctum',
                    'provider' => 'users',
                    'hash' => false,
                ],
            ],
            </pre>

    <h2>Application</h2>

    <p>In the User model, use HasApiTokens:</p>

    <pre>


namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    //...
}
</pre>

            <p>You can then issue tokens for a user as follows:</p>

            <pre>
return $user->createToken($request->device_name)->plainTextToken;
            </pre>


            <p>The createToken method returns a Laravel\Sanctum\NewAccessToken instance. You can obtain the plain-text token using the plainTextToken property.</p>

<br>

    <p>Place the following in the api.php for the route:</p>

    <pre>
Route::middleware('auth:sanctum')->get('/api/user', function (Request $request) {
    return $request->user();
});
            </pre>

            <h2>Authenticating Requests</h2>

    <p>To get the token, enter the following in Powershell:</p>

    <pre>
            $loginUrl = "http://localhost/api/login"
            $jsonData = @{
                email = "user@example.com"
                password = "password"
                device_name = "device_name"
            } | ConvertTo-Json

            $response = Invoke-RestMethod -Uri $loginUrl -Method Post -Body $jsonData -ContentType "application/json"
            $response
            </pre>

            <p>To authenticate a request, pass the token in the Authorization header:</p>

            <pre>
curl -H "Authorization: Bearer {token}" http://localhost/api/user
            </pre>





            <h2>Conclusion</h2>

            <p>In conclusion, Sanctum Authenticator is a fantastic tool for Laravel applications. It makes user authentication simple and secure, including protection against certain types of attacks.

                In this Article, I walked through how to set up the basics of Sanctum feature. From installing it on a Laravel project, configuring it correctly, to using it for user authentication - it's a process that enhances the application's security.

                However, you can do more with Sanctum. For example, you can use it to authenticate SPA (Single Page Applications) and mobile applications.

                 Its easiness of use and effectiveness make it an important tool for developers. Therefore, by using Sanctum in laravel projects, you develop better user trust and improve overall security.</p>


            <br>
            <br>

            <p>References:</p>

            <p>https://laravel.com/docs/8.x/sanctum</p>

            <p>https://www.youtube.com/watch?v=P2dfXpUHy6U</p>

        </div>
    </body>
</html>
