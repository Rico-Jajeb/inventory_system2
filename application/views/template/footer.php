
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('assets/assets/js/core/popper.min.js')?>"></script>
  <script src="<?php echo base_url('assets/assets/js/core/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/assets/js/plugins/perfect-scrollbar.min.js')?>"></script>
  <script src="<?php echo base_url('assets/assets/js/plugins/smooth-scrollbar.min.js')?>"></script>
  <script src="<?php echo base_url('assets/assets/js/plugins/chartjs.min.js')?>"></script>



  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["March","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [<?php echo $sales ?>, 0, 0, 0, 0, 0, 0, 0, 0,0],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Jan","Feb","March","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Sold Items",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [0,0,0, 0, <?php echo $sold_product ?>, 0, 0, 0, 0, 0, 0,0],
            maxBarThickness: 6

          },
          // {
          //   label: "Websites",
          //   tension: 0.4,
          //   borderWidth: 0,
          //   pointRadius: 0,
          //   borderColor: "#3A416F",
          //   borderWidth: 3,
          //   backgroundColor: gradientStroke2,
          //   fill: true,
          //   data: [0,0,0, 0, 0, 0, 0, 0, 0, 0, 0,0],
          //   maxBarThickness: 6
          // },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>





<script>
class DeleteLink {
    constructor(linkElement) {
        this.linkElement = linkElement;
        this.addClickHandler();
    }

    addClickHandler() {
        this.linkElement.addEventListener('click', (event) => {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.executeLink();
                }
            });
        });
    }

    executeLink() {
        window.location.href = this.linkElement.getAttribute('href');
    }
}

const deleteLinks = document.querySelectorAll('.delete-link');
deleteLinks.forEach((link) => {
    new DeleteLink(link);
});
</script>











  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url('assets/assets/js/soft-ui-dashboard.min.js?v=1.0.7')?>"></script>

  <script src="<?php echo base_url('assets/custom_css_js/custom.js') ?>"></script>



  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.esm.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.esm.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
















</body>

</html>