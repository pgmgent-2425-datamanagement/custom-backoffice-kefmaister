// import Chart from 'chart.js/auto';

document.addEventListener("DOMContentLoaded", () => {
  // Retrieve data from window variables
  const countryNames = window.countryNames || [];
  const userCounts = window.userCounts || [];
  const playlistCount = Math.round(window.playlistCount || 0);

  // Function to generate distinct colors for the chart
  function generateColors(count) {
    const colors = [];
    const colorPalette = [
      "#4dc9f6",
      "#f67019",
      "#f53794",
      "#537bc4",
      "#acc236",
      "#166a8f",
      "#00a950",
      "#58595b",
      "#8549ba",
    ];
    for (let i = 0; i < count; i++) {
      colors.push(colorPalette[i % colorPalette.length]);
    }
    return colors;
  }

  // Country Distribution Chart as a Doughnut
  if (countryNames.length > 0 && userCounts.length > 0) {
    const countryCtx = document.getElementById("countryChart").getContext("2d");
    new Chart(countryCtx, {
      type: "doughnut",
      data: {
        labels: countryNames,
        datasets: [
          {
            label: "Users per Country",
            data: userCounts,
            backgroundColor: generateColors(countryNames.length),
            borderColor: ["rgba(255, 255, 255, 1)"],
            borderWidth: 1,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false, // Allows resizing
        plugins: {
          tooltip: {
            callbacks: {
              label: (context) =>
                `${context.label}: ${context.raw} user${
                  context.raw > 1 ? "s" : ""
                }`,
            },
          },
          legend: {
            position: "right",
            labels: {
              boxWidth: 20,
              padding: 15,
            },
          },
        },
      },
    });
  }

  // Playlist Chart as a Pie or Doughnut
  if (document.getElementById("playlistChart")) {
    const playlistCtx = document
      .getElementById("playlistChart")
      .getContext("2d");
    new Chart(playlistCtx, {
      type: "doughnut", // You can change to 'pie' if preferred
      data: {
        labels: ["Playlists"],
        datasets: [
          {
            label: "Total Playlists",
            data: [playlistCount],
            backgroundColor: ["rgba(153, 102, 255, 0.6)"],
            borderColor: ["rgba(153, 102, 255, 1)"],
            borderWidth: 1,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false, // Allows resizing
        plugins: {
          tooltip: {
            callbacks: {
              label: (context) => `Total Playlists: ${Math.round(context.raw)}`,
            },
          },
          legend: {
            display: false,
          },
        },
      },
    });
  }
});
