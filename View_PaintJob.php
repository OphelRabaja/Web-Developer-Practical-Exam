<!-- Add New Paint Job Form -->
<form action="{{ route('paint_jobs.store') }}" method="POST">
    @csrf
    <label for="car_details">Car Details:</label>
    <input type="text" name="car_details" id="car_details" required>
    <br>
    <label for="customer_name">Customer Name:</label>
    <input type="text" name="customer_name" id="customer_name" required>
    <br>
    <label for="paint_color">Paint Color:</label>
    <select name="paint_color" id="paint_color" required>
        <option value="red">Red</option>
        <option value="green">Green</option>
        <option value="blue">Blue</option>
    </select>
    <br>
    <button type="submit">Add Paint Job</button>
</form>

<!-- Queued Paint Jobs -->
<h2>Queued Paint Jobs</h2>
<ul>
    @foreach ($queuedJobs as $queuedJob)
        <li>
            {{ $queuedJob->car_details }} ({{ $queuedJob->paint_color }}) - {{ $queuedJob->customer_name }}
        </li>
    @endforeach
</ul>

<!-- Active Paint Jobs -->
<h2>Active Paint Jobs</h2>
<ul>
    @foreach ($activeJobs as $activeJob)
        <li>
            {{ $activeJob->car_details }} ({{ $activeJob->paint_color }}) - {{ $activeJob->customer_name }}
            <form action="{{ route('paint_jobs.mark_as_done', $activeJob->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit">Mark as Done</button>
            </form>
        </li>
    @endforeach
</ul>
