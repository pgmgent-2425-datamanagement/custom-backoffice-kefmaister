// import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', () => {
    const userCount = Math.round(window.userCount || 0);
    const playlistCount = Math.round(window.playlistCount || 0);

    // User Chart as a Pie or Doughnut
    const userCtx = document.getElementById('userChart').getContext('2d');
    new Chart(userCtx, {
        type: 'doughnut', // You can change to 'pie' if preferred
        data: {
            labels: ['Users'],
            datasets: [{
                label: 'Total Users',
                data: [userCount],
                backgroundColor: ['rgba(75, 192, 192, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Allows resizing
            plugins: {
                tooltip: {
                    callbacks: {
                        label: (context) => `Total Users: ${Math.round(context.raw)}`
                    }
                }
            }
        }
    });

    // Playlist Chart as a Pie or Doughnut
    const playlistCtx = document.getElementById('playlistChart').getContext('2d');
    new Chart(playlistCtx, {
        type: 'doughnut', // You can change to 'pie' if preferred
        data: {
            labels: ['Playlists'],
            datasets: [{
                label: 'Total Playlists',
                data: [playlistCount],
                backgroundColor: ['rgba(153, 102, 255, 0.2)'],
                borderColor: ['rgba(153, 102, 255, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Allows resizing
            plugins: {
                tooltip: {
                    callbacks: {
                        label: (context) => `Total Playlists: ${Math.round(context.raw)}`
                    }
                }
            }
        }
    });
});
