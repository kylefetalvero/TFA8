
<!DOCTYPE html>
<html>
<head>
    <title>Customer Details</title>
</head>
<body>

    <h1>Customer Details</h1>

    <a href="{{ url('/customers') }}">Back to Customers</a>

    <p><strong>ID:</strong> {{ $customer->id }}</p>
    <p><strong>Full Name:</strong> {{ $customer->full_name }}</p>
    <p><strong>Email:</strong> {{ $customer->email }}</p>
    <p><strong>Phone:</strong> {{ $customer->phone }}</p>

    <a href="{{ route('customers.edit', $customer->id) }}">Edit Customer</a>

</body>
</html>
