function book(activity) {
    fetch('book_activity.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ activity: activity })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            alert(`Booking confirmed for ${activity}!`);
        } else {
            alert('Booking failed. Please try again later.');
        }
    })
    .catch((error) => {
        console.error('Error:', error);
        alert('An error occurred. Please try again later.');
    });
}
