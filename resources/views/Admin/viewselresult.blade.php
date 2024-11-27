<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Student Report Card">
    <meta name="keywords" content="report, card, student, results">
    <meta name="author" content="Your Name">
    <title>Student Report Card</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .report-card {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 800px; /* Limit the width of the report card */
        }
        .report-card h2 {
            margin-bottom: 20px;
        }
        .report-card table {
            width: 100%;
            border-collapse: collapse;
        }
        .report-card table th, .report-card table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .report-card table th {
            background-color: #f4f4f4;
        }
        .comments-section {
            margin-top: 20px;
        }
        .print-button {
            margin-top: 20px;
        }
        @media print {
            body * {
                visibility: hidden;
            }
            #printSection, #printSection * {
                visibility: visible;
            }
            #printSection {
                position: fixed; /* Use fixed position for precise placement */
                top: 10%; /* Adjust the vertical position */
                left: 50%;
                transform: translateX(-50%); /* Center horizontally */
                width: 100%;
                max-width: 800px; /* Adjust to the width of your content */
                margin: 0;
                padding: 20px;
                box-sizing: border-box;
                background: white;
                border: none;
                box-shadow: none;
            }
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Header -->
        @include('admin.hedad2')
        <!-- Sidebar -->
        @include('admin.siderd2')

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Student Report Card</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Student Report Card</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Report Card Section for Print -->
                <div id="printSection">
                    <div class="report-card">
                    <h2>{{ Session::get('schname') }}</h2>
<p><strong>Student Name:</strong> {{ $studentName }}</p>
<p><strong>Class:</strong> {{ $classrmName }}</p>
<p><strong>Term:</strong> {{ $termName }}</p>
<p><strong>Session:</strong> {{ $currentSessionName }}</p>
<p><strong>Percentage:</strong> {{ $percentage }}%</p>
<p><strong>Overall Grade:</strong> {{ $overallGrade }}</p>
<table>
    <thead>
        <tr>
            <th>Subject</th>
            <th>Score</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject['name'] }}</td>
                <td>{{ $subject['score'] }}</td>
                <td>{{ $subject['grade'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>

                    <!-- Comments Section -->
                    <div class="comments-section">
                <h4>Comments</h4>
         <textarea class="form-control" rows="4" readonly>{{ $comment }}</textarea>
        </div>

                <!-- Print Button -->
                <div class="print-button">
                    <button class="btn btn-primary" onclick="printReportCard()">Print Report Card</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        function printReportCard() {
            window.print();
        }
    </script>
</body>
</html>
