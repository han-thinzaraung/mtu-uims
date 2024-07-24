<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f8f9fa; /* Optional: Adds a background color */
        }

        .iframe-container {
            width: 100%;
            max-width: 640px;
            padding: 20px; /* Optional: Adds some padding around the iframe */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Adds a subtle shadow */
            background-color: white; /* Optional: Adds a white background */
        }

        iframe {
            width: 100%;
            height: 3867px;
            border: none;
        }

        #logout-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #343a40;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        #logout-button:hover {
            background-color: #23272b;
        }
    </style>
</head>
<body>
    <div class="iframe-container">
        <iframe id="survey-iframe" src="https://docs.google.com/forms/d/e/1FAIpQLScaCrOq-66aMng0ggcTen0xzhCgNW5EUMV9pCvoYsi446uYLA/viewform?embedded=true">
            Loading…
        </iframe>
    </div>
    
    <button id="logout-button" onclick="logout()">Logout</button>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <script>
        function logout() {
            document.getElementById('logout-form').submit();
        }
    </script>
</body>
</html>