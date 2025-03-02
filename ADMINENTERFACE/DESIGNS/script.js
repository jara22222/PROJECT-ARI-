document.addEventListener("DOMContentLoaded", function () {
  const ctx = document.getElementById("barChart").getContext("2d");

  const myChart = new Chart(ctx, {
    type: "bar", // Change type if needed
    data: {
      labels: ["January", "February", "March", "April", "May"],
      datasets: [
        {
          label: "Sales",
          data: [120, 190, 300, 250, 200],
          backgroundColor: "rgba(75, 192, 192, 0.2)",
          borderColor: "rgba(75, 192, 192, 1)",
          borderWidth: 1,
        },
      ],
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const ctx = document.getElementById("lineChart").getContext("2d");

  const myChart = new Chart(ctx, {
    type: "line", // Change type if needed
    data: {
      labels: ["January", "February", "March", "April", "May"],
      datasets: [
        {
          label: "Sales",
          data: [120, 190, 300, 250, 200],
          backgroundColor: "rgba(25, 0, 255, 0.2)",
          borderColor: "rgb(0, 21, 255)",
          borderWidth: 1,
        },
      ],
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
});
