<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=>
<style>
    /* General container styles */
.container {
    max-width: 900px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f8f8f8;
}

/* Card styles */
.card {
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #f1f1f1;
    padding: 10px;
    border-bottom: 1px solid #ddd;
    font-size: 18px;
    font-weight: bold;
}

.card-body {
    padding: 20px;
}

/* Form elements */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-weight: bold;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-check-inline {
    display: flex;
    align-items: center;
    margin-right: 15px;
}

.form-check-inline input[type="text"],
.form-check-inline input[type="checkbox"] {
    margin-left: 10px;
}

input[type="date"] {
    padding: 6px;
}

button {
    margin-top: 15px;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
}

button[type="submit"] {
    background-color: #28a745;
    color: white;
}

button[type="reset"] {
    background-color: #dc3545;
    color: white;
}

/* Styling for the table */
table {
    width: 100%;
    margin-top: 30px;
    border-collapse: collapse;
    background-color: white;
}

table th, table td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    background-color: #f1f1f1;
    font-weight: bold;
}

/* Responsive styling */
@media (max-width: 768px) {
    .form-inline {
        display: block;
    }

    .form-check-inline {
        display: block;
        margin-bottom: 10px;
    }

    table {
        font-size: 14px;
    }
}
</style>
</head>
<div class="container">
    @if ($errors->any())
      <div id="docs-card" class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <h2>Create Price Level</h2>
    <form action="{{route('pricelevel.store')}}" method="post">
        @csrf
        @method('post')

        <!-- Form fields for price level -->
        <div class="form-group mb-3">
            <label for="type">Price Level Name</label>
            <input type="text" name="type" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control">
        </div>

        <div class="form-group">
            <label>
            Markup Amount
            </label>
            <input type="text" name="markup" class="form-control">
        </div>

        <div class="form-group">
            <label for="start_date">Duration</label>
            <input type="date" name="start_date" value="{{ date('Y-m-d') }}" class="form-control" required>
            <label>To</label>
            <input type="date" name="end_date" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Add Price Level</button>
        <a href="{{ route('pricelevel.create') }}" type='reset' class="btn btn-danger">Cancel</a>

    </form>
</div>


