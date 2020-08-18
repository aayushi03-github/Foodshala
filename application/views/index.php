<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>FoodShala</title>
</head>

<body>
    <nav>
        <h4>FoodShala</h4>
        <ul>
            <li><a href="/">Menu</a></li>
            <li><a href="/category">Category</a></li>
            <li><a href="/restaurants">Restaurants</a></li>
        </ul>
    </nav>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                    Login Form
            </div>
            <div class="card-body">
                <form action="/auth/login" method="POST">
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
       <!--  {{#if message }}
    <h4 class="alert alert-danger mt-4">{{message}}</h4>
        {{/if}} -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
</body>

</html>