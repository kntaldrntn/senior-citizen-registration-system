<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Senior Citizen Profile</title>
    <style>
        /* Basic reset */
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f0f2f5; /* Light gray background to see the card */
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1.5;
        }

        /* The ID card */
        .id-card {
            width: 320px; /* Width of a standard ID card */
            border: 1px solid #ccc;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            overflow: hidden; /* Ensures rounded corners */
            text-align: center;
        }

        /* Card Header */
        .card-header {
            background-color: #004a99; /* Example header color (dark blue) */
            color: white;
            padding: 16px;
            border-bottom: 4px solid #f2c700; /* Example accent (gold) */
        }
        .card-header h1 {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 600;
        }

        /* Photo section */
        .card-photo {
            padding: 24px 0 16px 0;
            border-bottom: 1px solid #eee;
        }
        .card-photo img {
            width: 140px;
            height: 140px;
            border-radius: 50%; /* Circular photo */
            object-fit: cover;
            border: 4px solid #f0f2f5;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .placeholder-photo {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background-color: #e0e0e0;
            border: 4px solid #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #888;
            margin: 0 auto;
        }

        /* Main data section */
        .card-body {
            padding: 20px;
            text-align: left;
        }
        .card-body h2 {
            text-align: center;
            margin: 0 0 16px 0;
            font-size: 1.5rem;
            color: #333;
        }
        .data-field {
            margin-bottom: 12px;
        }
        .data-field label {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            color: #777;
            text-transform: uppercase;
        }
        .data-field span {
            display: block;
            font-size: 1rem;
            color: #111;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="id-card">
        <div class="card-header">
            <h1>SENIOR CITIZEN ID</h1>
        </div>

        <div class="card-photo">
            @if($seniorCitizen->photo_image)
                <img src="{{ asset('storage/' . $seniorCitizen->photo_image) }}" alt="Profile Photo">
            @else
                <div class="placeholder-photo">
                    <span>No Photo</span>
                </div>
            @endif
        </div>

        <div class="card-body">
            <h2>{{ $seniorCitizen->name }}</h2>
            
            <div class="data-field">
                <label>Birth Date</label>
                <span>{{ \Carbon\Carbon::parse($seniorCitizen->birth_date)->format('M d, Y') }}</span>
            </div>

            <div class="data-field">
                <label>Contact Number</label>
                <span>{{ $seniorCitizen->contact_number }}</span>
            </div>

            <div class="data-field">
                <label>Email Address</label>
                <span>{{ $seniorCitizen->email }}</span>
            </div>

            <div class="data-field">
                <label>Address</label>
                <span>{{ $seniorCitizen->address }}</span>
            </div>
        </div>
    </div>

</body>
</html>
