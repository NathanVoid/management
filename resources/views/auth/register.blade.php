<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            background-color: #f4f4f4; 
            margin: 0;
        }
        .card { 
            background: white; 
            padding: 2.5rem; 
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            width: 350px; 
            text-align: center;
        }
        h2 { 
            margin-bottom: 1.5rem; 
            font-size: 1.5rem;
        }
        .form-group { 
            margin-bottom: 1.2rem; 
            text-align: left;
        }
        label { 
            display: block; 
            font-size: 1rem; 
            margin-bottom: 0.4rem; 
            font-weight: bold;
        }
        input { 
            width: 100%; 
            padding: 0.75rem; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
            font-size: 1rem; 
        }
        button { 
            width: 100%; 
            padding: 0.8rem; 
            border: none; 
            background-color: #4CAF50; 
            color: white; 
            border-radius: 5px; 
            font-size: 1rem; 
            cursor: pointer; 
            margin-top: 1rem;
        }
        button:hover { 
            background-color: #45a049; 
        }
        .links { 
            margin-top: 1.5rem; 
            font-size: 0.95rem;
        }
        .links a { 
            color: #4CAF50; 
            text-decoration: none; 
            display: block; 
            margin-top: 0.5rem;
        }
        .links a:hover { 
            text-decoration: underline; 
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <div class="links">
            <a href="{{ route('login') }}">Already have an account? Login</a>
        </div>
    </div>
</body>
</html>
