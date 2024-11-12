// import Chart from 'chart.js/auto';

document.addEventListener("DOMContentLoaded", () => {
  // Retrieve data from window variables
  const countryNames = window.countryNames || [];
  const userCounts = window.userCounts || [];
  const genreNames = window.genreNames || [];
  const videoCounts = window.videoCounts || [];

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

  // Videos per Genre Chart
  if (genreNames.length > 0 && videoCounts.length > 0) {
    const videosPerGenreCtx = document
      .getElementById("videosPerGenreChart")
      .getContext("2d");
    new Chart(videosPerGenreCtx, {
      type: "bar",
      data: {
        labels: genreNames,
        datasets: [
          {
            label: "Videos per Genre",
            data: videoCounts,
            backgroundColor: generateColors(genreNames.length),
            borderColor: "rgba(255, 255, 255, 1)",
            borderWidth: 1,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          x: {
            title: {
              display: true,
              text: "Genres",
            },
          },
          y: {
            title: {
              display: true,
              text: "Number of Videos",
            },
            beginAtZero: true,
            ticks: {
              // Apply Math.floor to Y-axis labels
              callback: function (value) {
                return Math.floor(value);
              },
            },
          },
        },
        plugins: {
          legend: {
            display: false,
          },
          tooltip: {
            callbacks: {
              label: (context) =>
                `${context.label}: ${context.raw} video${
                  context.raw > 1 ? "s" : ""
                }`,
            },
          },
        },
      },
    });
  }
});
