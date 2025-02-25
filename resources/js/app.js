// Handle search functionality in the Question Listing page
document.querySelector("form").addEventListener("submit", function(event) {
    let searchInput = document.querySelector('input[name="search"]');
    if (searchInput.value.trim() === '') {
        event.preventDefault();
        alert('Please enter a search term!');
    }
});

// Handle toggling the favorites system (for example, adding/removing questions from favorites)
document.querySelectorAll('.favorite-btn').forEach(button => {
    button.addEventListener('click', function() {
        const questionId = this.dataset.questionId;
        const action = this.dataset.action;

        // You would need to send a request to the server to add or remove the favorite
        fetch(`/favorites/${action}/${questionId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ question_id: questionId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message); // Display success message
                this.classList.toggle('favorited');
            } else {
                alert('Something went wrong, please try again.');
            }
        });
    });
});

// Add functionality for dynamic sorting or filtering questions based on distance
document.querySelector('#locationSort').addEventListener('change', function() {
    const sortOption = this.value;

    fetch(`/questions?sort=${sortOption}`)
        .then(response => response.json())
        .then(data => {
            const questionList = document.querySelector('.question-list');
            questionList.innerHTML = '';

            data.questions.forEach(question => {
                const questionItem = document.createElement('div');
                questionItem.classList.add('question-item');
                questionItem.innerHTML = `
                    <h3>${question.title}</h3>
                    <p>${question.content}</p>
                    <p><strong>Location:</strong> ${question.location}</p>
                    <p><small>Posted on: ${new Date(question.created_at).toLocaleString()}</small></p>
                `;
                questionList.appendChild(questionItem);
            });
        });
});
