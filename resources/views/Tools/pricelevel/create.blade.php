
@push('style')
<style>
    .price-level-form {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    }

    h2 {
    text-align: center;
    }

    .form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
    }

    .form-group label {
    margin-bottom: 5px;
    font-weight: bold;
    }

    .form-group input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    }

    button {
    width: 100%;
    padding: 10px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    button:hover {
    background-color: #218838;
    }
    .duration-group {
    display: flex;
    align-items: center;  /* Vertically center */
    }

    .duration-group label {
    margin-right: 833px;   /* Space between the "Duration:" label and Date Start */
    font-weight: bold;
    }

    .date-fields {
    display: flex;
    align-items: center;
    gap: 17px;            /* Space between Date Start and Date End fields */
    }

    .date-fields label {
    margin-right: 5px;    /* Space between the labels and inputs */
    }

    .date-fields input {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 333px;          /* Control the width of the input fields */
    }
    .button-fields{
    display: flex;
    align-items: center;
    gap: 15px;
    }

      /* General container styles */

</style>
@endpush
<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class='price-level-form'>
                    @if ($errors->any())
                    <div id="docs-card" class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <h1>Create Price Level</h1>
                    <form method="post" action="{{route('pricelevel.store')}}">
                        @csrf
                        @method('post')
                        <div class='form-group'>
                            <label for="priceLevelName">Price Level Name</label>
                            <input type="text" id="" name="type" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description">
                        </div>
                        <div class="form-group">
                            <label>Mark Up Price</label>
                            <input type="text" name="markup" required>
                        </div>
                        <div class="form-group duration-group">
                            <label for="duration">Duration:</label>
                            <div class="date-fields">
                            <label for="start_date">Date Start</label>
                            <input type="date" id="start_date" name="start_date" value="2024-10-16">
                            <label for="end_date">Date End</label>
                            <input type="date" id="end_date" name="end_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="button-fields">
                            <button type="submit" class="btn btn-success">Save New Price Level</button>
                            <button onclick="window.location='{{ route('pricelevel.index') }}'">View Records</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>

</x-app-layout>

