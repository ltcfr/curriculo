// === CALCULAR IDADE AUTOMATICAMENTE ===
document
  .getElementById("data-nascimento")
  .addEventListener("change", function () {
    const nascimento = new Date(this.value);
    const hoje = new Date();
    let idade = hoje.getFullYear() - nascimento.getFullYear();
    const mes = hoje.getMonth() - nascimento.getMonth();

    if (mes < 0 || (mes === 0 && hoje.getDate() < nascimento.getDate())) {
      idade--;
    }
    document.getElementById("idade").value = idade;
  });

// === ADICIONAR CAMPOS DINÂMICOS ===
$(document).ready(function () {
  // Adicionar nova formação
  $("#adicionar-formacao").click(function () {
    $("#campo-formacao").append(`
      <div class="formacao-item mb-3">
        <input type="text" name="formacao[]" class="form-control mb-2" placeholder="Ex: Novo curso ou instituição">
      </div>
    `);
  });

  // Adicionar nova experiência
  $("#adicionar-experiencia").click(function () {
    $("#campo-experiencia").append(`
    <div class="experiencia-item mb-3">
      <input type="text" name="experiencia[]" class="form-control mb-2" placeholder="Cargo e empresa" />
      <input type="text" name="periodo_experiencia[]" class="form-control mb-2" placeholder="Período (Ex: 01/2024 - 12/2024)" />
      <textarea name="descricao_experiencia[]" class="form-control mb-2" rows="2" placeholder="Descreva as atividades realizadas"></textarea>
    </div>
  `);
  });

  // Adicionar nova habilidade
  $("#adicionar-habilidade").click(function () {
    $("#campo-habilidades").append(`
      <div class="habilidade-item mb-3">
        <input type="text" name="habilidades[]" class="form-control mb-2" placeholder="Ex: Nova habilidade">
      </div>
    `);
  });
});
