<title>ITGEM</title>
<?php
include_once "./navegacion.php";
?>

<!-- 1. OPCIONS PAGE BTN-->
<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
      <div class="col">
        <div style="background: #235c81;" class="card radius-10 p-2">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <a class="txt-card-custom mb-0">Docentes</a>
                <br>
                <a style="color: #fee6ff;" href="./paginas/docentes.php" id="toggleTableLink" class="text-blue-500 hover:underline">Click aqui</a>
              </div>
              <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                <i class="fa-solid fa-user-tie"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div style="background: #204d6c;" class="card radius-10 p-2">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <p class="mb-0 txt-card-custom">Estudiantes</p>
                <a style="color: #fee6ff;" href="./paginas/estudiantes.php" id="toggleTableLink" class="text-blue-500 hover:underline">Click aqui</a>
              </div>
              <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="fa-solid fa-user"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div style="background: #20425a;" class="card radius-10 p-2">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <p class="mb-0 txt-card-custom">Notas</p>
                <a style="color: #fee6ff;" href="./paginas/notas.php" id="toggleTableLink" class="text-blue-500 hover:underline">Click aqui</a>
              </div>
              <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                <i class="fa-solid fa-file-invoice"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div style="background: #152a3c;" class="card radius-10 p-2">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <p class="mb-0 txt-card-custom">Academico</p>
                <a style="color: #fee6ff;" href="./paginas/academico.php" id="toggleTableLink" class="text-blue-500 hover:underline">Click aqui</a>
              </div>
              <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                <i class="fa-solid fa-book"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end row-->
    <!-- 1. OPCIONS PAGE BTN-->
    
  <div class="page-content">
    <div style="background-color: white; border-radius:20px;" class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
      <div class="col p-4 d-flex justify-content-center">

        <?php
        // Consulta para obtener la cantidad de grupos por docente
        $sqlGruposPorDocente = "SELECT d.nombre AS docente, COUNT(g.id) AS cantidad_grupos
                        FROM grupos g
                        INNER JOIN docentes d ON g.id_docente = d.id
                        GROUP BY d.nombre";
        $resultGruposPorDocente = $conexion->query($sqlGruposPorDocente);

        // Inicializamos un array para almacenar los datos
        $gruposPorDocente = [];

        if ($resultGruposPorDocente) {
          while ($rowGruposPorDocente = $resultGruposPorDocente->fetch_assoc()) {
            $gruposPorDocente[] = [
              'docente' => $rowGruposPorDocente['docente'],
              'cantidad_grupos' => $rowGruposPorDocente['cantidad_grupos'],
            ];
          }
          $resultGruposPorDocente->free();
        }
        ?>
        <!-- Agrega el elemento canvas para el gráfico -->
        <canvas id="gruposPorDocenteChart" width="400" height="200"></canvas>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('gruposPorDocenteChart').getContext('2d');
            var data = <?php echo json_encode($gruposPorDocente); ?>;

            var labels = data.map(function(item) {
              return item.docente;
            });

            var counts = data.map(function(item) {
              return item.cantidad_grupos;
            });

            var chart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: labels,
                datasets: [{
                  label: 'Cantidad de Grupos por Docente',
                  data: counts,
                  backgroundColor: '#172554',
                  borderColor: '#172554',
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          });
        </script>


      </div>
      <div style="height: 65vh;" class="col p-4 d-flex justify-content-center">
        <?php
        // Consulta para obtener la cantidad de mujeres y hombres
        $sqlGender = "SELECT genero, COUNT(*) as count FROM estudiantes GROUP BY genero";
        $resultGender = $conexion->query($sqlGender);

        $genderData = [];
        $genderLabels = [];

        if ($resultGender && $resultGender->num_rows > 0) {
          while ($rowGender = $resultGender->fetch_assoc()) {
            $genderLabels[] = $rowGender['genero'];
            $genderData[] = $rowGender['count'];
          }
          $resultGender->free();
        }
        ?>
        <!-- Agrega este elemento canvas donde deseas renderizar el nuevo gráfico -->

        <canvas id="genderChart"></canvas>

        <script>
          // Código JavaScript para renderizar el gráfico de anillo para la distribución de género
          var ctxGender = document.getElementById('genderChart').getContext('2d');
          var genderChart = new Chart(ctxGender, {
            type: 'doughnut',
            data: {
              labels: <?php echo json_encode($genderLabels); ?>,
              datasets: [{
                data: <?php echo json_encode($genderData); ?>,
                backgroundColor: ['#fef08a', '#20425a'], // Puedes personalizar los colores
              }]
            },
            options: {
              title: {
                display: true,
                text: 'Distribución de Género de Estudiantes'
              }
            }
          });
        </script>

      </div>
    </div>
    </div>