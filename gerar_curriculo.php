<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
  <title>Currículo Gerado</title>
  <style>
    /* CSS personalizado */
    body {
      font-family: Montserrat, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .divisor {
      border: 1px solid #dddddd;
      margin: 40px 0 40px 0;
    }
    
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    .section {
      margin-bottom: 20px;
    }

    .section h2 {
      margin-top: 0;
      margin-bottom: 10px;
    }

    .label {
      font-weight: bold;
    }

    .photo-container {
      text-align: center;
      margin-bottom: 20px;
    }

    .photo-container img {
      max-width: 200px;
      max-height: 200px;
    }
  </style>
</head>
<body>
  <div class="container">
   
    <div class="section">
      <h2>Dados Pessoais</h2>
      <?php
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $endereco = $_POST["endereco"];
        $cargo = $_POST["cargo"];
        $email = $_POST["email"];
        $foto = $_FILES["foto"];
        
        if ($foto["error"] === 0) {
          $fotoPath = "fotos/" . $foto["name"];
          move_uploaded_file($foto["tmp_name"], $fotoPath);
          echo "<div class='photo-container'>";
          echo "<img src='$fotoPath' alt='Foto'>";
          echo "</div>";
        }

        echo "<p><span class='label'>Nome:</span> $nome</p>";
        echo "<p><span class='label'>Telefone:</span> $telefone</p>";
        echo "<p><span class='label'>Endereço:</span> $endereco</p>";
        echo "<p><span class='label'>Cargo Pretendido:</span> $cargo</p>";
        echo "<p><span class='label'>Email:</span> $email</p>";
        }
      ?>
    </div>
    <div class="divisor">	</div>
    <div class="section">
      <h2>Experiência</h2>
      <?php
      if (isset($_POST['experiencia_empresa'])) {
        $experienciaEmpresas = $_POST['experiencia_empresa'];
        $experienciaCargos = $_POST['experiencia_cargo'];
        $experienciaPeriodos = $_POST['experiencia_periodo'];

        for ($i = 0; $i < count($experienciaEmpresas); $i++) {
          $empresa = $experienciaEmpresas[$i];
          $cargo = $experienciaCargos[$i];
          $periodo = $experienciaPeriodos[$i];

          echo "<div class='section'>";
          echo "<p><span class='label'>Empresa:</span> $empresa</p>";
          echo "<p><span class='label'>Cargo:</span> $cargo</p>";
          echo "<p><span class='label'>Período:</span> $periodo</p>";
          echo "</div>";
        }
      }
      ?>
    </div>
    <div class="divisor">	</div>
    <div class="section">
      <h2>Formação</h2>
      <?php
      if (isset($_POST['formacao_instituicao'])) {
        $formacaoInstituicoes = $_POST['formacao_instituicao'];
        $formacaoCursos = $_POST['formacao_curso'];
        $formacaoPeriodos = $_POST['formacao_periodo'];

        for ($i = 0; $i < count($formacaoInstituicoes); $i++) {
          $instituicao = $formacaoInstituicoes[$i];
          $curso = $formacaoCursos[$i];
          $periodo = $formacaoPeriodos[$i];

          echo "<div class='section'>";
          echo "<p><span class='label'>Instituição:</span> $instituicao</p>";
          echo "<p><span class='label'>Curso:</span> $curso</p>";
          echo "<p><span class='label'>Período:</span> $periodo</p>";
          echo "</div>";
        }
      }
      ?>
    </div>
    <div class="print-button">
      <button onclick="window.print()">Imprimir Currículo</button>
    </div>

  </div>
</body>
</html>
