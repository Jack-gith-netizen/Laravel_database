<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Administering Database From A Form">
    <title>Administering Database - BCIT Student Database</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/student.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul class="nav-list">
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @if (!empty($messages))
            <section class="message">
                <ul>
                    @foreach ($messages as $msg)
                        <li>{!! $msg !!}</li>
                    @endforeach
                </ul>
            </section>
        @endif

        <section class="credit">
            <h1>Hello, {{ ucfirst(strtolower(auth()->user()->username)) }}.</h1>
        </section>

        <section class="credit">
            <h2>Student List</h2>
            <p>Total Records: {{ $total }}</p>
            <a href="{{ route('students.create') }}" style="font-size: 1.2em; color: blue; font-weight: bold;">Add a student</a>

            @if ($students->isEmpty())
                <p>No students found.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->firstname }}</td>
                                <td>{{ $student->lastname }}</td>
                                <td>
                                    <a href="{{ route('students.delete', $student) }}">Delete</a>
                                </td>
                                <td>
                                    <a href="{{ route('students.edit', $student) }}">Update</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </section>
    </main>
    <footer>
        <p>2025 © BCIT Student Database</p>
    </footer>
    <script>
        setTimeout(function() {
            const messageSection = document.querySelector('.message');
            if (messageSection) {
                messageSection.style.display = 'none';
            }
        }, 10000);
    </script>
</body>
</html>