<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $data_nascimento = $_POST["data_nascimento"];
  $idade = $_POST["idade"];
  $email = $_POST["email"];
  $telefone = $_POST["telefone"];
  $localizacao = $_POST["localizacao"];
  $objetivo = $_POST["objetivo"];
  $formacoes = $_POST["formacao"];
  $experiencias = $_POST["experiencia"];
  $periodos_exp = $_POST["periodo_experiencia"];
  $descricoes_exp = $_POST["descricao_experiencia"];
  $habilidades = $_POST["habilidades"];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Currículo de <?php echo htmlspecialchars($nome); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="curriculo">
    <h1><?php echo htmlspecialchars($nome); ?></h1>

    <section class="dados-contato">
      <?php $data_formatada = date("d/m/Y", strtotime($data_nascimento)); ?>
      <div class="row">
        <div class="col-md-6">
          <p><i class="bi bi-calendar"></i> <strong>Data de Nascimento:</strong> <?php echo $data_formatada; ?></p>
          <p><i class="bi bi-person"></i> <strong>Idade:</strong> <?php echo $idade; ?> anos</p>
        </div>
        <div class="col-md-6">
          <p><i class="bi bi-telephone"></i> <strong>Telefone:</strong> <?php echo htmlspecialchars($telefone); ?></p>
          <p><i class="bi bi-envelope"></i> <strong>E-mail:</strong> <?php echo htmlspecialchars($email); ?></p>
          <p><i class="bi bi-geo-alt"></i> <strong>Localização:</strong> <?php echo htmlspecialchars($localizacao); ?></p>
        </div>
      </div>
    </section>

    <?php if (!empty($objetivo)) { ?>
      <section>
        <h2>Objetivo Profissional</h2>
        <p><?php echo nl2br(htmlspecialchars($objetivo)); ?></p>
      </section>
    <?php } ?>

    <?php if (!empty($formacoes)) { ?>
      <section>
        <h2>Formação Acadêmica</h2>
        <ul>
          <?php foreach ($formacoes as $formacao) {
            if (!empty($formacao)) {
              echo "<li>" . htmlspecialchars($formacao) . "</li>";
            }
          } ?>
        </ul>
      </section>
    <?php } ?>

    <?php if (!empty($experiencias)) { ?>
      <section>
        <h2>Experiência Profissional</h2>
        <ul>
          <?php
          for ($i = 0; $i < count($experiencias); $i++) {
            if (!empty($experiencias[$i])) {
              echo "<li><strong>" . htmlspecialchars($experiencias[$i]) . "</strong>";
              if (!empty($periodos_exp[$i])) {
                echo " <em>(" . htmlspecialchars($periodos_exp[$i]) . ")</em>";
              }
              if (!empty($descricoes_exp[$i])) {
                echo "<br><span>" . nl2br(htmlspecialchars($descricoes_exp[$i])) . "</span>";
              }
              echo "</li>";
            }
          }
          ?>
        </ul>
      </section>
    <?php } ?>

    <?php if (!empty($habilidades)) { ?>
      <section>
        <h2>Habilidades</h2>
        <ul>
          <?php foreach ($habilidades as $hab) {
            if (!empty($hab)) {
              echo "<li>" . htmlspecialchars($hab) . "</li>";
            }
          } ?>
        </ul>
      </section>
    <?php } ?>
  </div>
  <div class="text-center mt-4 mb-4">
  <button class="btn btn-primary" onclick="window.print()">Imprimir / Salvar em PDF</button>
</div>
</body>
</html>
