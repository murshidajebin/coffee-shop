<!DOCTYPE html>
<html>
<head>
<title>Customer Signup</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow" style="width:400px">
<h4 class="mb-3 text-center">Create Account</h4>

<form method="POST" action="{{ route('register.store') }}">
@csrf

<input name="name" class="form-control mb-3" placeholder="Name" required>

<input name="email" class="form-control mb-3" placeholder="Email" required>

<input name="password" type="password" class="form-control mb-3" placeholder="Password" required>

<input name="password_confirmation" type="password" class="form-control mb-3" placeholder="Confirm Password" required>

<button class="btn btn-dark w-100">Register</button>

</form>

<p class="mt-3 text-center">
Already member? <a href="/login">Login</a>
</p>

</div>

</body>
</html>
