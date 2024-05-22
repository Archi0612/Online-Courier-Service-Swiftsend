<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Existing styles remain unchanged */

        .rating-stars {
            display: flex;
            /* justify-content: space-between; */
            font-size: 24px;
            color: #777;
        }

        .rating-stars i {
            cursor: pointer;
            transition: color 0.3s ease; /* Smooth transition on color change */
        }

        .rating-stars i:hover {
            color: #ffcc00; /* Change color on hover */
        }

        .rating-stars i.active {
            color: #ffd700; /* Gold color for active stars */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Give Your Feedback :)</h2><br>
        <!-- Form submission message will be displayed here -->
        <div id="form-message"></div>
        <form id="feedback-form" class="mb-3">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="parcel_id">Parcel ID:</label>
                <input type="text" id="parcel_id" name="parcel_id" required>
            </div>

            <div class="form-group">
                <label for="rating">Rating:</label>
                <div class="rating-stars mb-3" onclick="setRating(event)">
                    <i class="fas fa-star" data-rating="1"></i>
                    <i class="fas fa-star" data-rating="2"></i>
                    <i class="fas fa-star" data-rating="3"></i>
                    <i class="fas fa-star" data-rating="4"></i>
                    <i class="fas fa-star" data-rating="5"></i>
                </div>
                <input type="hidden" id="rating" name="rating" required>
            </div>

            <div class="form-group">
                <label for="comments">Comments:</label>
                <textarea id="comments" name="comments" required></textarea>
            </div>

            <button class="btn bg-primary" type="button" onclick="submitFeedback()">Submit Feedback</button>
        </form>
    </div>

    <script>
        function setRating(event) {
            const stars = document.querySelectorAll('.rating-stars i');
            const ratingInput = document.getElementById('rating');

            stars.forEach(star => star.classList.remove('active'));

            const selectedStar = event.target;
            const rating = selectedStar.getAttribute('data-rating');

            stars.forEach(star => {
                if (parseInt(star.getAttribute('data-rating')) <= rating) {
                    star.classList.add('active');
                }
            });

            ratingInput.value = rating;
        }

        function submitFeedback() {
            const form = document.getElementById('feedback-form');
            const formData = new FormData(form);

            // AJAX request for form submission
            fetch('submit_feedback.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const formMessage = document.getElementById('form-message');
                if (data.success) {
                    formMessage.innerHTML = '<div class="alert alert-success">Feedback submitted successfully. Thank you!</div>';
                } else {
                    formMessage.innerHTML = '<div class="alert alert-danger">Error submitting feedback. Please try again.</div>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
