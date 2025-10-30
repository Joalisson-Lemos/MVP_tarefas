
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