
    document.querySelectorAll('.check-tarefa').forEach(checkbox => {
      checkbox.addEventListener('change', function () {
        const id = this.dataset.id;
        const concluida = this.checked ? 1 : 0;
        const span = this.parentElement.querySelector('span');
        span.classList.toggle('concluida', concluida === 1);
        
        fetch('atualizar.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id=${id}&concluida=${concluida}`
        }).then(() => {
        });
      });
    });

    document.querySelectorAll('.botao-editar').forEach(button => {
      button.addEventListener('click', function (e) {
        e.preventDefault();
        const tarefaDiv = this.closet('.tarefa');
        const span = tarefaDiv.querySelector('span');
        const id = tarefaDiv.querySelector('.check-tarefa').dataset.id;

        const input = document.createElement('input');
    input.type = 'text';
    input.value = span.textContent;
    input.style.flex = '1';
    span.replaceWith(input);
    input.focus();
    function salvar() {
      const novoTitulo = input.value.trim();
      if (novoTitulo === '') return;

      fetch('editar.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `id=${id}&titulo=${encodeURIComponent(novoTitulo)}`
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          const novoSpan = document.createElement('span');
          novoSpan.textContent = novoTitulo;
          if (tarefaDiv.querySelector('.check-tarefa').checked) {
            novoSpan.classList.add('concluida');
          }
          input.replaceWith(novoSpan);
        } else {
          alert('Erro ao atualizar a tarefa.');
        }
      })
      .catch(err => {
        console.error(err);
        alert('Erro ao atualizar a tarefa.');
      });
    }
    input.addEventListener('keydown', function(e) {
      if (e.key === 'Enter') salvar();
    });
    input.addEventListener('blur', salvar);
  });
});
