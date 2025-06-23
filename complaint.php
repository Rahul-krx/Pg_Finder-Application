<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://media.istockphoto.com/id/894232592/photo/complaints-concept.jpg?s=612x612&w=0&k=20&c=uxF3qCd5swtBLU_zp0zeGUicJ2QBxpFwbsAnAVSc-aU=');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;

        }

        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 470px;
            background-image: url('')
        }

        .form-container h1 {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-container input,
        .form-container textarea,
        .form-container button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-container textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-container button {
            background-color: #4caf50;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;5
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        .hidden {
            display: none;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector("form");
            form.addEventListener("submit", function(e) {
                e.preventDefault(); // Prevent default submission behavior
                const formData = new FormData(form);
                const json = JSON.stringify(Object.fromEntries(formData));
                
                fetch("https://api.web3forms.com/submit", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: json
                })
                .then(async (response) => {
                    if (response.ok) {
                        // Redirect to your custom page on success
                        window.location.href = "http://localhost/pg_finder/messageSent.php";
                    } else {
                        const json = await response.json();
                        alert(json.message || "Submission failed. Please try again.");
                
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("An error occurred. Please try again later.");
                });
            });
        });
    </script>
</head>
<body>
    <div class="form-container">
        <h1>Contact Us</h1>
        <form>
            <!-- Replace with your Access Key -->
            <input type="hidden" name="access_key" value="2830fc66-91c5-45f0-937e-d147088a2d34">

            <!-- Name Input -->
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>

            <!-- Email Input -->
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <!-- Message Input -->
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Write your message here" required></textarea>

            <!-- Honeypot Spam Protection -->
            <input type="checkbox" name="botcheck" class="hidden">

            <!-- Submit Button -->
            <button type="submit">Submit Form</button>
        </form>
    </div>
</body>
</html>
