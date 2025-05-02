<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Delete a student record">
    <title>Delete a Student - BCIT Student Database</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/delete.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul class="nav-list">
                <li><a href="{{ route('main') }}">Student List</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Delete a record, are you sure?</h1>
        <form method="POST" action="{{ route('students.destroy', $student) }}">
            @csrf
            @method('DELETE')
            <p>Are you sure you want to delete student ID 
                <strong>{{ $student->id }} {{ $student->firstname }} {{ $student->lastname }}</strong>?
            </p>
            <label>
                <input type="radio" name="confirm" value="yes" required> Yes
            </label><br>
            <label>
                <input type="radio" name="confirm" value="no"> No
            </label><br><br>
            <button type="submit">Submit</button>
        </form>
    </main>
    <footer>
        <p>2025 © BCIT Student Database</p>
    </footer>
</body>
</html>