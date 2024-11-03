<!-- master.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>

    <title>@yield('title', 'Task & Type Management')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa; /* لون خلفية فاتح */
        }
        .navbar {
            background-color: #007bff; /* لون شريط التنقل */
        }
        .navbar-brand {
            font-weight: bold;
            color: #ffffff; /* لون النص للشعار */
        }
        .nav-link {
            color: #ffffff; /* لون النص لروابط التنقل */
        }
        .nav-link:hover {
            color: #ffd700; /* لون النص عند التمرير على الرابط */
        }
        .container {
            margin-top: 20px;
        }
        h1, h2, h3, h4 {
            color: #343a40; /* لون العناوين */
        }
    </style>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <a class="navbar-brand" href="#">Eng. Ismail Mahmoud Basbous</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('insert.task') }}">Task Days</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout" onclick="return confirm('Are you sure you want to log out?');">Logout</a>
                </li>
            </ul>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    

    <!-- هنا نضع الـ content المتغير -->
    @yield('content')

</div>
</body>
</html>
