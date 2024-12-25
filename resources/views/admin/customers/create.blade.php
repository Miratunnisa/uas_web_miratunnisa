<form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <label for="customer_name">Name</label>
    <input type="text" name="customer_name" class="form-control" required>

    <label for="customer_email">Email</label>
    <input type="email" name="customer_email" class="form-control" required>

    <button type="submit" class="btn btn-primary mt-3">Save</button>
</form>
