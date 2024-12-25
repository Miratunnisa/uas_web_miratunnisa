<form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <label for="orders_id">Order id</label>
    <input type="integer" name="order_id" class="form-control" required>

    <label for="orders_name">Customer Name</label>
    <input type="text" name="customer_name" class="form-control" required>

    <label for="orders_email">Payment Method</label>
    <input type="text" name="customer_email" class="form-control" required>

    <button type="submit" class="btn btn-primary mt-3">Save</button>
</form>
