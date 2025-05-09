@extends('patient-sidebar')

@section('content')

<h1>Manage Profile</h1>
<div class="success-message">
    Profile updated successfully!
</div>
<form id="profile-form" action="#" method="POST">
    <div class="form-grid">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="John Doe" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="john.doe@example.com" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" placeholder="+1234567890" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address" placeholder="123 Main St, City, Country" required></textarea>
        </div>
    </div>

    <button type="submit" class="submit-btn">Save Details</button>
</form>

@endsection