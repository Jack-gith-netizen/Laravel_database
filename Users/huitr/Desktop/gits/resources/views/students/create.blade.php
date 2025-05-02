<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Add a student record">
    <title>Add a Student - BCIT Student Database</title>
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
        <h1>Add a New Student Record</h1>
        <form method="POST" action="{{ route('students.store') }}">
            @csrf
            <label for="student_number">Student Number:</label><br>
            <input type="text" name="student_number" id="student_number" value="{{ old('student_number') }}"><br>
            @error('student_number')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            <br>

            <label for="first_name">First Name:</label><br>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"><br>
            @error('first_name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            <br>

            <label for="last_name">Last Name:</label><br>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"><br>
            @error('last_name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            <br>

            <button type="submit">Submit</button>
        </form>
    </main>
    <footer>
        <p>2025 © BCIT Student Database</p>
    </footer>
</body>
</html>