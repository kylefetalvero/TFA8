
<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
</head>
<body>

    <h1>User Account Details</h1>

    <a href="{{ url('/users') }}">Back to Users</a>

    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Username:</strong> {{ $user->username }}</p>
    <p><strong>Full Name:</strong> {{ $user->full_name }}</p>

    <p><strong>Avatar:</strong></p>

    @if ($user->avatar)
        <img
            src="{{ asset('storage/' . $user->avatar) }}"
            alt="User Avatar"
            width="120"
            height="120"
            style="object-fit: cover; border-radius: 50%;"
        >
    @else
        <p>No profile picture uploaded.</p>
    @endif

    <p>
        <a href="{{ route('users.edit', $user->id) }}">
            Edit User
        </a>
    </p>

</body>
</html>
